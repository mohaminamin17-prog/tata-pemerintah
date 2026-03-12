<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'year',
        'document_url',
        'deadline',
        'evaluation_score',
        'status',
    ];
}
