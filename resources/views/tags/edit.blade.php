<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
       
        <span class="block sm:inline">  <ul>
            @foreach ($errors->all() as $item)
            <li>
                {{$item}} 
            </li>
            @endforeach
            </ul></span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div>
       
    @endif

<form action="{{route("tags.update",$tag->id)}}" method="post" >
    @csrf
    @method('PUT')
    <div class="flex flex-col  items-center justify-center mt-10">
        <input placeholder="Name" value="{{$tag->name}}" type="text" name="name"  class="w-1/2 rounded-lg">
        <button type="submit" class=" bg-[#af0433] text-lg rounded-lg hover:bg-transparent w-full   mt-10 p-2">update tag</button>
    </div>
    
    
</form>
</x-app-layout>

