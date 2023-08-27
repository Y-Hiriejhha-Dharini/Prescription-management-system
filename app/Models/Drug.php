<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Drug extends Model
{
    use HasFactory;

    public static function getAllDrugs()
    {
        return Cache::remember('all_drugs',now()->addHour(8), function()
        {
            return Drug::all();
        });
    } 
}
