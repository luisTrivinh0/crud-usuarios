<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RolesAndUsersSeeder extends Seeder
{
    public function run()
    {
        // Criar roles
        $roles = [
            ['name' => 'Administrador', 'slug' => 'administrador'],
            ['name' => 'Moderador', 'slug' => 'moderador'],
            ['name' => 'Financeiro Editar', 'slug' => 'financeiro-editar'],
            ['name' => 'Financeiro Excluir', 'slug' => 'financeiro-excluir'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // Criar usuários de teste com diferentes roles
        $users = [
            [
                'name' => 'Usuário Administrador',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'roles' => ['administrador'],
            ],
            [
                'name' => 'Usuário Moderador',
                'email' => 'moderator@example.com',
                'password' => bcrypt('password'),
                'roles' => ['moderador'],
            ],
            [
                'name' => 'Usuário Financeiro Editar',
                'email' => 'financeiro_editar@example.com',
                'password' => bcrypt('password'),
                'roles' => ['financeiro-editar'],
            ],
            [
                'name' => 'Usuário Financeiro Excluir',
                'email' => 'financeiro_excluir@example.com',
                'password' => bcrypt('password'),
                'roles' => ['financeiro-excluir'],
            ],
        ];

        foreach ($users as $user) {
            $newUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);

            $newUser->roles()->attach(Role::whereIn('slug', $user['roles'])->pluck('id'));
        }
    }
}
