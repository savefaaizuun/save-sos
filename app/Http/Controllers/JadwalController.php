<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\Jadwal;
use App\Prodi;
use App\Rombel;
use App\Kurikulum;

class JadwalController extends Controller
{
    /*
     * Display all data
     */
    public function index()
    {
    	$atribut  = array('title' => 'Data Jadwal' );
    	$data = Jadwal::all();
        $prodi = Prodi::all();
        $kurikulum = Kurikulum::all();
    	return view('jadwal.index', ['data' => $data, 'atribut' => $atribut, 'list_prodi' => $prodi, 'list_kurikulum' => $kurikulum]);
    }

    /*
     * Add Jadwal
     */
    public function add(Request $request)
    {
        $data = new Jadwal;
        $data -> nuptk = $request -> nuptk;
        $data -> nama_guru = $request -> nama_guru;
        $data -> gender = $request -> gender;
        $data -> username = $request -> username;
        $data -> save();
        return back()
        ->with('success','Record Added successfully.');
	}

	/*
     * View data
     */
    public function view(Request $request)
    {
	    if($request->ajax()){
    	    $id = $request->id;
            $info = Guru::find($id);
            //echo json_decode($info);
            return response()->json($info);
            }
    }

    /*
        *   Update data
        */
        public function update(Request $request)
        {
            $id = $request -> edit_id;
            $data = Guru::find($id);
            $data -> nuptk = $request -> edit_nuptk;
            $data -> nama_guru = $request -> edit_nama;
            $data -> gender = $request -> edit_gender;
            $data -> username = $request -> edit_username;
            $data -> save();
            return back()
                    ->with('success','Record Updated successfully.');
        }

        /*
        *   Delete record
        */
        public function delete(Request $request)
        {
            $id = $request -> id;
            $data = Guru::find($id);
            $response = $data -> delete();
            if($response)
                echo "Record Deleted successfully.";
            else
                echo "There was a problem. Please try again later.";
        }


        public function get_rombel(Request $request)
        {
            if($request->ajax()){
                $kode_prodi = $request->kode_prodi;
                $kelas = $request->kelas;
                $query = DB::select('SELECT * FROM tbl_rombel WHERE kode_prodi = "'.$kode_prodi.'" AND kelas = '.$kelas.'');
                
                $data = "<option value=''>- Pilih Rombel -</option>";
                foreach ($query as $value) {
                    $data .= "<option value='".$value->id."'>".$value->nama_rombel."</option>";
                }
                echo $data;
            }
        }

        public function generate(Request $request)
        {
            $post = array(  'id_kurikulum' => $request->id_kurikulum,
                            'semester' => $request->semester,
                            'kode_prodi' => $request->prodi,
                            'kelas' => $request->kelas,
                            'id_rombel' => $request->rombel );
            $result = Jadwal::funcGenerateJadwal($post);

            if ($result['bIsError'] === false) {
                $output['message'] = 'Jadwal Pelajaran berhasil di generate';
                return back();
            } else {
                $output['message'] = 'Jadwal Pelajaran gagal di generate';
                return back();
            }
            
        }

        

        
}
