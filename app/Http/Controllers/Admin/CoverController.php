<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cover;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $covers = Cover::orderBy('id', 'desc')->paginate();
        return view('admin.covers.index', compact('covers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.covers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'is_active' => 'required|boolean',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
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
        $data = $request->all();
        $data['image_path'] = Storage::put('covers', $data['image_path']);
        $cover = Cover::create($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Éxito!',
            'text' => 'La portada se ha creado correctamente',
        ]);

        return redirect()->route('admin.covers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cover $cover)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cover $cover)
    {
        //
        return view('admin.covers.edit', compact('cover'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cover $cover)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'is_active' => 'required|boolean',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
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
        $data = $request->all();
        if ($request->hasFile('image_path')) {
            $relativePath = str_replace('/storage/', '', parse_url($cover->image_path, PHP_URL_PATH));
            Storage::delete($relativePath);
            $data['image_path'] = Storage::put('covers', $data['image_path']);
        }
        $cover->update($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Éxito!',
            'text' => 'La portada se ha actualizado correctamente',
        ]);

        return redirect()->route('admin.covers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cover $cover)
    {
        //
        $relativePath = str_replace('/storage/', '', parse_url($cover->image_path, PHP_URL_PATH));
        Storage::delete($relativePath);
        $cover->delete();
        return redirect()->route('admin.covers.index');
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Éxito!',
            'text' => 'La portada se ha eliminado correctamente',
        ]);
    }
}
