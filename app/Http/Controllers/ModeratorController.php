<?php

use App\Models\Moderator;
use Illuminate\Support\Facades\Gate;

class ModeratorController extends Controller
{
    public function index()
    {
        if (Gate::allows('view-moderators')) {
            $moderators = Moderator::all();
            return response()->json($moderators);
        } else {
            return response()->json(['error' => 'Acesso não autorizado'], 403);
        }
    }

    public function show(Moderator $moderator)
    {
        if (Gate::allows('view-moderator', $moderator)) {
            return response()->json($moderator);
        } else {
            return response()->json(['error' => 'Acesso não autorizado'], 403);
        }
    }
}
