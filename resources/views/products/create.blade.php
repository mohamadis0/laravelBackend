<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
            {{ __('Products') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">

            <span class="block sm:inline">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>
                            {{ $item }}
                        </li>
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

    <div class="flex flex-col  items-center justify-center mt-10">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 ">
                <label for="name">Name:</label>
                <input placeholder="Name" type="text" name="name" class="w-full rounded-lg">
            </div>
            <div class="mb-3">
                <label for="description">Description:</label>
                <textarea name="description" id="" class="w-full rounded-lg"></textarea>
            </div>
            <div class="mb-3">
                <label for="price">Price:</label>
                <input placeholder="Price" type="number" name="price" class="w-full rounded-lg">
            </div>
            <div class="mb-3">
                <label for="image">Image:</label>
                <input placeholder="Image" type="file" name="image" class="w-full rounded-lg">
            </div>
            <div class="mb-3">
                <label for="quantity">Quantity:</label>
                <input placeholder="Quantity" type="number" name="quantity" class="w-full rounded-lg">
            </div>
            <div class="mb-3">
                <label for="feature">Feature:</label>
                <select placeholder="Feature" type="text" name="feature" class="w-full rounded-lg">
                    <option value="product">Product</option>
                    <option value="ingredient">Ingredient</option>
                </select>
            </div>
            <div id="categorySection" class="mb-3">
                <label for="category">categoryName:</label>
                <select name="category_id" class="w-full rounded-lg" id="">
                    @foreach ($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                    @endforeach
                </select>
            </div>
            <div  id="tagsSection" class="mb-3">
                <label class="form-label">Tags:</label>
              
                <select name="tags[]" multiple class="w-full rounded-lg">
                    @foreach ($tags as $tagId =>  $tagName )
                        <option value="{{ $tagId }}">{{ $tagName }}</option>
                    @endforeach
                </select>
                {{-- add Tag from product page --}}
                <a class=" bg-transparent  border-0  " style="padding: 5px" href="{{ route('tags.create') }}">
                    <button type="button"
                class=" bg-[#af0433] text-sm rounded-lg hover:bg-transparent w-full   mb-10 p-2">add
                tag</button>

                </a>
            </div>
            <div id="addonsSection" class="mb-3">
                <label class="form-label">Add Ons:</label>
                <select name="add[]" multiple class="w-full rounded-lg">
                    @foreach ($addons as $addId => $addName)
                        <option value="{{ $addId }}">{{ $addName }}</option>
                    @endforeach
                </select>
                {{-- add addon from product page --}}
                
            </div>
            
            
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
                                        <input type="checkbox" name="ingredient[{{ $ingredientId }}]" value="{{ $ingredientId }}">
                                        {{ $ingredientName }}
                                    </label>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="ingredient_removable[{{ $ingredientId }}]" value="1">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="bg-transparent border-0" style="padding: 5px" href="{{ route('products.create') }}">
                    <button type="button" class=" bg-[#af0433] text-sm rounded-lg hover:bg-transparent w-full   mt-2 p-1"> add ingredient</button>
                  </a>
            </div>
            
            
            
            
            
            <button type="submit"
                class=" bg-[#af0433] text-lg rounded-lg hover:bg-transparent w-full   mb-10 p-2">create
                product</button>
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
    
    
    
</x-app-layout>
