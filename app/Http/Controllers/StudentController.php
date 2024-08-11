<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\SampleMail;
use App\Mail\ApplicationMail;
use App\Mail\EmployerMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use App\Mail\RegisterCandidate;
use App\Mail\PasswordChangedMail;


class StudentController extends Controller
{

    protected function getFutureInternshipMeetings()
    {

        $futureMeetingsInternship = DB::select("
        SELECT
            application.application_id,
            application.zoom_meeting,
            application.zoom_time,
            internship_post.internship_title as title_,
            student.full_name
        FROM
            application
        JOIN
            internship_post ON application.internship_id = internship_post.internship_id
        JOIN
            student ON application.student_id = student.student_id
        WHERE
            student.student_id = :user_id
            AND application.zoom_meeting IS NOT NULL
            AND application.zoom_time > NOW()
        ORDER BY
            application.zoom_time ",
        ['user_id' => session('user_id')]
    );

    $futureMeetingsJob = DB::select("
        SELECT
            application.application_id,
            application.zoom_meeting,
            application.zoom_time,
            job_post.job_title as title_,
            student.full_name
        FROM
            application
        JOIN
            job_post ON application.job_id = job_post.job_id
        JOIN
            student ON application.student_id = student.student_id
        WHERE
            student.student_id = :user_id
            AND application.zoom_meeting IS NOT NULL
            AND application.zoom_time > NOW()
        ORDER BY
            application.zoom_time",
            ['user_id' => session('user_id')] );

    $futureMeetings = array_merge($futureMeetingsInternship, $futureMeetingsJob);

        return $futureMeetings;
    }
    public function full_details()
    {
        if (session('user_id')) {
            $user = DB::table('student')
                ->select('*')  // Replace this line with the correct array of column names if needed
                ->where('student_id', '=', session('user_id'))
                ->first();

            $degree = DB::select("SELECT degree_type FROM degrees group by degree_type;");
            $skill = DB::table('skills')->get();
            return view('internships/registerform', ["skills"=>$skill,"degree" => $degree, "user" => $user]);
        }
        return redirect('/');
    }

    public function view(Request $request){
         // Check if 'otherarea_of_interest' is provided
        //  dd($request->all());
        $others = $request->filled('otherarea_of_interest') ? $request->input('otherarea_of_interest') : null;


        // Handle file upload
        $file = $request->file('resume');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $destination = public_path('resumes');

        // Ensure the 'resumes' directory exists
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }
        $file->move($destination, $filename);
        $filepath = $filename;

        // $request->validate([
        //     'firstname' => 'required|string|max:80',
        //     'lastname' => 'required|string|max:80',
        //     'contact_no' => 'required|integer|max:10',
        //     'dob' => 'required|date',
        //     'age' => 'required|integer',
        //     'gender' => ['required', Rule::in(['male', 'female', 'not willing to reveal'])],
        //     'door_no'=>'required|string|max:100',
        //     'street_name'=>'required|string|max:100',
        //     'locality'=>'required|string|max:100',
        //     'city'=>'required|string|max:100',
        //     'district'=>'required|string|max:100',
        //     'state'=>'required|string|max:100',
        //     'country'=>'required|string|max:100',
        //     'pincode'=> 'required|integer|max:6',
        //     'qualification'=>'required|string|max:100',
        //     'experience'=>'required|string|max:100',
        //     'degree'=>'required|string|max:150',
        //     'major_subject'=> 'required|string|max:150',
        //     'graduating_year'=> 'required|string|max:100',
        //     'passed_out_year'=> 'required|integer',
        //     'college_name'=> 'required|string|max:200',
        //     'area_of_interest'=> 'nullable|string|max:100',
        //     'college_state'=> 'required|string|max:100',
        //     'college_district'=>'required|string|max:100',
        //     // Add more validation rules for other fields as needed
        //     'resume' => 'nullable|file|mimes:pdf|max:2048'
        // ]);


        $userid = [
            'first_name'=> $request->input('firstname'),
            'last_name'=>$request->input('lastname'),
            'phone'=> $request->input('contact_no'),
            'dob'=> $request->input('dob'),
            'age'=> $request->input('age'),
            'gender'=>$request->input('gender'),
            'door_no'=>$request->input('address'),
            'street_name'=>$request->input('street'),
            'locality'=>$request->input('vt'),
            'city'=>$request->input('district'),
            'district'=>$request->input('district'),
            'state'=>$request->input('state'),
            'country'=>$request->input('country'),
            'pincode'=> $request->input('pincode'),
            // 'qualification'=>$request->input('qualification'),
            'experience'=>$request->input('experience'),
            'ctc'=>$request->input('previousCTC'),
            'degree'=>implode(',', $request->input('degrees')),
            'other_degree'=> $request->input('otherDegree'),
            // 'major_subject'=> $request->input('major_subject'),
            'graduating_year'=> $request->input('graduation'),
            'passed_out_year'=> $request->input('year'),
            'college_name'=> $request->input('college_name'),
            'area_of_interest'=> implode(',', $request->input('area_of_interest')),
            'others' => $others,
            'skills' =>  implode(',', $request->input('skills')),
            'other_skills'  =>  $request->input('other_skills'),
            'college_state'=> $request->input('college_state'),
            'college_district'=>$request->input('college_district'),
            'resume'=> $filepath,
            'registered'=>1,
            'updated_at'=> now(),
        ];
        // return $userid;
        DB::table('student')->where('student_id', session('user_id'))->update($userid);
        return redirect('/candidate/')->with('Success', 'Your details has been saved!');
    }



    public function new_user(Request $request){
        $validator = Validator::make($request->all(), [
            'register_as' =>'required',
            'Email' => 'required|email:rfc,dns',
            'fullName' => 'required|string|min:2|max:40',
            'passWord' => 'required|string|min:8|max:30',
            'CpassWord' => 'required|string|min:8|max:30|same:passWord',
            'number' => 'nullable|numeric|digits:10'
        ]);


        if ($validator->fails()) {
            return back()
                ->withErrors($validator->errors())
                ->withInput();
        }

// dd($request->all());
        $emailResult = DB::table('student')
        ->where('email', '=', $request->input('Email'))
        ->first();

    $email = DB::table('employer')
        ->select('email')
        ->where('email', '=', $request->input('Email'))
        ->first();

        if($request->input('register_as') == 2){
            if ($emailResult) {
                if($emailResult->payment_status == null){
                    DB::table('student')->where('email',$request->input('Email'))->delete();
                    $token = bin2hex(Str::random(16));
                    $email = $request->input('Email');
                    $new_user= [];
                    $new_user['name'] = $request->input('fullName');
                    $new_user['email'] = $request->input('Email');
                    $new_user['token'] = $token;

                    $userid = [
                        'full_name'=> $request->input('fullName'),
                        'email' =>$request->input('Email'),
                        'password'=>bcrypt($request->input('passWord')),
                        'phone'=> $request->input('number'),
                        'token' => $token,
                        'token_date' => now()->toDateString(),
                        'verification' => 0,
                        'admin_verify' => 0,
                        'registered' => 0,
                        'email_received' => 0,
                        'created_at'=>now(),
                    ];
                    DB::table('employer')->insert($userid );
                    Mail::to($email)->send(new SampleMail($new_user));
                    return redirect('/login_register')->with('Success', 'Confirmation mail has been sent!');

                }
                return redirect('/login_register')->with(['error' => 'Entered mail Id has already exists as Intern']);
            }
        }


        if ($emailResult) {
            if($emailResult->payment_status == null){
                return redirect('/login_register')->with(['error' => 'Entered mail Id already exists']);
            }
            return redirect('/login_register')->with(['error' => 'Entered mail Id has already exists as Candidate']);
        }
        elseif ($email) {
            return redirect('/login_register')->with(['error' => 'Entered mail Id has already exists as Employer']);
        }


        $token = bin2hex(Str::random(16));
        $email = $request->input('Email');
        $new_user= [];
        $new_user['name'] = $request->input('fullName');
        $new_user['email'] = $request->input('Email');
        $new_user['token'] = $token;

        $userid = [
            'full_name'=> $request->input('fullName'),
            'email' =>$request->input('Email'),
            'password'=>bcrypt($request->input('passWord')),
            'phone'=> $request->input('number'),
            'token' => $token,
            'token_date' => now()->toDateString(),
            'verification' => 0,
            'admin_verify' => 0,
            'registered' => 0,
            'email_received' => 0,
            'created_at'=>now(),
        ];
        if($request->input('register_as') == 1){
        $id = DB::table('student')->insertGetId($userid);
        return redirect('/payment'); 
    } else {
        DB::table('employer')->insert($userid);
        Mail::to($email)->send(new SampleMail($new_user));
    }

    return redirect('/login_register')->with('Success', 'Confirmation mail has been sent!');
    }



    public function job_application_details($input){
        if(!session('user_id')){
            return redirect('login_register')->with('error','Please log in to view more details');}
        $user = DB::table('student')->select('*')->where('student_id', session('user_id'))->first();

        if($user->registered == 1){
            $com = DB::table('job_post')->where('job_id', $input)->first();

            $app = DB::table('application')
                    ->where('student_id', session('user_id'))
                    ->where('job_id', $input)
                    ->where('status',0)
                    ->first();

            $applied = DB::table('application')
                    ->where('student_id', session('user_id'))
                    ->where('job_id', $input)
                    ->where('status',1)
                    ->first();

            if($app){
                return redirect()->back()->with('error','Your application for the job is already pending');
            }
            elseif($applied){
                return redirect()->back()->with('Success','Your application for the job is already approved');
            }




            $email=$user->email;
            $name =$user->full_name;
            $com_name= $com->company_name;
            $quiz_id = $com->quiz_id ?? null;
            // $file = $request->file('resume');
            // $filename = date('y-m-d').time().".".$file->getClientOriginalName();
            // $destination = public_path('job_resume');
            // $file->move($destination,$filename);
            // $filepath=$filename;
            $userid = [
                'student_id' => session('user_id'),
                'quiz_id' => $quiz_id,
                'job_id' => $input,
                'company_name'=> $com_name,
                'type' => "Job",
                'status' => "0"
            ];
            // $user=[
            //     // 'title'=> $request->input('internship_title'),
            //     'first_name'=> $request->input('firstname'),
            //     'last_name'=>$request->input('lastname'),
            //     'email' =>$request->input('email'),
            //     // 'password'=>bcrypt($request->input('password')),
            //     'phone'=> $request->input('contact_no'),
            //     'dob'=> $request->input('dob'),
            //     'age'=> $request->input('age'),
            //     'gender'=>$request->input('gender'),
            //     'qualification'=>$request->input('qualification'),
            //     'degree'=>$request->input('degree'),
            //     'major_subject'=> $request->input('major_subject'),
            //     'graduating_year'=> $request->input('graduation'),
            //     'passed_out_year'=> $request->input('year'),
            //     'resume'=> $filepath,
            //     'updated_at'=> now(),
            // ];
            $details = [];
            $details['company']= $com_name;
            $details['name']= $name;
            $details['type']= 1;
            // return $com_name;
            // // DB::table('student')->update($user);
            DB::table('application')->insert($userid);
            Mail::to($email)->send(new ApplicationMail($details));
            DB::table('student')->where('student_id', session('user_id'))->increment('email_received');
            return redirect()->back()->with('Success', 'Job application has been successfully
            submitted');
        }
        else{
            return redirect('student_register')->with('error', 'You need to register your details first!');
        }

    }


    public function internship_application_details($id){
        if(!session('user_id')){
            return redirect('login_register')->with('error','Please log in to view more details');}
        $user= DB::table('student')->select('*')->where('student_id', session('user_id'))->first();
        if($user->registered == 1){
            $com = DB::table('internship_post')->where('internship_id', $id)->first();

            $app = DB::table('application')
                    ->where('student_id', session('user_id'))
                    ->where('internship_id', $id)
                    ->where('status',0)
                    ->first();

            $applied = DB::table('application')
                    ->where('student_id', session('user_id'))
                    ->where('internship_id', $id)
                    ->where('status',1)
                    ->first();

            if($app){
                return redirect()->back()->with('error','Your application for the internship is already pending');
            }
            elseif($applied){
                return redirect()->back()->with('Success','Your application for the internship is already approved');
            }

            $email=$user->email;
            $name =$user->full_name;
            $com_name= $com->company_name;
            $quiz_id = $com->quiz_id ?? null;
            // $file = $request->file('resume');
            // $filename = date('y-m-d').time().".".$file->getClientOriginalName();
            // $destination = public_path('intern_resume');
            // $file->move($destination,$filename);
            // $filepath=$filename;

            $userid = [
                'student_id' => session('user_id'),
                'quiz_id' => $quiz_id,
                'internship_id' => $id,
                'company_name'=>$com_name,
                'type' => "Intern",
                'status' => "0"
            ];
            // $user=[
            //     // 'title'=> $request->input('internship_title'),
            //     'first_name'=> $request->input('firstname'),
            //     'last_name'=>$request->input('lastname'),
            //     'email' =>$request->input('email'),
            //     // 'password'=>bcrypt($request->input('password')),
            //     'phone'=> $request->input('contact_no'),
            //     'dob'=> $request->input('dob'),
            //     'age'=> $request->input('age'),
            //     'gender'=>$request->input('gender'),
            //     'qualification'=>$request->input('qualification'),
            //     'degree'=>$request->input('degree'),
            //     'major_subject'=> $request->input('major_subject'),
            //     'graduating_year'=> $request->input('graduation'),
            //     'passed_out_year'=> $request->input('year'),
            //     'resume'=> $filepath,
            //     'updated_at'=> now(),
            // ];
            $details = [];
            $details['company']= $com_name;
            $details['name']= $name;
            $details['type']= 2;
            // DB::table('student')->where('student_id', session('user_id'))->update($user);
            DB::table('application')->insert($userid);
            Mail::to($email)->send(new ApplicationMail($details));
            DB::table('student')->where('student_id', session('user_id'))->increment('email_received');

            return redirect('/candidate/')->with('Success', 'Internship application has been successfully
            submitted');
        }
        else{
            return redirect('student_register')->with('error', 'You need to register your details first!');
        }
    }


    public function dashboard(){
        if (session('user_id')) {
            $user = DB::table('student')->where('student_id', session('user_id'))->first();

            if($user->registered == 1){

                // $int = DB::table('application')->where('student_id', session('user_id'))->where('type',"Intern")->count();
                // $job = DB::table('application')->where('student_id', session('user_id'))->where('type',"Job")->count();

                // $app = DB::table('application')->where('student_id', session('user_id'))->where('type',"Intern")->where('status', '1')->count();
                // $appj = DB::table('application')->where('student_id', session('user_id'))->where('type',"Job")->where('status', '1')->count();

                // $app1 = DB::table('application')->where('student_id', session('user_id'))->where('type',"Intern")->where('status', '2')->count();
                // $appj2 = DB::table('application')->where('student_id', session('user_id'))->where('type',"Job")->where('status', '2')->count();

                // $total = $int + $job;
                // $approved = $app + $appj;
                // $reject = $app1 + $appj2;
                $int = DB::table('application')
                    ->where('student_id', session('user_id'))
                    ->where('type', 'Intern')
                    ->select(DB::raw('SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as approved_count'),
                            DB::raw('SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as rejected_count'),
                                DB::raw('SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) as null_status_count'))
                    ->first();

                $job = DB::table('application')
                    ->where('student_id', session('user_id'))
                    ->where('type', 'Job')
                    ->select(DB::raw('SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as approved_count'),
                            DB::raw('SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as rejected_count'),
                            DB::raw('SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) as null_status_count'))
                    ->first();
                    // dd($int,$job);
                // $total = $int->approved_count + $int->rejected_count + $job->approved_count + $job->rejected_count;
                $approved = $int->approved_count + $job->approved_count;
                $reject = $int->rejected_count + $job->rejected_count;
                $total = $approved + $reject + $int->null_status_count + $job->null_status_count;


                $futureMeetings = $this->getFutureInternshipMeetings();

                $test = DB::table('tests')
                    ->where('student_id', session('user_id'))
                    ->where('status', null)
                    ->whereRaw('now() < conducting_datetime')
                    ->get();
                $mess_c = DB::table('messages')
                    ->where('student_id', session('user_id'))
                    ->where('read',0)
                    ->count();

                    // dd($futureMeetings);
                return view('student_.index', [
                    "user" => $user,
                    "total" => $total,
                    "approved" => $approved,
                    "reject" => $reject,
                    "futureMeetings" =>$futureMeetings,
                    "test"=>$test,
                    "mess_c"=>$mess_c
                ]);
            }
            return redirect('student_register')->with('error','You need to register first');

        }

        return redirect('/');
    }

    public function test_schedules(){
        $user = DB::table('tests')->where('student_id', session('user_id'))->where('status',null)->get();
         // dd($user);
         $userr = DB::table('student')
                 ->select('*')  // Replace this line with the correct array of column names if needed
                 ->where('student_id', session('user_id'))
                 ->first();

                 $studentId = session('user_id');

                 $applications = DB::table('application')
                     ->select(
                         'application.application_id',
                         'application.status',
                         'application.quiz_id',
                         'student.full_name', 'application.zoom_meeting', 'application.zoom_time',
                         'application.test_status',
                     'application.test_qualified',
                     'application.zoom_meeting',
                     'application.zoom_time',
                     'tests.percentage',
                     'tests.status as testsss_status',
                     'tests.conducting_datetime',
                         DB::raw('COALESCE(internship_post.internship_title, job_post.job_title) AS post_title'),
                         DB::raw("CASE
                                       WHEN application.internship_id IS NOT NULL THEN 'Internship'
                                       WHEN application.job_id IS NOT NULL THEN 'Job'
                                       ELSE 'Unknown Type'
                                   END AS post_type")
                     )
                     ->join('student', 'application.student_id', '=', 'student.student_id')
                     ->leftJoin('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
                     ->leftJoin('job_post', 'application.job_id', '=', 'job_post.job_id')
                     ->leftJoin('tests', 'application.application_id', '=', 'tests.application_id')
                     ->where('application.student_id', $studentId)
                    ->whereIn('application.status', [1, 2])
                     ->orderBy('application.created_at', 'desc') // Order by created_at in descending order
                     ->paginate(10);

                 // return $applications;
                 $futureMeetings = $this->getFutureInternshipMeetings();
             $test = DB::table('tests')
 ->where('student_id', session('user_id'))
 ->where('status', null)
 ->whereRaw('now() < conducting_datetime + INTERVAL 1 HOUR')
 ->get();
 $mess_c = DB::table('messages')
 ->where('student_id', session('user_id'))
 ->where('read',0)
 ->count();

         return view('student_.test_schedule', [
            "userr"=>$userr,
            "applications" => $applications,
            "futureMeetings" =>$futureMeetings,
            "test"=>$test,
            "mess_c"=>$mess_c
        ]);
     }
     public function application_status(){
        // dd($user);
       $userr = DB::table('student')
               ->select('*')  // Replace this line with the correct array of column names if needed
               ->where('student_id', session('user_id'))
               ->first();

       $studentId = session('user_id');

       $applications = DB::table('application')
                   ->select(
                       'application.application_id',
                       'application.status',
                       'application.quiz_id',
                       'student.full_name', 'application.zoom_meeting', 'application.zoom_time',
                       'application.test_status',
                       DB::raw('COALESCE(internship_post.internship_title, job_post.job_title) AS post_title'),
                       DB::raw("CASE
                                   WHEN application.internship_id IS NOT NULL THEN 'Internship'
                                   WHEN application.job_id IS NOT NULL THEN 'Job'
                                   ELSE 'Unknown Type'
                                   END AS post_type")
                       )
                       ->join('student', 'application.student_id', '=', 'student.student_id')
                       ->leftJoin('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
                       ->leftJoin('job_post', 'application.job_id', '=', 'job_post.job_id')
                       ->where('application.student_id', $studentId)
                       ->orderBy('application.created_at', 'desc') // Order by created_at in descending order
                       ->paginate(10);

                // return $applications;
       $futureMeetings = $this->getFutureInternshipMeetings();
                       $mess_c = DB::table('messages')
                       ->where('student_id', session('user_id'))
                       ->where('read',0)
                       ->count();
       $test = DB::table('tests')
                       ->where('student_id', session('user_id'))
                       ->where('status', null)
                       ->whereRaw('now() < conducting_datetime + INTERVAL 1 HOUR')
                       ->get();
       return view('student_.application_status', [
           "userr"=>$userr,
           "applications" => $applications,
           "futureMeetings" =>$futureMeetings,
           "test"=>$test,
           "mess_c"=>$mess_c
       ]);
   }
    public function application_profile($id){
        if(session('user_id')){
            $ap= DB::table('application')->where('application_id',$id)->first();
            if($ap->type == "Intern"){
                // return 1;
                if($ap->test_status == null){
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
                    'application.offer_issue_date',
                    'application.joining_date',
                    'internship_post.quiz_id as quid_ID',
                    'student.full_name as student_name',
                    'student.resume as resume',
                    'student.phone as student_phone',
                    'student.email as student_email',
                    'internship_post.internship_title as title_',
                    // 'tests.percentage',
                    // 'tests.conducting_datetime'
                )
                ->leftJoin('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
                ->join('student', 'application.student_id', '=', 'student.student_id')
                // ->join('tests', 'application.application_id', '=', 'tests.application_id')
                ->where('application.student_id', session('user_id'))
                ->where('application.application_id',$id)
                ->first();
                }
                else{
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
                    'application.offer_issue_date',
                        'application.joining_date',
                    'internship_post.quiz_id as quid_ID',
                    'student.full_name as student_name',
                    'student.resume as resume',
                    'student.phone as student_phone',
                    'student.email as student_email',
                    'internship_post.internship_title as title_',
                    'tests.percentage',
                    'tests.status as testsss_status',
                    'tests.conducting_datetime'
                )
                ->leftJoin('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
                ->join('student', 'application.student_id', '=', 'student.student_id')
                ->leftJoin('tests', 'application.application_id', '=', 'tests.application_id')
                ->where('application.student_id', session('user_id'))
                ->where('application.application_id',$id)
                ->first();
                }
            }
            elseif($ap->type == "Job"){
                // return 2;
                if($ap->test_status == null){
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
                    'application.offer_issue_date',
                        'application.joining_date',
                    'job_post.quiz_id as quid_ID',
                    'student.full_name as student_name',
                    'student.resume as resume',
                    'student.phone as student_phone',
                    'student.email as student_email',
                    'job_post.job_title as title_',
                    // 'tests.percentage',
                    // 'tests.conducting_datetime'
                )
                ->leftJoin('job_post', 'application.job_id', '=', 'job_post.job_id')
                ->join('student', 'application.student_id', '=', 'student.student_id')
                // ->join('tests', 'application.application_id', '=', 'tests.application_id')
                ->where('application.student_id', session('user_id'))
                ->where('application.application_id',$id)
                ->first();
                }
                else{
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
                    'application.offer_issue_date',
                    'application.joining_date',
                    'job_post.quiz_id as quid_ID',
                    'student.full_name as student_name',
                    'student.resume as resume',
                    'student.phone as student_phone',
                    'student.email as student_email',
                    'job_post.job_title as title_',
                    'tests.percentage',
                    'tests.status as testsss_status',
                    'tests.conducting_datetime'
                )
                ->leftJoin('job_post', 'application.job_id', '=', 'job_post.job_id')
                ->join('student', 'application.student_id', '=', 'student.student_id')
                ->leftJoin('tests', 'application.application_id', '=', 'tests.application_id')
                ->where('application.student_id', session('user_id'))
                ->where('application.application_id',$id)
                ->first();
                }
            }


            $futureMeetings = $this->getFutureInternshipMeetings();
            // $test = DB::table('tests')
            //     ->where('student_id', session('user_id'))
            //     ->where('status', null)
            //     ->get();
                $test = DB::table('tests')
                ->where('student_id', session('user_id'))
                ->where('status', null)
                ->whereRaw('now() < conducting_datetime')
                ->get();
                $mess_c = DB::table('messages')
                ->where('student_id', session('user_id'))
                ->where('read',0)
                ->count();
                // session(['redirected_to_application' => true]);

                // dd($applications);
                // if ($applications->offer_issue_date && session('redirected_to_application')) {
                //     // Reset the session variable before redirection
                //     session(['redirected_to_application' => false]);

                //     return redirect('candidate/congrats');
                // }
            return view('student_.view_application',[
                "user"=>$applications,
                "futureMeetings" =>$futureMeetings,
            "test"=>$test,
            "mess_c"=>$mess_c
            ]);
        }
       return redirect('/');
    }




    public function profile(){
        if (session('user_id')) {
            $user = DB::table('student')->where('student_id', session('user_id'))->first();

            // $int = DB::table('application')->where('student_id', session('user_id'))->where('type',"Intern")->count();
            // $job = DB::table('application')->where('student_id', session('user_id'))->where('type',"Job")->count();

            // $app = DB::table('application')->where('student_id', session('user_id'))->where('type',"Intern")->where('status', '1')->count();
            // $appj = DB::table('application')->where('student_id', session('user_id'))->where('type',"Job")->where('status', '1')->count();

            // $app1 = DB::table('application')->where('student_id', session('user_id'))->where('type',"Intern")->where('status', '0')->count();
            // $appj2 = DB::table('application')->where('student_id', session('user_id'))->where('type',"Job")->where('status', '0')->count();

            // $total = $int + $job;
            // $approved = $app + $appj;
            // $reject = $app1 + $appj2;

            // $applications = DB::table('application')
            // ->where('student_id', '=', session('user_id'))
            // ->orderByDesc('application_id')
            // ->limit(5)
            // ->get();

        // $resultArray = [];

        // foreach ($applications as $a) {
        //     if ($a->type == "Intern") {
        //         $i = $a->internship_id;
        //         $int = DB::table('internship_post')->where('internship_id', '=', $i)->first();
        //         // Use ->first() to get a single result as an object

        //         $resultArray[] = [
        //             'company_name' => $int->company_name,
        //             'internship_title' => $int->internship_title,
        //             'date' => \Carbon\Carbon::parse($a->created_at)->format('d-m-y'),
        //             'status' => $a->status

        //         ];
        //     } else {
        //         $ii = $a->job_id;
        //         $intt = DB::table('job_post')->where('job_id', '=', $ii)->first();

        //         $resultArray[] = [
        //             'company_name' => $intt->company_name,
        //             'internship_title' => $intt->job_title,
        //             'date' => \Carbon\Carbon::parse($a->created_at)->format('d-m-y'),
        //             'status' => $a->status
        //         ];
        //     }
        // }

        // $int_post =  DB::table('internship_post')
        // ->orderBy('internship_id', 'desc')
        // ->limit(3)
        // ->get();
        // $job_post = DB::table('job_post')
        // ->orderBy('job_id', 'desc')
        // ->limit(3)
        // ->get();



        // return $resultArray;

            return view('student_.my_profile', [
                "user" => $user,
                // "total" => $total,
                // "approved" => $approved,
                // "reject" => $reject,
                // "resultArray" => $resultArray,
                // "int_post" => $int_post,
                // "job_post" => $job_post
            ]);

        }

        return redirect('/');
    }





































    public function total_applied(){
        if (session('user_id')) {
            $total_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->count();
            $total_job = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->select('application.student_id', 'application.*', 'job_post.job_title','job_post.city',
            'job_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->count();
            $app_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->paginate(6);
            $app_job = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->select('application.student_id', 'application.*', 'job_post.job_title','job_post.city',
            'job_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->paginate(6);

            // $total_int = count($app_int);
            // $total_job = count($app_job);
            // dd($app_job);
            return view('student_.total_app',[
                "total_job"=> $total_job,
                "total_int"=> $total_int,
                "app_job"=> $app_job,
                "app_int"=> $app_int,
            ]);
        }

        return redirect('/');
    }

    public function approved_app(){
        if (session('user_id')) {
            $total_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '1')
            ->count();
            $total_job = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->select('application.student_id', 'application.*', 'job_post.job_title','job_post.city',
            'job_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '1')
            ->count();
            $app_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '1')
            ->paginate(6);
            $app_job = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->select('application.student_id', 'application.*', 'job_post.job_title','job_post.city',
            'job_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '1')
            ->paginate(6);

            // $total_int = count($app_int);
            // $total_job = count($app_job);
            // dd($application);
            return view('student_.approved_app',[
                "total_job"=> $total_job,
                "total_int"=> $total_int,
                "app_job"=> $app_job,
                "app_int"=> $app_int,
            ]);
        }

        return redirect('/');
    }

    public function rejected_app(){
        if (session('user_id')) {
            $total_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '2')
            ->count();
            $total_job = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->select('application.student_id', 'application.*', 'job_post.job_title','job_post.city',
            'job_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '2')
            ->count();
            $app_int = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->select('application.student_id', 'application.*', 'internship_post.internship_title', 'internship_post.district', 'internship_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '2')
            ->paginate(6);
            $app_job = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->select('application.student_id', 'application.*', 'job_post.job_title','job_post.city',
            'job_post.required_skills')
            ->where('application.student_id', '=', session('user_id'))
            ->where('application.status', '2')
            ->paginate(6);

            // $total_int = count($app_int);
            // $total_job = count($app_job);
            // dd($application);
            return view('student_.rejected_app',[
                "total_job"=> $total_job,
                "total_int"=> $total_int,
                "app_job"=> $app_job,
                "app_int"=> $app_int,
            ]);
        }

        return redirect('/');
    }



    public function applied_internships(){
        if (session('user_id')) {
            $internships = DB::table('intern_apply')->select('*')->where('student_id', session('user_id'))->get();

            // Initialize an empty array to store internship details

        // return dd($internships);
            // Pass the internship details to the view
            return view('Student1/stu_intern_app', ['internships' => $internships]);

        }

        return redirect('/');
    }




    public function messages(){
        if(session('user_id')){

            $user = DB::table('student')
                    ->select('*')  // Replace this line with the correct array of column names if needed
                    ->where('student_id', session('user_id'))
                    ->first();
            $messages = DB::table('messages')
                    ->where('student_id', session('user_id'))
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);


                    $futureMeetingsInternship = DB::select("
                    SELECT
                        application.application_id,
                        application.zoom_meeting,
                        application.zoom_time,
                        internship_post.internship_title as title_,
                        student.full_name
                    FROM
                        application
                    JOIN
                        internship_post ON application.internship_id = internship_post.internship_id
                    JOIN
                        student ON application.student_id = student.student_id
                    WHERE
                        student.student_id = :user_id
                        AND application.zoom_meeting IS NOT NULL
                        AND application.zoom_time > NOW()
                    ORDER BY
                        application.zoom_time ",
                    ['user_id' => session('user_id')]
                );

                $futureMeetingsJob = DB::select("
                    SELECT
                        application.application_id,
                        application.zoom_meeting,
                        application.zoom_time,
                        job_post.job_title as title_,
                        student.full_name
                    FROM
                        application
                    JOIN
                        job_post ON application.job_id = job_post.job_id
                    JOIN
                        student ON application.student_id = student.student_id
                    WHERE
                        student.student_id = :user_id
                        AND application.zoom_meeting IS NOT NULL
                        AND application.zoom_time > NOW()
                    ORDER BY
                        application.zoom_time",
                        ['user_id' => session('user_id')] );

                $futureMeetings = array_merge($futureMeetingsInternship, $futureMeetingsJob);

                $test = DB::table('tests')
    ->where('student_id', session('user_id'))
    ->where('status', null)
    ->whereRaw('now() < conducting_datetime')
    ->get();
    $mess_c = DB::table('messages')
    ->where('student_id', session('user_id'))
    ->where('read',0)
    ->count();

            return view('student_.messages', [
                "user"=>$user,
                "messages"=>$messages,
                "futureMeetings" =>$futureMeetings,
               "test"=>$test,
               "mess_c"=>$mess_c
            ]);
        }
        return redirect('/');

    }




    public function edit_profile()
    {
        if (session('user_id')) {
            $user = DB::table('student')
                ->select('*')  // Replace this line with the correct array of column names if needed
                ->where('student_id', session('user_id'))
                ->first();

            // $degree = DB::select("SELECT degree_type FROM intern.degrees group by degree_type;");
            $skills = DB::table('skills')->get();
            return view('student_.edit_profile', ["skills"=>$skills,"user" => $user]);
        }

        return redirect('/');
    }


public function update_profile(Request $request)
{
    // $request->validate([
    //     'first_name' => 'required|string|max:255',
    //     'last_name' => 'required|string|max:255',
    //     'phone' => 'required|string|max:20',
    //     'dob' => 'required|date',
    //     'age' => 'required|integer',
    //     'gender' => ['required', Rule::in(['male', 'female', 'other'])],
    //     'door_no' => 'nullable|string|max:255',
    //     'street_name' => 'nullable|string|max:255',
    //     'locality' => 'nullable|string|max:255',
    //     'district' => 'nullable|string|max:255',
    //     'state' => 'nullable|string|max:255',
    //     'country' => 'nullable|string|max:255',
    //     'pincode' => 'nullable|string|max:20',
    //     // 'qualification' => 'nullable|string|max:255',
    //     'degree' => 'nullable|string|max:255',
    //     // 'major_subject' => 'nullable|string|max:255',
    //     'year' => 'nullable|integer',
    //     'resume' => 'nullable|file|mimes:pdf|max:2048',
    // ]);

    $FILEname = $request->input('oresume');

    // Concatenate folder and filename
    $FILEPath = public_path('resumes/' . $FILEname);

    // Check if the file exists


    if ($request->hasFile('resume')) {
        if (File::exists($FILEPath)) {
            File::delete($FILEPath);
        }
        $file = $request->file('resume');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $destination = public_path('resumes');

        // Ensure the 'resumes' directory exists
        if (!File::exists($destination)) {

            File::makeDirectory($destination, 0755, true);
        }

        $file->move($destination, $filename);
        $filepath = $filename;
    } else {
        // If no new file is uploaded, use the existing file path
        $filepath = $request->input('oresume');
    }

    $userid = [
        'first_name'=> $request->input('firstname'),
            'last_name'=>$request->input('lastname'),
            'phone'=> $request->input('contact_no'),
            'dob'=> $request->input('dob'),
            'age'=> $request->input('age'),
            'gender'=>$request->input('gender'),
            'door_no'=>$request->input('door_no'),
            'street_name'=>$request->input('street'),
            'locality'=>$request->input('vt'),
            'city'=>$request->input('district'),
            'district'=>$request->input('district'),
            'state'=>$request->input('state'),
            'country'=>$request->input('country'),
            'pincode'=> $request->input('pincode'),
            'experience'=>$request->input('experience'),
            'ctc'=>$request->input('previousCTC'),
            'degree'=>implode(',', $request->input('degrees')),
            'other_degree'=>$request->input('otherDegree'),
            // 'graduating_year'=> $request->input('graduation'),
            'passed_out_year'=> $request->input('passed_out_year'),
            'area_of_interest'=> implode(',', $request->input('area_of_interest')),
            'others' => $request->input('otherarea_of_interest'),
            'skills'=> implode(',', $request->input('skills')),
            'other_skills' => $request->input('otherskills'),
            'resume'=> $filepath,
            'updated_at'=> now(),
    ];

    DB::table('student')->where('student_id', session('user_id'))->update($userid);

    return redirect('/candidate/profile')->with('Success', 'Your details have been updated successfully!');
}


    public function change_password()
    {
        if (session('user_id')) {
            $user = DB::table('student')
            ->select('*')  // Replace this line with the correct array of column names if needed
            ->where('student_id', session('user_id'))
            ->first();

            return view('student_.change_password',['user'=>$user]);
        }

        return redirect('/');
    }

    public function change_password_form(Request $request)
{
    $user = DB::table('student')->where('student_id', session('user_id'))->first();
    $opass = $request->input('oldPassword');
    $npass = $request->input('newPassword');
    $oPASS = $user->password;
    $new_user=[];
    $new_user['name']= $user->full_name;

    // Debugging statement to check values
    // return $opass .",".$npass.",".$oPASS;

    if (Hash::check($opass, $user->password)) {
        if (Hash::check($npass, $user->password)) {
            return redirect()->back()->with('error', 'New password and old password must not be the same');
        } else {
            DB::table('student')->where('student_id', session('user_id'))->update(["password" => bcrypt($npass)]);
            Mail::to($user->email)->send(new PasswordChangedMail($new_user));
            return redirect()->back()->with('Success', 'Password was changed successfully');
        }
    } else {
        return redirect()->back()->with('error', 'Entered old password was invalid');
    }
}

}
