<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->with('family')->paginate();
        
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $families = Family::all();
        return view('admin.categories.create', compact('families'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'family_id' => 'required|exists:families,id',
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

        $exist = Category::where('name', $request->name)->where('family_id', $request->family_id)->first();

        if ($exist) {
            session()->flash('swal', [
                'title' => '¡Atención!',
                'text' => 'La categoría ya existe en la familia seleccionada', 
                'icon' => 'warning',
            ]);

            return redirect()->route('admin.categories.create');
        }

        Category::create($request->all());
        session()->flash('swal', [
            'title' => '¡Éxito!',
            'text' => 'Categoría creada correctamente',
            'icon' => 'success',
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Categoría creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $families = Family::all();

        return view('admin.categories.edit', compact('category', 'families'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'family_id' => 'required|exists:families,id',
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

        $category->update($request->all());
        session()->flash('swal', [
            'title' => '¡Exito!',
            'text' => 'Categoría editada correctamente',
            'icon' => 'success',
        ]);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->subcategories->count() > 0) {
            session()->flash('swal', [
                'title' => '¡Atención!',
                'text' => 'No se puede eliminar la categoría porque tiene subcategorías asociadas',
                'icon' => 'warning',
            ]);
            return redirect()->route('admin.categories.edit', $category);
        }
        $category->delete();
        session()->flash('swal', [
            'title' => '¡Exito!',
            'text' => 'Categoría eliminada correctamente',
            'icon' => 'success',
        ]);
        return redirect()->route('admin.categories.index');
    }
}
