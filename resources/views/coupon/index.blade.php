<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Coupon') }}
        </h2>
    </x-slot>
    @if ($message=Session::get('success'))
    <div class=" bg-green-500 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">        
        <span class="block sm:inline">{{$message}}</span>
        
      </div>
    @endif

    <div class="flex flex-col">
     
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block w-full py-2 sm:px-6 lg:px-8">
           
            <div class="overflow-hidden">
                <a href="coupon/create" class=" w-12 bg-white text-lg rounded-lg hover:bg-transparent h-12 mb-4" type="submit" >+</a>

              <table class="bg-white w-full text-left text-sm font-light">
                <thead
                  class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                  <tr>
                    <th scope="col" class="px-6 py-4">id</th>
                    <th scope="col" class="px-6 py-4">code</th>
                    <th scope="col" class="px-6 py-4">expire</th>
                    <th scope="col" class="px-6 py-4">discount</th>
                    <th scope="col" class="px-6 py-4">activation date</th>
                
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $coupon)
                      
                 
                  <tr
                    class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$coupon->id}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$coupon->code}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$coupon->expire_date}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$coupon->discount}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$coupon->activation_date}}</td>
                 
                    <td>
                      <form action="/coupon/{{$coupon->id}}" method="POST"  >
                  
                          @csrf
                          @method('DELETE')
                          <button class=" bg-red-500 text-lg rounded-lg hover:bg-transparent w-full h-10 mb-4" type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                      </form>
                  </td>
                  <td>
                    <form action="{{route('coupon.edit', $coupon->id)}}" method="PUT"  >
                
                        @csrf
                        
                        <button class=" bg-green-500 text-lg rounded-lg hover:bg-transparent w-full h-10 mb-4" type="submit" >Edit</button>
                    </form>
                </td>
                  </tr> 
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


</x-app-layout>