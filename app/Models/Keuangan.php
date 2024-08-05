<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $appends = ['format_nominal', 'format_tanggal'];

    public function getFormatNominalAttribute()
    {
        return number_format($this->nominal, 0, ',', '.');
    }

    public function getFormatTanggalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])->isoFormat('dddd, D MMMM Y | HH:mm');
    }
}
