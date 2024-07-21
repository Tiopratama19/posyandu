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
            // Convert dates to Carbon objects and then to the desired format
            $date1 = Carbon::createFromFormat('D M d Y H:i:s T', $tglawal);
            $date2 = Carbon::createFromFormat('D M d Y H:i:s T', $tglakhir);
        } catch (\Exception $e) {
            Log::error('Invalid date format: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid date format'], 400);
        }

        $tglawal_conv = $date1->format('Y-m-d');
        $tglakhir_conv = $date2->format('Y-m-d');

        try {
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
        } catch (\Exception $e) {
            Log::error('Database query failed: ' . $e->getMessage());
            return response()->json(['error' => 'Database query failed'], 500);
        }

        if ($remaja->isEmpty()) {
            return response()->json(['error' => 'No data found for the given date range'], 404);
        }

        $response = [];

        foreach ($remaja as $key => $value) {
            $getdataremaja = $value;
            $svgPath = public_path('assetreport/1/1.svg');

            if (!file_exists($svgPath)) {
                Log::error('SVG template not found at path: ' . $svgPath);
                return response()->json(['error' => 'SVG template not found'], 500);
            }

            $svgContent = file_get_contents($svgPath);

            try {
                // Example PDF generation with Laravel PDF
                $customPaper = [0, 0, 750, 2000];
                $pdf = PDF::loadView('laporan.dataremaja', ['remaja' => $getdataremaja])->setPaper($customPaper, 'portrait');

                $path = public_path('laporan/dataremaja');
                $filename = $getdataremaja->Nama . '_' . time() . '.pdf'; // Ensure a unique filename
                $pdf->save($path . '/' . $filename);

                // Store filename and download URL in response array
                $response[] = [
                    'filename' => $filename,
                    'downloadUrl' => route('download.pdf', ['filename' => $filename]) // Assuming route is defined
                ];
            } catch (\Exception $e) {
                Log::error('PDF generation failed: ' . $e->getMessage());
                return response()->json(['error' => 'PDF generation failed'], 500);
            }
        }

        // Debugging: Print the response before returning it
        Log::info('JSON Response: ' . json_encode($response, JSON_PRETTY_PRINT));

        // Return JSON response with filenames and download URLs
        return response()->json($response);
    }

    function generate($filename)
    {
        $pdfPath = public_path('laporan/dataremaja/' . $filename);

        // Ensure the file exists before attempting to download
        if (file_exists($pdfPath)) {
            return response()->download($filePath, $filename, ['Content-Type: application/pdf']);
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
}
