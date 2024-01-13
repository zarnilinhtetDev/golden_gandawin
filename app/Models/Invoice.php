<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $dates = ['deleted_at'];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function sells()
    {
        return $this->hasMany(Sell::class);
    }
}
