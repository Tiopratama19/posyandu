<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
class DataRemajaController extends Controller
{
    function downloadDataremaja($tglawal, $tglakhir)
    {
        app()->setLocale('id');

        try {
            $date1 = Carbon::createFromFormat('D M d Y H:i:s T', $tglawal);
            $date2 = Carbon::createFromFormat('D M d Y H:i:s T', $tglakhir);
        } catch (\Exception $e) {
            Log::error('Invalid date format: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid date format'], 400);
        }

        $tglawal_conv = $date1->format('Y-m-d');
        $tglakhir_conv = $date2->format('Y-m-d');

        try {
            $remaja = DB::table('dataremajas')
                ->join('riwayats', 'dataremajas.id', '=', 'riwayats.id_dataremaja')
                ->select(
                    'dataremajas.*',
                    'dataremajas.id as id_remajas',
                    'riwayats.*'
                )
                ->whereBetween('riwayats.tanggal', [$tglawal_conv, $tglakhir_conv])
                ->get();
        } catch (\Exception $e) {
            Log::error('Database query failed: ' . $e->getMessage());
            return response()->json(['error' => 'Database query failed'], 500);
        }

        if ($remaja->isEmpty()) {
            return response()->json(['error' => 'No data found for the given date range'], 404);
        }

        $response = [];
        $pdfPaths = [];

        foreach ($remaja as $key => $value) {
            $getdataremaja = $value;
            $svgPath = public_path('assetreport/1/1.svg');

            if (!file_exists($svgPath)) {
                Log::error('SVG template not found at path: ' . $svgPath);
                return response()->json(['error' => 'SVG template not found'], 500);
            }

            $svgContent = file_get_contents($svgPath);

            try {
                $customPaper = [0, 0, 750, 2000];
                $pdf = PDF::loadView('laporan.dataremaja', ['remaja' => $getdataremaja])->setPaper($customPaper, 'portrait');

                $path = public_path('laporan/dataremaja');
                $filename = $getdataremaja->Nama . '_' . time() . '.pdf';
                $pdf->save($path . '/' . $filename);

                $pdfPaths[] = url('laporan/dataremaja/' . $filename);
            } catch (\Exception $e) {
                Log::error('PDF generation failed: ' . $e->getMessage());
                return response()->json(['error' => 'PDF generation failed'], 500);
            }
        }
        if (!empty($pdfPaths)) {
            return response()->json(['pdfUrls' => $pdfPaths]);
        } else {
            return response()->json(['error' => 'No PDFs generated'], 500);
        }
    }

    // function generate($filename)
    // {
    //     $file = public_path('laporan/dataremaja/' . $filename);

    //     if (!file_exists($file)) {
    //         return response()->json(['error' => 'File not found'], 404);
    //     }

    //     return response()->download($file);
    // }
}
