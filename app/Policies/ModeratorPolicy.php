<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Moderator;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModeratorPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        // Lógica para verificar se o usuário pode visualizar a lista de moderadores
        return $user->hasRole('moderador');
    }

    public function show(User $user, Moderator $moderator)
    {
        // Lógica para verificar se o usuário pode visualizar um moderador específico
        return $user->hasRole('moderador');
    }
}
