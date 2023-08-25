<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
          {{ __('Order') }}
      </h2>
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
                  <thead class="border-b font-medium dark:border-neutral-500">
                    
                    <tr>
                      <th scope="col" class="px-6 py-4">order_id</th>
                      <th scope="col" class="px-6 py-4">product</th>
                      <th scope="col" class="px-6 py-4">quantity</th>
                      <th scope="col" class="px-6 py-4">image</th>
                      <th scope="col" class="px-6 py-4">add-ons</th>
                      <th scope="col" class="px-6 py-4">sub-total</th>
                      <th scope="col" class="px-6 py-4 text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @foreach ($orderlines as $orderline)
                      @foreach ($orderline->product_addons as $addon)
                        @foreach ($addon->products as $product)
                            <div>{{$product->name}}</div>
                            <div>{{$orderline->quantity}}</div>
                        @endforeach
                      @endforeach
                    @endforeach --}}
                    @foreach ($orderlines as $orderline)
                        <tr>
                          <td class="px-6 py-4">{{$order->id}}</td>
                          @foreach ($orderline->products as $product)
                          {{-- <td class="px-6 py-4">{{$product->name}}</td>  --}}
                          <td class="px-6 py-4">{{$product->name}}</td> 
                          <td class="px-6 py-4">{{$orderline->quantity}}</td>
                          {{-- <td class="px-6 py-4"> <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" width="30px"></td> --}}
                          <td class="px-6 py-4"><img src="/{{$product->image}}" alt="{{ $product->name }}" width="30px"></td>
                          @endforeach
                              <td>
                              @foreach ($orderline->product_addons as $addons)
                                @foreach ($addons->products as $pro)
                                    {{$pro->name}},
                                @endforeach
                                @endforeach

                              </td>
                              <td>
                              @foreach ($orderline->product_addons as $addons)
                                @foreach ($addons->products as $pro)
                                    {{$pro->price }},
                                @endforeach
                                @endforeach

                              </td>
                        </tr>
                    @endforeach

                    {{-- <tr
                      class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                      <td class="whitespace-nowrap px-6 py-4 font-medium">{{$order->id}}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{$order->client->user->name}}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{$order->status}}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{$order->created_at}}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{$order->ordered_date}}</td>
                      <td class="whitespace-nowrap px-6 py-4 text-center">
                        <a href="{{ route('orderDetails.show', $order->id) }}" class=" bg-[#af0433] text-lg rounded-lg hover:bg-opacity-10  text-white w-full h-10 mb-4 px-6 py-2" >
                          More Details
                        </a>
                        <a href="{{ route('order.show', $order->id) }}" class=" bg-blue-300 text-lg rounded-lg hover:bg-opacity-10  text-white w-full h-10 mb-4 px-6 py-2" >
                          More Details
                        </a>
                      </td>
                    </tr> --}}
                  </tbody>
                </table>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </x-app-layout>