<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('New Order') }}
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
            
        </div>

    @endif
    <div class="flex flex-col  items-center justify-center mt-10">
        <form action="{{ route('order.store') }}" method="post" >
            @csrf
            <div class="mb-4">
                <label class="form-label">Products:</label><br />
                <select name="product" class="w-full rounded-lg" id="">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mab-4">
                <label for="" class="form-labe">Quantity</label><br>
                <input type="number" name="quantity" id="">
            </div>
            <div class="mb-4">
                <label class="form-label">Add Ons:</label><br>
                @foreach ($addons as $addon)
                <label class="checkbox-inline">
                    <input type="checkbox" name="add[]" value="{{ $addon->id }}"> {{ $addon->name }}
                </label>
                @endforeach
            </div>
            
            <button type="submit"
            class=" bg-blue-300 text-lg rounded-lg hover:bg-transparent w-full h-10 mb-4 mt-8">create order</button>
    </form>
</div>
</x-app-layout>