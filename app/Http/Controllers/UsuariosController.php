<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Usuario;

class UsuariosController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }
 
    public function show(Usuario $usuario)
    {
        return $usuario;
    }
 
    public function store(Request $request)
    {
       $validation = $this->validator($request->all());
       if($validation->fails()){
            return response()->json($validation->errors(),417);
       }
       return $this->create($request->all());
    }
 
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->all());
 
        return response()->json($usuario, 200);
    }
 
    public function delete(Usuario $usuario)
    {
        $usuario->delete();
 
        return response()->json(null, 204);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|string|max:255',
            'cep' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'senha' => 'required|string|min:6'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'nome' => $data['nome'],
            'cep' => $data['cep'],
            'email' => $data['email'],
            'senha' => md5($data['senha'])
        ]);
    }
}
