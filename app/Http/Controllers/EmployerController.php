<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RejectMail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use App\Mail\ApproveMail;
use App\Mail\FinalApprovalMail;
use App\Mail\JoiningDateMail;
use App\Mail\OfferIssueMail;
use Illuminate\Support\Facades\Hash;

use App\Mail\EmployerMail;
use Illuminate\Support\Facades\DB;
use App\Models\Tests;
use App\Mail\PasswordChangedMail;

class EmployerController extends Controller
{

    protected function getFutureInternshipMeetings()
{
    $futureMeetingsInternship = DB::select("
            SELECT
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
                internship_post.employer_id = ".session('employer_id')."
                AND application.zoom_meeting IS NOT NULL
                AND application.zoom_time > NOW()
            ORDER BY
                application.zoom_time
        ");
        $futureMeetingsJob = DB::select("
        SELECT
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
            job_post.employer_id = ".session('employer_id')."
            AND application.zoom_meeting IS NOT NULL
            AND application.zoom_time > NOW()
        ORDER BY
            application.zoom_time
    ");

    $futureMeetings = array_merge($futureMeetingsInternship, $futureMeetingsJob);

    return $futureMeetings;
}

    public function full_details()
    {
        $details = session('id');

        if ($details != null) {

            $id = $details['id'];
            $email = $details['email'];


            return view('company.employerregister', compact('id', 'email'));
        }

        return redirect('/')->with('error','Session Expired');
    }





    public function store(Request $request){
        $id = $request->input('id');
        $file = $request->file('photo');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $destination = public_path('company_logo');

        // Ensure the 'resumes' directory exists
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }
        $file->move($destination, $filename);
        $filepath = $filename;
        $userid = [
            'company_name'=> $request->input('company_name'),
            'company_type'=>$request->input('company_type'),
            'registration_no' =>$request->input('registration_no'),
            'phone'=> $request->input('contactMobile'),
            'landline'=> $request->input('landline'),
            'email'=> $request->input('contact_email'),
            'year_of_founding'=> $request->input('year_of_founding'),
            'description'=> $request->input('description'),
            'door_no'=>$request->input('building_no'),
            'area'=>$request->input('area'),
            'country'=>$request->input('country'),
            'state'=>$request->input('state'),
            'district'=>$request->input('district'),
            'pincode'=> $request->input('pincode'),
            'registered'=>1,
            'company_logo'=> $filepath,
            'modified_at' => now()
        ];

        // return $id;
        DB::table('employer')->where('employer_id',$id)->update($userid);
        //   return session('employer_id');
        $new_user=[];
        $new_user['name']=$request->input('company_name');
        $new_user['email']=$request->input('contact_email');
        // return $new_user;
        Mail::to($new_user['email'])->send(new EmployerMail($new_user));
        return redirect('/')->with('Success', 'Your application has been submitted successfully. Please allow up to 3 working days for administrative approval. Thank you for your patience.');

    }


    public function intern_apply_form(){
        if (session('user_id')) {
            $user = DB::table('student')
                ->select('*')  // Replace this line with the correct array of column names if needed
                ->where('student_id', '=', session('user_id'))
                ->first();
            $degree = DB::select("SELECT degree_type FROM intern.degrees group by degree_type;");
            return view('internships/applicationform', ["degree" => $degree , "user" => $user]);
        }

        return redirect('/');

    }


    public function job_details(Request $request){
        // dd($request->all());
        if ($request->has('photo')) {
            $file = $request->file('photo');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('company_logo');
            $file->move($destination, $filename);
            $filepath = $filename;
        } else {
            $filepath = null;
        }
        $test = $request->input('test');
        $others = $request->input('otherSalary') ?? null;

        $otherQualify = $request->input('otherQualificationInput') ?? null;
        $id = [
            'employer_id' => session('employer_id'),
            'company_name' =>  $request->input('company_name'),
            'job_type'   =>  $request->input('job_type'),
            'job_type_others'   =>  $request->input('otherjob_typeInput'),
            'job_title'  =>  $request->input('job_title'),
            'total_vacancies'   =>  $request->input('totalVacancies'),
            'job_description'   =>  $request->input('jobDescription'),
            'required_skills' => implode(',', $request->input('skills')),
            'other_required_skills'  =>  $request->input('otherSkillsInput'),
            'start_date'  =>  $request->input('startDate'),
            'application_deadline'   =>  $request->input('applicationDeadline'),
            'salary_package'   =>  $request->input('salary'),
            'other_salary' => $others,
            'qualification'   =>  $request->input('qualification'),
            'other_qualification' => $otherQualify,
            'degrees_preferred' => implode(',', $request->input('degrees')),
            'other_degree_preferred'   =>  $request->input('otherDegreeInput'),
            'experience_required'   =>  $request->input('experience'),
            'contact_email'   =>  $request->input('contactEmail'),
            'contact_mobile'   =>  $request->input('contactMobile'),
            'landline'   =>  $request->input('landline'),
            'work_location'   =>  $request->input('workLocation'),
            'company_info'   =>  $request->input('company_info'),
            'responsibilities'   =>  $request->input('responsibilities'),
            'accomodation'   =>  $request->input('additionalInfo'),
            // 'address'   =>  $request->input('address'),
            // 'street'   =>  $request->input('street'),
            // 'area'   =>  $request->input('vt'),
            'ptft'=>$request->input('ptft'),
            'country'  =>  $request->input('country'),
            'state'  =>  $request->input('state'),
            'city'  =>  $request->input('district'),
            // 'pincode'  =>  $request->input('pincode'),
            'status'  =>  1,
            'company_logo' => $filepath,
            'created_at'  => now(),
            'modified_at' =>now(),
        ];
        // dd($request->all());
        $jobId = DB::table('job_post')->insertGetId($id );
        $encryptedInternshipId = Crypt::encrypt($jobId);
        $jri = Crypt::encrypt(1);
         if($test == 1){
            return redirect("/employer/add-test/{$encryptedInternshipId}/{$jri}");
         }
         elseif($test == 2){
            return redirect("/employer/select_exist_test_module/{$encryptedInternshipId}/{$jri}");
         }
         else{
            return redirect('/employer/posted_jobs')->with('Success', 'Your job has been posted successfully!');
         }
    }

    public function internship_details(Request $request){
        //   dd($request->all());
        if ($request->has('photo')) {
            $file = $request->file('photo');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('company_logo');
            $file->move($destination, $filename);
            $filepath = $filename;
        } else {
            $filepath = null;
        }
        // dd($request->all());
        $test = $request->input('test');
        // return $test;
        $id = [
            'employer_id' => session('employer_id'),
            'company_name' =>  $request->input('company_name'),
            'internship_title'  =>  $request->input('internship_title'),
            'internship_type'  =>  $request->input('internship_type'),
            'part_full_time'  =>  $request->input('ptft'),
            'description'   =>  $request->input('internDescription'),
            'required_skills'   =>  implode(',',$request->input('skills')),
            'other_required_skills'  =>  $request->input('otherSkillsInput'),
            'duration'   =>  $request->input('duration'),
            'application_start_date'  =>  $request->input('startDate'),
            'application_deadline'   =>  $request->input('applicationDeadline'),
            'stipend'   =>  $request->input('stipend'),
            'other_stipend'   =>  $request->input('otherStipend'),
            'eligiblity_criteria' => $request->input('eligibility'),
            'accomodation'   =>  $request->input('additionalInfo'),
            'contact_email'   =>  $request->input('contactEmail'),
            'contact_type'   =>  $request->input('contacttype'),
            'contact_number'   =>  $request->input('contactMobile'),
            'degrees_preferred' => implode(',', $request->input('degrees')),
            'landline'   =>  $request->input('landline'),
            'total_vacancies'   =>  $request->input('totalVacancies'),
            'company_info'   =>  $request->input('company_info'),
            'responsibilities'   =>  $request->input('responsibilities'),
            'country'  =>  $request->input('country'),
            'state'  =>  $request->input('state'),
            'district'  =>  $request->input('district'),
            'status'  =>  1,
            'company_logo' => $filepath,
            'created_at'  => now(),
            'updated_at' =>now(),
        ];
         $jobId = DB::table('internship_post')->insertGetId($id );
         $encryptedInternshipId = Crypt::encrypt($jobId);
         $jri = Crypt::encrypt(0);
         if($test == 1){
            return redirect("/employer/add-test/{$encryptedInternshipId}/{$jri}");
         }
         elseif($test == 2){
            return redirect("/employer/select_exist_test_module/{$encryptedInternshipId}/{$jri}");
         }
         else{
            return redirect('employer/posted_internship')->with('Success', 'Your internship has been posted successfully!');
         }
        }

        // use Illuminate\Support\Facades\DB;
        public function emp_dash()
        {
            // Check if employer is logged in
            if (session('employer_id')) {
                $employer = DB::table('employer')->where('employer_id', session('employer_id'))->first();
                $int = DB::table('internship_post')->where('employer_id', session('employer_id'))->count();
                $job = DB::table('job_post')->where('employer_id', session('employer_id'))->count();
                $total = $int + $job;

            //     $job_app = DB::select("SELECT COUNT(a.application_id) AS count
            //     FROM job_post jp
            //     JOIN employer e ON jp.employer_id = e.employer_id
            //     LEFT JOIN application a ON jp.job_id = a.job_id
            //     WHERE e.employer_id = :employer_id;", ['employer_id' => session('employer_id')]);

            // $intern_app = DB::select("SELECT COUNT(a.application_id) AS count
            //     FROM internship_post jp
            //     JOIN employer e ON jp.employer_id = e.employer_id
            //     LEFT JOIN application a ON jp.internship_id = a.internship_id
            //     WHERE e.employer_id = :employer_id;", ['employer_id' => session('employer_id')]);


            $job_app = DB::select("
    SELECT COUNT(*) as count
    FROM application
    JOIN job_post ON application.job_id = job_post.job_id
    JOIN student ON application.student_id = student.student_id
    WHERE job_post.employer_id = :employerId and application.status = 0
", ['employerId' => session('employer_id')]);

$intern_app = DB::select("
    SELECT COUNT(*) as count
    FROM application
    JOIN internship_post ON application.internship_id = internship_post.internship_id
    JOIN student ON application.student_id = student.student_id
    WHERE internship_post.employer_id = :employerId and application.status = 0
", ['employerId' => session('employer_id')]);

// Extract the count from the result objects
$jobCount = count($job_app) > 0 ? $job_app[0]->count : 0;
$internCount = count($intern_app) > 0 ? $intern_app[0]->count : 0;

// dd($internCount);
            // Calculate the total
            // $tot = $jobCount + $internCount;
            $meet =DB::select("SELECT application.zoom_meeting,application.zoom_time,
            student.full_name as student_name,
            internship_post.internship_title
                   FROM application
                   JOIN internship_post ON application.internship_id = internship_post.internship_id
                   JOIN student ON application.student_id = student.student_id
                   WHERE internship_post.employer_id = ". session('employer_id') ." and application.status = 1
                   AND application.zoom_meeting IS NOT NULL;");

            $futureMeetings = $this->getFutureInternshipMeetings();

            // $job_chart = DB::table('job_post')->select('job_type', 'total_vacancies')->where('employer_id', session('employer_id'))->get();

            $internshipData = DB::table('internship_post')->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->where('employer_id',session('employer_id'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $jobData =  DB::table('job_post')->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy('month')
            ->where('employer_id',session('employer_id'))
            ->orderBy('month')
            ->get();

        $chartData = [
            'datasets' => [
                [
                    'label' => 'Internship Postings',
                    'data' => $internshipData->pluck('count'),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
                [
                    'label' => 'Job Postings',
                    'data' => $jobData->pluck('count'),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $internshipData->pluck('month'), // Assuming your data contains timestamps
        ];



// dd($internshipData,$jobData);
            return view('company1.employee_dashboard', [
                    "employer" => $employer,
                    "total" => $total,
                    "int"=>$int,
                    "job"=>$job,
                    "int_app"=>$internCount,
                    "job_app"=>$jobCount,
                    'internshipData'=>$internshipData,
                    'jobData'=>$jobData,
                    "job_chart" =>$chartData,
                    "meet"=>$meet,
                    "futureMeetings"=>$futureMeetings
                ]);
            }

            return redirect('/');
        }

        public function scheduled_interviews()
        {
            $emp_id = session('employer_id');

            DB::statement("SET SQL_MODE=''");

            $tests = DB::table('tests')->join('application','tests.application_id','application.application_id')->whereNotNull('tests.conducting_datetime')->where('application.company_name',(DB::table('employer')->select('company_name')->where('employer_id',$emp_id)->first())->company_name)->where('application.test_status',0)->orderBy('conducting_datetime')
            ->get()
            ->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item->conducting_datetime)->format('Y-m-d');
            });

            $zoom_meetings = DB::table('application')->whereNotNull('zoom_time')->where('application.company_name',(DB::table('employer')->select('company_name')->where('employer_id',$emp_id)->first())->company_name)->orderBy('zoom_time')
            ->get()
            ->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item->zoom_time)->format('Y-m-d');
            });
            $meetingsData = [];
            $testsData = [];
            foreach($zoom_meetings as $zoom_meeting){


                $meetingsData[] = [
                    'data' => $zoom_meeting,
                    'title' => 'MEETINGS',
                    'count' => count($zoom_meeting),
                    'start' =>  $zoom_meeting[0]->zoom_time,
                    'allDay'=> True


                ];
            }
            foreach($tests as $test){


                $testsData[] = [
                    'data' => $test,
                    'title' => 'TESTS',
                    'count' => count($test),
                    'start' =>  $test[0]->conducting_datetime,
                    'allDay'=> True


                ];
            }


            return view('company1.scheduled_events',['tests' => $testsData,'meetings' => $meetingsData]);
        }


    public function emp_details(){
        if (session('employer_id')) {
            $user = DB::table('employer')
                ->select('*')  // Replace this line with the correct array of column names if needed
                ->where('employer_id', '=', session('employer_id'))
                ->first();
            $futureMeetings = $this->getFutureInternshipMeetings();
            // $degree = DB::select("SELECT degree_type FROM intern.degrees group by degree_type;");
            return view('company.company_profile', [
                "user" => $user,
                "futureMeetings" =>$futureMeetings
            ]);
        }

        return redirect('/');

    }


    public function all_posted_app(){
        if (session('employer_id')) {
            $internships = DB::table('internship_post')
            ->where('employer_id', session('employer_id'))
            ->paginate(10);
            $futureMeetings = $this->getFutureInternshipMeetings();

            return view('company1.posted_internship', [
            'internships' => $internships,
            "futureMeetings"=>$futureMeetings
            ]);
        }

        return redirect('/');
    }


    public function all_received_app(){
        if (session('employer_id')) {
            $futureMeetings = $this->getFutureInternshipMeetings();

            return view('company1.all_received_app',["futureMeetings"=>$futureMeetings]);
        }

        return redirect('/');
    }

    public function internship_post(){
        if (session('employer_id')) {
            $emp = DB::table('employer')
            ->where('employer_id', session('employer_id'))
            ->first();
            $futureMeetings = $this->getFutureInternshipMeetings();
            $skills = DB::table('skills')->get();
            // $degree = DB::select("SELECT degree_type FROM intern.degrees group by degree_type;");
            return view('company.post_internship',[
                'skills'=>$skills,
                'emp' => $emp,
                'futureMeetings' => $futureMeetings]);
        }

        return redirect('/');

    }


    public function posted_internship() {
        if (session('employer_id')) {
            $internships = DB::table('internship_post')
                ->where('employer_id', session('employer_id'))
                ->orderBy('created_at', 'desc') // Order by creation date in descending order
                ->paginate(10);

            $futureMeetings = $this->getFutureInternshipMeetings();

            return view('company1.posted_internship', [
                'internships' => $internships,
                'futureMeetings' => $futureMeetings
            ]);
        }

        return redirect('/');
    }



    public function edit_internship($id){

        if (session('employer_id')) {
            $int = DB::table('internship_post')->where('internship_id', $id)->first();
 $futureMeetings = $this->getFutureInternshipMeetings();
             $skills = DB::table('skills')->get();
            return view('company1.edit_internship', [
                'int' => $int,
                'skills'=>$skills,
                "futureMeetings"=>$futureMeetings
            ]);
        }
            return redirect('/');
    }

public function update_internship(Request $request)
{
    if (session('employer_id')) {
        $test = $request->input('test');
        $internshipId = $request->input('INTid');
// dd($test);
        $updatedValues = [
            'company_name' =>  $request->input('company_name'),
            'internship_title'  =>  $request->input('internship_title'),
            'internship_type'  =>  $request->input('internship_type'),
            'part_full_time'  =>  $request->input('ptft'),
            'description'   =>  $request->input('internDescription'),
            'required_skills'   =>  implode(',',$request->input('skills')),
            'degrees_preferred' => implode(',', $request->input('degrees')),
            'duration'   =>  $request->input('duration'),
            'application_start_date'  =>  $request->input('startDate'),
            'application_deadline'   =>  $request->input('applicationDeadline'),
            'stipend'   =>  $request->input('stipend'),
            'other_stipend'   =>  $request->input('otherStipend'),
            'eligiblity_criteria' => $request->input('eligibility'),
            'accomodation'   =>  $request->input('additionalInfo'),
            'contact_email'   =>  $request->input('contactEmail'),
            'contact_type'   =>  $request->input('contacttype'),
            'contact_number'   =>  $request->input('contactMobile'),
            'landline'   =>  $request->input('landline'),
            'total_vacancies'   =>  $request->input('totalVacancies'),
            'company_info'   =>  $request->input('company_info'),
            'responsibilities'   =>  $request->input('responsibilities'),
            'country'  =>  $request->input('country'),
            'state'  =>  $request->input('state'),
            'district'  =>  $request->input('district'),
            'updated_at' =>now(),
        ];

        $encryptedInternshipId = Crypt::encrypt($internshipId);
        $jri = Crypt::encrypt(0);
        DB::table('internship_post')->where('internship_id', $internshipId)->update($updatedValues);
        if($test == 1){
            return redirect("/employer/add-test/{$encryptedInternshipId}/{$jri}");
         }
         elseif($test == 2){
            return redirect("/employer/select_exist_test_module/{$encryptedInternshipId}/{$jri}");
         }
         elseif($test == 0){
            DB::table('internship_post')->where('internship_id', $internshipId)->update(['quiz_id'=>null]);
            // return 1;
            return redirect('employer/posted_internship')->with('Updated','Successfully updated your internship');
        }
         else{
            return redirect('employer/posted_internship')->with('Updated','Successfully updated your internship');
        }
    }

    return redirect('/');
}
public function delete_internship($id){

    if (session('employer_id')) {
        DB::table('internship_post')->where('internship_id', $id )->delete();

        return redirect()->back()->with('Deleted','Your internship has been deleted');
    }
        return redirect('/');
}



    public function intern_application(){

        if (session('employer_id')) {
            // Fetch internship IDs for the employer
            $applications = DB::select("
            SELECT application.*, student.full_name as student_name,student.resume as resume, student.phone as student_phone , student.email as student_email , internship_post.internship_title
        FROM application
        JOIN internship_post ON application.internship_id = internship_post.internship_id
        JOIN student ON application.student_id = student.student_id
        WHERE internship_post.employer_id = :employerId and application.status = 0
          ORDER BY application.created_at DESC
        ", ['employerId' => session('employer_id')]);
 $futureMeetings = $this->getFutureInternshipMeetings();

        return view('company1.internship_app', ['applications' => $applications,
    "futureMeetings"=>$futureMeetings
    ]);
            // return view('company1.internship_app', compact('internshipDetails'));
        }


            return redirect('/');
    }

public function approve_intern($input){
        $application_id = $input;

        // Retrieve student_id and internship_id from the application table
        $student = DB::table('application')
            ->select('student_id', 'internship_id')
            ->where('application_id', $application_id)
            ->first();

        // Retrieve student's email and full name
        $email = DB::table('student')
            ->select('full_name', 'email')
            ->where('student_id', $student->student_id)
            ->first();

        // Retrieve internship details
        $int = DB::table('internship_post')
            ->where('internship_id', $student->internship_id)
            ->first();

        $details = [
            'email' => $email->email,
            'name' => $email->full_name,
            'title' => $int->internship_title,
            'company_name' => $int->company_name,
            'type' => 2,
        ];

        // Send approval email
        Mail::to($details['email'])->send(new ApproveMail($details));
        DB::table('student')->where('email', $details['email'])->increment('email_received');
        DB::table('application')
            ->where('application_id', $application_id)
            ->update(['status'=>1]);

        DB::table('messages')->insert([
            'employer_id'=>session('employer_id'),
            'student_id'=>$student->student_id,
            'message' => "Your profile has been shortlisted for the internship ".$int->internship_title,
            'read'=>0
        ]);

        return redirect()->back()->with('Approved','Approved for the selected internship');
    }
    public function approve_all_interns_app(){
        $applications = DB::table('application')
        ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
        ->join('student', 'application.student_id', '=', 'student.student_id')
        ->select(
            'application.application_id as app_id',
            'application.student_id',
            'student.email as email',
            'student.full_name as name',
            'internship_post.internship_title',
            'internship_post.company_name',
        )
        ->where('internship_post.employer_id', session('employer_id'))
        ->where('application.status', 0)
        ->get();

        // Send approval email
        foreach ($applications as $application) {
        $details = [
            'email' => $application->email,
            'name' => $application->name,
            'title' => $application->internship_title,
            'company_name' => $application->company_name,
            'type' => 2,
        ];
            Mail::to($details['email'])->send(new ApproveMail($details));
            DB::table('student')->where('email', $details['email'])->increment('email_received');
            DB::table('messages')->insert([
                'employer_id'=>session('employer_id'),
                'student_id'=>$application->student_id,
                'message' => "Your profile has been shortlisted for the internship ".$application->internship_title,
                'read'=>0
            ]);
        }

        DB::update(" UPDATE application SET status = 1 WHERE application_id IN (SELECT app_id FROM ( SELECT application.application_id AS app_id FROM application JOIN internship_post ON application.internship_id = internship_post.internship_id JOIN student ON application.student_id = student.student_id
        WHERE internship_post.employer_id = ". session('employer_id') ." ) AS subquery ) ");

        return redirect()->back()->with('Success','Approved for all internships application');
}






public function reject_intern($input){
        $application_id = $input;

        // Retrieve student_id and internship_id from the application table
        $student = DB::table('application')
            ->select('student_id', 'internship_id')
            ->where('application_id', $application_id)
            ->first();

        // Retrieve student's email and full name
        $email = DB::table('student')
            ->select('full_name', 'email')
            ->where('student_id', $student->student_id)
            ->first();

        // Retrieve internship details
        $int = DB::table('internship_post')
            ->where('internship_id', $student->internship_id)
            ->first();

        $details = [
            'email' => $email->email,
            'name' => $email->full_name,
            'title' => $int->internship_title,
            'company_name' => $int->company_name,
            'type' => 2,
        ];

        // Send approval email

        DB::table('student')->where('email', $details['email'])->increment('email_received');
        DB::table('application')
            ->where('application_id', $application_id)
            ->update(['status'=>2]);

        DB::table('messages')->insert([
            'employer_id'=>session('employer_id'),
            'student_id'=>$student->student_id,
            'message' => "Your profile has been rejected for the internship ".$int->internship_title,
            'read'=>0
        ]);
        Mail::to($details['email'])->send(new RejectMail($details));
        return redirect()->back()->with('Rejected','Rejected for the selected internship');
    }
    public function reject_all_interns_app(){
        $applications = DB::table('application')
        ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
        ->join('student', 'application.student_id', '=', 'student.student_id')
        ->select(
            'application.application_id as app_id',
            'application.student_id',
            'application.company_name',
            'student.email as email',
            'student.full_name as name',
            'internship_post.internship_title'
        )
        ->where('internship_post.employer_id', session('employer_id'))
        ->where('application.status', 0)
        ->get();

        // Send approval email
        foreach ($applications as $application) {
        $details = [
            'email' => $application->email,
            'name' => $application->name,
            'title' => $application->internship_title,
            'company_name' => $application->company_name,
            'type' => 2,
        ];
            Mail::to($details['email'])->send(new RejectMail($details));
            DB::table('student')->where('email', $details['email'])->increment('email_received');
            DB::table('messages')->insert([
                'employer_id'=>session('employer_id'),
                'student_id'=>$application->student_id,
                'message' => "Your profile has been rejected for the internship ".$application->internship_title,
                'read'=>0
            ]);
        }

        DB::update(" UPDATE application SET status = 2 WHERE application_id IN (SELECT app_id FROM ( SELECT application.application_id AS app_id FROM application JOIN internship_post ON application.internship_id = internship_post.internship_id JOIN student ON application.student_id = student.student_id
        WHERE internship_post.employer_id = ". session('employer_id') ." ) AS subquery ) ");

        return redirect()->back()->with('Success','Rejected for all internships application');
}


    public function intern_pending(){
        if(session('employer_id')){
             $futureMeetings = $this->getFutureInternshipMeetings();

            return view('company1.intern_pending',["futureMeetings"=>$futureMeetings]);
        }
        return redirect('/');
    }

    public function approved_intern(){
        if(session('employer_id')){
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
                ->orderBy('application.created_at', 'desc')
                ->paginate(20); // Change 10 to the number of results you want per page


        $test = DB::table('quizzes')->where('employer_id', session('employer_id'))->get();
        // dd($applications);
        $futureMeetings = $this->getFutureInternshipMeetings();
// dd($applications);
        return view('company1.approved_intern',[
                'applications' => $applications,
                'test' => $test,
                "futureMeetings"=>$futureMeetings

            ]);
        }
        return redirect('/');
    }


    public function rejected_intern(){
        if(session('employer_id')){
            $applications = DB::select("
            SELECT application.*, student.full_name as student_name,student.resume as resume, student.phone as student_phone , student.email as student_email , internship_post.internship_title
        FROM application
        JOIN internship_post ON application.internship_id = internship_post.internship_id
        JOIN student ON application.student_id = student.student_id
        WHERE internship_post.employer_id = :employerId and application.status = 2
        ORDER BY application.created_at DESC
        ", ['employerId' => session('employer_id')]);
         $futureMeetings = $this->getFutureInternshipMeetings();

            return view('company1.rejected_intern',['applications' => $applications,"futureMeetings"=>$futureMeetings]);
        }
        return redirect('/');
    }



    public function job_post(){
            $user = DB::table('employer')
            ->where('employer_id', session('employer_id'))
            ->first();
            $futureMeetings = $this->getFutureInternshipMeetings();
            $skills = DB::table('skills')->get();
            return view('company.post_jobs',[
                'skills'=>$skills,
                "emp"=>$user,
            "futureMeetings"=>$futureMeetings
        ]);
    }

    public function posted_jobs(){
        if (session('employer_id')) {
            $jobs = DB::table('job_post')
                ->where('employer_id', session('employer_id'))
                ->orderBy('created_at', 'desc') // Add this line to order by creation timestamp in descending order
                ->paginate(10);

            $futureMeetings = $this->getFutureInternshipMeetings();

            return view('company1.posted_job', [
                'jobs' => $jobs,
                'futureMeetings' => $futureMeetings
            ]);
        }

        return redirect('/');
    }



    public function edit_job($id){
        if (session('employer_id')) {
            $int = DB::table('job_post')->where('job_id', $id)->first();
            $futureMeetings = $this->getFutureInternshipMeetings();
            $skills = DB::table('skills')->get();
            return view('company1.edit_job', [
                'int' => $int,
                'skills'=>$skills,
                "futureMeetings"=>$futureMeetings
            ]);
        }
        return redirect('/');
    }

    public function update_job(Request $request)
{
    if (session('employer_id')) {
        $test = $request->input('test');

        $jobId = $request->input('INTid');

        $updatedValues = [
            'company_name' =>  $request->input('company_name'),
            'job_type'   =>  $request->input('job_type'),
            'job_type_others'   =>  $request->input('otherjob_typeInput'),
            'job_title'  =>  $request->input('job_title'),
            'ptft'  =>  $request->input('ptft'),
            'total_vacancies'   =>  $request->input('totalVacancies'),
            'job_description'   =>  $request->input('jobDescription'),
            'required_skills'   =>  implode(', ', $request->input('skills')),
            'start_date'  =>  $request->input('startDate'),
            'application_deadline'   =>  $request->input('applicationDeadline'),
            'salary_package'   =>  $request->input('salary'),
            'other_salary' => $request->input('otherSalary'),
            'qualification'   =>  $request->input('qualification'),
            'other_qualification' => $request->input('otherQualificationInput'),
            'degrees_preferred' => implode(', ', $request->input('degrees')),
            'other_degree_preferred'   =>  $request->input('otherDegreeInput'),
            'experience_required'   =>  $request->input('experience'),
            'contact_email'   =>  $request->input('contactEmail'),
            'contact_mobile'   =>  $request->input('contactMobile'),
            // 'landline'   =>  $request->input('landline'),
            'work_location'   =>  $request->input('workLocation'),
            'company_info'   =>  $request->input('company_info'),
            'responsibilities'   =>  $request->input('responsibilities'),
            'accomodation'   =>  $request->input('additionalInfo'),
            'country'  =>  $request->input('country'),
            'state'  =>  $request->input('state'),
            'city'  =>  $request->input('district'),
            'modified_at' =>now(),
        ];

        $encryptedInternshipId = Crypt::encrypt($jobId);
        $jri = Crypt::encrypt(1);


        DB::table('job_post')->where('job_id', $jobId)->update($updatedValues);
        if($test == 1){
            return redirect("/employer/add-test/{$encryptedInternshipId}/{$jri}");
         }
         elseif($test == 2){
            return redirect("/employer/select_exist_test_module/{$encryptedInternshipId}/{$jri}");
         }
         elseif($test == 0){
            DB::table('job_post')->where('job_id', $jobId)->update(['quiz_id'=>null]);
            // return 1;
            return redirect('employer/posted_jobs')->with('Updated','Successfully updated your job');
        }
         else{
            return redirect('employer/posted_jobs')->with('Success','Successfully updated your job');
        }
    }

    return redirect('/');
}

public function delete_job($id){
    if (session('employer_id')) {

        DB::table('job_post')->where('job_id',$id)->delete();
        return redirect()->back()->with('Deleted','Your job has been deleted');
    }
    return redirect('/');
}


public function job_application(){

    if (session('employer_id')) {
        // Fetch internship IDs for the employer
        $applications = DB::select("
        SELECT application.*, student.full_name as student_name,student.resume as resume, student.phone as student_phone , student.email as student_email , job_post.job_title
    FROM application
    JOIN job_post ON application.job_id = job_post.job_id
    JOIN student ON application.student_id = student.student_id
    WHERE job_post.employer_id = :employerId and application.status = 0
    ORDER BY application.created_at DESC
    ", ['employerId' => session('employer_id')]);
 $futureMeetings = $this->getFutureInternshipMeetings();

    // return $applications;
    return view('company1.job_app', ['applications' => $applications,"futureMeetings"=>$futureMeetings
]);
        // return view('company1.internship_app', compact('internshipDetails'));
    }


        return redirect('/');
}

public function approve_job($input){
    $application_id = $input;

    // Retrieve student_id and internship_id from the application table
    $student = DB::table('application')
        ->select('student_id', 'job_id')
        ->where('application_id', $application_id)
        ->orderBy('created_at', 'desc') // Order by creation time in descending order
        ->first();

    // Retrieve student's email and full name
    $email = DB::table('student')
        ->select('full_name', 'email')
        ->where('student_id', $student->student_id)
        ->first();

    // Retrieve job details
    $int = DB::table('job_post')
        ->where('job_id', $student->job_id)
        ->first();

    $details = [
        'email' => $email->email,
        'name' => $email->full_name,
        'title' => $int->job_title,
        'company_name' =>  $int->company_name,
        'type' => 1,
    ];

    // Send approval email
    DB::table('student')->where('email', $details['email'])->increment('email_received');
    DB::table('application')
        ->where('application_id', $application_id)
        ->update(['status'=>1]);
    DB::table('messages')->insert([
        'employer_id'=>session('employer_id'),
        'student_id'=>$student->student_id,
        'message' => "Your profile has been shortlisted for the job ". $int->job_title,
        'read'=>0
    ]);
    Mail::to($details['email'])->send(new ApproveMail($details));

    return redirect()->back()->with('Approved','Approved for the selected job');
}

public function approve_all_jobs_app(){
    $applications = DB::table('application')
    ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
    ->join('student', 'application.student_id', '=', 'student.student_id')
    ->select(
        'application.application_id as app_id',
        'application.student_id',
        'student.email as email',
        'student.full_name as name',
        'job_post.job_title',
        'job_post.company_name'
    )
    ->where('job_post.employer_id', session('employer_id'))
    ->where('application.status', 0)
    ->orderBy('application.created_at', 'DESC')
    ->get();

    // Send approval email
    foreach ($applications as $application) {
    $details = [
        'email' => $application->email,
        'name' => $application->name,
        'title' => $application->job_title,
        'company_name' =>  $application->company_name,
        'type' => 1,
    ];
        Mail::to($details['email'])->send(new ApproveMail($details));
        DB::table('student')->where('email', $details['email'])->increment('email_received');
        DB::table('messages')->insert([
            'employer_id'=>session('employer_id'),
            'student_id'=>$application->student_id,
            'message' => "Your profile has been shortlisted for the job ". $application->job_title,
            'read'=>0
        ]);
    }

    DB::update(" UPDATE application SET status = 1 WHERE application_id IN (SELECT app_id FROM ( SELECT application.application_id AS app_id FROM application JOIN job_post ON application.job_id = job_post.job_id JOIN student ON application.student_id = student.student_id
    WHERE job_post.employer_id = ". session('employer_id') ." ) AS subquery ) ");

    return redirect()->back()->with('Success','Approved for all jobs application');
}


public function reject_job($input){
    $application_id = $input;

    // Retrieve student_id and internship_id from the application table
    $student = DB::table('application')
        ->select('student_id', 'job_id')
        ->where('application_id', $application_id)
        ->first();

    // Retrieve student's email and full name
    $email = DB::table('student')
        ->select('full_name', 'email')
        ->where('student_id', $student->student_id)
        ->first();

    // Retrieve job details
    $int = DB::table('job_post')
        ->where('job_id', $student->job_id)
        ->first();

    $details = [
        'email' => $email->email,
        'name' => $email->full_name,
        'title' => $int->job_title,
        'company_name' => $int->company_name,
        'type'  => 1,
    ];

    // Send approval email
    Mail::to($details['email'])->send(new RejectMail($details));
    DB::table('student')->where('email', $details['email'])->increment('email_received');

    DB::table('application')
        ->where('application_id', $application_id)
        ->update(['status'=>2]);

    DB::table('messages')->insert([
        'employer_id'=>session('employer_id'),
        'student_id'=>$student->student_id,
        'message' => "Your profile has been rejected for the job ". $int->job_title,
        'read'=>0
    ]);


    return redirect()->back()->with('Rejected','Rejected for the selected job');
}
public function reject_all_jobs_app(){
    $applications = DB::table('application')
    ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
    ->join('student', 'application.student_id', '=', 'student.student_id')
    ->select(
        'application.application_id as app_id',
        'application.student_id',
        'student.email as email',
        'student.full_name as name',
        'job_post.job_title',
        'job_post.company_name'
    )
    ->where('job_post.employer_id', session('employer_id'))
    ->where('application.status', 0)
    ->get();

    // Send approval email
    foreach ($applications as $application) {
    $details = [
        'email' => $application->email,
        'name' => $application->name,
        'title' => $application->job_title,
        'company_name' =>  $application->company_name,
        'type' => 1,
    ];
        Mail::to($details['email'])->send(new RejectMail($details));
        DB::table('student')->where('email', $details['email'])->increment('email_received');
        DB::table('messages')->insert([
            'employer_id'=>session('employer_id'),
            'student_id'=>$application->student_id,
            'message' => "Your profile has been rejected for the job ". $application->job_title,
            'read'=>0
        ]);
    }

    DB::update(" UPDATE application SET status = 2 WHERE application_id IN (SELECT app_id FROM ( SELECT application.application_id AS app_id FROM application JOIN job_post ON application.job_id = job_post.job_id JOIN student ON application.student_id = student.student_id
    WHERE job_post.employer_id = ". session('employer_id') ." ) AS subquery ) ");

    return redirect()->back()->with('Success','Rejected for all jobs application');
}

public function job_pending(){
    if(session('employer_id')){
 $futureMeetings = $this->getFutureInternshipMeetings();

        return view('company1.job_pending',["futureMeetings"=>$futureMeetings]);
    }
    return redirect('/');
}

public function approved_job(){
    if(session('employer_id')){
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
                ->orderBy('application.created_at', 'desc')
                ->paginate(20); // Change 10 to the number of results you want per page

        $test = DB::table('quizzes')->where('employer_id', session('employer_id'))->get();
        $futureMeetings = $this->getFutureInternshipMeetings();

        // return $applications;
        return view('company1.approved_job', ['applications' => $applications, "futureMeetings"=>$futureMeetings,'test' => $test]);

    }
    return redirect('/');
}


public function rejected_job(){
    if(session('employer_id')){
        $applications = DB::select("
        SELECT application.*, student.full_name as student_name,student.resume as resume, student.phone as student_phone , student.email as student_email , job_post.job_title
    FROM application
    JOIN job_post ON application.job_id = job_post.job_id
    JOIN student ON application.student_id = student.student_id
    WHERE job_post.employer_id = :employerId and application.status = 2
    ORDER BY application.created_at DESC
    ", ['employerId' => session('employer_id')]);
 $futureMeetings = $this->getFutureInternshipMeetings();

    // return $applications;
    return view('company1.rejected_job', ["futureMeetings"=>$futureMeetings ,'applications' => $applications]);
    }
    return redirect('/');
}



public function my_profile(){
    if(session('employer_id')){
        $emp = DB::table('employer')->where('employer_id', session('employer_id'))->first();
 $futureMeetings = $this->getFutureInternshipMeetings();

    // return $applications;
        return view('company1.profile', [ "futureMeetings"=>$futureMeetings,'emp' => $emp]);
    }
    return redirect('/');
}

public function settings(){
    if(session('employer_id')){
        $emp = DB::table('employer')->where('employer_id', session('employer_id'))->first();
 $futureMeetings = $this->getFutureInternshipMeetings();

        // return $applications;
            return view('company1.settings', ["futureMeetings"=>$futureMeetings,'emp' => $emp]);
    // return $applications;
        // return view('company1.settings', ['applications' => $applications]);
    }
    return redirect('/');
}

public function profile_update(Request $request){

    $FILEname = $request->input('oresume');

    // Concatenate folder and filename
    $FILEPath = public_path('company_logo/' . $FILEname);

    // Check if the file exists
    // if (File::exists($FILEPath)) {
    //     return 34324;
    // }

    if ($request->hasFile('company_logo')) {
        if (File::exists($FILEPath)) {
            // File::delete($FILEPath);
        }
        $file = $request->file('company_logo');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $destination = public_path('company_logo');

        // Ensure the 'resumes' directory exists
        if (!File::exists($destination)) {

            File::makeDirectory($destination, 0755, true);
        }

        $file->move($destination, $filename);
        $filepath = $filename;
        session(['company_logo' => $filename]);
// dd(session('company_logo'))
    } else {
        // If no new file is uploaded, use the existing file path
        $filepath = $request->input('oresume');
    }
    // dd($filename,$FILEname);
    DB::table('employer')
    ->where('employer_id', session('employer_id'))
    ->update(array_merge(
        $request->except('_token', 'oresume', 'company_logo'),
        ['company_logo' => $filepath]
    ));

    return redirect('/employer/my_profile');
}

public function password_change(){
    if(session('employer_id')){
        $futureMeetings = $this->getFutureInternshipMeetings();

    // return $applications;
        return view('company1.password_change',["futureMeetings"=>$futureMeetings]);
    }
    return redirect('/');
}

public function password_change_function(Request $request){
    $cpass = $request->input('cPassword');
    // $npass =$request->input('nPassword');
    $opass = DB::table('employer')->where('employer_id', session('employer_id'))->first();
    $new_user=[];
    $new_user['name']= $opass->full_name;
    $newpass = $request->input('nPassword');
    // return $cpass;
    if(Hash::check($cpass,$opass->password)){
        if(Hash::check($newpass,$opass->password)){
            return redirect()->back()->with('error','Old password and new password must not be same.');
        }
        else{
            $nnpass = bcrypt($newpass);
            DB::table('employer')->where('employer_id', session('employer_id'))->update(['password'=>$nnpass]);
            Mail::to($opass->email)->send(new PasswordChangedMail($new_user));
            return redirect()->back()->with('Success','Password has been successfully changed');
        }

    }
    else{
        return redirect()->back()->with('error','Entered old password was invalid');
    }
}




public function adding_questions(Request $request) {
    // Validate the incoming data
    $empID = session('employer_id');
    $request->validate([
        'quizTitle' => 'required|string',
        'percentage' => 'required|integer',
        'testDuration' => 'required|integer',
        'questions' => 'required|array',
        'options' => 'required|array',
        'correct_answers' => 'required|array',
    ]);

    // Get data from the request
    $quizTitle = $request->input('quizTitle');
    $percentage = $request->input('percentage');
    $testDuration = $request->input('testDuration');
    $questions = $request->input('questions');
    $options = $request->input('options');
    $correctAnswers = $request->input('correct_answers');

    // Start a database transaction
    DB::beginTransaction();

    try {
        // Insert quiz details
        $quizId = DB::table('quizzes')->insertGetId([
            'employer_id' => $empID,
            'title' => $quizTitle,
            'test_duration' => $testDuration,
            'percentage' => $percentage
        ]);

        // Insert questions and options
        for ($i = 0; $i < count($questions); $i++) {
            $question = $questions[$i];
            $option1 = $options[$i][0];
            $option2 = $options[$i][1];
            $option3 = $options[$i][2];
            $correctOption = $correctAnswers[$i];

            DB::table('questions')->insert([
                'quiz_id' => $quizId,
                'question' => $question,
                'option1' => $option1,
                'option2' => $option2,
                'option3' => $option3,
                'correct_option' => $correctOption,
            ]);
        }

        // Commit the transaction
        DB::commit();

        return redirect('/employer/')->with('Success','Your test questions fot test module has been added');
    }
    catch (\Exception $e) {
        // Rollback the transaction in case of an error
        DB::rollback();

        return response()->json(['error' => 'Error occurred while adding quiz and questions'], 500);
    }
}









// public function getFutureMeetings()
// {
//     $futureMeetingsInternship = $this->getFutureInternshipMeetings();
//     $futureMeetingsJob = $this->getFutureJobMeetings();

//     return array_merge($futureMeetingsInternship, $futureMeetingsJob);
// }

















    public function sorting(Request $request)
    {
        $employerId = session('employer_id');
        $column = $request->get('column', 'company_name');
        $order = $request->get('order', 'asc');

        $internships = DB::table('internship_post')->where('employer_id', $employerId)
            ->orderBy($column, $order)
            ->paginate(10);
        $futureMeetings = $this->getFutureInternshipMeetings();
        return view('company1.posted_internship', [
            'internships' => $internships,
            "futureMeetings"=>$futureMeetings
        ]);
        // return response()->json([
        //     'internships' => $internships,
        // ]);
    }

    public function sortingg(Request $request)
    {
        $employerId = session('employer_id');
        $column = $request->get('column', 'company_name');
        $order = $request->get('order', 'asc');

        $jobs = DB::table('job_post')->where('employer_id', $employerId)
            ->orderBy($column, $order)
            ->paginate(10);
$futureMeetings = $this->getFutureInternshipMeetings();
        return view('company1.posted_job', [
            'jobs' => $jobs,
            "futureMeetings"=>$futureMeetings
        ]);
    }


    public function approved_intern_qualified(Request $request)
    {
        $employerId = session('employer_id');
        // $column = $request->get('qualified', 'company_name');
        // $order = $request->get('order', 'asc');

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
        ->where('application.test_qualified',1)
        ->paginate(20); // Change 10 to the number of results you want per page


$test = DB::table('quizzes')->where('employer_id', session('employer_id'))->get();






        $futureMeetings = $this->getFutureInternshipMeetings();
        return view('company1.approved_intern', [
            'applications' => $applications,
            "futureMeetings"=>$futureMeetings
        ]);
    }

    public function approved_intern_not_qualified(Request $request)
    {
        $employerId = session('employer_id');
        // $column = $request->get('qualified', 'company_name');
        // $order = $request->get('order', 'asc');


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
        // ->where('application.status', 1)
        ->where('application.test_qualified',0)
        ->paginate(20); // Change 10 to the number of results you want per page


        $futureMeetings = $this->getFutureInternshipMeetings();
        return view('company1.approved_intern', [
            'applications' => $applications,
            "futureMeetings"=>$futureMeetings
        ]);
    }



    public function approved_job_qualified(Request $request)
    {
        $employerId = session('employer_id');
        // $column = $request->get('qualified', 'company_name');
        // $order = $request->get('order', 'asc');

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
                ->where('application.test_qualified',1)
                ->paginate(20); // Change 10 to the number of results you want per page



        $futureMeetings = $this->getFutureInternshipMeetings();
        return view('company1.approved_job', [
            'applications' => $applications,
            "futureMeetings"=>$futureMeetings
        ]);
    }

    public function approved_job_not_qualified(Request $request)
    {
        $employerId = session('employer_id');
        // $column = $request->get('qualified', 'company_name');
        // $order = $request->get('order', 'asc');

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
        ->where('application.test_qualified',0)
        ->paginate(20); // Change 10 to the number of results you want per page

        $futureMeetings = $this->getFutureInternshipMeetings();
        return view('company1.approved_job', [
            'applications' => $applications,
            "futureMeetings"=>$futureMeetings
        ]);
    }






//Candidate profile
public function candidate_profile($id, $app_id)
        {
            // Check if employer is logged in
            if (session('employer_id')) {

                $futureMeetings = $this->getFutureInternshipMeetings();

                $employerId = session('employer_id');
                // $column = $request->get('qualified', 'company_name');
                // $order = $request->get('order', 'asc');
                $ap= DB::table('application')->where('application_id',$app_id)->first();
                if($ap->type == "Intern"){
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
                        'tests.conducting_datetime'
                    )
                    ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
                    ->join('student', 'application.student_id', '=', 'student.student_id')
                    ->leftJoin('tests', 'application.application_id', '=', 'tests.application_id')
                    ->where('internship_post.employer_id', $employerId)
                    ->where('application.student_id', $id)
                    ->where('application.application_id',$app_id)
                    ->first();
                }
                elseif($ap->type == "Job"){
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
                        'tests.conducting_datetime'
                    )
                    ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
                    ->join('student', 'application.student_id', '=', 'student.student_id')
                    ->leftJoin('tests', 'application.application_id', '=', 'tests.application_id')
                    ->where('job_post.employer_id', $employerId)
                    ->where('application.student_id', $id)
                    ->where('application.application_id',$app_id)
                    ->first();
                }



                return view('company1.view_profile', [
                    "user" => $applications,
                    "futureMeetings"=>$futureMeetings
                ]);
            }

            return redirect('/');
        }

    public function face_2_face()
    {
        // Check if employer is logged in
        if (session('employer_id')) {

            $futureMeetings = $this->getFutureInternshipMeetings();

            $employerId = session('employer_id');
            // // $column = $request->get('qualified', 'company_name');
            // // $order = $request->get('order', 'asc');


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
           ->paginate(10);

            return view('company1.face2face', [
                "user" => $applications,
                "futureMeetings"=>$futureMeetings
            ]);
        }

        return redirect('/');
    }

    public function add_test_page($id=null,$app_id=null,$t_id=null){
        if(session('employer_id')){
            session(['id'=>$id,'app_id'=>$app_id,'t_id'=>$t_id]);
            $futureMeetings = $this->getFutureInternshipMeetings();
            return view('company1.tests.add_test',[
                "futureMeetings"=>$futureMeetings,

            ]);
        }
        return redirect('/');
    }

    public function import_test_page($id=null,$app_id=null,$t_id=null){
        if(session('employer_id')){
            session(['id'=>$id,'app_id'=>$app_id,'t_id'=>$t_id]);
            $futureMeetings = $this->getFutureInternshipMeetings();
            return view('company1.tests.import_test_details',[
                "futureMeetings"=>$futureMeetings
            ]);
        }
        return redirect('/');
    }

    public function select_test_page($id=null,$app_id=null,$t_id=null){
        if(session('employer_id')){
            session(['id'=>$id,'app_id'=>$app_id,'tt_id'=>$t_id,'approved'=>1]);
            // dd(session('id'),session('app_id'),session('tt_id'),session('approved'));
            $type = DB::table('quizzes')->where('employer_id', session('employer_id'))->get();
            $futureMeetings = $this->getFutureInternshipMeetings();
            return view('company1.select_exist_test_module',[
                "type"=> $type,
                "futureMeetings"=>$futureMeetings
            ]);
        }
        return redirect('/');
    }

    public function selected_test_module_for_app(Request $request){
        $employerId = session('employer_id');
        $s_id = $request->input('stu_id');
        $app_id = $request->input('app_id');
        $t_id = $request->input('test_id');
        $quizId =$request->input('select');
        // dd($request->all());
    if ($s_id && $app_id) {
                $test = Tests::updateOrCreate(
                    ['test_id' => $t_id],
                    ['quiz_id' => $quizId, 'student_id' => $s_id,'conducting_datetime' => NULL,    'application_id' => $app_id]
                );

                $test_id = $test->test_id;
                DB::table('application')->where('application_id', $app_id)->update(['quiz_id' => $quizId, 'test_status' => 0, 'test_id' => $test_id]);

            }
    return redirect('/employer/')->with('Success','Successfully added the module');

    }
    public function export_test_page(){
            $futureMeetings = $this->getFutureInternshipMeetings();
            $t= DB::table('quizzes')->where('employer_id',session('employer_id'))->get();
            return view('company1.export',[
                "test"=>$t,
                "futureMeetings"=>$futureMeetings
            ]);
    }

   public function edit_test_page()
{
    $employer_id = session('employer_id');

    if ($employer_id) {
        $futureMeetings = $this->getFutureInternshipMeetings();

        // Filter quizzes based on the logged-in company (employer_id)
        $quiz = DB::table('quizzes')
            ->where('employer_id', $employer_id)
            ->get();

        return view('company1.tests.edit_test.fetch_test', [
            'quiz' => $quiz,
            'futureMeetings' => $futureMeetings
        ]);
    }

    return redirect('/');
}


    public function edit_particular_test($id){
        if(session('employer_id')){
            if (request()->has('quiz_id')) {
                $quiz_id = request()->quiz_id;
                $futureMeetings = $this->getFutureInternshipMeetings();
                $quiz = DB::table('quizzes')->where('quiz_id',$quiz_id)->first();
                $ques = DB::table('questions')->where('quiz_id',$quiz_id)->get();
                return view('company1.tests.edit_test.edit_test',[
                    'quiz'=>$quiz,
                    'ques'=>$ques,
                    "futureMeetings"=>$futureMeetings
                ]);
            }
            elseif (request()->has('question_id')) {
                $question_id = request()->question_id;
                $futureMeetings = $this->getFutureInternshipMeetings();
                // $quiz = DB::table('quizzes')->where('quiz_id',$id)->first();
                $ques = DB::table('questions')->where('question_id',$question_id)->first();
                // dd($ques);
                return view('company1.tests.edit_test.edit_test',[
                    'question'=>$ques,
                    "futureMeetings"=>$futureMeetings
                ]);
            }
        }
        return redirect('/');
    }

    public function delete_test($id) {
        if (request()->has('quiz_id')) {
            $quiz_id = request()->quiz_id;
             DB::table('quizzes')->where('quiz_id',$quiz_id)->delete();
             DB::table('questions')->where('quiz_id',$quiz_id)->delete();
        }
        elseif (request()->has('question_id')) {
            $question_id = request()->question_id;
            DB::table('questions')->where('question_id',$question_id)->delete();
        }
        return redirect()->back()->with('Success','Successfully deleted');
    }


    public function face_2_face_job()
    {
        // Check if employer is logged in
        if (session('employer_id')) {

            $futureMeetings = $this->getFutureInternshipMeetings();

            $employerId = session('employer_id');
            // // $column = $request->get('qualified', 'company_name');
            // // $order = $request->get('order', 'asc');


            $applications = DB::table('application')
            ->select(
                'application.application_id',
                'application.student_id',
                'application.zoom_meeting',
                'application.zoom_time',
                'student.full_name as student_name',
                'job_post.job_title'
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
            ->paginate(10);


            return view('company1.face2face_job', [
                "user" => $applications,
                "futureMeetings"=>$futureMeetings
            ]);
        }

        return redirect('/');
    }

    public function interview_approval($app_id, $arr)
    {
        // Check if employer is logged in
        if (session('employer_id')) {
            // return $arr;
            // if()
            DB::table('application')->where('application_id',$app_id)
            ->update(["meet_status"=>$arr]);
            $id = DB::table('application')->where('application_id',$app_id)
            ->first();

            $user = DB::table('student')->where('student_id',$id->student_id)->first();
            $new_user = [];
            $new_user['email'] = $user->email;
            $new_user['name'] = $user->full_name;

            if($id->type == "Job"){
                $job = DB::table('job_post')->where('job_id',$id->job_id)->first();
                $new_user['title'] = $job->job_title;
                $new_user['company_name'] = $job->company_name;
                $new_user['type'] = 1;
            }
            else{
                $int = DB::table('internship_post')->where('internship_id',$id->internship_id)->first();
                $new_user['title'] = $int->internship_title;
                $new_user['company_name'] = $int->company_name;
                $new_user['type'] = 2;
            }

            if($arr == 1){
                // return 1;

                DB::table('messages')->insert([
                    'employer_id'=>session('employer_id'),
                    'student_id'=>$id->student_id,
                    'message' => "You have selected for the post by your interview",
                    'read'=>0
                ]);
                Mail::to($new_user['email'])->send(new FinalApprovalMail($new_user));
                return redirect()->back()->with('Success','Approved for the selected candidate');
            }
            else{
                // return 0;
                DB::table('messages')->insert([
                    'employer_id'=>session('employer_id'),
                    'student_id'=>$id->student_id,
                    'message' => "You have not selected for the post by your interview",
                    'read'=>0
                ]);
                Mail::to($new_user['email'])->send(new FinalRejectMail($new_user));
                return redirect()->back()->with('Success','Rejected for the selected candidate');
            }


        }

        return redirect('/');
    }


    public function results_intern()
    {
        // Check if employer is logged in
        if (session('employer_id')) {

            $futureMeetings = $this->getFutureInternshipMeetings();

            $employerId = session('employer_id');
            // // $column = $request->get('qualified', 'company_name');
            // // $order = $request->get('order', 'asc');


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
            ->paginate(10);
// dd($applications);
            return view('company1.results', [
                "user" => $applications,
                "futureMeetings"=>$futureMeetings
            ]);
        }

        return redirect('/');
    }

    public function results_job()
    {
        // Check if employer is logged in
        if (session('employer_id')) {

            $futureMeetings = $this->getFutureInternshipMeetings();

            $employerId = session('employer_id');
            // // $column = $request->get('qualified', 'company_name');
            // // $order = $request->get('order', 'asc');


            $applications = DB::table('application')
            ->select(
                'application.application_id',
                'application.student_id',
                'application.zoom_meeting',
                'application.zoom_time',
                'application.meet_status',
                'application.joining_date',
                'application.offer_issue_date',
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
            ->paginate(10);

            return view('company1.results_job', [
                "user" => $applications,
                "futureMeetings"=>$futureMeetings
            ]);
        }

        return redirect('/');
    }



    public function results_filter($inp)
    {
        // Check if employer is logged in
        if (session('employer_id')) {

            $futureMeetings = $this->getFutureInternshipMeetings();

            $employerId = session('employer_id');
            // // $column = $request->get('qualified', 'company_name');
            // // $order = $request->get('order', 'asc');

            $applications = DB::table('application')
            ->select(
                'application.application_id',
                'application.student_id',
                'application.zoom_meeting',
                'application.zoom_time',
                'application.meet_status',
                'application.joining_date',
                'application.offer_issue_date',
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
            ->where('application.meet_status', 1);

if ($inp == 3) {
    $applications->whereNotNull('application.offer_issue_date');
} elseif ($inp == 4) {
    $applications->whereNull('application.offer_issue_date');
}

$applications = $applications->paginate(10);

            return view('company1.results', [
                "user" => $applications,
                "futureMeetings"=>$futureMeetings
            ]);
        }

        return redirect('/');
    }

    public function results_filter_job($inp)
    {
        // Check if employer is logged in
        if (session('employer_id')) {

            $futureMeetings = $this->getFutureInternshipMeetings();

            $employerId = session('employer_id');
            // // $column = $request->get('qualified', 'company_name');
            // // $order = $request->get('order', 'asc');

            $applications = DB::table('application')
            ->select(
                'application.application_id',
                'application.student_id',
                'application.zoom_meeting',
                'application.zoom_time',
                'application.meet_status',
                'application.joining_date',
                'application.offer_issue_date',
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
            ->where('application.meet_status', 1);

if ($inp == 3) {
    $applications->whereNotNull('application.offer_issue_date');
} elseif ($inp == 4) {
    $applications->whereNull('application.offer_issue_date');
}

$applications = $applications->paginate(10);

            return view('company1.results_job', [
                "user" => $applications,
                "futureMeetings"=>$futureMeetings
            ]);
        }

        return redirect('/');
    }




public function joining_date(Request $request,$inp)
    {
        // Check if employer is logged in
        if (session('employer_id')) {

            $futureMeetings = $this->getFutureInternshipMeetings();

            $employerId = session('employer_id');
            // // $column = $request->get('qualified', 'company_name');
            // // $order = $request->get('order', 'asc');

            $id = DB::table('application')
                ->where('application_id', $inp)
                ->first();

            $user = DB::table('student')->where('student_id',$id->student_id)->first();
            DB::table('application')->where('application_id', $inp)
            ->update(["joining_date"=>$request->input('datetime')]);

            $new_user=[];
            $new_user['email']=$user->email;
            $new_user['name']=$user->full_name;
            $new_user['date']=$request->input('datetime');

            if($id->type == "job"){
                $job = DB::table('job_post')->where('job_id',$id->job_id)->first();
                $new_user['title']=$job->job_title;
                $new_user['company_name']=$job->company_name;
                $new_user['type']= 1;
            }
            else{
                $int = DB::table('internship_post')->where('internship_id',$id->internship_id)->first();
                $new_user['title']=$int->internship_title;
                $new_user['company_name']=$int->company_name;
                $new_user['type']= 2;
            }

            Mail::to($new_user['email'])->send(new JoiningDateMail($new_user));
            DB::table('messages')->insert([
                'employer_id'=>session('employer_id'),
                'student_id'=>$id->student_id,
                'message' => "Your offer letter date will be on".$request->input('datetime'),
                'read'=>0
            ]);
            return redirect()->back()->with('Success','Your joining date has been sent');
        }

        return redirect('/');
    }


public function offer_issue_date(Request $request,$inp)
    {
        // Check if employer is logged in
        if (session('employer_id')) {

            $futureMeetings = $this->getFutureInternshipMeetings();

            $employerId = session('employer_id');
            // // $column = $request->get('qualified', 'company_name');
            // // $order = $request->get('order', 'asc');

            $id = DB::table('application')
                ->where('application_id', $inp)
                ->first();

            $user = DB::table('student')->where('student_id',$id->student_id)->first();
            DB::table('application')->where('application_id', $inp)
            ->update(["offer_issue_date"=>$request->input('datetime')]);

            $new_user=[];
            $new_user['email']=$user->email;
            $new_user['name']=$user->full_name;
            $new_user['date']=$request->input('datetime');

            if($id->type == "job"){
                $job = DB::table('job_post')->where('job_id',$id->job_id)->first();
                $new_user['title']=$job->job_title;
                $new_user['company_name']=$job->company_name;
                $new_user['type']= 1;
            }
            else{
                $int = DB::table('internship_post')->where('internship_id',$id->internship_id)->first();
                $new_user['title']=$int->internship_title;
                $new_user['company_name']=$int->company_name;
                $new_user['type']= 2;
            }
            Mail::to($new_user['email'])->send(new OfferIssueMail($new_user));
            DB::table('messages')->insert([
                'employer_id'=>session('employer_id'),
                'student_id'=>$id->student_id,
                'message' => "Your offer letter date will be on".$request->input('datetime'),
                'read'=>0
            ]);
            return redirect()->back()->with('Success','Your offer letter has been sent');
        }

        return redirect('/');
    }



//     public function intership_app_sort(Request $request)
//     {
//         $employerId = session('employer_id');
//         $column = $request->get('column', 'company_name');
//         $order = $request->get('order', 'asc');
//         $applications = DB::select("
//         SELECT application.*, student.full_name as student_name,student.resume as resume, student.phone as student_phone , student.email as student_email , internship_post.internship_title
//     FROM application
//     JOIN internship_post ON application.internship_id = internship_post.internship_id
//     JOIN student ON application.student_id = student.student_id
//     WHERE internship_post.employer_id = :employerId and application.status = 0
//     ", ['employerId' => session('employer_id')]);
// $futureMeetings = $this->getFutureInternshipMeetings();

//     return view('company1.internship_app', ['applications' => $applications,
// "futureMeetings"=>$futureMeetings
// ]);
//         $internships = DB::table('internship_post')->where('employer_id', $employerId)
//             ->orderBy($column, $order)
//             ->paginate(10);
//         $futureMeetings = $this->getFutureInternshipMeetings();
//         return view('company1.posted_internship', [
//             'internships' => $internships,
//             "futureMeetings"=>$futureMeetings
//         ]);
//         // return response()->json([
//         //     'internships' => $internships,
//         // ]);
//     }
}
