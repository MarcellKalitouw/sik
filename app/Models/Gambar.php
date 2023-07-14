<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Gambar extends Model
{
     use HasFactory, UUID;
    public $timestamps = true;
    protected $fillable = [
        'nama',
        'gambar'
    ];
}
