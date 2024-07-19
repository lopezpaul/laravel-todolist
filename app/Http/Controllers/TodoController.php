<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TodoController extends Controller
{
    public function index(): View
    {
        return view('todos', [
            //
        ]);
    }
}
