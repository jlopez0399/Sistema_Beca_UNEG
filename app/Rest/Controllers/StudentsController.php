<?php

namespace App\Rest\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Rest\Controller as RestController;
use App\Rest\Resources\StudentResource;

class StudentsController extends RestController
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<\Lomkit\Rest\Http\Resource>
     */
    public static $resource = StudentResource::class;

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));


    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'First_name' => 'required|string|min:3|max:255',
            'Suname' => 'required|string|min:3|max:255',
            'Identification_card' => 'required|string|min:3|max:255',
            'Phone' => 'required|string|min:3|max:255',
            'Room_telephone' => 'required|string|min:3|max:255',
            'Email' => 'required|string|min:3|max:255',
            'Semeter' => 'required|integer|min:1',
        ]);

        // Crear un nuevo estudiante usando el método `create` del modelo
        Student::create($request->all());

        // Redireccionar a la vista de listado de estudiantes
        return redirect()->route('students.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'First_name' => 'required|string|min:3|max:255',
            'Suname' => 'required|string|min:3|max:255',
            'Identification_card' => 'required|string|min:3|max:255',
            'Phone' => 'required|string|min:3|max:255',
            'Room_telephone' => 'required|string|min:3|max:255',
            'Email' => 'required|string|min:3|max:255',
            'Semeter' => 'required|integer|min:1',
        ]);

        // Buscar el estudiante por su ID
        $student = Student::findOrFail($id);

        // Actualizar los datos del estudiante
        $student->update($request->all());

        // Redireccionar a la vista de listado de estudiantes
        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()->route('students.index');
    }
}
