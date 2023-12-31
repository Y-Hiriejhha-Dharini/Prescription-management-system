<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PrescriptionImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prescription():BelongsToMany
    {
        return $this->belongsToMany(Prescription::class);
    }
}
