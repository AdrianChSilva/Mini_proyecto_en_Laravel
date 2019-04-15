<?php

namespace PruebApp\Http\Controllers;

use Illuminate\Http\Request;
use PruebApp\Trainer;
use Symfony\Component\Console\Input\Input;
use PruebApp\Http\Requests\StoreTrainerRequest;

class EntrenadorControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validation = $request->user()->authorizeRole('admin');
        if ($validation) {
            $trainers = Trainer::all();
            return view("trainers.index", compact('trainers'));
        }else {
            return view("errors.401");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRequest $request)
    {


        if ($request->hasFile('avatar')) {
            $imagen = $request->file('avatar');
            $name = time() . $imagen->getClientOriginalName();
            $imagen->move(public_path() . '/images/', $name); //movemos el archivo a la carpeta public, ademas creamos la carpeta images y le asignamos el name

        }


        $trainer = new Trainer();
        $trainer->name = $request->input('name');
        $trainer->avatar = $name;
        $trainer->description = $request->input('description');
        $trainer->slug = Str_slug($request->input('name'));
        $trainer->save();
        return redirect()->route('trainers.index')->with('status', 'El entrenador se creó correctamente');
        /**
         * Con esto devolvemos todos los datos que estamos ingresando
         * return $request->all();
         */
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\Trainer (implicit binding)
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\Trainer (implicit binding)
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $trainer->fill($request->except('avatar'));
        $trainer->slug = Str_slug($request->input('name'));
        if ($request->hasFile('avatar')) {
            $imagen = $request->file('avatar');
            $name = time() . $imagen->getClientOriginalName();
            $trainer->avatar = $name;
            $imagen->move(public_path() . '/images/', $name); //movemos el archivo a la carpeta public, ademas creamos la carpeta images y le asignamos el name

        }
        $trainer->save();
        return redirect()->route('trainers.show', [$trainer])->with('status', 'Se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $file_path = public_path() . '/images/' . $trainer->avatar;
        \File::delete($file_path);

        $trainer->delete();
        return redirect()->route('trainers.index')->with('status', 'El entrenador se eliminó correctamente');
    }
}
