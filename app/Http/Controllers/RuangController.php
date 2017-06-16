<?php 
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Ruang;
    class RuangController extends Controller
    {
        /*
         * Display all data
         */
	    public function index()
	    {
	    	$atribut = array("title"=>"Data Ruang");
            $data = Ruang::all();
            return view('ruang.index', ['data' => $data, 'atribut' => $atribut]);
	    }

        /*
         * Add Siswa data
         */
        public function add(Request $request)
        {
            $data = new Ruang;
            $data -> kode_ruang = $request -> kode_ruang;
            $data -> nama_ruang = $request -> nama_ruang;
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
                $info = Ruang::find($id);
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
            $data = Ruang::find($id);
            $data -> kode_ruang = $request -> edit_kode_ruang;
            $data -> nama_ruang = $request -> edit_nama_ruang;
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
            $data = Ruang::find($id);
            $response = $data -> delete();
            
            if($response)
                echo "Record Deleted successfully.";
            else
                echo "There was a problem. Please try again later.";
        }
    }
?>