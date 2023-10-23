<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileController extends Component
{
    public $name, $email, $password, $new_password, $new_password_confirmation;

    public function __construct()
    {
        $this->name = auth()->user()?->name;
        $this->email = auth()->user()?->email;
    }
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'new_password' => 'confirmed',
        ];
    }
    public function render()
    {
        return view('livewire.profile-controller')->extends('layouts.adminlte', ['title' => 'Profile', 'breadcrumbs_title' => 'My profile'])->section('content');
    }

    public function updateProfileData()
    {
        $this->validate();

        auth()->user()->name = $this->name;
        auth()->user()->email = $this->email;
        auth()->user()->save();
        if ($this->password && $this->new_password){
            auth()->user()->update([
                'password' => bcrypt($this->new_password),
            ]);
        }
        redirect()->back();
        $this->dispatchBrowserEvent(
            'send-notification',
            [
                'title' => 'Profile Updated!',
                'subtitle' => 'You can refresh the page to see the changes.',
                'type' => 'success',
                'duration' => 3000,
                'notification' => true,
                'position' => 'top-end',

            ]
        );
    }
}
