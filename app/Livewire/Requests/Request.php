<?php

namespace App\Livewire\Requests;
use App\Models\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Request extends Component
{
    public function render()
    {
        $user = Auth::user();
        //Auth()->id;
        // dd($user);
        // $user =User::orderby('name','asc')
        // ->Where('usertype','=','user')
        // //    ->pluck('name','id');
        // ->get();
        // // //$validatedData
         
       foreach($user as $users)
    //    dd($users->name);
        return view('livewire.requests.request',compact('users'));
    }
}
