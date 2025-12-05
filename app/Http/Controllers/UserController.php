<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
        if (Auth::attempt($credentials)){
            return redirect()->route('torneos.index');

        }


    }
    public function logout(Request $request){
        // Cerrar sesión
        Auth::logout();

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
