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

        /*
         * Add Siswa data
         */
        public function add(Request $request)
        {
            $data = new Siswa;
            $data -> nis = $request -> nis;
            $data -> nama = $request -> nama;
            $data -> gender = $request -> gender;
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
