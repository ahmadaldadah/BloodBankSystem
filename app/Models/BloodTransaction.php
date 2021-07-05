<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodTransaction extends Model
{
    use HasFactory;
    public function medical_personnel(){
        return $this->belongsTo(MedicalPersonnel::class);
    }
    public function recipients(){
        return $this->belongsTo(Recipient::class);
    }
}
