<?php

namespace App\Rest\Controllers;

use App\Models\Beca;
use Illuminate\Http\Request;
use App\Rest\Controller as RestController;
use App\Rest\Resources\BecaResource;

class BecasController extends RestController
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<\Lomkit\Rest\Http\Resource>
     */
    public static $resource = BecaResource::class;

    public function index()
    {
        $beca = Beca::all();
        return view('becas.index', compact('beca'));

    }

    public function create()
    {
        return view('becas.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'Type' => 'required|string|min:5|max:255'
        ]);

         // Crear un nuevo estudiante usando el método `create` del modelo
        Beca::create($request->all());

        // Redireccionar a la vista de listado de becas
        return redirect()->route('becas.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $beca = Beca::findOrFail($id);
        return view('becas.edit', compact('beca'));
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'Type' => 'required|string|min:5|max:255'
        ]);

        // Buscar la beca por su ID
        $beca = Beca::findOrFail($id);

        // Actualizar los datos de la beca
        $beca->update($request->all());

        // Redireccionar a la vista de listado de becas
        return redirect()->route('becas.index');
    }

    public function destroy($id)
    {
        $beca = Beca::findOrFail($id);

        $beca->delete();

        return redirect()->route('becas.index');
    }
}
