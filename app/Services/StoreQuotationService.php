<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Prescription;
use App\Models\PrescriptionImage;
use App\Models\Quotation;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreQuotationService{

    public function execute($validated_data)
    {
        DB::beginTransaction();
        try{

            $quotation = Quotation::create([
                'prescription_id' => $validated_data['prescription_id'],
                'total_amount' => $validated_data['total'],
                'email_status' => '0',
            ]);

            if(count($validated_data['quantity'])  == count($validated_data['drug_id']))
            {
                for ($i=0; $i<count($validated_data['quantity']); $i++){

                    $quotation->QuotationDetail()->create([
                        'drug_id' => $validated_data['drug_id'][$i],
                        'quantity' => $validated_data['quantity'][$i]
                    ]);
                };
            }

            DB::commit();
            return true;
        }catch(Exception $e)
        {
            return false;
        }

    }
}