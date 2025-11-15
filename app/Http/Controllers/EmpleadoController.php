<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');
    
        $empleados = Empleado::orderBy($sort, $direction)->paginate(5);
    
        return view('empleados.index', compact('empleados', 'sort', 'direction'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $empleados = Empleado::where(function($query) use ($search) {
            $query->where('id', 'like', "%$search%")
                ->orWhere('nombre', 'like', "%$search%")
                ->orWhere('apellido', 'like', "%$search%")
                ->orWhere('cargo', 'like', "%$search%")
                ->orWhere('departamento', 'like', "%$search%");
        })->paginate(5);

        $empleados->appends(['search' => $search]);

        return view('empleados.index', compact('empleados', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.crear');
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
            'nombre' => 'required',
            'apellido' => 'required',
            'cargo' => 'required',
            'departamento' => 'required',
        ]);
        if ($request->has('errors')) {
        return redirect()->back()->withErrors($request->all());
        }
        $input=$request->all();
        Empleado::create($input);
        session()->flash('success', 'Empleado añadido correctamente');
        return redirect('empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleados=Empleado::find($id);
        return view('empleados.ver')->with('empleados',$empleados);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados=Empleado::find($id);
        return view('empleados.editar')->with('empleados',$empleados);
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
            'nombre' => 'required',
            'apellido' => 'required',
            'cargo' => 'required',
            'departamento' => 'required',
        ]);
        if ($request->has('errors')) {
            return redirect()->back()->withErrors($request->all());
        }
        $empleados=Empleado::find($id);
        $input=$request->all();
        $empleados->update($input);
        return redirect('empleados')->with('flash_message','Empleado Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::destroy($id);
        return redirect('empleados')->with('flash_message','Empleado Eliminado');
    }
}