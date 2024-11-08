<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaKegiatan extends Model
{
    use HasFactory;

    protected $table = 'peserta_kegiatan';
    protected $guarded = [];

    public function informasi()
    {
        return $this->belongsTo(Informasi::class, 'id_informasi');
    }
}
