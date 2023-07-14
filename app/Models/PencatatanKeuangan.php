<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\SoftDeletes;
class PencatatanKeuangan extends Model
{
    use HasFactory, SoftDeletes, UUID;

    public $timestamps = true;
    protected $fillable = [
        // 'id_kategori',
        'id_gambar',
        'tgl',
        'deleted_by',
        'nama',
        'jumlah',
        'from_to',
        'keterangan',
        'tipe'
    ];
}
