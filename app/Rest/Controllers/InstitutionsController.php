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
        $instition = Institution::all();
        return view('institutions.index', compact('intitutions'));

    }

    public function create()
    {
        return view('institutions.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'Name' => 'required|string|min:5|max:255'
        ]);

         // Crear una nueva institución usando el método `create` del modelo
        Institution::create($request->all());

        // Redireccionar a la vista de listado de instituciones
        return redirect()->route('institutions.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $institution = Institution::findOrFail($id);
        return view('institutions.edit', compact('institutions'));
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'Name' => 'required|string|min:5|max:255'
        ]);

        // Buscar la institución por su ID
        $institution = Institution::findOrFail($id);

        // Actualizar los datos de la institucion
        $institution->update($request->all());

        // Redireccionar a la vista de listado de instituciones
        return redirect()->route('institutions.index');
    }

    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);

        $institution->delete();

        return redirect()->route('institutions.index');
    }
}
