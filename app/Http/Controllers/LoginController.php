<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'contraseña' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 422);
        }

        if (!Hash::check($request->contraseña, $user->contraseña)) {
            return response()->json(['message' => 'Credenciales no válidas'], 422);
        }

        auth('web')->login($user, $request->remember);

        // Asignar manualmente una sesión
        session(['user' => $user]);

        return response()->json([
            'message' => 'Inicio de sesión exitoso',
        ]);
    }
}



