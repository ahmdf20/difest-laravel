<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function Termwind\render;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Digital Festival | Dashboard'
        ];

        return view('user.index', $data);
    }

    public function participant()
    {
        $data = [
            'title' => 'Digital Festival | Participant',
            'participants' => User::where('role', 'participant')->get()->all(),
        ];
        return view('participant.index', $data);
    }

    public function commite()
    {
        $data = [
            'title' => 'Digital Festival | Commite',
            'commite' => User::where([['role', 'commite'], ['deleted_at', null]])->get()->all(),
        ];
        return view('commite.index', $data);
    }

    public function judge()
    {
        $data = [
            'title' => 'Digital Festival | Jugde',
            'judge' => User::where([['role', 'judge'], ['deleted_at', null]])->get()->all(),
        ];
        return view('judge.index', $data);
    }

    public function commite_tambah()
    {
        $data = [
            'title' => 'Digital Festival | Tambah Commite',
        ];
        return view('commite.tambah', $data);
    }

    public function commite_store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'from_competition' => 'not_in:pilih'
        ]);

        User::insert([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->username),
            'phone' => $request->phone,
            'role' => 'commite',
            'from_competition' => $request->from_competition,
            'created_at' => now('Asia/Jakarta')
        ]);

        return redirect()->route('user.commite')->with([
            'icon' => 'success',
            'message' => 'Berhasil menambahkan data baru commite!',
            'title' => 'Tambah Data'
        ]);
    }

    public function commite_softdelete(User $user)
    {
        User::where('id', $user->id)->update([
            'deleted_at' => now('Asia/Jakarta')
        ]);
        return redirect()->route('user.commite')->with([
            'icon' => 'success',
            'message' => 'Berhasil menghapus data commite!',
            'title' => 'Hapus Data'
        ]);
    }

    public function commite_edit(User $user)
    {
        $data = [
            'title' => 'Digital Festival | Edit Commite',
            'commite' => $user
        ];
        return view('commite.edit', $data);
    }

    public function commite_update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'from_competition' => 'not_in:pilih'
        ]);

        User::where('id', $user->id)->update([
            'name' => $request->name,
            'from_competition' => $request->from_competition,
            'updated_at' => now('Asia/Jakarta')
        ]);

        return redirect()->route('user.commite')->with([
            'icon' => 'success',
            'message' => 'Berhasil mengedit data commite!',
            'title' => 'Edit Data'
        ]);
    }

    public function judge_tambah()
    {
        $data = [
            'title' => 'Digital Festival | Tambah Judge',
        ];
        return view('judge.tambah', $data);
    }

    public function judge_store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'from_competition' => 'not_in:pilih'
        ]);

        User::insert([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->username),
            'phone' => $request->phone,
            'role' => 'judge',
            'from_competition' => $request->from_competition,
            'created_at' => now('Asia/Jakarta')
        ]);

        return redirect()->route('user.judge')->with([
            'icon' => 'success',
            'message' => 'Berhasil menambahkan data baru judge!',
            'title' => 'Tambah Data'
        ]);
    }

    public function judge_softdelete(User $user)
    {
        User::where('id', $user->id)->update([
            'deleted_at' => now('Asia/Jakarta')
        ]);
        return redirect()->route('user.judge')->with([
            'icon' => 'success',
            'message' => 'Berhasil menghapus data judge!',
            'title' => 'Hapus Data'
        ]);
    }

    public function judge_edit(User $user)
    {
        $data = [
            'title' => 'Digital Festival | Edit Judge',
            'judge' => $user
        ];
        return view('judge.edit', $data);
    }

    public function judge_update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'from_competition' => 'not_in:pilih'
        ]);

        User::where('id', $user->id)->update([
            'name' => $request->name,
            'from_competition' => $request->from_competition,
            'updated_at' => now('Asia/Jakarta')
        ]);

        return redirect()->route('user.judge')->with([
            'icon' => 'success',
            'message' => 'Berhasil mengedit data judge!',
            'title' => 'Edit Data'
        ]);
    }

    public function profile()
    {
        $data = [
            'title' => 'Digital Festival | My Profile'
        ];
        return view('user.profile', $data);
    }
}
