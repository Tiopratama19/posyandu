<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Counseling;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class CounselingController extends Controller
{
    function createOrUpdate(Request $request)
    {
        dd($request->all());
        if (!empty($request->id)) {
            // update 
        } else {
            // create
            $cekCount = Counseling::whereName($request->name)
                ->whereCategory($request->category)
                ->count();

            if ($cekCount = 0) {
                $newConseling = new Counseling;
                $newConseling->name = $request->name;
                $newConseling->category = $request->category;
                $newConseling->save();

                if ($newConseling) {
                    return back()->with('success', 'Counseling created successfully!');
                }
            } else {
                return back()->with('warning', 'Counseling is already exist!');
            }
        }
    }
}
