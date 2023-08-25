<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
  
    <div class="flex flex-col">
     
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block w-full py-2 sm:px-6 lg:px-8">
            @if ($message=Session::get('success'))
            <div class="bg-green-500 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                
                <span class="block sm:inline">{{$message}}</span>
               
              </div>
            @endif
            <div class="overflow-hidden">
              <table class="bg-white w-full text-left text-sm font-light">
                <a href="category/create" class=" w-12 bg-white text-lg rounded-lg hover:bg-transparent h-12 mb-4" type="submit" >+</a>
                <thead
                  class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                  <tr>
                    <th scope="col" class="px-6 py-4">id</th>
                    <th scope="col" class="px-6 py-4">name</th>
                    <th scope="col" class="px-6 py-4">icon</th>
                
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $category)
                      
                 
                  <tr
                    class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$category->id}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$category->Name}}</td>
                    <td  class="px-6 py-4">
                      <img src="/images/{{ $category->Icon }}" alt="{{ $category->Icon }}" width="30px">
                  </td>
                  <td>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
                <td>
                  <form action="{{route('category.edit', $category->id)}}" method="PUT"  >
              
                      @csrf
                      
                      <button class="bg-green-100 text-lg rounded-lg hover:bg-transparent w-full  " type="submit" >Edit</button>
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