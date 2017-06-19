<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

use App\Rombel;
use App\Prodi;

class RombelController extends Controller
{
    /*
     * Display all data
     */
    public function index()
    {
    	$atribut  = array('title' => 'Data Rombel' );
    	$data = DB::select('SELECT a.id, a.nama_rombel, a.kode_prodi, b.nama_prodi, a.kelas from tbl_rombel a 
                            LEFT JOIN tbl_prodi b ON b.kode_prodi = a.kode_prodi
                            ORDER BY a.id');
        $prodi = Prodi::all();

    	return view('rombel.index', ['data' => $data, 'atribut' => $atribut, 'list_prodi' => $prodi]);
    }

    /*
     * Add Siswa Rombel
     */
    public function add(Request $request)
    {
        //dd($request);
        $data = new Rombel;
        $data -> nama_rombel = $request -> nama_rombel;
        $data -> kode_prodi = $request -> kode_prodi;
        $data -> kelas = $request -> kelas;
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
            $info = Rombel::find($id);
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
            $data = Rombel::find($id);
            $data -> nama_rombel = $request -> edit_nama_rombel;
            $data -> kode_prodi = $request -> edit_kode_prodi;
            $data -> kelas = $request -> edit_kelas;
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
            $data = Rombel::find($id);
            $response = $data -> delete();
            if($response)
                echo "Record Deleted successfully.";
            else
                echo "There was a problem. Please try again later.";
        }
}
