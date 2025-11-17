<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Mostrar listado de empleados.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Guardar nuevo empleado.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_code' => 'required|unique:employees,employee_code',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:employees,email',
            'phone'         => 'nullable',
            'address'       => 'nullable',
            'photo'         => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        }

        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Empleado creado correctamente.');
    }

    /**
     * Mostrar un empleado específico.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Actualizar empleado.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'employee_code' => 'required|unique:employees,employee_code,' . $employee->id,
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:employees,email,' . $employee->id,
            'phone'         => 'nullable',
            'address'       => 'nullable',
            'photo'         => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($employee->photo) {
                Storage::disk('public')->delete($employee->photo);
            }
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        }

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Eliminar empleado.
     */
    public function destroy(Employee $employee)
    {
        if ($employee->photo) {
            Storage::disk('public')->delete($employee->photo);
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Empleado eliminado correctamente.');
    }
}

