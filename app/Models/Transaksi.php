<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['NIK_pasien', 'nama_pasien', 'tanggal_lahir_pasien', 'tanggal_pendaftaran', 'keluhan', 'id_wilayah', 'id_tindakan', 'id_obat', 'total_biaya', 'update_by', 'status_transaksi',];
}
