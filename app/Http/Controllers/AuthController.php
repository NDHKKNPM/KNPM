<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;

    class AuthController extends Controller
    {
        public function register(Request $request)
        {
            $request->validate([
                'username' => 'required| string',
                'name'     => 'required| string|max:255',
                'password' => 'required| min:6',
                'email'    => 'required| email',
            ]);
            $data = $request->all();

            if(User::where('username', $request->username)->exists()){
                return response()->json(['message' => 'Ten dang nhap da ton tai'], 409);
            }
            if(User::where('email', $request->email)->exists()){
                return response()->json(['message' => 'Email da ton tai'], 409);
            }

            $user = User::create([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'token' => $user->createToken('api-token')->accessToken
            ]);
        }

        public function login(Request $request)
        {
            $request->validate([
                'username' => 'required| string',
                'password' => 'required| min:6',
            ]);
            $data = $request->all();

            if(!User::where('username', $request->username)->exists()){
                return response()->json(['message' => 'Nguoi dung khong ton tai'], 409);
            }

            $user = User::where('username', $request->username) -> first();

            if (!Hash::check($request->password, $user->password)){
                return response()->json(['message' => 'Sai mat khau'], 409);
            }

            return response()->json([
                'token' => $user->createToken('api-token')->accessToken
            ]);
        }

        public function deleteUser($id){
            $user = User::where('id', $id)->first();
            if (!$user){
                return response ()->json([
                    'message' => 'User not found'
                ], 404);
            }
            $user->delete();
            return response()->json([
                'message' => 'User deleted successfully'
            ]);
        }




        public function getallUser(){
            $users = User::all();
            return response()->json([
                'users' => $users
            ]);
        }

    };
