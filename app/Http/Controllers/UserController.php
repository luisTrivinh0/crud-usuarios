<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\Moderator;
use App\Models\Financial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        // Lógica para criar um novo usuário
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|min:8',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }

    public function addModeratorRole(User $user)
    {
        $moderator = new Moderator();
        $moderator->user_id = $user->id;
        // Defina outros campos relevantes para o moderador
        $moderator->save();

        return response()->json($moderator, 201);
    }

    public function removeModeratorRole(User $user)
    {
        $moderator = $user->moderator;
        $moderator->delete();

        return response()->json(null, 204);
    }

    public function addAdminRole(User $user)
    {
        $admin = new Admin();
        $admin->user_id = $user->id;
        // Defina outros campos relevantes para o administrador
        $admin->save();

        return response()->json($admin, 201);
    }

    public function removeAdminRole(User $user)
    {
        $admin = $user->admin;
        $admin->delete();

        return response()->json(null, 204);
    }

    public function addFinancialRole(User $user, $level)
    {
        $financial = new Financial();
        $financial->user_id = $user->id;
        $financial->level = $level;
        // Defina outros campos relevantes para o financeiro
        $financial->save();

        return response()->json($financial, 201);
    }

    public function updateFinancialRole(User $user, $level)
    {
        $financial = $user->financial;
        $financial->level = $level;
        // Atualize outros campos relevantes para o financeiro
        $financial->save();

        return response()->json($financial);
    }

    public function removeFinancialRole(User $user)
    {
        $financial = $user->financial;
        $financial->delete();

        return response()->json(null, 204);
    }
}
