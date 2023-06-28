<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Financial;
use Illuminate\Auth\Access\HandlesAuthorization;

class FinancialPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Financial $financial)
    {
        // Lógica para verificar se o usuário pode editar um registro financeiro
        return $user->hasRole('financeiro-editar');
    }

    public function delete(User $user, Financial $financial)
    {
        // Lógica para verificar se o usuário pode excluir um registro financeiro
        return $user->hasRole('financeiro-excluir');
    }
}
