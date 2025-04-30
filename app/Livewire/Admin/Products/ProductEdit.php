<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use App\Models\Family;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Presentation;

class ProductEdit extends Component
{
    use WithFileUploads;

    public $families = [];
    public $family_id = "";
    public $category_id = "";
    public $presentations = [];
    public $images_path = [];
    public $images_uploaded = [];
    public $product;
    public $productEdit;


    public function mount(Product $product)
    {
        //convertir el producto a un array
        $this->product = $product;
        $this->productEdit = $product->toArray();
        //Traer las presentaciones
        $this->presentations = Presentation::all();
        //Traer las familias
        $this->families = Family::all();
        //Traer la familia de la subcategoria
        $this->family_id = $product->subcategory->category->family_id;
        //Traer la categoria de la subcategoria
        $this->category_id = $product->subcategory->category->id;

        //vncular is_active a un booleano
        $this->productEdit['is_active'] = $this->isActive();

        //extraer las imagenes del producto
        $this->getImages();
    }

    public function updatedFamilyId($value)
    {
        $this->category_id = '';
        $this->product['subcategory_id'] = '';
    }

    public function getImages()
    {
        $this->images_path = $this->productEdit["images"];

    }


    //eliminar una imagen del producto
    public function removeImage($id, $deleteType, $path = null)
    {
        //eliminar la imagen de la base de datos
        if($deleteType == 'database'){
            ProductImage::where('id', $id)->delete();

            Storage::delete($path);
            return redirect()->route('admin.products.edit', $this->product);

        }else{
            //eliminar imagen del array
            unset($this->images_uploaded[$id]);
        }
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
    public function isActive()
    {
        if ($this->productEdit['is_active'] == 1) {
            return true;
        } else {
            return false;
        }
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

    public function deleteProduct()
    {
        $this->product->delete();
        foreach ($this->images_path as $image) {
            Storage::delete($image);
        }
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Éxito!',
            'text' => 'Producto eliminado correctamente.',
        ]);
        return redirect()->route('admin.products.index');
    }

    public function updateProduct()
    {
        //resetear los errores de validacion
        $this->resetValidation();
        try {
            //validar los datos
            $validated = $this->validate([
                'productEdit.name' => 'required',
                'productEdit.sku' => 'required',
                'productEdit.description' => 'required',
                'productEdit.price' => 'required|numeric|min:0',
                'productEdit.presentation_id' => 'required|exists:presentations,id',
                'productEdit.subcategory_id' => 'required|exists:subcategories,id',
            ]);

            $this->product->update($this->productEdit);

            if($this->images_uploaded){
                foreach ($this->images_uploaded as $image) {
                    $image->store('products', 'public');
                    //guardar la imagen en la base de datos con el id del producto
                    $this->product->images()->create([
                    'path' => "products/" . $image->hashName(),
                    ]);
                }
            }
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => '¡Éxito!',
                'text' => 'Producto actualizado correctamente.',
            ]);
            return redirect()->route('admin.products.edit', $this->product);

        } catch (ValidationException $e) {
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

    }
    public function render()
    {
        return view('livewire.admin.products.product-edit');

    }
}
