<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rombel extends Model
{
    protected $table = 'tbl_rombel';

    public static function getAllRombel(){

    	return DB::select('SELECT a.id, a.nama_rombel, a.kode_prodi, b.nama_prodi, a.kelas from tbl_rombel a 
                            LEFT JOIN tbl_prodi b ON b.kode_prodi = a.kode_prodi
                            ORDER BY a.id');
    }
}