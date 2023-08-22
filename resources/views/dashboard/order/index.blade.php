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
                    <th scope="col">By</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Ordered Date</th>
                    <th scope="col" class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td scope="row">{{$order->id}}</td>
                            <td>{{$order->client->user->name}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->ordered_date}}</td>
                            <td class="text-center">
                                <a href="{{ route('order.show', $order->id) }}" class="btn btn-primary">More Info</a>

                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                  
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
  <div class="container">
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
          <div class="overflow-hidden">
              <table class="min-w-full text-left text-sm font-light">
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
