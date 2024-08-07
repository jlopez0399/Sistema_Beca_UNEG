<?php

namespace App\Rest\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
use App\Rest\Controller as RestController;
use App\Rest\Resources\InstitutionResource;

class InstitutionsController extends RestController
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<\Lomkit\Rest\Http\Resource>
     */
    public static $resource = InstitutionResource::class;

    public function index()
    {
        $institutions = Institution::all();
        return view("Institutions.index", compact('institutions'));

    }

    public function create()
    {
        return view('Institutions.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'Name' => 'required|string|min:5|max:255',
            'Phone' => 'required|string|min:5|max:255',
            'Email' => 'required|string|min:5|max:255'


        ]);

        // Crear una nueva institución usando el método `create` del modelo
        Institution::create($request->all());

        // Redireccionar a la vista de listado de instituciones
        return redirect()->route('Institutions.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $institutions = Institution::findOrFail($id);
        return view('Institutions.edit', compact('institutions'));
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'Name' => 'required|string|min:5|max:255',
            'Phone' => 'required|string|min:5|max:255',
            'Email' => 'required|string|min:5|max:255'

        ]);

        // Buscar la institución por su ID
        $institution = Institution::findOrFail($id);

        // Actualizar los datos de la institucion
        $institution->update($request->all());

        // Redireccionar a la vista de listado de instituciones
        return redirect()->route('Institutions.index');
    }

    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);

        $institution->delete();

        return redirect()->route('Institutions.index');
    }
}
