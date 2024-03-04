<?php

namespace App\Http\Controllers;

use App\Models\perro;
use Illuminate\Http\Request;
use App\Models\persona;

class adminController extends Controller
{
    //

    public function iniciofuncion()
    {
        $personas = persona::all();
        return view('inicio', ['personas' => $personas]);
    }

    public function perrosfuncion()
    {
        $perros = perro::all();
        $personas = persona::all();
        return view('perros', ['perros' => $perros, 'personas' => $personas]);
    }

    public function nuevaPersona(Request $request){
        $nuevaPersona = new persona();
        $nuevaPersona->nombre = $request->nombre;
        $nuevaPersona->direccion = $request->direccion;
        $nuevaPersona->save();

        return redirect()->back();  
    }

    public function nuevoPerro(Request $request){
        $nuevoPerro = new perro();

        $nuevoPerro->dueno = $request->dueno;
        $nuevoPerro->nombre = $request->nombre;
        $nuevoPerro->direccion = $request->direccion;
        $nuevoPerro->raza = $request->raza;
        $nuevoPerro->color = $request->color;
        $nuevoPerro->edad = $request->edad;

        $nuevoPerro->save();

        return redirect()->back();  
    }

    public function eliminarPersona($id){
        $persona = persona::find($id);
        $persona->delete();
        return redirect()->back();
    }

    public function editarPersona(Request $request, $id)
    {
        $idPersona = $request->id;
        $persona = persona::find($idPersona);

        $persona->nombre = $request->nombre;
        $persona->direccion = $request->direccion;
        $persona->save();
        return redirect()->back();
    }

    //Editar perro

    public function editarPerro(Request $request, $id)
    {
        $idPerro = $request->id;
        // Encuentra el perro por su ID
        $perro = perro::find($idPerro);

        // Actualiza los campos con los datos del formulario
        $perro->dueno = $request->dueno;
        $perro->nombre = $request->nombre;
        $perro->direccion = $request->direccion;
        $perro->raza = $request->raza;
        $perro->color = $request->color;
        $perro->edad = $request->edad;
        $perro->save();

        return redirect()->back()->with('success', 'Perro actualizado correctamente');
    }

    public function eliminarPerro($id){
        $perro = perro::find($id);
        $perro->delete();
        return redirect()->back();
    }


}