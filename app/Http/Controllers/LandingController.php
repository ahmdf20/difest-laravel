<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function index(): View
    {
        $data = [
            'title' => 'Digital Festival'
        ];
        return view('landing.index', $data);
    }

    public function daftar_seminar(): View
    {
        $data = [
            'title' => 'Digital Festival | Daftar Seminar'
        ];
        return view('livewire.page.section-daftar-seminar', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|not_in:pilih',
            'phone' => 'required|numeric',
            'name' => 'required',
            'is_offline' => 'required|not_in:pilih'
        ]);

        $uploads = $request->file('upload_payment')?->store('upload');

        Seminar::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'instance' => $request->instance,
            'address' => $request->address,
            'payment_method' => $request->payment_method == 'pilih' ? null : $request->payment_method,
            'payment_photo' => $uploads ? $uploads : null,
            'status' => $request->status == 'pilih' ? null : $request->status,
            'is_offline' => $request->is_offline == 'pilih' ? null : $request->is_offline,
            'created_at' => now('Asia/Jakarta')
        ]);

        return redirect()->route('landing.index')->with([
            'message' => 'Terimakasih telah mendaftarkan diri anda pada Seminar & Webinar DIFEST 5.0, sampai jumpa nanti di tempat!',
            'icon' => 'success',
            'title' => 'Berhasil Mendaftar'
        ]);
    }
}
