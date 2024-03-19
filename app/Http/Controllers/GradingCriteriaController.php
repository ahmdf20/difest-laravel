<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\GradingCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradingCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $grad = DB::table('grading_criterias', 'gc')->select(['gc.id as gc_id', 'gc.label', 'competitions.comp_name'])->join('competitions', 'gc.comp_id', '=', 'competitions.id')->get()->all();
        $data = [
            'title' => 'Digital Festival | Grading Criteria',
            'grading_criterias' => DB::table('grading_criterias', 'gc')->select(['gc.id as gc_id', 'gc.label', 'gc.criteria_type', 'competitions.comp_name'])->join('competitions', 'gc.comp_id', '=', 'competitions.id')->where('gc.deleted_at', null)->get()->all(),
        ];
        // dd($grad);
        // die();

        return view('criteria.index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Digital Festival | Tambah Grading Criteria',
            'competitions' => Competition::all()
        ];
        return view('criteria.tambah', $data);
    }

    public function edit(GradingCriteria $grading_criteria)
    {
        $data = [
            'title' => 'Digital Festival | Edit Grading Criteria',
            'competitions' => Competition::all(),
            'grading_criteria' => $grading_criteria
        ];
        return view('criteria.edit', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'competition' => 'required|not_in:pilih',
            'label' => 'required'
        ]);

        GradingCriteria::insert([
            'comp_id' => $request->competition,
            'label' => $request->label,
            'criteria_type' => $request->criteria_type,
            'created_at' => now('Asia/Jakarta'),
        ]);

        return redirect()->route('grading-criteria')->with([
            'icon' => 'success',
            'message' => 'Berhasil menambahkan data baru kriteria penilaian!',
            'title' => 'Tambah Data'
        ]);
    }

    public function update(Request $request, GradingCriteria $grading_criteria)
    {
        $request->validate([
            'competition' => 'required|not_in:pilih',
            'label' => 'required'
        ]);

        GradingCriteria::where('id', $grading_criteria->id)->update([
            'label' => $request->label,
            'criteria_type' => $request->criteria_type,
            'comp_id' => $request->competition,
            'updated_at' => now('Asia/Jakarta')
        ]);

        return redirect()->route('grading-criteria')->with([
            'icon' => 'success',
            'message' => 'Berhasil mengedit data kriteria penilaian!',
            'title' => 'Edit Data'
        ]);
    }

    public function softdelete(GradingCriteria $grading_criteria)
    {
        GradingCriteria::where('id', $grading_criteria->id)->update([
            'deleted_at' => now('Asia/Jakarta')
        ]);
        return redirect()->route('grading-criteria')->with([
            'icon' => 'success',
            'message' => 'Berhasil menghapus data kriteria penilian!',
            'title' => 'Hapus Data'
        ]);
    }
}
