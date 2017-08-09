<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\DataIndukSiswa;
    use Session;
    class DataIndukSiswaController extends Controller
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
            $data = DataIndukSiswa::all();
            return view('data_induk_siswa.index', ['data' => $data,
                                        'atribut' => $atribut,
                                        'session_role' => $session_role]);
	    }

        public function test(Request $request)
        {
            return view('data_induk_siswa.test');
        }

        public function detail($id)
        {
            //$session_role = $request->session()->get('role_id');
            $detail_siswa = DataIndukSiswa::find($id);
            //dd($detail_siswa);
            $atribut = array("title"=>"Detail Data Siswa");
            return view('data_induk_siswa.detail',[
                                        'atribut' => $atribut,
                                        'detail_siswa' => $detail_siswa]);
        }

        /*
         * Add Siswa data
         */
        public function add(Request $request)
        {
            //dd($request);

            $data = new DataIndukSiswa;
            $data -> nis = $request -> nis;
            $data -> nisn = $request -> nisn;
            $data -> nama_lengkap = $request -> nama_lengkap;
            $data -> nama_panggilan = $request -> nama_panggilan;
            $data -> gender = $request -> gender;
            $data -> tempat_lahir = $request -> tempat_lahir;
            $data -> tgl_lahir = date('Y-m-d', strtotime($request->tgl_lahir));
            $data -> agama = $request -> agama;
            $data -> warga_negara = $request -> warga_negara;
            $data -> anak_ke = $request -> anak_ke;
            $data -> saudara_kandung = $request -> saudara_kandung;
            $data -> saudara_tiri = $request -> saudara_tiri;
            $data -> saudara_angkat = $request -> saudara_angkat;
            $data -> status_anak = $request -> status_anak;
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
                $info = DataIndukSiswa::find($id);
                //print_r($info);die;
                //echo json_decode($info);
                return response()->json($info);
            }
        }

        /*
        *   Update data
        */
        public function update(Request $request)
        {
            //dd($request);
            $id = $request -> edit_id;
            //dd($id);
            $data = DataIndukSiswa::find($id);
            $data -> nis = $request -> edit_nis;
            $data -> nisn = $request -> edit_nisn;
            $data -> nama_lengkap = $request -> edit_nama_lengkap;
            $data -> nama_panggilan = $request -> edit_nama_panggilan;
            $data -> gender = $request -> edit_gender;
            $data -> tempat_lahir = $request -> edit_tempat_lahir;
            $data -> tgl_lahir = date('Y-m-d', strtotime($request->edit_tgl_lahir));
            $data -> agama = $request -> edit_agama;
            $data -> warga_negara = $request -> edit_warga_negara;
            $data -> anak_ke = $request -> edit_anak_ke;
            $data -> saudara_kandung = $request -> edit_saudara_kandung;
            $data -> saudara_tiri = $request -> edit_saudara_tiri;
            $data -> saudara_angkat = $request -> edit_saudara_angkat;
            $data -> status_anak = $request -> edit_status_anak;
            $data -> bahasa = $request -> edit_bahasa;
            $data -> status_aktif = $request -> edit_status_aktif;
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
            $data = DataIndukSiswa::find($id);
            $response = $data -> delete();
            if($response)
                echo "Record Deleted successfully.";
            else
                echo "There was a problem. Please try again later.";
        }
    }
?>
