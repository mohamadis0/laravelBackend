{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">order_id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Company name</th>
                    <th scope="col">Country </th>
                    <th scope="col">Address </th>
                    <th scope="col">Town </th>
                    <th scope="col">state </th>
                    <th scope="col">zip code  </th>
                    <th scope="col">phone  </th>
                    <th scope="col">notes  </th>
                  </tr>
                </thead>
                
                @if ($orderDetails)
                    <tr>
                        <td>{{$orderDetails->id}}</td>
                        <td>{{$orderDetails->order_id}}</td>
                        <td>{{$orderDetails->order->client->user->name}}</td>
                        <td>{{$orderDetails->company_name}}</td>
                        <td>{{$orderDetails->country_region}}</td>
                        <td>{{$orderDetails->adress}}</td>
                        <td>{{$orderDetails->town_city}}</td>
                        <td>{{$orderDetails->state}}</td>
                        <td>{{$orderDetails->zip_code}}</td>
                        <td>{{$orderDetails->phone}}</td>
                        <td>{{$orderDetails->notes}}</td>
                        
                    </tr>
                @else
                @endif
                <tbody>
                      
                </tbody>
              </table>
        </div>
        <div>
        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html> --}}
<x-app-layout>
  @if ($message = Session::get('message'));
  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
       
    <span class="block sm:inline">  <ul>
        <li class="text-center">
            {{$message}} 
        </li>
        </ul></span>
    
  </div>

  @else 
  @isset($orderDetails)
  <div class="container">
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
          <div class="overflow-hidden">
              <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  
                  <tr>
                    <th scope="col" class="px-6 py-4">id</th>
                    <th scope="col" class="px-6 py-4">order_id</th>
                    <th scope="col" class="px-6 py-4">Username</th>
                    <th scope="col" class="px-6 py-4">Company name</th>
                    <th scope="col" class="px-6 py-4">Country</th>
                    <th scope="col" class="px-6 py-4">Address</th>
                    <th scope="col" class="px-6 py-4">Town</th>
                    <th scope="col" class="px-6 py-4">state</th>
                    <th scope="col" class="px-6 py-4">zip code</th>
                    <th scope="col" class="px-6 py-4">phone</th>
                    <th scope="col" class="px-6 py-4">notes</th>

                   
                  </tr>
                </thead>
                <tbody>
                  <tr
                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$orderDetails->id}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->order_id}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->order->client->user->name}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->company_name}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->country_region}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->adress}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->town_city}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->state}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->zip_code}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->phone}}</td>
                    <td class="whitespace-nowrap px-6 py-4">{{$orderDetails->notes}}</td>
                    
                  </tr>
                </tbody>
              </table>
  
            
          </div>
        </div>
      </div>
    </div>
  </div>
  @endisset
      
  
  @endif

  
</x-app-layout>
