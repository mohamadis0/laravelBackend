<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Payment') }}
    </h2>
      <form action="{{route('payment.create')}}" method="GET">
        <div class="text-center">
            <button type="submit" class=" bg-blue-500 py-2 rounded-full text-white text-sm font-bold px-5 py-2" >New  Method</button>
    
        </div>
    </form>
    </div>
    
</x-slot>
     @if ($message = Session::get('message'))
     <div class="bg-blue-100 border border-blue-400 text-black-700 px-4 py-3 rounded relative" role="alert">
       
        <span class="block sm:inline">  <ul>
            <li class="text-center">
                {{$message}} 
            </li>
            </ul></span>
        
      </div>
     @endif
     
 
  
    <div class="container">
      <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="bg-white w-full text-left text-sm font-light">
                  <thead class=" border-b font-medium dark:border-neutral-500">
                    
                    <tr>
                      <th scope="col" class="px-6 py-4">id</th>
                      <th scope="col" class="px-6 py-4">Method</th>
                      <th scope="col" class="px-6 py-4">Created Date</th>
                      <th scope="col" class="px-6 py-4 text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $payment)
                    <tr
                      class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                      <td class="whitespace-nowrap px-6 py-4 font-medium">{{$payment->id}}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{$payment->method}}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{$payment->created_at}}</td>
                      <td class="whitespace-nowrap px-6 py-4 text-center">
                        {{-- <a href="{{ route('payment.destroy', $payment->id) }}" class=" bg-[#af0433] text-lg rounded-lg hover:bg-opacity-10  text-white w-full h-10 mb-4 px-6 py-2" >
                            Delete
                          </a> --}}
                          <form action="{{ route('payment.destroy', $payment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#af0433]  text-lg rounded-lg hover:bg-opacity-10  text-white w-full h-10 mb-4 px-6 py-2">
                                Delete
                            </button>
                        </form>
                      </td>
                      
                    @endforeach
                  </tbody>
                </table>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    
  </x-app-layout>