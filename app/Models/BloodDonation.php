<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodDonation extends Model
{
    use HasFactory;
    public function donors(){
        return $this->belongsTo(Donor::class);
    }
    public  function  blood_transactions(){
        return $this->hasMany(BloodTransaction::class);
    }
}
