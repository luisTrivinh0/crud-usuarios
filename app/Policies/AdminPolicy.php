<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        // Lógica para verificar se o usuário pode visualizar a lista de administradores
        return $user->hasRole('administrador');
    }

    public function show(User $user, Admin $admin)
    {
        // Lógica para verificar se o usuário pode visualizar um administrador específico
        return $user->hasRole('administrador');
    }

    public function create(User $user)
    {
        // Lógica para verificar se o usuário pode criar um administrador
        return $user->hasRole('administrador');
    }

    public function update(User $user, Admin $admin)
    {
        // Lógica para verificar se o usuário pode atualizar um administrador
        return $user->hasRole('administrador');
    }

    public function delete(User $user, Admin $admin)
    {
        // Lógica para verificar se o usuário pode excluir um administrador
        return $user->hasRole('administrador');
    }
}
