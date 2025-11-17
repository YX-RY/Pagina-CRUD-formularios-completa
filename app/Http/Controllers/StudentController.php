<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Mostrar lista de estudiantes
     */
    public function index()
    {
        // Trae todos los estudiantes ordenados del más reciente al más antiguo
        $students = Student::orderBy('id', 'desc')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Guardar nuevo estudiante
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_code'     => 'required|unique:students,student_code|max:255',
            'first_name'       => 'required|max:255',
            'last_name'        => 'required|max:255',
            'email'            => 'required|email|unique:students,email',
            'phone'            => 'nullable|max:20',
            'address'          => 'nullable|max:500',
            'career'           => 'required|max:255',
            'enrollment_year'  => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'photo'            => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Subir foto si existe
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('students', 'public');
            $validated['photo'] = $path;
        }

        Student::create($validated);

        return redirect()->route('students.index')
                         ->with('success', 'Estudiante creado correctamente.');
    }

    /**
     * Mostrar detalles de un estudiante
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Actualizar estudiante existente
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_code'     => 'required|max:255|unique:students,student_code,' . $student->id,
            'first_name'       => 'required|max:255',
            'last_name'        => 'required|max:255',
            'email'            => 'required|email|unique:students,email,' . $student->id,
            'phone'            => 'nullable|max:20',
            'address'          => 'nullable|max:500',
            'career'           => 'required|max:255',
            'enrollment_year'  => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'photo'            => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Si se sube una nueva foto, eliminar la anterior
        if ($request->hasFile('photo')) {
            if ($student->photo && Storage::disk('public')->exists($student->photo)) {
                Storage::disk('public')->delete($student->photo);
            }
            $path = $request->file('photo')->store('students', 'public');
            $validated['photo'] = $path;
        }

        $student->update($validated);

        return redirect()->route('students.index')
                         ->with('success', 'Estudiante actualizado correctamente.');
    }

    /**
     * Eliminar estudiante
     */
    public function destroy(Student $student)
    {
        // Eliminar la foto asociada
        if ($student->photo && Storage::disk('public')->exists($student->photo)) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Estudiante eliminado correctamente.');
    }
}
