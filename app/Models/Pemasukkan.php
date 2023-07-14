<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemasukkan extends Model
{
    use HasFactory, SoftDeletes, UUID;

    public $timestamps = true;
    protected $fillable = [
        'id_kategori',
        'deleted_by',
        'nama',
        'jumlah',
        'sumber_dana',
        'keterangan'
    ];
}
