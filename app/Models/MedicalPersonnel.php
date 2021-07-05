<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalPersonnel extends Model
{
    use HasFactory;
    public function blood_transactions(){
        return $this->hasMany(BloodTransaction::class);
    }
}
