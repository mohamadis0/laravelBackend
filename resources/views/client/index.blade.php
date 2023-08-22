<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Clients') }}
    </h2>
</x-slot>
  
    <div class="flex flex-col">
     
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 ">
          <div class="inline-block w-full py-2 sm:px-6 lg:px-8">
            @if ($message=Session::get('success'))
            <div class="bg-green-500 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                
                <span class="block sm:inline">{{$message}}</span>
                
              </div>
            @endif
            <div class="overflow-hidden">
              <table class="bg-white w-full text-left text-sm font-light">
                <thead
                  class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                  <tr>
                    <th scope="col" class="px-6 py-4">id</th>
                    <th scope="col" class="px-6 py-4">name</th>
                    <th scope="col" class="px-6 py-4">email</th>
                    <th scope="col" class="px-6 py-4">contact</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $client)
                      
                 
                  <tr
                    class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$client->id}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$client->user->name}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$client->user->email}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$client->contact}}</td>
                    <td>
                      <form action="/client/{{$client->id}}" method="POST"  >
                  
                          @csrf
                          @method('DELETE')
                          <button class=" bg-red-500 text-lg rounded-lg hover:bg-transparent w-full h-10 mb-4" type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
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