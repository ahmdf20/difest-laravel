<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Termwind\render;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Digital Festival | Dashboard User'
        ];

        return view('user.index', $data);
    }

    public function participant()
    {
        $data = [
            'title' => 'Digital Festival | Participant'
        ];
        return view('user.participant', $data);
    }
}
