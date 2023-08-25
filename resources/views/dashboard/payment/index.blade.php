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
                        <form action="{{ route('payment.destroy', $payment->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class=" bg-white  border-0" type="submit">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                  class="bi bi-trash3" viewBox="0 0 16 16">
                                  <path
                                      d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                              </svg>
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