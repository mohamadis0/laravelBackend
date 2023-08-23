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
                    <option value="add-on"> Add ON</option>
                    <option value="product">Product</option>
                    <option value="remove">Remove</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="category">categoryName:</label>
                <select name="category_id" class="w-full rounded-lg" id="">
                    @foreach ($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tags:</label>
                @foreach ($tags as $tagId => $tagName)
                    <label class="checkbox-inline">
                        <input type="checkbox" name="tags[]" value="{{ $tagId }}"> {{ $tagName }}
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
                        <input type="checkbox" name="add[]" value="{{ $addId }}"> {{ $addName }}
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
                        <input type="checkbox" name="remove[]" value="{{ $removeId }}"> {{ $removeName }}
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
                class=" bg-[#af0433] text-lg rounded-lg hover:bg-transparent w-full   mb-10 p-2">create product</button>
        </form>
    </div>
</x-app-layout>
