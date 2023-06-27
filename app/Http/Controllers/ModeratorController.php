<?php

use App\Models\Moderator;

class ModeratorController extends Controller
{
    public function index()
    {
        $moderators = Moderator::all();
        return response()->json($moderators);
    }

    public function show(Moderator $moderator)
    {
        return response()->json($moderator);
    }
}
