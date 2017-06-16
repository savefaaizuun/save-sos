<?php 
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Prodi;
    class ProdiController extends Controller
    {
        /*
         * Display all data
         */
	    public function index()
	    {
	    	$atribut = array("title"=>"Data Prodi");
            $data = Prodi::all();
            return view('prodi.index', ['data' => $data, 'atribut' => $atribut]);
	    }

        /*
         * Add Siswa data
         */
        public function add(Request $request)
        {
            $data = new Prodi;
            $data -> kode_prodi = $request -> kode_prodi;
            $data -> nama_prodi = $request -> nama_prodi;
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
                $info = Prodi::find($id);
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
            $data = Prodi::find($id);
            $data -> kode_prodi = $request -> edit_kode_prodi;
            $data -> nama_prodi = $request -> edit_nama_prodi;
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
            $data = Prodi::find($id);
            $response = $data -> delete();
            
            if($response)
                echo "Record Deleted successfully.";
            else
                echo "There was a problem. Please try again later.";
        }
    }
?>