<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Digital Festival | Dashboard User',
            'submissions' => Submission::orderBy('id', 'desc')->get()->all(),
        ];
        return view('submission.index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Digital Festival | Tambah Submission',
            'competitions' => Competition::all(),
            'participants' => User::where('role', 'participant')->get()->all(),
        ];
        return view('submission.tambah', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'participant' => 'not_in:pilih',
            'competition' => 'not_in:pilih',
            'submission' => 'required|mimes:txt,pdf,rar,zip,docx,jpg,png,jpeg',
            'submission_desc' => 'required|mimes:txt,pdf,rar,zip,docx,jpg,png,jpeg',
            'orisinil' => 'required|mimes:txt,pdf,rar,zip,docx,jpg,png,jpeg'
        ]);
        $submission = $request->file('submission')->store('submission');
        $submission_desc = $request->file('submission_desc')->store('submission');
        $orisinil = $request->file('orisinil')->store('submission');
        Submission::insert([
            'comp_id' => $request->competition,
            'user_id' => $request->participant,
            'submission' => $submission,
            'submission_desc' => $submission_desc,
            'orisinil' => $orisinil
        ]);
        return redirect()->route('submission')->with([
            'icon' => 'success',
            'title' => 'Tambah Data',
            'message' => 'Berhasil menambahkan data submission!'
        ]);
    }
}
