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
        $becas = Beca::all();
        return view('Becas.index', compact('becas'));

    }

    public function create()
    {
        return view('Becas.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'Institution_id' => 'required|integer|min:1',
            'Type' => 'required|string|min:5|max:255'
        ]);

         // Crear una nueva beca usando el método `create` del modelo
        Beca::create($request->all());

        // Redireccionar a la vista de listado de becas
        return redirect()->route('Becas.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $becas = Beca::findOrFail($id);
        return view('Becas.edit', compact('becas'));
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'Institution_id' => 'required|integer|min:1',
            'Type' => 'required|string|min:5|max:255'
        ]);

        // Buscar la beca por su ID
        $beca = Beca::findOrFail($id);

        // Actualizar los datos de la beca
        $beca->update($request->all());

        // Redireccionar a la vista de listado de becas
        return redirect()->route('Becas.index');
    }

    public function destroy($id)
    {
        $beca = Beca::findOrFail($id);

        $beca->delete();

        return redirect()->route('Becas.index');
    }
}
