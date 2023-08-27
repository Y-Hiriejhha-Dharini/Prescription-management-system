<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuotationConfirmCancel extends Controller
{
    public function confirm($token)
    {
        $prescription_id = decrypt($token);
        dd($token);
    }

    public function cancel($token)
    {

    }
}
