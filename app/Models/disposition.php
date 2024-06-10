<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disposition extends Model
{
    use HasFactory;
    protected $fillable = ['asal_surat', 'nomor_surat', 'tanggal_surat', 'tanggal_diterima', 'nomor_agenda', 'asal_surat', 'sifat_surat', 'perihal', 'diteruskan', 'hormat', 'catatan'];
}
