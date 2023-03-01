<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $mylibross = $user->libross()->paginate(3);
        return view('libros.index')->with('mylibross',$mylibross);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricula'=>'required|unique:libross',
            'marca'=>'required',
            'modelo'=>'required',
            'foto'=>'required|image'
        ]);
        try{
            $mylibros = new Libros();
            $mylibros->matricula = $request->matricula;
            $mylibros->marca = $request->marca;
            $mylibros->modelo = $request->modelo;
            $mylibros->year = $request->year;
            $mylibros->color = $request->color;
            $mylibros->fecha_ultima_revision = $request->fecha_ultima_revision;
            $mylibros->precio = $request->precio;
            $mylibros->user_id = Auth::id();
            $nombrefoto = time() . "-" . $request->file('foto')->getClientOriginalName();
            $mylibros->foto = $nombrefoto;
            $mylibros->save();
            $request->file('foto')->storeAs('public/img_libross', $nombrefoto);
            return redirect()->route('libros.index')->with('status', "Coche creado correctamente");
        }
        catch(QueryException $exception){
            return redirect()->route('libros.index')->with('status', "No se ha podido crear el coche");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mylibros = Libros::findOrFail($id);
        $url = 'storage/img_libross/';
        return view('libros.show')->with('mylibros',$mylibros)->with('url',$url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $mylibros = Libros::findOrFail($id);
        $url = 'storage/img_libross/';
        return view('libros.edit')->with('mylibros',$mylibros)->with('url',$url);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'matricula'=>'required',
            'marca'=>'required',
            'modelo'=>'required',
            'foto'=>'image'
        ]);

        try{
            $mylibros = Libros::findOrFail($id);
            $mylibros->matricula = $request->matricula;
            $mylibros->marca = $request->marca;
            $mylibros->modelo = $request->modelo;
            $mylibros->year = $request->year;
            $mylibros->color = $request->color;
            $mylibros->fecha_ultima_revision = $request->fecha_ultima_revision;
            $mylibros->precio = $request->precio;
            $mylibros->user_id = Auth::id();
            if(is_uploaded_file($request->foto)){
                $nombrefoto = time() . "-" . $request->file('foto')->getClientOriginalName();
                $mylibros->foto = $nombrefoto;
                $request->file('foto')->storeAs('public/img_libross', $nombrefoto);
            }


            $mylibros->save();

            return redirect()->route('libros.index')->with('status', "Coche editado correctamente");
        }
        catch(QueryException $exception){
            return redirect()->route('libros.index')->with('status', "No se ha podido crear el coche");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mylibros = Libros::findOrFail($id);
        $mylibros->delete();
        return redirect()->route('libros.index')->with('status', "Coche borrado correctamente");
    }
}
