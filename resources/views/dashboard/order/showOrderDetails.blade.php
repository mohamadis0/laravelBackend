
<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-center items-center">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Order Details') }}
    </h2>
</x-slot>
  @if ($message = Session::get('message'));
  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
       
    <span class="block sm:inline">  <ul>
        <li class="text-center">
            {{$message}} 
        </li>
        </ul></span>
    
  </div>

  @else 
  @isset($orderDetails)
  <div class="container">
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
          <div class="overflow-hidden">
              <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  
                  <tr>
                    <th scope="col" class="px-6 py-4">id</th>
                    <th scope="col" class="px-6 py-4">order_id</th>
                    <th scope="col" class="px-6 py-4">Username</th>
                    <th scope="col" class="px-6 py-4">Company name</th>
                    <th scope="col" class="px-6 py-4">Country</th>
                    <th scope="col" class="px-6 py-4">Address</th>
                    <th scope="col" class="px-6 py-4">Town</th>
                    <th scope="col" class="px-6 py-4">state</th>
                    <th scope="col" class="px-6 py-4">zip code</th>
                    <th scope="col" class="px-6 py-4">phone</th>
                    <th scope="col" class="px-6 py-4">notes</th>

                   
                  </tr>
                </thead>
                <tbody>
                  <tr
                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$orderDetails->id}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->order_id}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->order->client->user->name}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->company_name}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->country_region}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->adress}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->town_city}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->state}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->zip_code}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->phone}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->notes}}</td>
                    
                  </tr>
                </tbody>
              </table>
  
            
          </div>
        </div>
      </div>
    </div>
  </div>
  @endisset
      
  
  @endif

  
</x-app-layout>
