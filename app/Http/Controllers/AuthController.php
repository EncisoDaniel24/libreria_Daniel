<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //


    public function registerForm(){
        return view('auth.register');
    }   

    // Método para guardar la información de registro
    public function register(Request $reques){
        // Validaciones de los campos del formulario
        $reques->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $reques->name,
            'email' => $reques->email,
            'phone' => $reques->phone,
            'password' => Hash::make($reques->password),
            'is_admin' => $reques->has('is_admin')
        ]);

        //Iniciar sesión de forma automática
        Auth::login($user);

        return redirect()->route('libros.index');
    }
    
    // Método para regresar la vista del inicio de sesión
    public function loginForm(){
        return view('auth.login');
    }
    //Metodo para iniciar sesion
    public function login(Request $request){
        //Validar la información del formulario
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Intentar el inicio de sesión
        if(Auth::attempt($data)){
            //Iniciar sesion y redireccionar al usuario con sesion activa
            $request -> session() -> regenerate();
            return redirect()->route('libros.index');
        }

        return back()-> withErrors([
            'email' => 'Datos incorrectos',
        ]);
    }
    
    public function logout(Request $request) {
        // Funcion para cerrar sesion
        Auth::logout();

        //Cierre de credenciales en las sesiones
        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();

        return redirect('/acceso');
    }

    //Vista del panel de administrador 
    public function adminDashboard(){
        return view('admin.dashboard');
    }
}