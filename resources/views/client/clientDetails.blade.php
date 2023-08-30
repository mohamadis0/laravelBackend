<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Clients details') }}
    </h2>
</x-slot>
  
    <div class="flex flex-col">
     
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 ">
          <div class="inline-block w-full py-2 sm:px-6 lg:px-8">
        
          
        
            <div class="overflow-hidden">
              @if ($details && $adress)
              <table class="bg-white w-full text-left text-sm font-light">
                <thead
                  class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                  <tr>
                    <th scope="col" class="px-6 py-4">id</th>
                    <th scope="col" class="px-6 py-4">username</th>
                    <th scope="col" class="px-6 py-4">email</th>
                    <th scope="col" class="px-6 py-4">contact</th>
                    <th scope="col" class="px-6 py-4">addresses</th>
                    <th scope="col" class="px-6 py-4">first name</th>
                    <th scope="col" class="px-6 py-4">last name</th>
                    <th scope="col" class="px-6 py-4">company</th>
                    <th scope="col" class="px-6 py-4">country</th>
                    <th scope="col" class="px-6 py-4">town</th>
                    <th scope="col" class="px-6 py-4">state</th>
                    <th scope="col" class="px-6 py-4">zip</th>
                    
                  </tr>
                </thead>
                <tbody>
                  
                      
                 
                  <tr
                    class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$client->id}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$client->user->name}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$client->user->email}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$client->contact}}</td>
                    
                    <td class="whitespace-nowrap px-6 py-4">
                      @foreach ($adress as $address)
                      {{$address->name}},

  
                      @endforeach
                    </td>
                    <td class="whitespace-nowrap px-6 py-4">{{$details->fname}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$details->lname}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$details->company_name}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$details->country}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$details->city}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$details->state}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$details->zip}}</td>
                   
                    
                  </tr> 
                 
                  
                </tbody>
              </table>
            @else
      <p>Details or address not found</p>
  @endif
            </div>
          </div>
        </div>
      </div>


 </x-app-layout>