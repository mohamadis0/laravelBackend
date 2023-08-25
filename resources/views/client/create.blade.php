<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add client') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                   <form action="{{route("client.store")}}" method="POST">
                    @csrf
                    @method('POST')
                    <div>
                        
                        <x-input-label for="client" :value="__('Email')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="email" name="email" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Password')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="password" name="password" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Username')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Contact Number')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="contact" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Address')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="addname" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('First Name')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="fname" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Last Name')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="lname" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Company Name')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="company_name" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Country/Region')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="country" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Town/City')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="city" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('State')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="state" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('ZIP code')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="zip" :value="old('name')" required autofocus autocomplete="username" />
                    </div>
                    <button type="submit" class="bg-green-500 w-full ">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>