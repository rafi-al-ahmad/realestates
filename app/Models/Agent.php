<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "surname",
        "status",
        "email",
        "mobile_phone",
        "office_phone",
        "fax",
        "photo",
        "languages",
    ];

    protected $casts = [
        "languages" => "array",
    ];
}
