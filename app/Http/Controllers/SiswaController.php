<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Siswa;
    use Session;
    class SiswaController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
            $this->middleware('rule:admin');
        }
        /*
         * Display all data
         */
	    public function index(Request $request)
	    {
            // echo $request->session()->get('role_id');
            // echo $request->session()->get('email');die;
            $session_role = $request->session()->get('role_id');
            $atribut = array("title"=>"Data Siswa");
            $data = Siswa::all();
            return view('siswa.index', ['data' => $data,
                                        'atribut' => $atribut,
                                        'session_role' => $session_role]);
	    }

        public function test(Request $request)
        {
            return view('siswa.test');
        }

        /*
         * Add Siswa data
         */
        public function add(Request $request)
        {
            //dd($request);

            $data = new Siswa;
            $data -> nis = $request -> nis;
            $data -> nisn = $request -> nisn;
            $data -> nama_lengkap = $request -> nama_lengkap;
            $data -> nama_panggilan = $request -> nama_panggilan;
            $data -> gender = $request -> gender;
            $data -> tempat_lahir = $request -> tempat_lahir;
            $data -> tgl_lahir = $request -> tgl_lahir;
            $data -> agama = $request -> agama;
            $data -> warga_negara = $request -> warga_negara;
            $data -> anak_ke = $request -> anak_ke;
            $data -> saudara_kandung = $request -> saudara_kandung;
            $data -> saudara_tiri = $request -> saudara_tiri;
            $data -> saudara_angkat = $request -> saudara_angkat;
            $data -> bahasa = $request -> bahasa;
            $data -> status_aktif = $request -> status_aktif;
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
                $info = Siswa::find($id);
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
            $data = Siswa::find($id);
            $data -> nis = $request -> edit_nis;
            $data -> nama = $request -> edit_nama;
            $data -> gender = $request -> edit_gender;
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
            $data = Siswa::find($id);
            $response = $data -> delete();
            if($response)
                echo "Record Deleted successfully.";
            else
                echo "There was a problem. Please try again later.";
        }
    }
?>
