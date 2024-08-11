<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CandidateDashboardController extends Controller
{
    public  function view_total_applied_jobs() {
        $app_job = DB::table('application')
                ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
                ->select('application.student_id', 'application.*', 'job_post.job_title','job_post.city',
                'job_post.required_skills')
                ->where('application.student_id', '=', session('user_id'))
                ->paginate(6);
        $total_job = DB::table('application')
                ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
                ->select('application.student_id', 'application.*', 'job_post.job_title','job_post.city',
                'job_post.required_skills')
                ->where('application.student_id', '=', session('user_id'))
                ->count();

        return view('student_.total_job_applied_list', ["total_job"=> $total_job,'app_job' => $app_job])->render();
    }
    public function view_total_applied_internships() {
        $total_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->count();
        $app_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->paginate(6);

        return view('student_.total_internship_applied_list', ["total_int"=> $total_int,"app_int"=> $app_int])->render();
    }
    public function search_total_applied_internships(Request $request) {
        if($request->input('title')){
            $title = $request->input('title');
        }
        else{
            $title = $request->input('title1');
        }

        $app_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where(function ($query) use ($title) {
                $query->orWhere('internship_post.internship_title', 'LIKE', '%' . $title . '%')
                    ->orWhere('internship_post.district', 'LIKE', '%' . $title . '%')
                    ->orWhere('internship_post.required_skills', 'LIKE', '%' . $title . '%');
            })
            ->get();

        return view('student_.total_app_list', ['app_int' => $app_int])->render();
    }
    public function  search_total_applied_jobs (Request $request) {
            $title = $request->input('title');
        // }
        // else{
        //     $title = $request->input('title1');
        // }

        $app_job = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->select('application.student_id', 'application.*', 'job_post.job_title', 'job_post.city', 'job_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where(function ($query) use ($title) {
                $query->orWhere('job_post.job_title', 'LIKE', '%' . $title . '%')
                    ->orWhere('job_post.city', 'LIKE', '%' . $title . '%')
                    ->orWhere('job_post.required_skills', 'LIKE', '%' . $title . '%');
            })
            ->get();

        // $mergedResults = $app_int->merge($app_job)->all();
        // return $title;
        return view('student_.total_app_list', ['app_job' => $app_job])->render();
    }


    public function approved_application_intern(){
        $total_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '1')
            ->count();
        $app_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '1')
            ->paginate(6);
        return view('student_.approved_intern_list',['app_int'=>$app_int,'total_int'=>$total_int])->render();
    }
    public function approved_application_job(){
        $total_job = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->select('application.student_id', 'application.*', 'job_post.job_title','job_post.city',
            'job_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '1')
            ->count();

        $app_job = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->select('application.student_id', 'application.*', 'job_post.job_title','job_post.city',
            'job_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '1')
            ->paginate(6);
        // return $total_job;
        return view('student_.approved_job_list',['app_job'=>$app_job,'total_job'=>$total_job])->render();
    }
    public function search_approved_internships(Request $request) {
        $title = $request->input('title');
        // }
        // else{
        //     $title = $request->input('title1');
        // }

        $app_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '1')
            ->where(function ($query) use ($title) {
                $query->orWhere('internship_post.internship_title', 'LIKE', '%' . $title . '%')
                    ->orWhere('internship_post.district', 'LIKE', '%' . $title . '%')
                    ->orWhere('internship_post.required_skills', 'LIKE', '%' . $title . '%');
            })
            ->get();

// return $app_int;
        return view('student_.approved_app_list', ['app_int' => $app_int])->render();
    }
    public function  search_approved_jobs (Request $request) {
        $title = $request->input('title');

        $app_job = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->select('application.student_id', 'application.*', 'job_post.job_title', 'job_post.city', 'job_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '1')
            ->where(function ($query) use ($title) {
                $query->orWhere('job_post.job_title', 'LIKE', '%' . $title . '%')
                    ->orWhere('job_post.city', 'LIKE', '%' . $title . '%')
                    ->orWhere('job_post.required_skills', 'LIKE', '%' . $title . '%');
            })
            ->get();

        return view('student_.approved_app_list', ['app_job'=>$app_job])->render();
    }





    public function rejected_application_intern(){
        $total_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '2')
            ->count();
       $app_int = DB::table('application')
        ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
        ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
        ->where('application.student_id', '=', session('user_id'))
        ->where('application.status', '2')
        ->paginate(6);
       return view('student_.rejected_intern_list',['app_int'=>$app_int,'total_int'=>$total_int])->render();
    }
    public function rejected_application_job(){
        $total_job = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->select('application.student_id', 'application.*', 'job_post.job_title','job_post.city',
            'job_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '2')
            ->count();
        $app_job = DB::table('application')
        ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
        ->select('application.student_id', 'application.*', 'job_post.job_title','job_post.city',
        'job_post.required_skills')
        ->where('application.student_id', '=', session('user_id'))
        ->where('application.status', '2')
        ->paginate(6);

// return $app_job;
        return view('student_.rejected_job_list',['app_job'=>$app_job,'total_job'=>$total_job])->render();
    }
    public function search_rejected_internships(Request $request) {
        $title = $request->input('title');

        $app_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', 2)
            ->where(function ($query) use ($title) {
                $query->orWhere('internship_post.internship_title', 'LIKE', '%' . $title . '%')
                    ->orWhere('internship_post.district', 'LIKE', '%' . $title . '%')
                    ->orWhere('internship_post.required_skills', 'LIKE', '%' . $title . '%');
            })
            ->get();

        return view('student_.rejected_app_list', ['app_int' => $app_int])->render();
    }
    public function  search_rejected_jobs (Request $request) {
        $title = $request->input('title');

        $app_job = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->select('application.student_id', 'application.*', 'job_post.job_title', 'job_post.city', 'job_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', 2)
            ->where(function ($query) use ($title) {
                $query->orWhere('job_post.job_title', 'LIKE', '%' . $title . '%')
                    ->orWhere('job_post.city', 'LIKE', '%' . $title . '%')
                    ->orWhere('job_post.required_skills', 'LIKE', '%' . $title . '%');
            })
            ->get();

        return view('student_.rejected_app_list', ['app_job'=>$app_job])->render();
    }


}
