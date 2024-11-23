<div class="max-w-7xl mx-auto py-12 grid grid-cols-4 gap-4 px-4">
    <div class="">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="text-xl font-bold mb-5">Filtro</h3>
                <div class="mb-4">
                    <label class="border-b px-2 py-1 rounded text-md block">Nome</label>
                    <x-text-input class="w-full mt-2" wire:model.live="name" placeholder="Nome do produto..." />
                </div>

                <div class="mb-4">
                    <label class="border-b px-2 py-1 rounded text-md block">Marcas</label>
                    <div class="mt-2">
                        @foreach ($brands as $key => $brand)
                        <label class="block">
                            <input type="checkbox" wire:model.live="filter_brands" name="filter_brands[]" value="{{ $brand->id }}" id="filter_brands_{{ $brand->id }}" class="mr-2" />
                            {{ $brand->name }}
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-2">
                    <label class="border-b px-2 py-1 rounded text-md block">Categorias</label>
                    <div class="mt-2">
                    @foreach ($categories as $key => $category)
                    <label class="block">
                        <input type="checkbox" wire:model.live="filter_categories" name="filter_categories[]" value="{{ $category->id }}" id="filter_categories_{{ $category->id }}" class="mr-2" />
                        {{ $category->name }}
                    </label>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-3">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="text-xl font-bold mb-5">Listagem</h3>
                <table class="table border max-w-7x1 mx-auto">
                    <thead>
                        <tr>
                            <th class="text-left border p-2">Nome</th>
                            <th class="border p-2">Preço</th>
                            <th class="text-left border p-2">Marca</th>
                            <th class="btext-left order p-2">Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="border p-2">{{ $product->name }}</td>
                                <td class="border p-2">{{ $product->price }}</td>
                                <td class="border p-2">{{ $product->brand->name }}</td>
                                <td class="border p-2">{{ $product->category->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $products->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
</div>
