<?php

use App\Livewire\Products;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Products::class)
        ->assertStatus(200);
});

it('can filter products by name, brands and categories', function () {
    $brand = Brand::factory()->create(['name' => 'Apple']);
    $category = Category::factory()->create(['name' => 'Smartphones']);

    Product::factory()->create(
        [
            'name' => 'iPhone 13',
            'slug' => 'iphone-13',
            'category_id' => $category->id,
            'brand_id' => $brand->id
        ],
    );

    Product::factory()->create(
        [
            'name' => 'iPhone 14',
            'slug' => 'iphone-14',
            'category_id' => $category->id,
            'brand_id' => $brand->id
        ],
    );

    Product::factory()->create(
        [
            'name' => 'iPhone 15',
            'slug' => 'iphone-15',
            'category_id' => $category->id,
            'brand_id' => $brand->id
        ],
    );

    Livewire::test('products')
        ->set('name', 'iPhone 13')
        ->set('filter_brands', [$brand->id])
        ->set('filter_categories', [$category->id])
        ->assertSee('iPhone 13')
        ->assertDontSee('iPhone 14')
        ->assertDontSee('iPhone 15');
});
