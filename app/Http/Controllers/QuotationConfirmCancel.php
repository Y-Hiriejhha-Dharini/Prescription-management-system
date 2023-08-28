<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use App\Notifications\ConfirmRejectQuotationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class QuotationConfirmCancel extends Controller
{
    use Notifiable;
    public function confirm($token)
    {
        $this->findPrescription($token)->update([
            'status' =>'confirmed'
        ]);

        $user = auth()->user();
        $user->notify(new ConfirmRejectQuotationNotification([$this->findPrescription($token),'confirmed']));

        return redirect('/dashboard')->with('success','Confirmed Successfully');
    }

    public function cancel($token)
    {
        $this->findPrescription($token)->update([
            'status' =>'cancelled'
        ]);

        $user = auth()->user();
        $user->notify(new ConfirmRejectQuotationNotification([$this->findPrescription($token),'confirmed']));
        
        return redirect('/dashboard')->with('success','Confirmed Successfully');
    }

    private function findPrescription($token)
    {
        $prescription_id = decrypt($token);
        $prescription = Prescription::find($prescription_id);

        return $prescription;
    }
}
