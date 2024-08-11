<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function major($firstDropdownValue)
    {
        // Fetch data based on the first dropdown value
        $degree_name = DB::table('degrees')
        ->where('degree_name', $firstDropdownValue)
        ->groupBy('specialization')
        ->pluck('specialization');

        return response()->json($degree_name);
    }
    public function degree($firstDropdownValue)
    {
        // Fetch data based on the first dropdown value
        $degree_name = DB::table('degrees')
        ->where('degree_type', $firstDropdownValue)
        ->groupBy('degree_name')
        ->pluck('degree_name');

        return response()->json($degree_name);
    }
    public function dropdown($input){
    $inpt = strtolower($input);

    $suggestions = DB::table('colleges')
        ->where(DB::raw('LOWER(College_Name)'), 'LIKE','%'. $inpt . '%')
        ->orWhere(DB::raw('LOWER(University_Name)'), 'LIKE','%'. $inpt . '%')
        ->pluck('SI_No', 'College_Name')
        ->toArray();
    return response()->json($suggestions);
}

public function search_dropdown($input){
    $inpt = strtolower($input);

    $internshipSuggestions = DB::table('internship_post')
        ->where('required_skills', 'like', '%' . $inpt . '%')
        ->get(['internship_id', 'internship_title'])
        ->toArray();

    // Search for suggestions in the job_post table
    $jobSuggestions = DB::table('job_post')
        ->where('required_skills', 'like', '%' . $inpt . '%')
        ->get(['job_id', 'job_title'])
        ->toArray();

    // Merge the results from both tables
    $suggestions = array_merge($internshipSuggestions, $jobSuggestions);
// return $suggestions;
    return response()->json($suggestions);
}
public function posted_internship_search($input){
    $inpt = strtolower($input);

    $internships = DB::table('internship_post')
    ->where('employer_id', session('employer_id'))
    ->where(function ($query) use ($inpt) {
        $query->where('internship_title', 'like', '%' . $inpt . '%')
              ->orWhere('company_name', 'like', '%' . $inpt . '%');
    })
    ->get();

    return view('company1.posted_internship_list', ['internships' => $internships])->render();
}
public function posted_job_search($input){
    $inpt = strtolower($input);

    $jobs = DB::table('job_post')
    ->where('employer_id', session('employer_id'))
    ->where(function ($query) use ($inpt) {
        $query->where('job_title', 'like', '%' . $inpt . '%')
        ->orWhere('company_name','like', '%' . $inpt . '%');
    })
    ->get();
    return view('company1.posted_job_list', ['jobs' => $jobs])->render();
}

public function internship_application_search($input){
    $inpt = strtolower($input);


    $applications = DB::table('application')
        ->select('application.*', 'student.full_name as student_name', 'student.resume as resume', 'student.phone as student_phone', 'student.email as student_email', 'internship_post.internship_title')
        ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
        ->join('student', 'application.student_id', '=', 'student.student_id')
        ->where('internship_post.employer_id', session('employer_id'))
        ->where('application.status', 0)
        ->where(function ($query) use ($inpt) {
            $query->where('internship_post.internship_title', 'like', '%' . $inpt . '%')
                ->orWhere('student.full_name', 'like', '%' . $inpt . '%');
        })
        ->get();
    return view('company1.internship_app_list', ['applications' => $applications])->render();
}

public function job_application_search($input){
    $inpt = strtolower($input);


    $applications = DB::table('application')
        ->select('application.*', 'student.full_name as student_name', 'student.resume as resume', 'student.phone as student_phone', 'student.email as student_email', 'job_post.job_title')
        ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
        ->join('student', 'application.student_id', '=', 'student.student_id')
        ->where('job_post.employer_id', session('employer_id'))
        ->where('application.status', 0)
        ->where(function ($query) use ($inpt) {
            $query->where('job_post.job_title', 'like', '%' . $inpt . '%')
                ->orWhere('student.full_name', 'like', '%' . $inpt . '%');
        })
        ->get();
    return view('company1.job_app_list', ['applications' => $applications])->render();
}


public function approved_internship_application_search($input){
    $inpt = strtolower($input);
    $employerId = session('employer_id');

    $applications = DB::table('application')
        ->select(
            'application.application_id',
            'application.status',
            'application.quiz_id',
            'application.student_id',
            'application.test_status',
            'application.test_qualified',
            'application.zoom_meeting',
            'application.zoom_time',
            'application.meet_status',
            'internship_post.quiz_id as quid_ID',
            'student.full_name as student_name',
            'student.resume as resume',
            'student.phone as student_phone',
            'student.email as student_email',
            'internship_post.internship_title',
            'tests.percentage',
            'tests.conducting_datetime',
            'tests.test_id'
        )
        ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
        ->join('student', 'application.student_id', '=', 'student.student_id')
        ->leftJoin('tests', 'application.application_id', '=', 'tests.application_id') // Change join to leftJoin
        ->where('internship_post.employer_id', $employerId)
        ->where('application.status', 1)
        ->where(function ($query) use ($inpt) {
            $query->where('internship_post.internship_title', 'like', '%' . $inpt . '%')
                ->orWhere('student.full_name', 'like', '%' . $inpt . '%');
        })
        ->paginate(20);

// return  $applications;
    return view('company1.approved_intern_list', ['applications' => $applications])->render();
}

public function approved_job_application_search($input){
    $inpt = strtolower($input);
    $employerId = session('employer_id');

    $applications = DB::table('application')
                ->select(
                    'application.application_id',
                    'application.status',
                    'application.quiz_id',
                    'application.student_id',
                    'application.test_status',
                    'application.test_qualified',
                    'application.zoom_meeting',
                    'application.zoom_time',
                    'application.meet_status',
                    'job_post.quiz_id as quid_ID',
                    'student.full_name as student_name',
                    'student.resume as resume',
                    'student.phone as student_phone',
                    'student.email as student_email',
                    'job_post.job_title',
                    'tests.percentage',
                    'tests.conducting_datetime',
                    'tests.test_id'
                )
                ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
                ->join('student', 'application.student_id', '=', 'student.student_id')
                ->leftJoin('tests', 'application.application_id', '=', 'tests.application_id')
                ->where('job_post.employer_id', $employerId)
                ->where('application.status', 1)
                ->where(function ($query) use ($inpt) {
                    $query->where('job_post.job_title', 'like', '%' . $inpt . '%')
                        ->orWhere('student.full_name', 'like', '%' . $inpt . '%');
                })
                ->paginate(20);


    return view('company1.approved_job_list', ['applications' => $applications])->render();
}

public function rejected_intern_application_search($input){
    $inpt = strtolower($input);
    $employerId = session('employer_id');

    $applications = DB::table('application')
    ->select(
        'application.*',
        'student.full_name as student_name',
        'student.resume as resume',
        'student.phone as student_phone',
        'student.email as student_email',
        'internship_post.internship_title'
    )
    ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
    ->join('student', 'application.student_id', '=', 'student.student_id')
    ->where('internship_post.employer_id', $employerId)
    ->where('application.status', 2)
                ->where(function ($query) use ($inpt) {
                    $query->where('internship_post.internship_title', 'like', '%' . $inpt . '%')
                        ->orWhere('student.full_name', 'like', '%' . $inpt . '%');
                })
                ->get();


    return view('company1.rejected_intern_list', ['applications' => $applications])->render();
}

public function rejected_job_application_search($input){
    $inpt = strtolower($input);
    $employerId = session('employer_id');

    $applications = DB::table('application')
    ->select(
        'application.*',
        'student.full_name as student_name',
        'student.resume as resume',
        'student.phone as student_phone',
        'student.email as student_email',
        'job_post.job_title'
    )
    ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
    ->join('student', 'application.student_id', '=', 'student.student_id')
    ->where('job_post.employer_id', $employerId)
    ->where('application.status', 2)
                ->where(function ($query) use ($inpt) {
                    $query->where('job_post.job_title', 'like', '%' . $inpt . '%')
                        ->orWhere('student.full_name', 'like', '%' . $inpt . '%');
                })
                ->get();


    return view('company1.rejected_job_list', ['applications' => $applications])->render();
}

public function face_to_face_intern_application_search($input){
    $inpt = strtolower($input);
    $employerId = session('employer_id');

    $applications = DB::table('application')
            ->select(
                'application.application_id',
                'application.company_name',
                'application.status',
                'application.quiz_id',
                'application.student_id',
                'application.test_status',
                'application.test_qualified',
                'application.zoom_meeting',
                'application.zoom_time',
                'application.meet_status',
                'internship_post.quiz_id as quid_ID',
                'student.full_name as student_name',
                'student.resume as resume',
                'student.phone as student_phone',
                'student.email as student_email',
                'internship_post.internship_title',
                'tests.percentage',
                'tests.conducting_datetime'
            )
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->join('student', 'application.student_id', '=', 'student.student_id')
            ->leftJoin('tests', 'application.application_id', '=', 'tests.application_id')
    ->where('internship_post.employer_id', $employerId)
    ->where(function ($query) {
        $query->where('application.test_status', 1)
            ->where('application.test_qualified', 1)
            ->whereNotNull('application.zoom_meeting')
            ->whereNull('application.meet_status');
    })
    ->orWhere(function ($query) {
        $query->where('application.status', 1)
            ->whereNull('application.quiz_id')
            ->whereNotNull('application.zoom_meeting')
            ->whereNull('application.meet_status');
    })
                ->where(function ($query) use ($inpt) {
                    $query->where('internship_post.internship_title', 'like', '%' . $inpt . '%')
                        ->orWhere('student.full_name', 'like', '%' . $inpt . '%');
                })
                ->get();




    return view('company1.face2face_intern_list', ['user' => $applications])->render();
}

public function face_to_face_job_application_search($input){
    $inpt = strtolower($input);
    $employerId = session('employer_id');

    $applications = DB::table('application')
    ->select(
        'application.application_id',
        'application.company_name',
        'application.status',
        'application.quiz_id',
        'application.student_id',
        'application.test_status',
        'application.test_qualified',
        'application.zoom_meeting',
        'application.zoom_time',
        'application.meet_status',
        'job_post.quiz_id as quid_ID',
        'student.full_name as student_name',
        'student.resume as resume',
        'student.phone as student_phone',
        'student.email as student_email',
        'job_post.job_title',
        'tests.percentage',
        'tests.conducting_datetime'
    )
    ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
    ->join('student', 'application.student_id', '=', 'student.student_id')
    ->leftJoin('tests', 'application.application_id', '=', 'tests.application_id')
    ->where('job_post.employer_id', $employerId)
    ->where(function ($query) {
        $query->where('application.test_status', 1)
            ->where('application.test_qualified', 1)
            ->whereNotNull('application.zoom_meeting')
            ->whereNull('application.meet_status');
    })
    ->orWhere(function ($query) {
        $query->where('application.status', 1)
            ->whereNull('application.quiz_id')
            ->whereNotNull('application.zoom_meeting')
            ->whereNull('application.meet_status');
    })
    ->where(function ($query) use ($inpt) {
        $query->where('job_post.job_title', 'like', '%' . $inpt . '%')
            ->orWhere('student.full_name', 'like', '%' . $inpt . '%');
    })
    ->get();


    return view('company1.face2face_job_list', ['user' => $applications])->render();
}

public function results_intern_application_search($input){
    $inpt = strtolower($input);
    $employerId = session('employer_id');

    $applications = DB::table('application')
->select(
    'application.application_id',
    'application.student_id',
    'application.zoom_meeting',
    'application.zoom_time',
    'application.meet_status',
    'application.offer_issue_date',
    'application.joining_date',
    'student.full_name as student_name',
    'student.resume as resume',
    'internship_post.internship_title',
    'tests.conducting_datetime'
)
->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
->join('student', 'application.student_id', '=', 'student.student_id')
->join('tests', 'application.application_id', '=', 'tests.application_id')
->where('internship_post.employer_id', $employerId)
->where('application.test_status', 1)
->where('application.test_qualified', 1)
->where('application.meet_status',1)
                ->where(function ($query) use ($inpt) {
                    $query->where('internship_post.internship_title', 'like', '%' . $inpt . '%')
                        ->orWhere('student.full_name', 'like', '%' . $inpt . '%');
                })
                ->get();


    return view('company1.results_intern_list', ['user' => $applications])->render();
}

public function results_job_application_search($input){
    $inpt = strtolower($input);
    $employerId = session('employer_id');

    $applications = DB::table('application')
->select(
    'application.application_id',
    'application.student_id',
    'application.zoom_meeting',
    'application.zoom_time',
    'application.meet_status',
    'application.offer_issue_date',
    'application.joining_date',
    'student.full_name as student_name',
    'student.resume as resume',
    'job_post.job_title',
    'tests.conducting_datetime'
)
->join('job_post', 'application.job_id', '=', 'job_post.job_id')
->join('student', 'application.student_id', '=', 'student.student_id')
->join('tests', 'application.application_id', '=', 'tests.application_id')
->where('job_post.employer_id', $employerId)
->where('application.test_status', 1)
->where('application.test_qualified', 1)
->where('application.meet_status',1)
                ->where(function ($query) use ($inpt) {
                    $query->where('job_post.job_title', 'like', '%' . $inpt . '%')
                        ->orWhere('student.full_name', 'like', '%' . $inpt . '%');
                })
                ->get();


    return view('company1.results_job_list', ['user' => $applications])->render();
}

}
