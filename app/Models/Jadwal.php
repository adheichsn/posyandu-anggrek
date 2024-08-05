<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $append = ['format_tanggal'];

    public function getFormatTanggalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])->isoFormat('dddd, D MMMM Y | HH:mm');
    }
}
