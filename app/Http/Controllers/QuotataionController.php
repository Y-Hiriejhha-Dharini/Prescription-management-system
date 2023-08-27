<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuotationRequest;
use App\Models\Drug;
use App\Models\Prescription;
use App\Services\StoreQuotationService;

class QuotataionController extends Controller
{

    public function create()
    {
        $drugs = Drug::getAllDrugs();
        $images = Prescription::with('prescriptionImage')->where('id',request()->id)->first();
        return view('quotation.create',['images'=>$images,'drugs' => $drugs]);
    }

    public function store(StoreQuotationRequest $request, StoreQuotationService $StoreQuotationService)
    {

        if ($StoreQuotationService->execute($request->validated())) {

            return redirect('/dashboard')->with('success', 'Quotation Stored Successfully');
        } else {

            return redirect('/dashboard')->with('error', 'Error in Store Data');
        }

    }
}
