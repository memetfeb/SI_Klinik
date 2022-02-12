<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = ['NIP', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'id_wilayah'];
}
