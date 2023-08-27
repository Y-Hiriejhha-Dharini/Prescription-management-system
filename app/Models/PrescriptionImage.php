<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrescriptionImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prescriptionImage():BelongsTo
    {
        return $this->belongsTo(Prescription::class);
    }
}
