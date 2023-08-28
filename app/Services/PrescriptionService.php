<?php
namespace App\Services;

use App\Models\Prescription;
use App\Models\Quotation;

class prescriptionService{

    public static function prescriptionByUser(object $user)
    {
        if($user->user_type == 'user')
        {
            $user = auth()->user();
            $prescriptions = Quotation::whereHas('prescription.user', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->whereHas('prescription', function ($query) {
                $query->where('status', 'pending');
            })
            ->orderBy('id','desc')
            ->get();

        }elseif($user->user_type == 'pharmacy')
        {
            $prescriptions = Prescription::whereNot('status','pending')->orderBy('id','desc')->paginate(10);

        }elseif($user->user_type == 'admin')
        {
            $prescriptions = Prescription::orderBy('id','desc')->paginate(10);

        }

        return $prescriptions;
    }

}