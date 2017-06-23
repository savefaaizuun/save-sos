<?php

namespace App;

use App\RincianKurikulum;
use App\KonfigTahun;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'tbl_jadwal';

    public static function funcGenerateJadwal($data){
    	if (!is_null($data)) {

    		$semester = $data['semester'];
    		//echo $data['id_kurikulum'];die;
    		//ambil data berdasarkan kurikulum yg di pilih
    		//$rincian_kurikulum = DB::select('SELECT * FROM tbl_rincian_kurikulum WHERE id_kurikulum = '.$data['id_kurikulum'].'');
    		$rincian_kurikulum = DB::table('tbl_rincian_kurikulum')->where('id_kurikulum', $data['id_kurikulum'])->get();

    		//ambil tahun akademik aktif
    		$tahun_aktif = DB::table('tbl_konfigurasi_tahun_akademik')->where('is_aktif', '1')->first();

    		foreach ($rincian_kurikulum as $row) {
    			// dapatkan rombel base on jururan dan kelas
    			$rombel = DB::table('tbl_rombel')
    							->where('kode_prodi', $data['kode_prodi'])
    							->where('kelas', $data['kelas'])	
    							->get();

    			foreach ($rombel as $row_rombel) {
    				$data_insert = array(
                    'id_tahun_akademik' => $tahun_aktif->id,
                    'kode_prodi'		=> $row->kode_prodi,
                    'kelas'             =>$row->kelas,
                    'kode_mapel'        => $row->kode_mapel,
                    'id_guru'           => 2,
                    'jam'               => '',
                    'kode_ruang'        => '011',
                    'semester'          => $semester,
                    'hari'              => '',
                    'id_rombel'         => $row_rombel->id
                    );

                    DB::table('tbl_jadwal')->insert($data_insert);
    			}
    		}
    		$result['bIsError'] = false;
            $result['sErrorMessage'] = 'Berhasil';
    	} else {
    		$result['bIsError'] = true;
            $result['sErrorMessage'] = 'Parameter data tidak valid ! (null)';
    	}

    	return $result;
    }
}