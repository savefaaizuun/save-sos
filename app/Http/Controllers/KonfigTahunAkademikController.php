<?php 
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\KonfigTahun;
    class KonfigTahunAkademikController extends Controller
    {
        /*
         * Display all data
         */
	    public function index()
	    {
	    	$atribut = array("title"=>"Data Konfigurasi Tahun Akademik");
            $data = KonfigTahun::all();
            return view('konfigurasi_tahun.index', ['data' => $data, 'atribut' => $atribut]);
	    }

        /*
         * Add Siswa data
         */
        public function add(Request $request)
        {
            $data = new KonfigTahun;
            $data -> tahun_akademik = $request -> tahun_akademik;
            $data -> is_aktif = $request -> is_aktif;
            $data -> semester_aktif = $request -> semester_aktif;
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
                $info = KonfigTahun::find($id);
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
            $data = KonfigTahun::find($id);
            $data -> tahun_akademik = $request -> edit_tahun_akademik;
            $data -> is_aktif = $request -> edit_is_aktif;
            $data -> semester_aktif = $request -> edit_semester_aktif;
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
            $data = KonfigTahun::find($id);
            $response = $data -> delete();
            
            if($response)
                echo "Record Deleted successfully.";
            else
                echo "There was a problem. Please try again later.";
        }
    }
?>