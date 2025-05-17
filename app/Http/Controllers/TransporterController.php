<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Transporter;
    use Illuminate\Support\Str;

    class TransporterController extends Controller
    {
        public function delete($id)
        {
            $transporter = Transporter::where('slug', $id)->orwhere('id', $id)->first();
            if (!$transporter){
                return response ()->json([
                    'message' => 'Transporter not found'
                ], 404);
            }
            $transporter->delete();
            return response()->json([
                'message' => 'Transporter deleted successfully'
            ]);
        }

        public function add(Request $request){

            $request->validate([
                'name' => 'required|string',
            ]);

            $transporter = Transporter::create([
                'name' => $request['name'],
            ]);
            return response()->json([
                'message' => 'Transporter added successfully',
                'transporter' => $transporter
            ]);
        }
    };
