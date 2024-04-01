<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    public function index(): View
    {
        $data = [
            'title' => 'Digital Festival | Seminars',
            'seminars' => Seminar::all(),
        ];

        return view('seminar.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            //
        ]);
    }
}
