<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beca extends Model
{
    use HasFactory;
    protected $guarded = ["Institution_id"];
    protected $fillable = ["Type"];
}
