<x-app-layout>
    <div class="flex flex-col h-full justify-center items-center">
        <form action="{{route('payment.store')}}" method="POST">
            @csrf
            <label for="" class="mx-12">New Payment Method: </label>
            <input type="text" name="method" placeholder="method">
            <button type="submit" class="px-4 py-2 mx-12 bg-blue-500 rounded-full text-white text-lg">Add</button>
        </form>
    </div>
    
</x-app-layout>
