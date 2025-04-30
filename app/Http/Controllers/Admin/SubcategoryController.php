<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::orderBy('id', 'desc')->with('category')->paginate();
        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
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

        if (Subcategory::where('name', $request->name)->where('category_id', $request->category_id)->exists()) {
            session()->flash('swal', [
                'title' => '¡Atención!',
                'text' => 'La subcategoría ya existe con la categoría seleccionada',
                'icon' => 'warning',
            ]);
            return redirect()->route('admin.subcategories.create');
        }
        Subcategory::create($request->all());

        session()->flash('swal', [
            'title' => '¡Éxito!',
            'text' => 'Subcategoría creada correctamente',
            'icon' => 'success',
        ]);
        return redirect()->route('admin.subcategories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
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

        $subcategory->update($request->all());

        session()->flash('swal', [
            'title' => '¡Éxito!',
            'text' => 'Subcategoría actualizada correctamente',
            'icon' => 'success',
        ]);

        return redirect()->route('admin.subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        //

        if ($subcategory->products->count() > 0) {
            session()->flash('swal', [
                'title' => '¡Atención!',
                'text' => 'La subcategoría tiene productos asociados, no se puede eliminar',
                'icon' => 'warning',
            ]);

            return redirect()->route('admin.subcategories.edit', $subcategory);
        }

        $subcategory->delete();

        session()->flash('swal', [
            'title' => '¡Éxito!',
            'text' => 'Subcategoría eliminada correctamente',
            'icon' => 'success',
        ]);

        return redirect()->route('admin.subcategories.index');
    }
}
