<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
class DataRemajaController extends Controller
{
    function downloadDataremaja($tglawal, $tglakhir)
    {
        app()->setLocale('id');

        // Convert dates to Carbon objects and then to the desired format
        $date1 = Carbon::createFromFormat('D M d Y H:i:s T', $tglawal);
        $date2 = Carbon::createFromFormat('D M d Y H:i:s T', $tglakhir);
        $tglawal_conv = $date1->format('Y-m-d');
        $tglakhir_conv = $date2->format('Y-m-d');

        // Fetch data from database based on date range
        $remaja = DB::table('dataremajas')
            ->join('riwayats', 'dataremajas.id', '=', 'riwayats.id_dataremaja')
            ->select(
                'dataremajas.*',
                'dataremajas.id as id_remajas',
                'riwayats.*'
            )
            ->whereBetween('riwayats.tanggal', [$tglawal_conv, $tglakhir_conv])
            ->get();

        $response = [];
        foreach ($remaja as $key => $value) {
            // Fetch individual data based on ID
            $getdataremaja = DB::table('dataremajas')
                ->join('riwayats', 'dataremajas.id', '=', 'riwayats.id_dataremaja')
                ->select(
                    'dataremajas.*',
                    'dataremajas.id as id_remajas',
                    'riwayats.*'
                )
                ->where('dataremajas.id', $value->id_remajas)
                ->first();

            // Example path to your SVG template and PDF generation
            $svgPath = public_path('assetreport/1/1.svg');
            $svgContent = file_get_contents($svgPath);

            // Example PDF generation with Laravel PDF (assuming you have it installed)
            $customPaper = array(0, 0, 750, 2000);
            $pdf = PDF::loadView('laporan.dataremaja', ['remaja' => $getdataremaja])->setPaper($customPaper, 'portrait');

            $path = public_path('laporan/dataremaja');
            $filename = $getdataremaja->Nama . '.pdf'; // Ensure a unique filename
            $pdf->save($path . '/' . $filename);

            // Store filename and download URL in response array
            $response[] = [
                'filename' => $filename,
                'downloadUrl' => route('download.pdf', ['filename' => $filename]) // Assuming route is defined
            ];
        }
        // Return JSON response with filenames and download URLs
        return response()->json($response);
    }

    function generate($filename)
    {
        $pdfPath = public_path('laporan/dataremaja/' . $filename);

        // Ensure the file exists before attempting to download
        if (file_exists($pdfPath)) {
            return response()->download($pdfPath, $filename, [
                'Content-Type' => 'application/pdf'
            ]);
        } else {
            // Handle file not found scenario
            abort(404, 'File not found');
        }
    }


}
