
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Order') }}
    </h2>
</x-slot>
  <div class="container">
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block w-full py-2 sm:px-6 lg:px-8">
          <div class="overflow-hidden">
              <table class="bg-white w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  
                  <tr>
                    <th scope="col" class="px-6 py-4">id</th>
                    <th scope="col" class="px-6 py-4">By</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4">Created Date</th>
                    <th scope="col" class="px-6 py-4">Ordered Date</th>
                    <th scope="col" class="px-6 py-4 text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                  <tr
                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$order->id}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$order->client->user->name}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$order->status}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$order->created_at}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$order->ordered_date}}</td>
                    <td class="whitespace-nowrap px-6 py-4 text-center">
                      <a href="{{ route('order.show', $order->id) }}" class=" bg-[#af0433] text-lg rounded-lg hover:bg-opacity-10  text-white w-full h-10 mb-4 px-6 py-2" >
                        More Details
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  
</x-app-layout>
