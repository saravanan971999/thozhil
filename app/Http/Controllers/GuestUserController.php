<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class GuestUserController extends Controller
{
     //Jobs functions start
     public function all_jobs() {
        if (!request()->has('part_time') && !request()->has('full_time')) {
            return redirect('/'); // Redirect to another route
        }

        if(session('user_id')){
            $user = DB::table('student')
            ->select('area_of_interest', 'degree', 'skills')
            ->where('student.student_id', session('user_id'))
            ->first();

        $data = explode(',', $user->area_of_interest);
        $degree = explode(',', $user->degree);
        $skills = explode(',', $user->skills);

        $jobTypes = DB::table('job_post')
            ->select('job_type', 'required_skills', 'degrees_preferred', 'job_id')
            ->where('status', 1)
            ->where('application_deadline', '>=', now());

            if (request()->has('part_time')) {
                $jobTypes = $jobTypes->where('ptft', 'like', '%Part-time%');
            }
            elseif (request()->has('full_time')) {
                $jobTypes = $jobTypes->where('ptft', 'like', '%Full-time%');
            }

        $jobTypes = $jobTypes->get();


        $matched = [];
        $degree_p = [];
        $skill_s = [];

        foreach ($jobTypes as $job) {
            $jobType = explode(',', $job->job_type);
            $requiredSkills = explode(',', $job->required_skills);
            $degreesPreferred = explode(',', $job->degrees_preferred);

            if (array_intersect($data, $jobType)) {
                $matched[] = $job->job_id;
            }

            if (array_intersect($skills, $requiredSkills)) {
                $skill_s[] = $job->job_id;
            }

            if (array_intersect($degree, $degreesPreferred)) {
                $degree_p[] = $job->job_id;
            }
        }

        $mat = array_unique(array_merge($matched, $skill_s, $degree_p));


        $jobs = DB::table('job_post')->whereIn('job_id',$mat)->paginate(15);
        }
        else{
            // if(request()->has('page')){
            //     if(request()->input('page') > 2){
            //         return redirect('login_register')->with('error','You need to sign in to continue');
            //     }
            // }

            $jobs = DB::table('job_post')
            ->where('status', 1)
            ->where('application_deadline', '>=', now());

            if (request()->has('part_time')) {
                $jobs = $jobs->where('ptft', 'like', '%Part-time%');
            } elseif (request()->has('full_time')) {
                $jobs = $jobs->where('ptft', 'like', '%Full-time%');
            }
            $jobs = $jobs->orderBy('created_at', 'desc')->paginate(15);

        }
        return view('guest/jobs',["jobs"=>$jobs]);
    }
    public function job_detail($encryptedId) {
        try{
         
            $id = Crypt::decrypt($encryptedId);
            $jobs = DB::table('job_post')->where('job_id', $id)->first();
            // $logo = DB::table('employer')->select('company_logo')
            //             ->where('employer_id', $jobs->employer_id)
            //             ->first();
            if($jobs->company_logo != null){
                $log = $jobs->company_logo;
            }
            else{
                $logo = DB::table('employer')->select('company_logo')
                        ->where('employer_id', $jobs->employer_id)
                        ->first();
                $log = $logo->company_logo;
            }
            // dd($jobs->employer_id);
           


            if(session('user_id')){

                $apply = DB::table('application')
                ->where('job_id', $id)
                ->where('student_id', session('user_id'))->first();

                $user = DB::table('student')
                ->select('area_of_interest', 'degree', 'skills')
                ->where('student.student_id', session('user_id'))
                ->first();

                $data = explode(',', $user->area_of_interest);
                $degree = explode(',', $user->degree);
                $skills = explode(',', $user->skills);

                $jobTypes = DB::table('job_post')
                    ->select('job_type', 'required_skills', 'degrees_preferred', 'job_id')
                    ->where('status', 1)
                    ->where('application_deadline', '>=', now())
                    ->get();

                $matched = [];
                $degree_p = [];
                $skill_s = [];

                foreach ($jobTypes as $job) {
                    $jobType = explode(',', $job->job_type);
                    $requiredSkills = explode(',', $job->required_skills);
                    $degreesPreferred = explode(',', $job->degrees_preferred);

                    if (array_intersect($data, $jobType)) {
                        $matched[] = $job->job_id;
                    }

                    if (array_intersect($skills, $requiredSkills)) {
                        $skill_s[] = $job->job_id;
                    }

                    if (array_intersect($degree, $degreesPreferred)) {
                        $degree_p[] = $job->job_id;
                    }
                }

                $mat = array_unique(array_merge($matched, $skill_s, $degree_p));


                        $match = array_diff($mat, [$id]);
                        // dd($matched);
                        $job_post = DB::table('job_post')
                        ->whereIn('job_id', $match)
                        ->limit(6)
                        ->get();
            // dd($job_post);


                return view('guest/job_detail',[
                    "job_post"=>$job_post,
                    "jobs"=>$jobs,
                    'apply'=>$apply,
                    'logo'=>$log
                ]);
                // return 7;
            }
            $job_post = DB::table('job_post')
            ->where('job_id', '!=', $id)
            ->where(function ($query) use ($jobs) {
                $query->where('job_title', 'like', '%' . $jobs->job_title . '%')
                    ->orWhere('job_type', 'like', '%' . $jobs->job_type . '%')
                    ->orWhere('required_skills', 'like', '%' . $jobs->required_skills . '%')
                    ->orWhere('city', 'like', '%' . $jobs->city . '%')
                    ->orWhere('state', 'like', '%' . $jobs->state . '%');
            })
            ->where('application_deadline', '>', now()) // Assuming 'application_deadline' is a datetime column
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
            return view('guest/job_detail',[
                "job_post"=>$job_post,
                "jobs"=>$jobs,
                'logo'=>$log
            ]);
        }
        catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return redirect()->back()->with('error', 'Invalid address');
        }
    }
    public function job_filter(Request $request) {
        $title = $request->input('title');
        $location = $request->input('location');
        $salary = $request->input('salary');
        $user_skills = $request->input('skills');
        $ptft = $request->input('ptft');
        $experience = $request->input('experience');

        if(session('user_id')){
            $user = DB::table('student')
            ->select('area_of_interest', 'degree', 'skills')
            ->where('student.student_id', session('user_id'))
            ->first();

            $data = explode(',', $user->area_of_interest);
            $degree = explode(',', $user->degree);
            $skills = explode(',', $user->skills);

            $jobTypes = DB::table('job_post')
                ->select('job_type', 'required_skills', 'degrees_preferred', 'job_id')
                ->where('status', 1)
                ->where('application_deadline', '>=', now());

            if ($ptft == 1) {
                $jobTypes = $jobTypes->where('ptft', 'like', '%Part-time%');
            }
            elseif ($ptft == 2) {
                $jobTypes = $jobTypes->where('ptft', 'like', '%Full-time%');
            }

            $jobTypes = $jobTypes->get();

            $matched = [];
            $degree_p = [];
            $skill_s = [];

            foreach ($jobTypes as $job) {
                $jobType = explode(',', $job->job_type);
                $requiredSkills = explode(',', $job->required_skills);
                $degreesPreferred = explode(',', $job->degrees_preferred);

                if (array_intersect($data, $jobType)) {
                    $matched[] = $job->job_id;
                }

                if (array_intersect($skills, $requiredSkills)) {
                    $skill_s[] = $job->job_id;
                }

                if (array_intersect($degree, $degreesPreferred)) {
                    $degree_p[] = $job->job_id;
                }
            }

            $mat = array_unique(array_merge($matched, $skill_s, $degree_p));
            // return $mat;
                    // dd($matched);
            $query = DB::table('job_post')->whereIn('job_id',$mat);

            if ($title) {
                $query->where('job_title', 'like', '%' . $title . '%');
            }

            if ($location) {
                $query->where('city', 'like', '%' . $location . '%');
            }

            if ($salary) {
                $query->where('salary_package', $salary);
            }

            if ($user_skills) {
                $query->where('required_skills', 'like', '%' .$user_skills. '%');
            }

          

            if ($experience) {
                $query->where('experience_required', 'like', '%' .$experience. '%');
            }

        }
        else{
            $query = DB::table('job_post')->where('status', 1)
            ->where('application_deadline', '>=', now());

            if ($title) {
                $query->where('job_title', 'like', '%' . $title . '%');
            }

            if ($location) {
                $query->where('city', 'like', '%' . $location . '%');
            }

            if ($salary) {
                $query->where('salary_package', $salary);
            }

            if ($user_skills) {
                $query->where('required_skills', 'like', '%' . $user_skills . '%');
            }
        }

        $jobs = $query->orderBy('created_at', 'desc')->paginate(15);
        if($jobs->isEmpty()) {
            $r = 1;
        }
        else{
            $r = 0;
        }
        // Append filter parameters to pagination links
        $jobs->appends($request->all());

        return view('guest.jobs_list', ['jobs' => $jobs,'NR'=>$r])->render();
    }
    public function job_search(Request $request) {

        $title = $request->input('title');
        $ptft = $request->input('ptft');
        if(session('user_id')){
            $user = DB::table('student')
            ->select('area_of_interest', 'degree', 'skills')
            ->where('student.student_id', session('user_id'))
            ->first();

            $data = explode(',', $user->area_of_interest);
            $degree = explode(',', $user->degree);
            $skills = explode(',', $user->skills);

            $jobTypes = DB::table('job_post')
                ->select('job_type', 'required_skills', 'degrees_preferred', 'job_id')
                ->where('status', 1)
                ->where('application_deadline', '>=', now());

            if ($ptft == 1) {
                $jobTypes = $jobTypes->where('ptft', 'like', '%Part-time%');
            }
            elseif ($ptft == 2) {
                $jobTypes = $jobTypes->where('ptft', 'like', '%Full-time%');
            }

            $jobTypes = $jobTypes->get();

            $matched = [];
            $degree_p = [];
            $skill_s = [];

            foreach ($jobTypes as $job) {
                $jobType = explode(',', $job->job_type);
                $requiredSkills = explode(',', $job->required_skills);
                $degreesPreferred = explode(',', $job->degrees_preferred);

                if (array_intersect($data, $jobType)) {
                    $matched[] = $job->job_id;
                }

                if (array_intersect($skills, $requiredSkills)) {
                    $skill_s[] = $job->job_id;
                }

                if (array_intersect($degree, $degreesPreferred)) {
                    $degree_p[] = $job->job_id;
                }
            }

            $mat = array_unique(array_merge($matched, $skill_s, $degree_p));

                    // dd($matched);
            $jobs = DB::table('job_post')->whereIn('job_id',$mat)
                ->where(function ($query) use ($title) {
                    $query->where('job_title', 'like', '%' . $title . '%')
                        ->orWhere('city', 'like', '%' . $title . '%')
                        ->orWhere('state', 'like', '%' . $title . '%')
                        ->orWhere('required_skills', 'like', '%' . ucwords($title) . '%')
                        ->orWhere('company_name', 'like', '%' . $title . '%');
                })
                ->paginate(15);


        }
        else{

            $jobs = DB::table('job_post')
                ->where('status', 1)
                ->where('application_deadline', '>', now())
                ->where(function ($query) use ($title) {
                    $query->where('job_title', 'like', '%' . $title . '%')
                        ->orWhere('city', 'like', '%' . $title . '%')
                        ->orWhere('state', 'like', '%' . $title . '%')
                        ->orWhere('required_skills', 'like', '%' . $title . '%')
                        ->orWhere('company_name', 'like', '%' . $title . '%');
                })
                ->paginate(15);
            }
            if($jobs->isEmpty()) {
                $r = 1;
            }
            else{
                $r = 0;
            }
        // return $jobs;
        // return view('guest.jobs', ['jobs' => $jobs]);
        return view('guest.jobs_list', ['jobs' => $jobs,'NR'=>$r])->render();
    }
    //Jobs functions end



    //Internships functions start
    public function all_intern() {
        if (!request()->has('part_time') && !request()->has('full_time')) {
            return redirect('/'); // Redirect to another route
        }
        if(session('user_id')){
            $user = DB::table('student')
            ->select('degree', 'skills')
            ->where('student.student_id', session('user_id'))
            ->first();

            $degree = explode(',', $user->degree);
            $skills = explode(',', $user->skills);

            $internTypes = DB::table('internship_post')->where('status', 1)
                ->where('application_deadline', '>=', now());
            // dd($internTypes);

            if (request()->has('part_time')) {
                $internTypes = $internTypes->where('part_full_time', 'like', '%Part-time%');
            }
            elseif (request()->has('full_time')) {
                $internTypes = $internTypes->where('part_full_time', 'like', '%Full-time%');
            }

        $internTypes = $internTypes->get();
            $degree_p = [];
            $skill_s = [];

            foreach($internTypes as $intern){
                $requiredSkills = explode(',', $intern->required_skills);
                $degreesPreferred = explode(',', $intern->degrees_preferred);

                if (array_intersect($skills, $requiredSkills)) {
                    $skill_s[] = $intern->internship_id;
                }

                if (array_intersect($degree, $degreesPreferred)) {
                    $degree_p[] = $intern->internship_id;
                }

            }
            // dd($skill_s,$degree_p);

            $mat = array_unique(array_merge($skill_s, $degree_p));



                    // dd($mat);
            $int = DB::table('internship_post')->whereIn('internship_id',$mat)->paginate(15);
            }
        else{
            // if(request()->has('page')){
            //     if(request()->input('page') > 2){
            //         return redirect('login_register')->with('error','You need to sign in to continue');
            //     }
            // }
            $int = DB::table('internship_post')->where('status', 1)
            ->where('application_deadline', '>=', now());

            if (request()->has('part_time')) {
                $int = $int->where('part_full_time', 'like', '%Part-time%');
            } elseif (request()->has('full_time')) {
                $int = $int->where('part_full_time', 'like', '%Full-time%');
            }
            $int = $int->orderBy('created_at', 'desc')->paginate(15);
        }

        return view('guest/internships',["int"=>$int]);
    }
    public function internship_detail($encryptedId) {
        try{
            $id = Crypt::decrypt($encryptedId);
            $int = DB::table('internship_post')->where('internship_id', $id)->first();
            if($int->company_logo != null){
                $log = $int->company_logo;
            }
            else{
                $logo = DB::table('employer')->select('company_logo')
                    ->where('employer_id', $int->employer_id)
                    ->first();
                $log = $logo->company_logo;
            }

            $int_post = DB::table('internship_post')
            ->where('internship_id', '!=', $id)
                ->where(function ($query) use ($int) {
                    $query->where('internship_title', 'like', '%' . $int->internship_title . '%')
                        ->orWhere('required_skills', 'like', '%' . $int->required_skills . '%')
                        ->orWhere('district', 'like', '%' . $int->district . '%')
                        ->orWhere('state', 'like', '%' . $int->state . '%');
                })
                ->where('application_deadline', '>', now()) // Assuming 'application_deadline' is a datetime column
                ->orderBy('created_at', 'desc')
                ->limit(6)
                ->get();

                // dd($int_post, $int);

            if(session('user_id')){

                $apply = DB::table('application')
                        ->where('internship_id', $id)
                        ->where('student_id', session('user_id'))
                        ->first();

                $user = DB::table('student')
                    ->select('degree', 'skills')
                    ->where('student.student_id', session('user_id'))
                    ->first();

                $degree = explode(',', $user->degree);
                $skills = explode(',', $user->skills);

                $internTypes = DB::table('internship_post')->where('status', 1)
                    ->where('application_deadline', '>=', now())->get();
                // dd($internTypes);

                $degree_p = [];
                $skill_s = [];

                foreach($internTypes as $intern){
                    $requiredSkills = explode(',', $intern->required_skills);
                    $degreesPreferred = explode(',', $intern->degrees_preferred);

                    if (array_intersect($skills, $requiredSkills)) {
                        $skill_s[] = $intern->internship_id;
                    }

                    if (array_intersect($degree, $degreesPreferred)) {
                        $degree_p[] = $intern->internship_id;
                    }

                }
                // dd($skill_s,$degree_p);

                $mat = array_unique(array_merge($skill_s, $degree_p));
                $match = array_diff($mat, [$id]);
                $int_post = DB::table('internship_post')
                    ->whereIn('internship_id', $match)
                    ->limit(6)
                    ->get();
                    // dd($job_post);

                return view('guest.internship_detail',[
                    "int_post"=>$int_post,
                    "int"=>$int,
                    'apply'=>$apply,
                    'logo'=>$log
                ]);
            }
            return view('guest.internship_detail',["int_post"=>$int_post,"int"=>$int,'logo'=>$log]);
        }
        catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return redirect()->back()->with('error', 'Invalid address');
        }
    }
    public function internship_filter(Request $request) {
        $title = $request->input('title');
        $location = $request->input('location');
        $stipend = $request->input('stipend');
        $ptft = $request->input('ptft');
        $duration = $request->input('duration');

        if(session('user_id')){
            $user = DB::table('student')
                    ->select('degree', 'skills')
                    ->where('student.student_id', session('user_id'))
                    ->first();

            $degree = explode(',', $user->degree);
            $skills = explode(',', $user->skills);

            $internTypes = DB::table('internship_post')->where('status', 1)
                ->where('application_deadline', '>=', now());
            // dd($internTypes);
            if ($ptft == 1) {
                $internTypes = $internTypes->where('part_full_time', 'like', '%Part-time%');
            }
            elseif ($ptft == 2) {
                $internTypes = $internTypes->where('part_full_time', 'like', '%Full-time%');
            }

            $internTypes = $internTypes->get();

            $degree_p = [];
            $skill_s = [];

            foreach($internTypes as $intern){
                $requiredSkills = explode(',', $intern->required_skills);
                $degreesPreferred = explode(',', $intern->degrees_preferred);

                if (array_intersect($skills, $requiredSkills)) {
                    $skill_s[] = $intern->internship_id;
                }

                if (array_intersect($degree, $degreesPreferred)) {
                    $degree_p[] = $intern->internship_id;
                }

            }
            // dd($skill_s,$degree_p);

            $mat = array_unique(array_merge($skill_s, $degree_p));

            $query = DB::table('internship_post')->whereIn('internship_id',$mat);
                if ($title) {
                    $query->where('internship_title', 'like', '%' . $title . '%');
                }

                if ($location) {
                    $query->where('district', 'like', '%' . $location . '%');
                }

                if ($stipend) {
                    $query->where('stipend',$stipend);
                }

                if ($duration) {
                    $query->where('duration', '=', $duration);
                }
            }
            else{
                $query = DB::table('internship_post')
                    ->where('status', 1)
                    ->where('application_deadline', '>', now());

                if ($title) {
                    $query->where('internship_title', 'like', '%' . $title . '%');
                }

                if ($location) {
                    $query->where('district', 'like', '%' . $location . '%');
                }

                if ($stipend) {
                    $query->where('stipend',$stipend);
                }

                if ($duration) {
                    $query->where('duration', '=', $duration);
                }
            }

        $int = $query->orderBy('created_at', 'desc')->paginate(10);
        if($int->isEmpty()) {
            $r = 1;
        }
        else{
            $r = 0;
        }
        // Append filter parameters to pagination links
        $int->appends($request->all());


        return view('guest.internship_list', ['int' => $int,'NR'=>$r])->render();
    }
    public function internship_search(Request $request) {
        $title = $request->input('title');
        $ptft = $request->input('ptft');

        if(session('user_id')){
            $user = DB::table('student')
                    ->select('degree', 'skills')
                    ->where('student.student_id', session('user_id'))
                    ->first();

            $degree = explode(',', $user->degree);
            $skills = explode(',', $user->skills);

            $internTypes = DB::table('internship_post')->where('status', 1)
                ->where('application_deadline', '>=', now());
            // dd($internTypes);

            if ($ptft == 1) {
                $internTypes = $internTypes->where('part_full_time', 'like', '%Part-time%');
            }
            elseif ($ptft == 2) {
                $internTypes = $internTypes->where('part_full_time', 'like', '%Full-time%');
            }

            $internTypes = $internTypes->get();
            $degree_p = [];
            $skill_s = [];

            foreach($internTypes as $intern){
                $requiredSkills = explode(',', $intern->required_skills);
                $degreesPreferred = explode(',', $intern->degrees_preferred);

                if (array_intersect($skills, $requiredSkills)) {
                    $skill_s[] = $intern->internship_id;
                }

                if (array_intersect($degree, $degreesPreferred)) {
                    $degree_p[] = $intern->internship_id;
                }

            }
            // dd($skill_s,$degree_p);

            $mat = array_unique(array_merge($skill_s, $degree_p));

            $int = DB::table('internship_post')->whereIn('internship_id',$mat)
                ->where(function ($query) use ($title) {
                    $query->where('internship_title', 'like', '%' . $title . '%')
                        ->orWhere('district', 'like', '%' . $title . '%')
                        ->orWhere('state', 'like', '%' . $title . '%')
                        ->orWhere('required_skills', 'like', '%' . $title . '%')
                        ->orWhere('company_name', 'like', '%' . $title . '%');
                })
                ->orderby('created_at','desc')
                ->paginate(15);
        }
        else{
            $int = DB::table('internship_post')
            ->where('status', 1)
            ->where('application_deadline', '>', now())
            ->where(function ($query) use ($title) {
                $query->where('internship_title', 'like', '%' . $title . '%')
                    ->orWhere('district', 'like', '%' . $title . '%')
                    ->orWhere('state', 'like', '%' . $title . '%')
                    ->orWhere('required_skills', 'like', '%' . $title . '%')
                    ->orWhere('company_name', 'like', '%' . $title . '%');
            })
            ->orderby('created_at','desc')
            ->paginate(15);
        }

        if($int->isEmpty()) {
            $r = 1;
        }
        else{
            $r = 0;
        }

        // Pass the results to your view
        return view('guest.internship_list', ['int' => $int,"NR"=>$r])->render();

    }
    //Internships functions end
}
