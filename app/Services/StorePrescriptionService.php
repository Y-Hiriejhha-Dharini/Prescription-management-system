<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Prescription;
use App\Models\PrescriptionImage;
use Exception;
use Illuminate\Support\Facades\DB;

class StorePrescriptionService{

    public function execute($note, $validated_data)
    {
        DB::beginTransaction();
        try{
            $prescription = Prescription::create([
                'user_id' => auth()->user()->id,
                'delivery_address' => $validated_data['delivery_address'],
                'delivery_time' => $validated_data['delivery_time'],
                'note' => $note,
                'status' => 'progress'
            ]);

            foreach ($validated_data['images'] as $image){
                $image_name = time().'-'.$image->hashName();
                $image->move('images',$image_name);

                $prescription->prescriptionImage()->create([
                    'img_path' => $image_name
                ]);
            };
            DB::commit();
            return true;
        }catch(Exception $e)
        {
            return false;
        }

    }
}