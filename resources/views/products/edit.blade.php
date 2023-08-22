<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
            {{ __('Products') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex flex-col  items-center justify-center mt-10">
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input placeholder="Name" type="text" name="name" class="w-full rounded-lg"
                    value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <textarea name="description" id="" class="w-full rounded-lg">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <input placeholder="Price" type="number" name="price" value="{{ $product->price }}"
                    class="w-full rounded-lg">
            </div>

            <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" width="200px">
            <div class="mb-3">
                <input placeholder="Image" type="file" name="image" class="w-full rounded-lg">
            </div>

            <div class="mb-3">
                <input placeholder="Quantity" type="number" name="quantity"class="w-full rounded-lg"
                    value="{{ $product->quantity }}">
            </div>
            <div class="mb-3">
                <select placeholder="Feature" type="text" name="feature" class="w-full rounded-lg">
                    <option value="add-on" {{ $product->feature == 'add-on' ? 'selected' : '' }}> Add ON</option>
                    <option value="product" {{ $product->feature == 'product' ? 'selected' : '' }}>Product</option>
                    <option value="remove" {{ $product->feature == 'remove' ? 'selected' : '' }}>Remove</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="w-full rounded-lg">
                    @foreach ($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}"
                            {{ $categoryId == $product->category_id ? 'selected' : '' }}>
                            {{ $categoryName }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tags:</label>
                @foreach ($tags as $tagId => $tagName)
                    <label class="checkbox-inline">
                        <input type="checkbox" name="tags[]" value="{{ $tagId }}"
                            {{ in_array($tagId, $product->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                        {{ $tagName }}
                    </label>
                @endforeach
                {{-- add Tag from product page --}}
                <a class=" bg-transparent  border-0  " style="padding: 5px" href="{{ route('tags.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#af0433"
                        class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>

                </a>
            </div>
            <div class="mb-3">
                <label class="form-label">Add Ons:</label>
                @foreach ($addons as $addId => $addName)
                    <label class="checkbox-inline">
                        <input type="checkbox" name="add[]" value="{{ $addId }}"
                            {{ in_array($addId, $product->relatedProducts->pluck('id')->toArray()) ? 'checked' : '' }}>

                        {{ $addName }}
                    </label>
                @endforeach
                {{-- add addon from product page --}}
                <a class=" bg-transparent  border-0  " style="padding: 5px" href="{{ route('products.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#af0433"
                        class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>

                </a>
            </div>
            <div class="mb-3">
                <label class="form-label">Remove:</label>
                @foreach ($remove as $removeId => $removeName)
                    <label class="checkbox-inline">
                        <input type="checkbox" name="remove[]" value="{{ $removeId }}"
                            {{ in_array($removeId, $product->relatedProducts->pluck('id')->toArray()) ? 'checked' : '' }}>
                        {{ $removeName }}
                    </label>
                @endforeach
                {{-- add remove from product page --}}
                <a class=" bg-transparent  border-0  " style="padding: 5px" href="{{ route('products.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#af0433"
                        class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>

                </a>
            </div>
            <button type="submit"
                class=" bg-[#af0433] text-lg rounded-lg hover:bg-transparent w-full h-10 mb-4">Update</button>
        </form>
    </div>
</x-app-layout>
