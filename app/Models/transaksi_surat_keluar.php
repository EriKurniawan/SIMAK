<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi_surat_keluar extends Model
{
    use HasFactory;
    protected $fillable = ['nomor_surat', 'tujuan', 'tanggal_surat', 'keterangan', 'perihal', 'lampiran'];
}
