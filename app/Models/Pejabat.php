<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'jabatan',
        'golongan',
        'nip',
        'whatsapp',
        'foto',
        'order_num',
    ];
}
