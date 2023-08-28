<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use App\Models\User;
use App\Notifications\ConfirmRejectQuotationNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class QuotationConfirmCancel extends Controller
{
    use Notifiable;
    public function confirm($token)
    {
        $this->findPrescription($token)->update([
            'status' =>'confirmed'
        ]);

        $pharmacy = User::where('user_type','pharmacy')->first();
        $pharmacy->notify(new ConfirmRejectQuotationNotification($this->findPrescription($token),'confirmed'));

        return redirect('/dashboard')->with('success','Confirmed Successfully');
    }

    public function cancel($token)
    {
        $this->findPrescription($token)->update([
            'status' =>'rejected'
        ]);

        $pharmacy = User::where('user_type','pharmacy')->first();
        $pharmacy->notify(new ConfirmRejectQuotationNotification($this->findPrescription($token),'cancelled'));
        
        return redirect('/dashboard')->with('error','Confirmed Successfully');
    }

    private function findPrescription($token)
    {
        $prescription_id = decrypt($token);
        $prescription = Prescription::find($prescription_id);

        return $prescription;
    }
}
