<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use App\Models\Client;
use App\Models\ClientDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.index',['data'=>Client::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('bob');
        $validatedUser = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dd($validatedUser);
        $validatedClient= $request->validate([
            'contact'=>['required', 'integer'],
        ]);
        // dd($validatedClient);
        $validatedClientDetails = $request->validate([
            'fname' => 'required', 
            'lname' => 'required',
            'company_name' => 'required',
            'country' => 'required', 
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);
        // dd($validatedClientDetails);
         $request->validate([
            'addname'=>'required'
         ]);
        //  dd($validatedAddress);

         $user = User::create($validatedUser);
        //  dd($user);
         $client = $user->client()->create($validatedClient);
        //  dd($client);
         $client->clientDetails()->create($validatedClientDetails);
        
        try {
             $client->adress()->create([
                'name'=>$request->input('addname')
             ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }



    return redirect()->route('client.index')->with('success', 'Data added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $details = $client->clientDetails;
        // dd($details);
    $address = $client->adress;
        // dd($address);
    return view('client.clientDetails', [
        'client' => $client,
        'details' => $details,
        'adress' => $address,
    ]);
      
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    // dd($validatedUser);
    $validatedClient= $request->validate([
       'contact'=>['required', 'string', 'max:255'],
    ]);
    // dd($validatedClient);
    $validatedClientDetails = $request->validate([
        'fname' => 'required', 
        'lname' => 'required',
        'company_name' => 'required',
        'country' => 'required', 
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required',
    ]);
    
        $client->update($validatedClient);
         $client->clientDetails()->update($validatedClientDetails);
         $client->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $client->adress()->update([
            'name'=>$request->input('addname')
         ]);
         return redirect()->route('client.index')->with('success', 'Data saved successfully');
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $record = $client;
        $adress = $client->adress;
        // dd($adress);
        $details =$client->clientDetails;
        $user=$client->user;


        if (!$record) {
            return redirect()->back()->with('error', 'Record not found.');
        }
        foreach ($adress as $address) {
            $address->delete();
        }
        // dd($details);
        // dd($record);
        $details->delete();
        $record->delete();
        $user->delete();
        
        

        return redirect()->route('client.index')->with('success', 'Client deleted successfully.');
    }
}
