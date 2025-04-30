<?php

namespace App\Livewire\Admin\Products;

use App\Models\Presentation;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Family;
use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $families = [];
    public $family_id = "";
    public $category_id = "";
    public $presentations = [];
    public $is_active = 1;
    public $images_path = [];

    
        public $product = [
        'name' => '',
        'sku' => '',
        'description' => '',
        'image_path' => 'products/logo.png',
        'price' => '',
        'presentation_id' => '',
        'subcategory_id' => '',
        'is_active' => true,
        'max_temperature' => null,
        'min_temperature' => null,
        'time_to_melt' => null,
        'temperature_to_melt' => null,
    ];


    public function mount()
    {
        $this->presentations = Presentation::all();
        $this->families = Family::all();
    }

    public function removeImage($id)
    {
        unset($this->images_path[$id]);
    }

    public function updatedFamilyId($value)
    {
        $this->category_id = '';
        $this->product['subcategory_id'] = '';
    }


    public function updatedCategoryId($value)
    {
        $this->product['subcategory_id'] = '';
    }

    #[Computed()]
    public function categories()
    {
        return Category::where('family_id', $this->family_id)->get();

    }

    #[Computed()]
    public function subcategories()
    {
        return Subcategory::where('category_id', $this->category_id)->get();
    }

    //validar los errores de validacion y los mostrar en un modal
    public function boot()
    {

        $this->withValidator(function ($validator) {
            $errors = $validator->errors();
            $html = '';
            // Crear una lista de errores con estilo moderno
            $html = '<ul class="modern-error-list">';
            foreach ($errors->all() as $error) {
                $html .= '<li> <i class="fas fa-exclamation-triangle text-red-500"></i> ' . $error . '</li>';
            }
            $html .= '</ul>';
            if ($validator->fails()) {
                $this->dispatch('swal', [
                    'icon' => 'error',
                    'title' => '¡Error!',
                    'html' => $html,
                ]);
            }
        });
    }
    public function createProduct()
    {
        //resetear los errores de validacion
        $this->resetValidation();
        try {
            //validar los datos
            $validated = $this->validate([
                'product.name' => 'required',
                'product.sku' => 'required|unique:products,sku',
                'product.description' => 'required',
                'product.price' => 'required|numeric|min:0',
                'product.presentation_id' => 'required|exists:presentations,id',
                'product.subcategory_id' => 'required|exists:subcategories,id',

            ]);


    
            $product = Product::create($this->product);

            if($this->images_path){
                foreach ($this->images_path as $image) {
                    $image->store('products', 'public');
                    //guardar la imagen en la base de datos con el id del producto
                    $product->images()->create([
                        'path' => "products/" . $image->hashName(),
                    ]);
                }
            }
            
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => '¡Éxito!',
                'text' => 'Producto creado correctamente.',
            ]);
            return redirect()->route('admin.products.edit', $product);

        } catch (ValidationException $e) {

            $this->dispatch('swal', [
                'icon' => 'error',
                'title' => '¡Error!',
                'text' => 'Hubo un problema al crear el producto.',
            ]);
        }

    }


    public function render()
    {
        return view('livewire.admin.products.product-create');
    }
}
