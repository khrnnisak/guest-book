<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $table = 'bidang';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
    ];

    public function pegawai()
	{
		return $this->hasMany(Pegawai::class);
	}  
}
