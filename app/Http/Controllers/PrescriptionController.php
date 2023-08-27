<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrescriptionRequest;
use App\Services\PrescriptionService;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{

    public function create()
    {
        return view('prescription.create');
    }

    public function store(StorePrescriptionRequest $request, PrescriptionService $PrescriptionService)
    {

        $PrescriptionService->execute($request->note ?? '', $request->validated());
    }
}
