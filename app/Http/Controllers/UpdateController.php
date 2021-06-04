<?php

namespace App\Http\Controllers;

use App\User;
use App\Cliente;

use App\Municipios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        $municipios = Municipios::all();
        if($user->rol==0)
        {
            return view('perfil.cliente',['municipios' => $municipios,'user' => $user]);
        }
        else{

            return view('perfil.chofer',['municipios' => $municipios,'user' => $user]);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCliente(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $this->validate($request, [
            'email' => 'min:3|max:255|email|required|unique:users,email,'.$user->id,
            'name' => 'min:3|required|max:255',
            'image' => 'mimes:jpg,png,bmp,jpeg|max:5000',
            'telefono' => 'required|string|min:9|max:13',
            'municipios_id' => 'required|integer',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->municipios_id = $request->municipios_id;
        if ($request->has('image')) {

            //borro la imagen anterior si no es la que se asigna por defecto
            if($user->image!='perfil/default.png'){
            Storage::delete('public/'.$user->image);
            }
            //guardo la nueva
            $file=$request->file('image');
            $imageName = time().$file->getClientOriginalName();
            $path = "perfil/{$imageName}";
            \Storage::disk('public')->put($path,  \File::get($file));

            $user->image=$path;
        }
        $cliente = Cliente::findOrFail($user->id);

        if($request->has('anonimo')){
            $cliente->anonimo = 1;
        }
        else{
            $cliente->anonimo = 0;
        }
        $cliente->save();

        $user->save();

    return redirect(route('perfil'));

    }
    public function updateChofer(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $this->validate($request, [
            'email' => 'min:3|max:255|email|required|unique:users,email,'.$user->id,
            'name' => 'min:3|required|max:255',
            'image' => 'mimes:jpg,png,bmp,jpeg|max:5000',
            'telefono' => 'required|string|min:9|max:13',
            'municipios_id' => 'required|integer',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->municipios_id = $request->municipios_id;
        if ($request->has('image')) {

            //borro la imagen anterior si no es la que se asigna por defecto
            if($user->image!='perfil/default.png'){
            Storage::delete('public/'.$user->image);
            }
            //guardo la nueva
            $file=$request->file('image');
            $imageName = time().$file->getClientOriginalName();
            $path = "perfil/{$imageName}";
            \Storage::disk('public')->put($path,  \File::get($file));

            $user->image=$path;
        }


        $user->save();

    return redirect(route('perfil'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        return "borrando " . Auth::user()->name ;
    }
}
