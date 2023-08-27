<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Prescription extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeInteravel($query, $id)
    {
        if($query->where('user_id',$id)->count() > 0 )
        {
            return $query->where('user_id',auth()->user()->id)->latest()->first()->created_at->addHours(2)->toDateTimeString() < now();
        } 
        else{
            return true;
        }
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function prescriptionImage():HasMany
    {
        return $this->hasMany(PrescriptionImage::class);
    }

    public function quotation():HasOne
    {
        return $this->hasOne(Quotation::class);
    }
}
