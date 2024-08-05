<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;

    protected $append = ['format_tanggal_pelayanan'];

    public function getFormatTanggalPelayananAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_pelayanan'])->isoFormat('dddd, D MMMM Y | HH:mm');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
