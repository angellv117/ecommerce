<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Presentation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentations = Presentation::orderBy('id', 'desc')->paginate();

        return view('admin.presentations.index', compact('presentations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.presentations.create');
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
        
        if(Presentation::where('name', $request->name)->first()){
            session()->flash('swal', [
                'title' => '¡Atención!',
                'text' => 'La presentación ya existe',
                'icon' => 'warning',
            ]);

            return redirect()->route('admin.presentations.create');
        }

        session()->flash('swal', [
            'title' => 'Presentación creada correctamente',
            'icon' => 'success',
            'text' => 'La presentación ha sido creada correctamente',
        ]);

        Presentation::create($request->all());
        return redirect()->route('admin.presentations.index')->with('success', 'Presentación creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Presentation $presentation)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presentation $presentation)
    {
        return view('admin.presentations.edit', compact('presentation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presentation $presentation)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        $html = '';
        // Crear una lista de errores con estilo moderno
        $html = '<ul class="modern-error-list">';
        foreach ($validator->errors()->all() as $error) {
            $html .= '<li> <i class="fas fa-exclamation-triangle text-red-500"></i> ' . $error . '</li>';
        }
        $html .= '</ul>';

        if ($validator->fails()) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'html' => $html,
            ]);
            return redirect()->back();
        }

        session()->flash('swal', [
            'title' => 'Presentación actualizada correctamente',
            'icon' => 'success',
            'text' => 'La presentación ha sido actualizada correctamente',
        ]);

        $presentation->update($request->all());
        return redirect()->route('admin.presentations.index')->with('success', 'Presentación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presentation $presentation)
    {

        if($presentation->products->count() > 0){
            session()->flash('swal', [
                'title' => '¡Atención!',
                'text' => 'La presentación tiene productos asociados, no se puede eliminar',
                'icon' => 'warning',
            ]);
            return redirect()->route('admin.presentations.edit', $presentation);
        }
        
        $presentation->delete();

        session()->flash('swal', [
            'title' => 'Presentación eliminada correctamente',
            'icon' => 'success',
            'text' => 'La presentación ha sido eliminada correctamente',
        ]);
        return redirect()->route('admin.presentations.index')->with('success', 'Presentación eliminada correctamente');
    }
}
