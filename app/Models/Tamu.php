<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_lengkap',
        'instasi',
        'jadwal_temu',
        'keperluan',
        'status',
        
    ];
    
    public function user()
	{
		return $this->belongsTo(User::class);
	} 
    public function pegawai()
	{
		return $this->belongsTo(Pegawai::class);
	}    
}
