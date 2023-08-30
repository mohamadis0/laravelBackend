<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit client') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    
                    @php
                    $clientDetails = $client->clientDetails ?? (object)[
                        'fname' => '',
                        'lname' => '',
                        'company_name' => '',
                        'country' => '',
                        'city' => '',
                        'state' => '',
                        'zip' => '',
                    ];
    
                    // $address = $client->address ?? (object)[
                    //     'name' => '',];
                   @endphp
    
                    

                   <form action="{{route("client.update", $client->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                   

                    <div>
                        
                        <x-input-label for="client" :value="__('Email')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="email" name="email" value="{{$client->user->email}}" required autofocus autocomplete="username" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
            
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            
                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                   
                    <div>
                        <x-input-label for="client" :value="__('Username')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="name" value="{{$client->user->name}}" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Contact Number')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="contact" value="{{$client->contact}}" required autofocus autocomplete="username" />
                    </div>
                    
                    <div>
                        <x-input-label for="client" :value="__('Address')" />
                        @if(count($client->adress)!=0)
                        @foreach ($client->adress as $address)
                        
                   <x-text-input id="client" class="block mt-1 w-full" type="text" name="addname" value="{{$address->name}}"  />
                        @endforeach
                   @endif
                   <x-text-input id="client" class="block mt-1 w-full" type="text" name="addname" value="" />

                    </div>
                    <div>
                        <x-input-label for="client" :value="__('First Name')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="fname" value="{{$clientDetails->fname}}" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Last Name')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="lname" value="{{$clientDetails->lname}}" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Company Name')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="company_name" value="{{$clientDetails->company_name}}" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Country/Region')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="country" value="{{$clientDetails->country}}" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('Town/City')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="city" value="{{$clientDetails->city}}" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('State')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="state" value="{{$clientDetails->state}}" required autofocus autocomplete="username" />
                    </div>
                    <div>
                        <x-input-label for="client" :value="__('ZIP code')" />
                        <x-text-input id="client" class="block mt-1 w-full" type="text" name="zip" value="{{$clientDetails->zip}}" required autofocus autocomplete="username" />
                    </div>
                    <button type="submit" class="bg-green-500 w-full ">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>