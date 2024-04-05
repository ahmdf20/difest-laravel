<?php

namespace App\Http\Controllers;

use App\Models\GradingCriteria;
use App\Models\Submission;
use App\Models\SubmissionGrading;
use App\Models\User;
use Illuminate\Http\Request;

class SubmissionGradingController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Digital Festival | Submission Grading',
            'submission_gradings' => SubmissionGrading::all(),
            'submissions' => Submission::all(),
        ];
        return view('grading.index', $data);
    }

    public function penilaian_karya(Submission $submission)
    {
        $current_judge = auth()->user();
        $data = [
            'title' => 'Digital Festival | Penilaian Karya',
            'submission' => $submission,
            'grading_criterias' => GradingCriteria::where([['comp_id', $submission->comp_id], ['criteria_type', 'Penilaian Karya']])->get()->all(),
            'submission_gradings' => SubmissionGrading::where([['submission_id', $submission->id], ['criteria_type', 'Penilaian Karya'], ['judge_id', $current_judge->id]])->get()->all(),
        ];
        return view('grading.penilaian-karya', $data);
    }

    public function penilaian_presentasi(Submission $submission)
    {
        $current_judge = auth()->user();
        $data = [
            'title' => 'Digital Festival | Penilaian Presentasi',
            'submission' => $submission,
            'grading_criterias' => GradingCriteria::where([['comp_id', $submission->comp_id], ['criteria_type', 'Penilaian Presentasi']])->get()->all(),
            'submission_gradings' => SubmissionGrading::where([['submission_id', $submission->id], ['criteria_type', 'Penilaian Presentasi'], ['judge_id', $current_judge->id]])->get()->all(),
        ];
        return view('grading.penilaian-presentasi', $data);
    }

    public function penilaian_karya_store(Request $request, Submission $submission)
    {
        foreach ($request->submission_grading as $sg) {
            SubmissionGrading::insert([
                'submission_id' => $submission->id,
                'grading_criteria_id' => $sg,
                'judge_id' => auth()->user()->id,
                'criteria_type' => 'Penilaian Karya',
                'score' => $request->penilaian[$sg],
                'created_at' => now('Asia/Jakarta')
            ]);
        }

        return redirect()->route('submission-grading')->with([
            'icon' => 'success',
            'title' => 'Penilaian Karya',
            'message' => 'Berhasil menilai karya!'
        ]);
    }

    public function penilaian_presentasi_store(Request $request, Submission $submission)
    {
        foreach ($request->submission_grading as $sg) {
            SubmissionGrading::insert([
                'submission_id' => $submission->id,
                'grading_criteria_id' => $sg,
                'judge_id' => auth()->user()->id,
                'criteria_type' => 'Penilaian Presentasi',
                'score' => $request->penilaian[$sg],
                'created_at' => now('Asia/Jakarta')
            ]);
        }

        return redirect()->route('submission-grading')->with([
            'icon' => 'success',
            'title' => 'Penilaian Presentasi',
            'message' => 'Berhasil menilai presentasi peserta!'
        ]);
    }
}
