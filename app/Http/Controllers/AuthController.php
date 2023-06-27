<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Faz login e retorna o token de acesso.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Dados de login inválidos'], 400);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('access_token')->accessToken;

            return response()->json(['access_token' => $token], 200);
        }

        return response()->json(['error' => 'Credenciais inválidas'], 401);
    }

    /**
     * Faz logout e revoga o token de acesso.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $user = Auth::user();
        $user->tokens()->delete();

        return response()->json(['message' => 'Logout realizado com sucesso'], 200);
    }

    /**
     * Retorna o usuário autenticado.
     *
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
        $user = Auth::user();

        return response()->json($user, 200);
    }

    /**
     * Atualiza o token de acesso.
     *
     * @return \Illuminate\Http\Response
     */
    public function refresh()
    {
        $user = Auth::user();
        $token = $user->createToken('access_token')->accessToken;

        return response()->json(['access_token' => $token], 200);
    }
}
