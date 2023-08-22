<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add category') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <form action="{{route("category.store")}}" method="POST">
                    @csrf
                    @method('POST')
                    <div>
                        <x-input-label for="category" :value="__('Name')" />
                        <x-text-input id="category" class="block mt-1 w-full" type="text" name="Name" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="category" :value="__('Icon')" />
                        <x-text-input id="category" class="block mt-1 w-full" type="text" name="Icon" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                   
                    <button type="submit" class="bg-green-500 w-full ">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>