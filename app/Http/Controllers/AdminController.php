<?php

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return response()->json($admins);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $admin = new Admin();
        $admin->user_id = $user->id;
        // Defina outros campos relevantes para o administrador
        $admin->save();

        return response()->json($admin, 201);
    }

    public function show(Admin $admin)
    {
        return response()->json($admin);
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $admin->user_id . ',user_id',
            'password' => 'sometimes|min:8',
        ]);

        $user = $admin->user;
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        // Atualize outros campos relevantes para o administrador
        $admin->save();

        return response()->json($admin);
    }

    public function destroy(Admin $admin)
    {
        $user = $admin->user;
        $admin->delete();
        $user->delete();

        return response()->json(null, 204);
    }
}
