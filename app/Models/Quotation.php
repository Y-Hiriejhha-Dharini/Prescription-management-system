<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quotation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prescription():BelongsTo
    {
        return $this->belongsTo(Prescription::class);
    }

    public function QuotationDetail():HasMany
    {
        return $this->hasMany(QuotationDetail::class);
    }
}
