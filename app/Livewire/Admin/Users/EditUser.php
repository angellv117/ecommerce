<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;

class EditUser extends Component
{
    public $user;
    public $roles;
    public $orders;

    public function mount($user, $roles, $orders)
    {
        $this->user = $user;
        $this->roles = $roles;
        $this->orders = $orders;
    }

    public function render()
    {
        return view('livewire.admin.user.edit-user');
    }
}
