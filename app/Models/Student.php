<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ["First_name", "Suname", "Identification_card", "Phone", "Room_telephone", "Email", "Semeter"];
}
