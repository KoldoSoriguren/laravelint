<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use App\Models\Users;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function iniciar()
    {
        return view('sesion.iniciarSesion');
    }

    public function login(Request $request){
        // Validar campos
        $credentials = $request->validate([
            'usuario' => 'required|string',
            'contrasena' => 'required|string',
        ]);

        // Buscar usuario en la base de datos
        $user = Users::where('usuario', $credentials['usuario'])
                    ->where('contrasena', $credentials['contrasena'])
                    ->first();

        if ($user) {
            // Guardar datos en la sesión
            Session::put('user', $user->usuario);

            // Redirigir al dashboard o página principal
            return redirect()->route('torneos.index');
        }

        // Si falla, volver con mensaje de error
        return redirect()->back()->withErrors(['mensaje' => 'Credenciales incorrectas'])->withInput();
    }
    public function logout(Request $request){
        // Cerrar sesión
        Session::forget('user');

        // Redirigir a la página de inicio de sesión
        return redirect()->route('torneos.index');
    }
    public function cambiarIdioma(Request $request){
        Cookie::queue('idioma', $request->idioma, 60*24*30); // 30 días
        return back();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
