<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;

class EditUser extends Component
{
    public $user;
    public $roles;
    public $orders;
    public $role_selected;

    public function mount($user, $roles, $orders)
    {
        $this->user = $user;
        $this->roles = $roles;
        $this->orders = $orders;
        $this->role_selected = $user->role_id;
    }

    public function updateRole()
    {
        $this->user->role_id = $this->role_selected;
        $this->user->save();
        
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡Rol actualizado!',
            'text' => 'El rol del usuario se ha actualizado correctamente.',
        ]);

        return redirect()->route('admin.users.index');
        
    }

    public function render()
    {
        return view('livewire.admin.user.edit-user');
    }
}
