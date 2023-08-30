<x-app-layout>
    <x-slot name="header">
      <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
          {{ __('Products Ordered') }}
      </h2>
      <form action="{{ route('orders.update-status', ['order' => $order->id]) }}" method="POST">
        @csrf
        <div class="text-center">
            <button type="submit" class=" bg-blue-500 py-2 rounded-full text-white text-sm font-bold px-5 " > Ordered</button>
    
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
       @php
       $total=0;
    @endphp
    <div class="container">
      <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
             <div class="container">
                <table class="bg-white w-full text-left text-sm font-light">
                  <thead class="border-b font-medium dark:border-neutral-500">
                    
                    <tr>
                      <th scope="col" class="px-6 py-4 text-center">order_id</th>
                      <th scope="col" class="px-6 py-4 text-center">product</th>
                      <th scope="col" class="px-6 py-4 text-center">quantity</th>
                      <th scope="col" class="px-6 py-4 text-center">image</th>
                      <th scope="col" class="px-6 py-4 text-center">add-ons</th>
                      <th scope="col" class="px-6 py-4 text-center">removes</th>
                      <th scope="col" class="px-6 py-4 text-center">sub-total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orderlines as $orderline)
                    @php
                        $subtotal = 0;
                    @endphp
                        <tr>
                          <td class=" py-4 text-center">{{$order->id}}</td>
                          @foreach ($orderline->products as $product)
                          @php
                              $subtotal += $product->price;
                          @endphp
                          {{-- <td class=" py-4">{{$product->name}}</td>  --}}
                          <td class=" py-4 text-center">{{$product->name}}</td> 
                          <td class=" py-4 text-center">{{$orderline->quantity}}</td>
                          {{-- <td class=" py-4"> <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" width="30px"></td> --}}
                          <td class=" py-4 text-center"><img src="/images/{{$product->image}}" alt="{{ $product->name }}" width="30px"></td>
                          @endforeach
                              <td class=" py-4 text-center">
                              @foreach ($orderline->product_addons as $addons)
                                @foreach ($addons->products as $pro)
                                    {{$pro->name}},
                                    @php
                                    $subtotal+=$pro->price;
                                @endphp
                                @endforeach
                                @endforeach

                              </td>
                              <td class=" py-4 text-center">
                              @foreach ($orderline->product_removes as $removes)
                                @foreach ($removes->products as $pro)
                                    {{$pro->name}},
                                    
                                @endforeach
                                @endforeach

                              </td>
                              <td class=" py-4 text-center">
                                @php
                                    $subtotal= $subtotal*$orderline->quantity;
                                    $total+=$subtotal;
                                @endphp
                                ${{$subtotal}}

                              </td>
                              <td>
                              <form action="{{ route('remove-product', ['order' => $order->id,'product'=>$product->id]) }}" method="post">
                              @csrf
                              @method("DELETE")
                                <button type="submit">Remove</button>
                              </form>
                              </td>
                        </tr>
                    @endforeach
                   
                  </tbody>
                </table>
             </div>

                <div class="flex justify-center items-center mt-12 font-bold text-xl text-blue-500">
                  Total : ${{$total}}
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </x-app-layout>