<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif

    <div class="flex flex-col items-center justify-center mt-10">
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">Name:</label>
                <input type="text" name="name" class="w-full rounded-lg" value="{{ $product->name }}">
            </div>
            
            <div class="mb-3">
                <label for="description">Description:</label>
                <textarea name="description" class="w-full rounded-lg">{{ $product->description }}</textarea>
            </div>
            
            <div class="mb-3">
                <label for="price">Price:</label>
                <input type="number" name="price" class="w-full rounded-lg" value="{{ $product->price }}">
            </div>
            
            <div class="mb-3">
                <label for="image">Image:</label>
                <input type="file" name="image" class="w-full rounded-lg">
            </div>
            <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" width="200px" class="mb-4">
            <div class="mb-3">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" class="w-full rounded-lg" value="{{ $product->quantity }}">
            </div>
            
            <div id="featureDropdown" class="mb-3">
                <label for="feature">Feature:</label>
                <select name="feature" class="w-full rounded-lg">
                    <option value="product" {{ $product->feature === 'product' ? 'selected' : '' }}>Product</option>
                    <option value="ingredient" {{ $product->feature === 'ingredient' ? 'selected' : '' }}>Ingredient</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="category_id">Category:</label>
                <select name="category_id" class="w-full rounded-lg">
                    @foreach ($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}" {{ $categoryId == $product->category_id ? 'selected' : '' }}>
                            {{ $categoryName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div id="tagsSection" class="mb-3">
                <label class="form-label">Tags:</label>
                <select name="tags[]" multiple class="w-full rounded-lg">
                    @foreach ($tags as $tagId => $tagName)
                        <option value="{{ $tagId }}" {{ in_array($tagId, $product->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $tagName }}
                        </option>
                    @endforeach

                </select>
                
            </div>
            <a class="bg-transparent border-0" style="padding: 5px" href="{{ route('tags.create') }}">
                <button type="button"  class=" bg-[#af0433] text-sm rounded-lg hover:bg-transparent w-full   mt-2 p-1"> Add Tags</button>
              </a>
            <div id="addonsSection" class="mb-3">
                <label class="form-label">Add Ons:</label>
                <select name="add[]" multiple class="w-full rounded-lg">
                    @foreach ($addons as $addId => $addName)
                        <option value="{{ $addId }}" {{ in_array($addId, $product->addons->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $addName }}
                        </option>
                    @endforeach
                </select>
               
            </div>
          
             @if (count($product->ingredients)!=0)
             <div id="ingredientsSection" class="mb-3">
                <label class="form-label">Ingredients:</label>
                <table class="container table w-full overflow-auto border bg-white h-20">
                    <thead>
                        <tr>
                            <th>Ingredient</th>
                            <th>Removable</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingredients as $ingredientId => $ingredientName)
                            <tr>
                                <td class="text-center">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="ingredient[{{ $ingredientId }}]"
                                            value="{{ $ingredientId }}"
                                            {{ in_array($ingredientId,$product->ingredients->pluck('id')->toArray()) ? 'checked' : '' }}>
                                        {{ $ingredientName }}
                                    </label>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="ingredient_removable[{{ $ingredientId }}]" value="1"
                                    {{$product->ingredients[$loop->index]->pivot->removable ? 'checked' : '' }} 
                                    >

                                </td>
                            </tr>
                                                      
                        
                        @endforeach
                        
                    </tbody>
                </table>
                <a class="bg-transparent border-0" style="padding: 5px" href="{{ route('products.create') }}">
                    <button type="button"  class=" bg-[#af0433] text-sm rounded-lg hover:bg-transparent w-full   mt-2 p-1"> add ingredient</button>
                  </a>
            </div>
             @endif
            
            
            <button type="submit" class="bg-[#af0433] text-lg rounded-lg hover:bg-transparent w-full mb-10 p-2">
                Update Product
            </button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const featureDropdown = document.querySelector('select[name="feature"]');
            const addonsSection = document.getElementById('addonsSection');
            const tagsSection = document.getElementById('tagsSection');
            const ingredientsSection = document.getElementById('ingredientsSection');

            function showSections(selectedFeature) {
                addonsSection.style.display = selectedFeature === 'product' ? 'block' : 'none';
                tagsSection.style.display = selectedFeature === 'product' ? 'block' : 'none';
                ingredientsSection.style.display = selectedFeature === 'product' ? 'block' : 'none';
            }

            featureDropdown.addEventListener('change', function () {
                const selectedFeature = this.value;
                showSections(selectedFeature);
            });

            // Call showSections initially to set the correct display
            showSections(featureDropdown.value);
        });
    </script>
 {{-- {{$product->ingredients[0]->pivot->removable}} --}}
</x-app-layout>
