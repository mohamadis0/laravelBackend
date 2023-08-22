<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Add coupon') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <form action="{{route("coupon.store")}}" method="POST">
                @csrf

                <div>
                    <x-input-label for="coupon" :value="__('Code')" />
                    <x-text-input id="coupon" class="block mt-1 w-full" type="number" name="code" :value="old('name')" required autofocus autocomplete="username" />
                </div>
                <div>
                    <x-input-label for="coupon" :value="__('Expire date')" />
                    <x-text-input id="coupon" class="block mt-1 w-full" type="date" name="expire_date" :value="old('name')" required autofocus autocomplete="username" />
                </div>
                <div>
                    <x-input-label for="coupon" :value="__('Discount')" />
                    <x-text-input id="coupon" class="block mt-1 w-full" type="number" name="discount" :value="old('name')" required autofocus autocomplete="username" />
                </div>
                <div>
                    <x-input-label for="coupon" :value="__('Activation date')" />
                    <x-text-input id="coupon" class="block mt-1 w-full" type="date" name="activation_date" :value="old('name')" required autofocus autocomplete="username" />
                </div>
                <button type="submit" class="bg-green-500 w-full ">Submit</button>
               </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>