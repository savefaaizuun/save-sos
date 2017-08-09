<?php 
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Kurikulum;
    use App\Prodi;
    use App\Mapel;
    use App\RincianKurikulum;
    class KurikulumController extends Controller
    {
        /*
         * Display all data
         */
	    public function index()
	    {
	    	$atribut = array("title"=>"Data Kurikulum");
            $data = Kurikulum::all();
            return view('kurikulum.index', ['data' => $data, 'atribut' => $atribut]);
	    }

        /*
         * Add Siswa data
         */
        public function add(Request $request)
        {
            $data = new Kurikulum;
            $data -> nama_kurikulum = $request -> nama_kurikulum;
            $data -> is_aktif = $request -> is_aktif;
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
                $info = Kurikulum::find($id);
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
            $data = Kurikulum::find($id);
            $data -> nama_kurikulum = $request -> edit_nama_kurikulum;
            $data -> is_aktif = $request -> edit_is_aktif;
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
            $data = Kurikulum::find($id);
            $response = $data -> delete();
            
            if($response)
                echo "Record Deleted successfully.";
            else
                echo "There was a problem. Please try again later.";
        }

        /*
         * Display all data
         */
        public function rincianKurikulum($id)
        {   
            $atribut = array("title"=>"Data Kurikulum");
            $rincian = Kurikulum::find($id);
            $kurikulum = Kurikulum::all();
            $prodi = Prodi::all();
            // $mapel = DB::select('SELECT a.id, a.id_kurikulum, a.kode_mapel, b.nama_mapel, a.kelas from tbl_rincian_kurikulum a 
            //                 LEFT JOIN tbl_mapel b ON b.kode_mapel = a.kode_mapel
            //                 WHERE id_kurikulum = '.$id.'
            //                 ORDER BY a.id');
            $mapel = Mapel::all();
            $mapel_kurikulum = DB::select('SELECT
                                                a.id,
                                                a.id_kurikulum,
                                                a.kode_mapel,
                                                b.nama_mapel
                                            FROM
                                                tbl_rincian_kurikulum a
                                            LEFT JOIN tbl_mapel b ON b.kode_mapel = a.kode_mapel
                                            WHERE
                                                id_kurikulum = 1
                                            ORDER BY
                                                a.id');

            $rincian = RincianKurikulum::all();
            return view('kurikulum.rincian', [  'data' => $rincian, 
                                                'atribut' => $atribut, 
                                                'list_prodi' => $prodi, 
                                                'list_kurikulum' => $kurikulum,
                                                'list_mapel' => $mapel,
                                                'list_rincian' => $rincian,
                                                'mapel_kurikulum' => $mapel_kurikulum]);
        }

        /*
         * Add Siswa data
         */
        public function addRincian(Request $request)
        {
            //dd($request);die;
            $data = new RincianKurikulum;
            $data -> id_kurikulum = $request -> id_kurikulum;
            $data -> kode_mapel = $request -> mapel;
            $data -> kode_prodi = $request -> prodi;
            $data -> kelas = $request -> kelas;
            $data -> save();
            return back()
                    ->with('success','Record Added successfully.');
        }

        public function get_daftar_mapel(Request $request, $id)
        {
            if($request->ajax()){
                $kelas = $request->kelas;

                echo json_decode($kelas);die;
                $mapel_kurikulum = DB::select('SELECT a.id, a.id_kurikulum, a.kode_mapel, b.nama_mapel, a.kelas from tbl_rincian_kurikulum a 
                             LEFT JOIN tbl_mapel b ON b.kode_mapel = a.kode_mapel
                             WHERE id_kurikulum = '.$id.' AND kelas = '.$kelas.'
                             ORDER BY a.id');
                
                return view('kurikulum.cari_daftar_mapel', ['mapel_kurikulum' => $mapel_kurikulum]);       
            }
        }
}
    
?>