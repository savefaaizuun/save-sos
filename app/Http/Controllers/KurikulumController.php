<?php 
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Kurikulum;
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
    }
?>