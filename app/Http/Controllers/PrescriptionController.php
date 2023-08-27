<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrescriptionRequest;
use App\Services\StorePrescriptionService;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{

    public function create()
    {
        return view('prescription.create');
    }

    public function store(StorePrescriptionRequest $request, StorePrescriptionService $StorePrescriptionService)
    {

        if ($StorePrescriptionService->execute($request->note ?? '', $request->validated())) {

            return redirect('/dashboard')->with('success', 'Prescription Stored Successfully');
        } else {

            return redirect('/dashboard')->with('error', 'Error in Store Data');
        }
    }
}
