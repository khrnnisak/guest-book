<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'jabatan',
    ];
    
    public function bidang()
	{
		return $this->belongsTo(Bidang::class);
	}  
    public function tamu()
	{
		return $this->hasMany(Tamu::class);
	}  
}
