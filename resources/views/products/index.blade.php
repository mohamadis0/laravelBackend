<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">

            <span class="block sm:inline">{{ $message }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif
    <a class=" bg-transparent border-0  " style="padding: 10px" href="{{ route('products.create') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#af0433" class="bi bi-plus-square"
            viewBox="0 0 16 16">
            <path
                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
            <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>

    </a>
    <table class=" container table w-full overflow-auto border bg-white">

        <thead>
            <tr class=" text-center p-5">
                <th class="px-6 py-4">Id</th>
                <th  class="px-6 py-4">Name</th>
                <th  class="px-6 py-4">Description</th>
                <th  class="px-6 py-4">Price</th>
                <th  class="px-6 py-4">Image</th>
                <th  class="px-6 py-4">Quantity</th>

                <th  class="px-6 py-4">add ons </th>
                <th  class="px-6 py-4">remove</th>
                <th  class="px-6 py-4">Category</th>
                <th  class="px-6 py-4">Tags</th>
                <th  class="px-6 py-4">Edit</th>
                <th  class="px-6 py-4">Del</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr key={{ $item->id }} class=" text-center">
                    <td  class="px-6 py-4">{{ $item->id }}</td>
                    <td  class="px-6 py-4">{{ $item->name }}</td>
                    <td  class="px-6 py-4">{{ $item->description }}</td>
                    <td  class="px-6 py-4">{{ $item->price }}</td>
                    <td  class="px-6 py-4">
                        <img src="/images/{{ $item->image }}" alt="{{ $item->name }}" width="30px">
                    </td>
                    <td  class="px-6 py-4">{{ $item->quantity }}</td>

                    <td  class="px-6 py-4">
                        @foreach ($item->relatedProducts()->where('feature', 'add-on')->get() as $addOn)
                            {{ $addOn->name }},
                        @endforeach
                    </td>
                    <td  class="px-6 py-4">
                        @foreach ($item->relatedProducts()->where('feature', 'remove')->get() as $remove)
                            {{ $remove->name }},
                        @endforeach
                    </td>


                    <td  class="px-6 py-4">{{ $item->category->Name }}</td>
                    <td  class="px-6 py-4">
                        @foreach ($item->tags as $tag)
                            {{ $tag->name . ',' }}
                        @endforeach
                    </td>
                    <td  class="px-6 py-4">
                        <a class="bg-green-100 text-lg rounded-lg hover:bg-transparent w-full p-2 mb-4" href="{{ route('products.edit', $item->id) }}">
                           edit
                        </a>
                    </td>
                    <td  class="px-6 py-4">
                        <form action="{{ route('products.destroy', $item->id) }}" method="POST">
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
                </tr>
            @endforeach
        </tbody>
    </table>


</x-app-layout>
