<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $brands;
    public $categories;

    public $name = '';
    public $filter_brands = [];
    public $filter_categories = [];

    public function mount()
    {
        $this->brands = Brand::orderBy('name', 'asc')->get();
        $this->categories = Category::orderBy('name', 'asc')->get();
    }

    public function updating($name, $value)
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        $products = Product::with(['brand', 'category'])
        ->where(function ($q) {
            if ($this->name && $this->name != '') {
                $q->where('name', 'like', '%' . $this->name . '%');
                $q->orWhere('slug', 'like', '%' . $this->name . '%');
            }
        })
        ->where(function ($q) {
            if (count($this->filter_brands) > 0) {
                $q->whereIn('brand_id', $this->filter_brands);
            }
            if (count($this->filter_categories) > 0) {
                $q->whereIn('category_id', $this->filter_categories);
            }
        })
        ->orderBy('name', 'asc')
        ->paginate(10);

        return view('livewire.products', compact('products'));
    }
}