<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\TopFive;
use App\Models\User;
use Illuminate\Http\Request;

class TopFiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Digital Festival | Top Five',
            'top5' => TopFive::all()
        ];
        return view('topfive.index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Digital Festival | Tambah Top Five',
            'participants' => User::where('role', 'participant')->get()->all(),
        ];
        return view('topfive.tambah', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'participant' => 'not_in:pilih',
            'judul' => 'required',
            'asal_sekola' => 'required',
        ]);
        TopFive::insert([
            'user_id' => $request->participant,
            'judul' => $request->judul,
            'asal_sekola' => $request->asal_sekola
        ]);
        return redirect()->route('top-five')->with([
            'icon' => 'success',
            'title' => 'Tambah Data',
            'message' => 'Berhasil menambahkan data top five!'
        ]);
    }

    public function hapus(TopFive $top_five)
    {
        $top_five->delete();
        return response()->json([
            'icon' => 'success',
            'title' => 'Hapus Data',
            'message' => 'Berhasil menghapus data top five!'
        ]);
    }
}
