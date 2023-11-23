<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoardResource;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::with('theme')->whereHas('users', function ($query) {
            $query->where('user_id', Auth::id())->where('is_creator', true);
        })->when(request('search'),  function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->paginate(14)->withQueryString();

        return Inertia::render('Boards/Index', [
            'boards' => collect($boards)
        ]);
    }
}
