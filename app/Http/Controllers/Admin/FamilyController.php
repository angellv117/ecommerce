<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::orderBy('id', 'desc')->paginate();
        return view('admin.families.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.families.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);
        
        $html = '';
        
        // Verificar si falló y recopilar todos los errores en HTML
        if ($validator->fails()) {
            $errors = $validator->errors();
            
            // Crear una lista de errores con estilo moderno
            $html = '<ul class="modern-error-list">';
            foreach ($errors->all() as $error) {
                $html .= '<li> <i class="fas fa-exclamation-triangle text-red-500"></i> ' . $error . '</li>';
            }
            $html .= '</ul>';
            
            session()->flash('swal', [
                'title' => '¡Atención!',
                'text' => 'Por favor, corrige los errores en el formulario.',
                'icon' => 'warning',
                'html' => $html,
            ]);
        
            return redirect()->back();
        }

        $exist = Family::where('name', $request->name)->first();

        if ($exist) {
            session()->flash('swal', [
                'title' => '¡Atención!',
                'text' => 'La familia ya existe',
                'icon' => 'warning',
            ]);

            return redirect()->back();
        }

        Family::create($request->all());

        session()->flash('swal', [
            'title' => '¡Éxito!',
            'text' => 'Familia creada correctamente',
            'icon' => 'success',
        ]);

        return redirect()->route('admin.families.index')->with('success', 'Familia creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        return view('admin.families.edit', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $family->update($request->all());

        session()->flash('swal', [
            'title' => '¡Éxito!',
            'text' => 'Familia actualizada correctamente',
            'icon' => 'success',
        ]);

        return redirect()->route('admin.families.edit', $family);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {

        if ($family->categories->count() > 0) {
            session()->flash('swal', [
                'title' => '¡Atención!',
                'text' => 'La familia tiene categorías asociadas, no se puede eliminar',
                'icon' => 'warning',
            ]);

            return redirect()->route('admin.families.edit', $family);
        }

        $family->delete();

        session()->flash('swal', [
            'title' => '¡Éxito!',
            'text' => 'Familia eliminada correctamente',
            'icon' => 'success',
        ]);

        return redirect()->route('admin.families.index')->with('success', 'Familia eliminada correctamente');
    }
}
