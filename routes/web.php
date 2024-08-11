<?php

use App\Mail\SubscriptionMail;
use App\Mail\ContactMail;
use App\Mail\SampleMail;
use App\Mail\EmployerMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\ZoomMeetingInvitationMail;
use App\Mail\TestScheduleMail;
use App\Mail\TestRejectMail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuestUserController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin2Controller;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ZoomController;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\RazorpayController;
use App\Models\Tests;
use App\Http\Controllers\CandidateDashboardController;
use App\Mail\EmployerApprovalMail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CandidatesExport;
use App\Jobs\SendEmailJob;
use App\Mail\TestingQueuetMail;
use Carbon\Carbon;
use App\Mail\UnpaidCandidatesMail;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/test_q',function(){
    // $data = [
    //     '111'=>8,
    //     'skill'=>['a','b','c'],
    //     'id'=>10
    // ];
    // dispatch(new SendEmailJob($data));
    // return 1;
//     $details =['name'=>"deepak"];
// Mail::to("draj24993@gmail.com")->send(new UnpaidCandidatesMail($details));
$users = DB::table('tests')
            ->select('student.email','student.full_name','tests.conducting_datetime','application.type','application.company_name','application.job_id','application.internship_id')
            ->join('application', 'tests.application_id', '=', 'application.application_id')
            ->join('student', 'tests.student_id', '=', 'student.student_id')
            ->where('conducting_datetime', '>=', now()->addHours(24))
            ->where('conducting_datetime', '<', now()->addHours(25))
            ->get();
            dd($users);
        foreach($users as $u){
            if($u->type == "Job"){
                $j = DB::table('job_post')->where('job_id',$u->job_id)->first();
                $title = $j->job_title;
            }
            else{
                $j = DB::table('internship_post')->where('internship_id',$u->internship_id)->first();
                $title = $j->internship_title;
            }
            $selectedDateTime = new DateTime($u->conducting_datetime);
            $formattedDateTime = $selectedDateTime->format('jS M Y h:i A');
            $details =[
                'name'=>$u->full_name,
                'title'=> $title,
                'time' => $formattedDateTime,
                'company_name' => $u->company_name
            ];
            // Mail::to($u->email)->queue(new TestRemainderMail($details));
        }
        dd($details);
});


Route::get('/export-candidates/{id}', function ($id) {
    $query = DB::table('student')
        ->select(
            'full_name',
            'first_name',
            'last_name',
            'email',
            'phone',
            'dob',
            'gender',
            'district',
            'state',
            'country',
            'payment_status'
        )
        ->when($id == 2, function ($query) {
            return $query->where('payment_status', 1);
        })
        ->when($id == 3, function ($query) {
            return $query->whereNull('payment_status');
        })
        ->orderBy('created_at', 'desc')
        ->get();

    return Excel::download(new CandidatesExport($query), 'candidates.xlsx');
});
Route::get('edit_test/{id}', function ($id) {
    $quiz = DB::table('quizzes')->where('quiz_id',$id)->first();
    $ques = DB::table('questions')->where('quiz_id',$id)->get();
    return view('company1.tests.edit_test.edit_test',[
        'quiz'=>$quiz,
        'ques'=>$ques
    ]);
});
Route::get('stu', function () {
    return view('company.psi');
});
Route::get('login_candidate/{email}/{id}',[LoginController::class , 'login_candidate'] );

Route::get('test', function () {
    try {
        DB::connection()->getPdo();
        echo "Database connection is successful.";
    } catch (\Exception $e) {
        die("Could not connect to the database. Error: " . $e->getMessage());
    }
});
Route::get('/create-meeting', [ZoomController::class, 'createMeeting']);


// Route::get('ee', function () {
//     $folder = 'resumes';
//     $filename = "23-12-131702459525.Deepakraj's Resume (4).pdf.pdf";

//     // Concatenate folder and filename
//     $filePath = public_path($folder . '/' . $filename);

//     // Check if the file exists
//     if (File::exists($filePath)) {
//         // Delete the file using PHP's unlink function
//         File::delete($filePath);

//         return "File $filename deleted successfully.";
//     } else {
//         return "File $filename not found.";
//     }
// });
//

//Guest user accessing routes
Route::get('/', function () { return view('guest/index'); });
Route::get('/contact_us', function () { return view('guest/contactus'); });
Route::post('/contact_form_submission', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'email' => 'required|email:rfc,dns',
    ], [
        'email.email' => 'The :attribute must be a valid email address according to RFC standards and have a valid DNS record.',
    ]);

    if ($validator->fails()) {
        return redirect('contact_us')
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Invalid email address');
    }
    $name = $request->input('name');
    $email = $request->input('email');
    $subject = $request->input('subject');
    $message = $request->input('message');

    $details = [
        'subject' => $subject,
        'name' => $name,
        'message' => $message,
    ];

    // Separate data and status for the insert method
    $data = array_merge($request->except('_token'), ['status' => 0]);

    // Insert data into the 'contact_us' table
    DB::table('contact_us')->insert($data);

    // Send email
    Mail::to("info@thozhil.co.in")->send(new ContactMail($details));

    return redirect()->back()->with('Success', 'Your query has been submitted');
});
Route::get('/all_jobs',[GuestUserController::class , 'all_jobs']);
Route::get('/job_detail/{encryptedId}', [GuestUserController::class , 'job_detail']);
Route::post('job_filter',[GuestUserController::class , 'job_filter'])->name('job_filter');
Route::post('job_search', [GuestUserController::class , 'job_search'])->name('job_search');


Route::get('/all_intern',[GuestUserController::class , 'all_intern']);
Route::get('/internship_detail/{encryptedId}',[GuestUserController::class , 'internship_detail']);
Route::post('internship_filter',[GuestUserController::class , 'internship_filter'])->name('internship_filter');
Route::post('internship_search',[GuestUserController::class , 'internship_search'])->name('internship_search');


Route::get('/our_mission', function () { return view('guest/our_mission'); });
Route::get('/faq', function () { return view('guest/faq'); });
Route::get('our_vision', function () { return view('guest/our_vision'); });
Route::get('login_register', function () {
    if (session('user_id') || session('employer_id')) {
        return redirect('/');
    }

    return view('login/index');
});
Route::get('how_it_works', function () { return view('guest/how_it_works'); });
Route::get('privacy', function () { return view('guest/privacy'); });
Route::get('terms_condition', function () { return view('guest/terms_condition'); });
Route::get('Pricing_Policy', function () { return view('guest/pricing'); });
Route::get('cancellation_policy', function () { return view('guest/cancelation_policy'); });
Route::post('email_subscription', function (Request $request) {
    $email = $request->input('email');
    $validator = Validator::make($request->all(), [
        'email' => 'required|email:rfc,dns',
    ], [
        'email.email' => 'The :attribute must be a valid email address according to RFC standards and have a valid DNS record.',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Invalid email address');
    }
    DB::table('subscription')->insert(['email'=> $email]);
    Mail::to($email)->send(new SubscriptionMail($email));
    return redirect()->back()->with('Success','Your email has been subscribed successfully');
});


Route::get('/login_error', function () {
    return redirect('login_register')->with('error','You have to login first');
});





Route::get('/forgot_password', function () {
    return view('login/forgot');
});
Route::get('/reset_pass', function () {
    return view('login/reset');
});

Route::get('login/{email}/{token}',[LoginController::class , 'index'] );

Route::get('f-pass',function(){
    return view('guest.forgotpass');
} );
Route::get('forpass',[ForgotPasswordController::class , 'forgot_password'] );
Route::get('otp',[ForgotPasswordController::class , 'otp'] );




Route::get('/college_register', function () {
    return view('internships/collegeregister');
});


Route::get('/internship_post', function () {
    return view('internships/internshippost');
});
Route::get('internship_application', [EmployerController::class , 'intern_apply_form']);




Route::get('/job_posting', function () {
    return view('internships/jobposting');
});

Route::get('/job_application', function () {
    if (session('user_id')) {
        $user = DB::table('intern.student')->where('student_id', session('user_id'))->first();
        $degrees = DB::table('intern.degrees')->select('degree_type')->groupBy('degree_type')->get();

        return view('internships/jobapplicationform', [
            'degree' => $degrees,
            'user' => $user
        ]);
    }
});


Route::get('/internships', function () {
    $int =  DB::table('internship_post')
    ->orderBy('internship_id', 'desc')
    ->limit(9)
    ->get();
    return view('guest/internships',["int"=>$int]);
});
Route::get('/internship_detail', function () {
    return view('guest/internship-detail');
});
Route::get('/jobs', function () {
    return view('jobs/jobs');
});








// Student Controller
Route::post('instant_register', [StudentController::class , 'new_user']);
Route::get('student_register', [StudentController::class , 'full_details']);
Route::get('fetc', [StudentController::class , 'fetchh']);
Route::post('/submit-form', [StudentController::class , 'view']);
// Route::post('/submit-form', function(Request $request){
    // dd($request->all());
// });

Route::get('student_dashboard', [StudentController::class , 'dashboard']);
Route::get('applied_internships', [StudentController::class , 'applied_internships']);

Route::get('int_ppp', function(){
    $intern = DB::table('internship_post')->select('*')->get();
    return view('Student1.internship', ["intern" => $intern]);
});
Route::get('view/{input}', function ($input) {
    $db = DB::table('internship_post')->where('internship_id', '=', $input)->get();
    return dd($db);
});
Route::get('/download_student/{filename}', function ($filename) {
    $filename = basename($filename);
    $decodedFilename = urldecode($filename);
    $path = public_path("resumes/{$decodedFilename}");
// return $path;
    if (is_file($path)) {
        $headers = [
            'Content-Type' => 'application/pdf', // Change this based on the file type
            'Content-Disposition' => 'inline; filename="' . $decodedFilename . '"',
        ];

        return response()->download($path, $decodedFilename, $headers);
    } else {
        return response()->json(['error' => 'File not found'], 404);
    }
});

//Student dashboard applications view
Route::get('view_total_applied_jobs',[CandidateDashboardController::class , 'view_total_applied_jobs']);
Route::get('view_total_applied_internships', [CandidateDashboardController::class , 'view_total_applied_internships']);

Route::get('approved_application_intern',[CandidateDashboardController::class , 'approved_application_intern']);
Route::get('approved_application_job', [CandidateDashboardController::class , 'approved_application_job']);

Route::get('rejected_application_intern',[CandidateDashboardController::class , 'rejected_application_intern']);
Route::get('rejected_application_job', [CandidateDashboardController::class , 'rejected_application_job']);

//Student dashboard applications search
Route::get('search_total_applied_internships',[CandidateDashboardController::class , 'search_total_applied_internships'] )->name('search_total_applied_internships');
Route::get('search_total_applied_jobs', [CandidateDashboardController::class , 'search_total_applied_jobs'])->name('search_total_applied_jobs');

Route::get('search_approved_jobs',[CandidateDashboardController::class , 'search_approved_jobs'] )->name('search_approved_jobs');
Route::get('search_approved_internships',[CandidateDashboardController::class , 'search_approved_internships'] )->name('search_approved_internships');

Route::get('search_rejected_jobs',[CandidateDashboardController::class , 'search_rejected_jobs'] )->name('search_rejected_jobs');
Route::get('search_rejected_internships',[CandidateDashboardController::class , 'search_rejected_internships'] )->name('search_rejected_internships');


Route::group(['prefix' => 'candidate', 'middleware' => 'checkUserSession'],function () {    // Sub-route within the "admin" group
    Route::get('/', [StudentController::class , 'dashboard']);
    Route::get('profile', [StudentController::class , 'profile']);
    Route::get('all_jobs', [StudentController::class , 'all_jobs']);
    Route::get('all_intern', [StudentController::class , 'all_intern']);
    Route::get('internship_detail/{id}', [StudentController::class , 'internship_detail']);
    Route::get('internship_apply/{id}', [StudentController::class , 'internship_application_details']);
    Route::get('job_detail/{id}', [StudentController::class , 'job_detail']);
    Route::get('job_application_form/{input}', [StudentController::class , 'job_application_details']);
    Route::get('total_applied', [StudentController::class , 'total_applied']);
    Route::get('approved_app', [StudentController::class , 'approved_app']);
    Route::get('rejected_app', [StudentController::class , 'rejected_app']);
    Route::get('student_dash', [StudentController::class , 'student_dash']);
    Route::get('edit_profile', [StudentController::class , 'edit_profile']);
    Route::post('update_profile',  [StudentController::class , 'update_profile']  );
    Route::get('change_password', [StudentController::class , 'change_password']);
    Route::post('change_password_form', [StudentController::class , 'change_password_form']);
    Route::get('job_description/{input}', [StudentController::class , 'job_description']);
    Route::get('internship_description/{input}', [StudentController::class , 'internship_description']);
    Route::get('my_profile/{input}', [StudentController::class , 'my_profile']);
    Route::get('test_schedules',[StudentController::class , 'test_schedules']);
    Route::get('application_status',[StudentController::class , 'application_status']);
    Route::get('application_profile/{id}',[StudentController::class , 'application_profile']);
     Route::get('/congrats', function () {
    //    session(['redirected_to_application' => true]);

        // Redirect to the application page
        return view('student_.congrats');
    });

    Route::get('messages', [StudentController::class , 'messages']);

    Route::post('update-read-status/{messageId}', function($messageId){
        DB::table('messages')->where('messages_id',$messageId)->update(["read"=>1]);
        return response()->json(['message' => 'Read status updated successfully']);
    });
    Route::get('delete/{id}', function($id){
        DB::table('student')->where('student_id',$id)->delete();
        Session::flush();
        return redirect('/')->with('Success','Your account has been deleted successfully');
    });
});
Route::get('total_application', function (Request $request) {
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

    $mergedResults = $app_int->merge($app_job)->all();
    // return $mergedResults;
    return view('student_.total_app_list', ['app_int' => $app_int,'app_job'=>$app_job])->render();
})->name('total_application');
Route::get('approved_app', function (Request $request) {
    // if($request->input('title')){
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

    $mergedResults = $app_int->merge($app_job)->all();
    // return $mergedResults;
    return view('student_.approved_app_list', ['app_int' => $app_int,'app_job'=>$app_job])->render();
})->name('approved_app');
Route::get('rejected_app', function (Request $request) {

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

    $mergedResults = $app_int->merge($app_job)->all();
    // return $mergedResults;
    return view('student_.rejected_app_list', ['app_int' => $app_int,'app_job'=>$app_job])->render();
})->name('rejected_app');


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
Route::get('test/{id}/{app_id}', function($id,$app_id){
    // $quizQuestions = DB::table('questions')->where('quiz_id', $id)->get();
    $quiz = DB::table('quizzes')->where('quiz_id', $id)->first();
    return view('company1.tests.test_selection',["quiz"=>$quiz , 'app_id'=>$app_id]);
});
Route::get('test_start/{id}/{app_id}', function($id,$app_id){
    $quizQuestions = DB::table('questions')->where('quiz_id', $id)->get();
    $quiz = DB::table('quizzes')->where('quiz_id', $id)->first();
    return view('company1.tests.test_page',["quiz"=>$quiz ,'app_id'=>$app_id, 'quizQuestions'=>$quizQuestions]);
});
Route::post('submission/{app_id}', function(Request $request , $app_id){
    if ($request->isMethod('post')) {
        // Get the quiz_id from the form
        $quizId = $request->input('quiz_id');
// dd($quizId);
        // Prepare the answers data to be stored in the database
        $answers = $request->input('answers');
        $perCent = DB::table('quizzes')->where('quiz_id',$quizId)->first();
        $ques = DB::table('questions')->where('quiz_id',$quizId)->count();
        $totalScore = 0;
        $totalQUES= $ques*2;
        $PERCENT = ($totalScore / $totalQUES) * 100;
        $QualifyPercent = round($PERCENT);

        foreach ($answers as $questionId => $chosenAnswer) {
            $correctAnswer = DB::table('questions')->where('question_id', $questionId)->value('correct_option');

            if ($chosenAnswer == $correctAnswer) {
                $totalScore += 2;
            } else {
                $totalScore -= 1;
            }

            DB::table('test_submissions')->insert([
                'student_id' => session('user_id'),
                'question_id' => $questionId,
                'chosen_answer' => $chosenAnswer,
            ]);
        }
        $totalQUES= $ques*2;
        $PERCENT = ($totalScore / $totalQUES) * 100;
        $QualifyPercent = round($PERCENT);
        if($QualifyPercent >= $perCent->percentage){
            $testQualified = 1;
        }
        else{
            $testQualified = 0;
        }
        // Store the total score in the database
        DB::table('scores')->insert([
            'student_id' => session('user_id'),
            'quiz_id' => $quizId,
            'score' => $totalScore,
            'application_id' => $app_id,
            'percentage' => $QualifyPercent
        ]);
        DB::table('application')->where('application_id', $app_id)->update(['test_status' => 1,'test_qualified'=>$testQualified]);
        DB::table('tests')->where('student_id', session('user_id'))->where('quiz_id' , $quizId)->where('application_id', $app_id)->update(['status'=> 1,'percentage'=>$QualifyPercent]);
        // if($testQualified == 1){
        //     return redirect('/candidate/')->with('Success','You have been qualified for next round');
        // }
        // else{
            return redirect('/candidate/')->with('Success','You have successfully submitted and wait for your results');
        // }
    } else {
        return "Error: Quiz data not provided!";
    }

});







// Employer Controller
Route::get('employer_register', [EmployerController::class , 'full_details']);
Route::post('job_posting_form',[EmployerController::class, 'job_details']);
Route::post('internship_post_form',[EmployerController::class, 'internship_details']);
Route::post('employer_store', [EmployerController::class,'store']);
Route::get('company_profile', [EmployerController::class,'emp_details']);

Route::get('intern_application', [EmployerController::class,'intern_application']);
Route::get('job_application', [EmployerController::class,'job_application']);
// Route::get('approved_intern', [EmployerController::class,'approved_intern']);
Route::get('approved_job', [EmployerController::class,'approved_job']);
Route::get('/download/{filename}', function ($filename) {
    $filename = basename($filename);
    $decodedFilename = urldecode($filename);
    $path = public_path("resumes/{$decodedFilename}");

    if (is_file($path)) {
        $headers = [
            'Content-Type' => 'application/pdf', // Change this based on the file type
            'Content-Disposition' => 'inline; filename="' . $decodedFilename . '"',
        ];

        return response()->download($path, $decodedFilename, $headers);
    } else {
        return response()->json(['error' => 'File not found'], 404);
    }
});
// Route::get('/get-pdf/{name}', function ($name) {
//     $decodedFilename = urldecode(basename($name));
//     $encodedFilename = rawurlencode($decodedFilename);
//     $path = public_path("resumes/{$decodedFilename}");

//     if (file_exists($path)) {
//         return response()->json(['success' => true, 'url' => asset("resumes/{$encodedFilename}")]);
//     } else {
//         return response()->json(['success' => false, 'message' => 'PDF not found']);
//     }
// });
Route::get('/get-pdf/{name}', function ($name) {
    $decodedFilename = urldecode(basename($name));
    $encodedFilename = rawurlencode($decodedFilename);
    $path = public_path("resumes/{$decodedFilename}");

    if (file_exists($path)) {
        // Generate a secure URL using the 'secure_asset' helper for HTTPS
        $url = secure_asset("resumes/{$encodedFilename}");

        return response()->json(['success' => true, 'url' => $url]);
    } else {
        return response()->json(['success' => false, 'message' => 'PDF not found']);
    }
});
Route::get('/get-pdf-logo/{name}', function ($name) {
    $decodedFilename = urldecode(basename($name));
    $encodedFilename = rawurlencode($decodedFilename);
    $path = public_path("company_logo/{$decodedFilename}");

    if (file_exists($path)) {
        $url = secure_asset("company_logo/{$encodedFilename}");

        return response()->json(['success' => true, 'url' => $url]);
    } else {
        return response()->json(['success' => false, 'message' => 'PDF not found']);
    }
});



Route::group(['prefix' => 'employer', 'middleware' => 'checkEmployerSession'],function () {
    Route::get('/', [EmployerController::class,'emp_dash']);
    Route::get('dashboard_overview', [EmployerController::class,'emp_dash_overview']);
    Route::get('interview_schedule',[EmployerController::class,'scheduled_interviews']);
    Route::get('scheduled_interviews', [EmployerController::class, 'manage_scheduled_interviews']);
    Route::get('all_posted_app', [EmployerController::class,'all_posted_app']);
    Route::get('all_received_app', [EmployerController::class,'all_received_app']);

    Route::get('post_internship', [EmployerController::class,'internship_post']);
    Route::get('posted_internship', [EmployerController::class,'posted_internship']);
    Route::get('edit_internship/{id}', [EmployerController::class,'edit_internship']);
    Route::post('update_internship', [EmployerController::class,'update_internship']);
    Route::get('delete_internship/{id}',[EmployerController::class,'delete_internship'] );
    Route::get('internship_applications', [EmployerController::class,'intern_application']);
    Route::get('approve_intern/{input}',[EmployerController::class,'approve_intern']);
    Route::get('approve_all_interns_app',[EmployerController::class,'approve_all_interns_app']);
    Route::get('reject_all_interns_app',[EmployerController::class,'reject_all_interns_app']);
    Route::post('reject_intern/{input}',[EmployerController::class,'reject_intern']);
    // Route::get('intern_pending',[EmployerController::class,'intern_pending']);
    Route::get('approved_intern',[EmployerController::class,'approved_intern']);
    Route::get('rejected_intern',[EmployerController::class,'rejected_intern']);


    Route::get('post_jobs', [EmployerController::class,'job_post']);
    Route::get('posted_jobs', [EmployerController::class,'posted_jobs']);
    Route::get('edit_job/{id}', [EmployerController::class,'edit_job']);
    Route::post('update_job', [EmployerController::class,'update_job']);
    Route::get('delete_job/{id}',[EmployerController::class,'delete_job'] );
    Route::get('job_applications', [EmployerController::class,'job_application']);
    Route::get('approve_job/{input}',[EmployerController::class,'approve_job']);
    Route::get('approve_all_jobs_app',[EmployerController::class,'approve_all_jobs_app']);
    Route::get('approve_selected_jobs_app/{id}',function ($id){
        $idsArray = explode(',', $id);
    // Now $idsArray is an array of IDs
    return json_encode($idsArray);
        // $applications = DB::table('application')
        // ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
        // ->join('student', 'application.student_id', '=', 'student.student_id')
        // ->select(
        //     'application.application_id as app_id',
        //     'application.student_id',
        //     'student.email as email',
        //     'student.full_name as name',
        //     'job_post.job_title'
        // )
        // ->where('job_post.employer_id', session('employer_id'))
        // ->where('application.status', 0)
        // ->get();

        // // Send approval email
        // foreach ($applications as $application) {
        // $details = [
        //     'email' => $application->email,
        //     'name' => $application->name,
        //     'title' => $application->job_title,
        // ];
        //     Mail::to($details['email'])->send(new ApproveMail($details));
        //     DB::table('student')->where('email', $details['email'])->increment('email_received');
        //     DB::table('messages')->insert([
        //         'employer_id'=>session('employer_id'),
        //         'student_id'=>$application->student_id,
        //         'message' => "Your profile has been shortlisted for the job ". $application->job_title,
        //         'read'=>0
        //     ]);
        // }

        // DB::update(" UPDATE application SET status = 1 WHERE application_id IN (SELECT app_id FROM ( SELECT application.application_id AS app_id FROM application JOIN job_post ON application.job_id = job_post.job_id JOIN student ON application.student_id = student.student_id
        // WHERE job_post.employer_id = ". session('employer_id') ." ) AS subquery ) ");

        // return redirect()->back()->with('Success','Approved for all jobs application');
    });
    Route::get('reject_all_jobs_app',[EmployerController::class,'reject_all_jobs_app']);
    Route::post('reject_job/{input}',[EmployerController::class,'reject_job']);
    // Route::get('job_pending',[EmployerController::class,'job_pending']);
    Route::get('approved_job',[EmployerController::class,'approved_job']);
    Route::get('rejected_job',[EmployerController::class,'rejected_job']);

    Route::get('my_profile',[EmployerController::class,'my_profile']);
    Route::get('settings',[EmployerController::class,'settings']);
    Route::get('password_change',[EmployerController::class,'password_change']);
    Route::post('password_change_function',[EmployerController::class,'password_change_function']);
    Route::post('profile_update',[EmployerController::class,'profile_update']);
    Route::get('/add-test/{encryptedInternshipId}/{jr}', function($encryptedInternshipId, $jr) {
        $id = Crypt::decrypt($encryptedInternshipId);
        $jri =Crypt::decrypt($jr);
        // dd($id,$jri);
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

        return view('company1.tests.add_test', [
            "jobid" => $id,
            "jri" => $jri,
            "futureMeetings"=>$futureMeetings
        ]);
    });
    Route::get('/select_exist_test_module/{id}/{jri}', function($id, $jri) {
        $type = DB::table('quizzes')->where('employer_id', session('employer_id'))->get();
        return view('company1.select_exist_test_module', [
            "jobid" => $id,
            "jri" => $jri,
            "type"=> $type
        ]);
    });
    Route::post('/selected_test_module/{id}/{jri}', function(Request $request,$id, $jri) {
        $idd = Crypt::decrypt($id);
        $jri_i = Crypt::decrypt($jri);
        // dd($idd);
        $quizid = $request->input('select');
        // dd($quizid,$jri_i);
        if ($jri_i == 1) {
            DB::table('job_post')->where('job_id', $idd)->update(["quiz_id" => $quizid]);
            DB::table('application')->where('job_id', $idd)->update(["quiz_id" => $quizid]);
        } else {
            DB::table('internship_post')->where('internship_id', $idd)->update(["quiz_id" => $quizid]);
            DB::table('application')->where('internship_id', $idd)->update(["quiz_id" => $quizid]);
        }
        return redirect('/employer/')->with('Success','Your test questions fot test module has been added');
    });
    Route::get('/add_test/{id?}/{app_id?}/{t_id?}', [EmployerController::class, 'add_test_page']);
    Route::get('/import_test/{id?}/{app_id?}/{t_id?}', [EmployerController::class, 'import_test_page']);
    Route::get('/select_test/{idd?}/{app_idd?}/{t_idd?}', [EmployerController::class, 'select_test_page']);
    Route::post('selected_test_module_for_app', [EmployerController::class, 'selected_test_module_for_app']);

    Route::get('/export_test',[EmployerController::class,'export_test_page']);

    Route::get('/candidate_profile/{id}/{app_id}', [EmployerController::class , 'candidate_profile']);
    Route::get('/face_2_face', [EmployerController::class , 'face_2_face']);
    Route::get('/face_2_face_job', [EmployerController::class , 'face_2_face_job']);

    Route::get('/approved_intern/qualified', [EmployerController::class , 'approved_intern_qualified']);
    Route::get('/approved_intern/not_qualified', [EmployerController::class , 'approved_intern_not_qualified']);

    Route::get('/approved_job/qualified', [EmployerController::class , 'approved_job_qualified']);
    Route::get('/approved_job/not_qualified', [EmployerController::class , 'approved_job_not_qualified']);

    Route::get('/interview_approval/{app_id}/{arr}', [EmployerController::class , 'interview_approval']);

    Route::get('/results_intern', [EmployerController::class , 'results_intern']);
    Route::get('/results_job', [EmployerController::class , 'results_job']);

    Route::get('/results_intern/{inp}', [EmployerController::class , 'results_filter']);
    Route::get('/results_job/{inp}', [EmployerController::class , 'results_filter_job']);

    Route::post('/joining_date/{inp}', [EmployerController::class , 'joining_date']);
    Route::post('/offer_issue_date/{inp}', [EmployerController::class , 'offer_issue_date']);

    Route::get('edit_test',[EmployerController::class,'edit_test_page']);
    Route::get('edit_test/{id}',[EmployerController::class,'edit_particular_test']);

    Route::get('delete_test/{id}',[EmployerController::class,'delete_test']);


    Route::post('delete_selected_internship', function(Request $request) {
        $ids = $request->input('checkbox');

        foreach ($ids as $id) {
            // Assuming 'internship_id' is the primary key column
            DB::table('internship_post')->where('internship_id', $id)->delete();
        }

        return redirect()->back()->with("Success","Successfully deleted the selected internship");
    });

    Route::post('delete_selected_job', function(Request $request) {
        $ids = $request->input('checkbox');

        foreach ($ids as $id) {
            // Assuming 'internship_id' is the primary key column
            DB::table('job_post')->where('job_id', $id)->delete();
        }
        return redirect()->back()->with("Success","Successfully deleted the selected jobs");
    });
    Route::post('delete_selected_application', function(Request $request) {
        $ids = $request->input('checkbox');

        foreach ($ids as $id) {

            DB::table('application')->where('application_id', $id)->delete();
        }
        return redirect()->back()->with("Success","Successfully deleted the selected application");
    });


    Route::get('candidate_reject_mail/{id}', function($id){
        DB::table('application')->where('application_id', $id)->update(['test_reject_mail'=>1]);
        $app = DB::table('application')->where('application_id', $id)->first();
        DB::table('messages')->insert([
            'employer_id'=>session('employer_id'),
            'student_id'=>$app->student_id,
            'message' => "You have rejected from ". $app->company_name . "post",
            'read'=>0
        ]);
        $s = DB::table('student')->where('student_id',$app->student_id)->first();
        $details = [];
        $details['name'] = $s->full_name;
        $details['company_name'] = $app->company_name;

        if($app->type == 'Job'){
            $i = DB::table('job_post')->where('job_id',$app->job_id)->first();
            $details['title'] = $i->job_title;
        }
        else{
            $i = DB::table('internship_post')->where('internship_id',$app->internship_id)->first();
            $details['title'] = $i->internship_title;
        }
        Mail::to($s->email)->send(new TestRejectMail($details));
        return redirect()->back()->with("Success","Success");
    });

});




Route::post('adding_questions/{encryptedJobId}/{encryptedJri}',function(Request $request ,$encryptedJobId, $encryptedJri) {
    $jobid = decrypt($encryptedJobId);
    $jri = decrypt($encryptedJri);
    // dd($jobid,$jri);
    $employerId = session('employer_id');
    // $jri = $request->input('jri');
    $request->validate([
        'quizTitle' => 'required|string',
        'percentage' => 'required|integer',
        'testDuration' => 'required|integer',
        'questions' => 'required|array',
        'options' => 'required|array',
        'correct_answers' => 'required|array',
    ]);
    // dd($request->all());
    // Get data from the request
    $quizTitle = $request->input('quizTitle');
    $percentage = $request->input('percentage');
    $testDuration = $request->input('testDuration');
    $questions = $request->input('questions');
    $options = $request->input('options');
    $correctAnswers = $request->input('correct_answers');

    // // Start a database transaction
    // DB::beginTransaction();

    try {
        // Insert quiz details
        $quizId = DB::table('quizzes')->insertGetId([
            'employer_id' => $employerId,
            'title' => $quizTitle,
            'test_duration' => $testDuration,
            'percentage' => $percentage
        ]);

        // Insert questions and options
        foreach ($questions as $index => $question) {
            $option1 = $options[$index][0];
            $option2 = $options[$index][1];
            $option3 = $options[$index][2];
            $option4 = $options[$index][3];
            $correctOption = $correctAnswers[$index];

            DB::table('questions')->insert([
                'quiz_id' => $quizId,
                'question' => $question,
                'option1' => $option1,
                'option2' => $option2,
                'option3' => $option3,
                'option4' => $option4,
                'correct_option' => $correctOption,
            ]);
        }

    //   return  DB::table('job_post')->where('job_id', $jobid)->update(["quiz_id" => $quizId]);

    if ($jri == 1) {
         DB::table('job_post')->where('job_id', $jobid)->update(["quiz_id" => $quizId]);
         DB::table('application')->where('job_id', $jobid)->update(["quiz_id" => $quizId]);
    } else {
         DB::table('internship_post')->where('internship_id', $jobid)->update(["quiz_id" => $quizId]);
         DB::table('application')->where('internship_id', $jobid)->update(["quiz_id" => $quizId]);
    }


        return redirect('/employer/')->with('Success','Your test questions fot test module has been added');
    }
    catch (\Exception $e) {
        // Rollback the transaction in case of an error
        DB::rollback();

        return redirect()->back()->withErrors(['error' => 'Error occurred while adding quiz and questions']);
    }

});
Route::post('update_test',function(Request $request) {
    // dd($request->all());
    $employerId = session('employer_id');
    $quiz_id = $request->input('quiz_id');
        $quiz_title = $request->input('quiz_title');
        $percentage = $request->input('percentage');
        $test_duration = $request->input('test_duration');
       $questions = $request->input('question');
        $options1 = $request->input('option1');
        $options2 = $request->input('option2');
        $options3 = $request->input('option3');
        $options4 = $request->input('option4');
        $correct_options = $request->input('correct_option');

        // dd($request->all());
        // Update quiz details
        $update_quiz_sql = "UPDATE quizzes SET title=?, percentage=?, test_duration=? WHERE quiz_id=?";
        DB::update($update_quiz_sql, [$quiz_title, $percentage, $test_duration, $quiz_id]);
        $ques_ids = DB::table('questions')->select('question_id')->where('quiz_id', $quiz_id)->get();

// Loop through and update each question's details
foreach ($questions as $index => $question) {
    if (isset($ques_ids[$index]) && isset($ques_ids[$index]->question_id)) {
        $update_question_sql = "UPDATE questions SET
            question=?,
            option1=?,
            option2=?,
            option3=?,
            option4=?,
            correct_option=?
            WHERE quiz_id=? AND question_id=?";
        DB::table('questions')->where('quiz_id',$quiz_id)
            ->where('question_id',$ques_ids[$index]->question_id)
            ->update([
                "question"=>"$question",
                "option1" =>"$options1[$index]",
                "option2" =>"$options2[$index]",
                "option3" =>"$options3[$index]",
                "option4" =>"$options4[$index]",
                "correct_option" => "$correct_options[$index]"
            ]);

    } else {
        return 34324;
        // Handle the case where there is no corresponding question ID
        // You may want to log an error, skip the iteration, or handle it based on your specific needs
    }
}

if (!empty($request->input('questions'))) {
    $questions_1 = $request->input('questions');
    $options_1 = $request->input('options');
    $correctAnswers_1 = $request->input('correct_answers');
    foreach ($questions_1 as $index => $question) {
        $option1 = $options_1[$index][0];
        $option2 = $options_1[$index][1];
        $option3 = $options_1[$index][2];
        $option4 = $options_1[$index][3];
        $correctOption = $correctAnswers_1[$index];

        DB::table('questions')->insert([
            'quiz_id' => $quiz_id,
            'question' => $question,
            'option1' => $option1,
            'option2' => $option2,
            'option3' => $option3,
            'option4' => $option4,
            'correct_option' => $correctOption,
        ]);
    }
}


        return redirect("/employer/")->with('Success',"Quiz updated successfully!");

});
Route::post('update_question_id',function(Request $request) {
    $quesID = $request->input('question_id');
    $que = [
        'question'=> $request->input('question'),
        'option1'=> $request->input('option1'),
        'option2'=> $request->input('option2'),
        'option3'=> $request->input('option3'),
        'option4'=> $request->input('option4'),
        'correct_option'=> $request->input('correct_option')
    ];
    DB::table('questions')->where('question_id',$quesID)->update($que);
    return redirect('/employer/edit_test')->with('Success','Successfully updated the question');
});

Route::post('adding_questions_empty',function(Request $request) {
    $employerId = session('employer_id');
    $s_id = session('id');
    $app_id = session('app_id');
    $t_id = session('t_id');
    // $jri = $request->input('jri');
    $request->validate([
        'quizTitle' => 'required|string',
        'percentage' => 'required|integer',
        'testDuration' => 'required|integer',
        'questions' => 'required|array',
        'options' => 'required|array',
        'correct_answers' => 'required|array',
    ]);
    // dd($request->all());
    // Get data from the request
    $quizTitle = $request->input('quizTitle');
    $percentage = $request->input('percentage');
    $testDuration = $request->input('testDuration');
    $questions = $request->input('questions');
    $options = $request->input('options');
    $correctAnswers = $request->input('correct_answers');
// dd($request->all());
    // // Start a database transaction
    // DB::beginTransaction();

    try {
        // Insert quiz details
        $quizId = DB::table('quizzes')->insertGetId([
            'employer_id' => $employerId,
            'title' => $quizTitle,
            'test_duration' => $testDuration,
            'percentage' => $percentage
        ]);

        // Insert questions and options
        foreach ($questions as $index => $question) {
            $option1 = $options[$index][0];
            $option2 = $options[$index][1];
            $option3 = $options[$index][2];
            $option4 = $options[$index][3];
            $correctOption = $correctAnswers[$index];

            DB::table('questions')->insert([
                'quiz_id' => $quizId,
                'question' => $question,
                'option1' => $option1,
                'option2' => $option2,
                'option3' => $option3,
                'option4' => $option4,
                'correct_option' => $correctOption,
            ]);
        }

        // if ($jri == 1) {
        //      DB::table('job_post')->where('job_id', $jobid)->update(["quiz_id" => $quizId]);
        // } else {
        //      DB::table('internship_post')->where('internship_id', $jobid)->update(["quiz_id" => $quizId]);
        // }
        if ($s_id && $app_id) {
            $test = Tests::updateOrCreate(
                ['test_id' => $t_id],
                ['quiz_id' => $quizId, 'student_id' => $s_id,'conducting_datetime' => NULL,    'application_id' => $app_id]
            );

            $test_id = $test->test_id;
            DB::table('application')->where('application_id', $app_id)->update(['quiz_id' => $quizId, 'test_status' => 0, 'test_id' => $test_id]);

        }

        return redirect('/employer/')->with('Success','Your test questions fot test module has been added');
    }
    catch (\Exception $e) {
        // Rollback the transaction in case of an error
        DB::rollback();

        return redirect()->back()->withErrors(['error' => 'Error occurred while adding quiz and questions']);
    }

});
Route::post('import_questions',function(Request $request) {
    $employerId = session('employer_id');
    $s_id = session('id');
    $app_id = session('app_id');
    $t_id = session('t_id');
        // Validate the file upload
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:10240', // Adjust the max file size as needed
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $fileDestination = 'uploads/' . $fileName;

        // Move the uploaded file to the destination
        $file->move(public_path('uploads'), $fileName);

        // dd($request->all());
        // Get data from the request
        $quizTitle = $request->input('quizTitle');
        $percentage = $request->input('percentage');
        $testDuration = $request->input('testDuration');


        $quizId = DB::table('quizzes')->insertGetId([
            'employer_id' => $employerId,
            'title' => $quizTitle,
            'test_duration' => $testDuration,
            'percentage' => $percentage,
            'file_name' => $fileName,
        ]);

        // Process the CSV file
        $csvData = array_map('str_getcsv', file($fileDestination));
        $headerSkipped = false;

        foreach ($csvData as $data) {
            if (!$headerSkipped) {
                $headerSkipped = true;
                continue;
            }

            // Assuming the CSV has columns in the order: Questions, Option1, Option2, Option3, Option4, Correct Option
            $question = $data[0];
            $option1 = $data[1];
            $option2 = $data[2];
            $option3 = $data[3];
            $option4 = $data[4];
            $correctOption = $data[5];


            DB::table('questions')->insert([
                'quiz_id' => $quizId,
                'question' => $question,
                'option1' => $option1,
                'option2' => $option2,
                'option3' => $option3,
                'option4' => $option4,
                'correct_option' => $correctOption,
            ]);
        }
        if ($s_id && $app_id) {
            $test = Tests::updateOrCreate(
                ['test_id' => $t_id],
                ['quiz_id' => $quizId, 'student_id' => $s_id,'conducting_datetime' => NULL,    'application_id' => $app_id]
            );

            $test_id = $test->test_id;
            DB::table('application')->where('application_id', $app_id)->update(['quiz_id' => $quizId, 'test_status' => 0, 'test_id' => $test_id]);

        }


        return redirect('/employer/')->with('Success','Your test questions fot test module has been added');

});

Route::post('select_test_module/{email}/{id}/{t_id}', function (Request $request, $email, $id, $t_id) {
    $app_id = $id;
    $test_id = $t_id;
    $title = $request->input('title');
    $quiz_id = $request->input('test_module');
    $datetime = $request->input('datetime');
    $selectedDateTime = new DateTime($datetime);
    $formattedDateTime = $selectedDateTime->format('jS M Y h:i A');
    // $iddd  = DB::table('student')->select('student_id')->where('email', $email)->first();


    try {
        $student = DB::table('student')->where('email', $email)->first();
        $student_id = $student->student_id;
        // dd($student_id);
        // Send email notification


        // Insert record into the 'tests' table
        // $test_id = DB::table('tests')->updateOrCreate([
        //     'student_id' => $student_id,
        //     'quiz_id' => $quiz_id,
        //     'conducting_datetime' => $datetime,
        //     'application_id'=> $app_id
        // ]);
        // dd($test_id, $quiz_id,$student_id,
        // $datetime,
        // $app_id);
        $test = Tests::updateOrCreate(
            ['test_id' => $test_id],
            ['quiz_id' => $quiz_id, 'student_id' => $student_id, 'conducting_datetime' => $datetime, 'application_id' => $app_id]
        );
        // DB::table('tests')->where('test_id',$test_id)->update(['quiz_id' => $quiz_id, 'student_id' => $student_id, 'conducting_datetime' => $datetime, 'application_id' => $app_id]);

        $test_id = $test->test_id;

        // Update 'application' table with 'test_status' value of 0
        DB::table('application')->where('application_id', $app_id)->update(['quiz_id' => $quiz_id, 'test_status' => 0, 'test_id' => $test_id]);

        DB::table('messages')->insert([
            'employer_id' => session('employer_id'),
            'student_id' => $student_id,
            'message' => "You test has been allotted on " . $formattedDateTime . ".Kindly attend.",
            'read' => 0
        ]);
        $com = DB::table('application')
                ->join('quizzes', 'application.quiz_id', '=', 'quizzes.quiz_id')
                ->where('application_id', $app_id)
                ->first();
        $details = [
            'title' => $title,
            'datetime' => $formattedDateTime,
            'name' => $student->full_name,
            'app_id' => $app_id,
            'company_name' => $com->company_name,
            'duration' => $com->test_duration,
        ];
        Mail::to($email)->send(new TestScheduleMail($details));
        return redirect()->back()->with('Success', 'Your test has been allotted.');
    } catch (\Exception $e) {
        // Log the exception details
        \Log::error('Error in TestsController: ' . $e->getMessage());

        // Optionally, you can log additional information such as stack trace
        \Log::error($e->getTraceAsString());

        // Handle any exceptions (e.g., email sending failure)
        return redirect()->back()->with('error', 'An error occurred. Please try again. Details: ' . $e->getMessage());
    }
});


Route::post('select_test_module/{email}/{id}', function(Request $request, $email, $id) {
    $app_id = $id;
    $title = $request->input('title');
    $quiz_id = $request->input('test_module');
    $datetime = $request->input('datetime');
    $selectedDateTime = new DateTime($datetime);
    $formattedDateTime = $selectedDateTime->format('jS M Y h:i A');
    // $iddd  = DB::table('student')->select('student_id')->where('email', $email)->first();

// dd($request->all());
    try {
        $student = DB::table('student')->where('email', $email)->first();
        $student_id = $student->student_id;
        $com = DB::table('application')
                ->join('quizzes', 'application.quiz_id', '=', 'quizzes.quiz_id')
                ->where('application_id', $app_id)
                ->first();
        // Send email notification
        $details = [
            'title' => $title,
            'datetime' => $formattedDateTime,
            'name' => $student->full_name,
            'app_id' => $app_id,
            'company_name' => $com->company_name,'duration' => $com->test_duration,
        ];
        Mail::to($email)->send(new TestScheduleMail($details));

        // Insert record into the 'tests' table
        $test_id = DB::table('tests')->insertGetId([
            'student_id' => $student_id,
            'quiz_id' => $quiz_id,
            'conducting_datetime' => $datetime,
            'application_id'=> $app_id
        ]);

        // Update 'application' table with 'test_status' value of 0
        DB::table('application')->where('application_id', $app_id)->update(['quiz_id' => $quiz_id,'test_status' => 0,'test_id'=>$test_id]);
        DB::table('messages')->insert([
            'employer_id'=>session('employer_id'),
            'student_id'=>$student_id,
            'message' => "You test has been allotted on ".$formattedDateTime. ".Kindly attend.",
            'read'=>0
        ]);

        // dd($test_id);
        return redirect()->back()->with('Success', 'Your test has been allotted.');
    } catch (\Exception $e) {
        // Handle any exceptions (e.g., email sending failure)
        return redirect()->back()->with('error', 'An error occurred. Please try again.');
    }
});

Route::post('select_test_module_for_all', function (Request $request) {
    $datetime = $request->input('datetime');
    $checkboxes = $request->input('checkbox_values');

    // Do something with the checkbox values
    // return $request->input('intern');
    if($request->input('intern') == 1)
    {
        // return "intern";
        $users = DB::table('application')
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
                    'internship_post.internship_title',
                    'student.full_name as student_name',
                    'student.resume as resume',
                    'student.phone as student_phone',
                    'student.email as student_email'
                )
                ->join('student', 'application.student_id', '=', 'student.student_id')
                ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
                ->whereIn('application_id',$checkboxes)
                ->whereNotNull('application.quiz_id')
            ->get();

        // return $users;
        foreach ($users as $user) {

            $selectedDateTime = new DateTime($datetime);
            $formattedDateTime = $selectedDateTime->format('jS M Y h:i A');

            // Insert record into the 'tests' table
            Tests::updateOrCreate(
                ['application_id' => $user->application_id],
                ['quiz_id' =>  $user->quiz_id, 'student_id' => $user->student_id, 'conducting_datetime' => $datetime, $user->application_id]
            );

            // insert([
            //     'student_id' => $user->student_id,
            //     'quiz_id' => $user->quiz_id,
            //     'conducting_datetime' => $datetime,
            //     'application_id' => $user->application_id,
            // ]);

            // Update 'application' table with 'test_status' value of 0
            DB::table('application')->where('application_id', $user->application_id)->update([
                'test_status' => 0,
            ]);


            DB::table('messages')->insert([
                'employer_id'=>session('employer_id'),
                'student_id'=>$user->student_id,
                'message' => "You test has been allotted on ".$formattedDateTime. ".Kindly attend.",
                'read'=>0
            ]);
            $com = DB::table('application')
                ->join('quizzes', 'application.quiz_id', '=', 'quizzes.quiz_id')
                ->where('application_id', $user->application_id)
                ->first();
            $details = [
                'title' => $user->internship_title,
                'datetime' => $formattedDateTime,
                'name' => $user->student_name,
                'app_id' => $user->application_id,
                'company_name' => $com->company_name,'duration' => $com->test_duration,
            ];

            // Send email to the student
            Mail::to($user->student_email)->send(new TestScheduleMail($details));

        }
        // return 6;
        return 1;
    }
    else{
        // return "job";
        $users = DB::table('application')
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
                    'job_post.job_title',
                    'student.full_name as student_name',
                    'student.resume as resume',
                    'student.phone as student_phone',
                    'student.email as student_email'
                )
                ->join('student', 'application.student_id', '=', 'student.student_id')
                ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
                ->whereIn('application_id',$checkboxes)
                ->whereNotNull('application.quiz_id')
            ->get();

        // return $users;
        foreach ($users as $user) {

            // Insert record into the 'tests' table
            Tests::updateOrCreate(
                ['application_id' => $user->application_id],
                ['quiz_id' =>  $user->quiz_id, 'student_id' => $user->student_id, 'conducting_datetime' => $datetime, $user->application_id]
            );

            DB::table('application')->where('application_id', $user->application_id)->update([
                'test_status' => 0,
            ]);

            $selectedDateTime = new DateTime($datetime);
            $formattedDateTime = $selectedDateTime->format('jS M Y h:i A');

            DB::table('messages')->insert([
                'employer_id'=>session('employer_id'),
                'student_id'=>$user->student_id,
                'message' => "You test has been allotted on ".$formattedDateTime. ".Kindly attend.",
                'read'=>0
            ]);
            $com = DB::table('application')
                ->join('quizzes', 'application.quiz_id', '=', 'quizzes.quiz_id')
                ->where('application_id', $user->application_id)
                ->first();
            $details = [
                'title' => $user->job_title,
                'datetime' => $formattedDateTime,
                'name' => $user->student_name,
                'app_id' => $user->application_id,
                'company_name' => $com->company_name,'duration' => $com->test_duration,
            ];
            // Send email to the student
            Mail::to($user->student_email)->send(new TestScheduleMail($details));

        }
        // return 6;
        return 1;
    }
});

Route::post('select_job_test_module_for_all', function (Request $request) {
    $emp_id = session('employer_id');
    $datetime = $request->input('datetime');

    $users = DB::select("
        SELECT
            application.application_id,
            job_post.quiz_id AS quid_ID,
            student.student_id AS student_id,
            student.full_name AS student_name,
            student.phone AS student_phone,
            student.email AS student_email,
            job_post.job_title
        FROM
            application
        JOIN
            job_post ON application.job_id = job_post.job_id
        JOIN
            student ON application.student_id = student.student_id
        WHERE
            job_post.employer_id = ?
            AND application.status = 1
            AND application.test_status IS NULL
    ", [$emp_id]);

    foreach ($users as $user) {

        // Insert record into the 'tests' table
        DB::table('tests')->insert([
            'student_id' => $user->student_id,
            'quiz_id' => $user->quid_ID,
            'conducting_datetime' => $datetime,
            'application_id' => $user->application_id,
        ]);

        // Update 'application' table with 'test_status' value of 0
        DB::table('application')->where('application_id', $user->application_id)->update([
            'quiz_id' => $user->quid_ID,
            'test_status' => 0,
        ]);

        $selectedDateTime = new DateTime($datetime);
        $formattedDateTime = $selectedDateTime->format('jS M Y h:i A');

        DB::table('messages')->insert([
            'employer_id'=>session('employer_id'),
            'student_id'=>$user->student_id,
            'message' => "You test has been allotted on ".$formattedDateTime. ".Kindly attend.",
            'read'=>0
        ]);
        $com = DB::table('application')
                ->join('quizzes', 'application.quiz_id', '=', 'quizzes.quiz_id')
                ->where('application_id', $user->application_id)
                ->first();
        $details = [
            'title' => $user->job_title,
            'datetime' => $formattedDateTime,
            'name' => $user->student_name,
            'app_id' => $user->application_id,
            'company_name' => $com->company_name,
            'duration' => $com->test_duration,
        ];

        // Send email to the student
        Mail::to($user->student_email)->send(new TestScheduleMail($details));


    }
// return 6;
    return redirect()->back()->with('Success', 'Your test has been allotted.');
});

Route::post('meeting_link_zoom/{email}/{id}', function(Request $request, $email, $id) {
    $app_id = $id;
    $zoom = $request->input('zoom');
    // $quiz_id = $request->input('test_module');
    $datetime = $request->input('datetime');
    $selectedDateTime = new DateTime($datetime);
    $formattedDateTime = $selectedDateTime->format('jS M Y h:i A');

    // $iddd  = DB::table('student')->select('student_id')->where('email', $email)->first();

// dd($email,$id,$details['zoom'],$details['datetime']);
    try {
        $student = DB::table('student')->where('email', $email)->first();
        $student_id = $student->student_id;
        // dd($email,$id,$details['zoom'],$details['datetime']);
        $com = DB::table('application')->where('application_id',$app_id)->first();
        $details = [
            'zoom' => $zoom,
            'name' => $student->full_name,
            'datetime' => $formattedDateTime,
            'company_name' => $com->company_name,
        ];
        // Send email notification
        Mail::to($email)->send(new ZoomMeetingInvitationMail($details));

        DB::table('messages')->insert([
            'employer_id'=>session('employer_id'),
            'student_id'=>$student_id,
            'message' => "You interview has been allotted on ".$formattedDateTime. ".Kindly attend.",
            'read'=>0
        ]);
        // Insert record into the 'tests' table
        DB::table('application')->where('application_id',$app_id)->update([
            'zoom_meeting' => $zoom,
            'zoom_time' => $datetime
        ]);
// return $app_id.", ".$zoom.', '.$datetime;
        // Update 'application' table with 'test_status' value of 0
        // DB::table('application')->where('application_id', $app_id)->update(['quiz_id' => $quiz_id,'test_status' => 0]);

        return redirect()->back()->with('Success', 'Your zoom link has been allotted.');
    } catch (\Exception $e) {
        // Handle any exceptions (e.g., email sending failure)
        return redirect()->back()->with('error', 'An error occurred. Please try again.');
    }
});







// Login Controller
Route::post('/log_in',[LoginController::class,'login']);

// Logut
Route::get('/logout',function(){
    Session::flush();
    return redirect('/');
});








//Admin Controller
Route::get('/admin_login',function(){

        return view('admin.adminlogin');
});
Route::post('admin/log_in',function(Request $request){
    $name = $request->input('username');
    $pass =  $request->input('password');
    $db = DB::table('admins')->where('name',$name)->first();
    if($db){
        if($pass== $db->password){
            session(['admin_name' => $db->name ]);
            return redirect('/admin');
        }
        else{
            return redirect()->back()->with('error','password was wrong');
        }
    }
    else{
        return redirect()->back()->with('error','no username exist');
    }
});
Route::get('/admin', function(){
    if(session('admin_name')){
    // Retrieve the count of records from the 'student' table
    $users = DB::table('student')->count();

    // Retrieve the count of records from the 'employer' table
    $employers = DB::table('employer')->count();

    // Retrieve the count of records from the '_post' table
    $int = DB::table('internship_post')->count();

    // Retrieve the count of records from the 'job_post' table
    $job = DB::table('job_post')->count();

    $now = now();
    $act_int = DB::table('internship_post')
    // ->where('application_start_date', '<', $now)
->where('application_deadline', '>', $now)
    ->count();

    $act_job = DB::table('job_post')
        // ->where('start_date', '<', $now)
    ->where('application_deadline', '>', $now)
        ->count();
    // Retrieve the latest job posts ordered by the creation date
    $jobb = DB::table('employer')
    ->whereNotNull('company_name')
    ->orderBy('created_at', 'desc')
    ->take(5)
    ->get();

    // Return the 'admin.index' view and pass the counts and latest job posts to the view
    return view('admin.dashboard', [
        'user' => $users,
        'employer' => $employers,
        'int' => $int,
        'act_int'=>$act_int,
        'job' => $job,
        'act_job'=>$act_job,
        'jobb' => $jobb
    ]);
}
return redirect('admin_login');

});
Route::get('/registered_candidates', function(){
    if(session('admin_name')){
        $users = DB::table('student')
        ->orderBy('created_at','desc')
        ->paginate(7);
// dd($users);
        return view('admin.registered_candidates',[
            'user'=>$users
        ]);
    }
return redirect('admin_login');

});

Route::get('/registered_paid_candidates', function(){
    if(session('admin_name')){
        $users = DB::table('student')
        ->where('payment_status',1)
        ->orderBy('created_at','desc')
        ->paginate(15);
// dd($users);
        return view('admin.registered_paid_candidates',[
            'user'=>$users
        ]);
    }
return redirect('admin_login');

});
Route::get('/registered_unpaid_candidates', function(){
    if(session('admin_name')){
        $users = DB::table('student')
        ->whereNull('payment_status')
        ->orderBy('created_at','desc')
        ->paginate(15);
// dd($users);
        return view('admin.registered_unpaid_candidates',[
            'user'=>$users
        ]);
    }
return redirect('admin_login');

});
Route::get('delete_registered_candidates/{encryptedSTUDENTId}', function ($encryptedSTUDENTId) {
if(session('admin_name')){
    try {
        $id = Crypt::decrypt($encryptedSTUDENTId);
        $deleted = DB::table('student')->where('student_id', $id)->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Successfully deleted');
        } else {
            return redirect()->back()->with('error', 'Unable to delete. Invalid student ID.');
        }
    } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
        return redirect()->back()->with('error', 'Invalid address');
    }
     }
return redirect('admin_login');
});

Route::get('/registered_companies', function(){
    if(session('admin_name')){
        $users = DB::table('employer')->paginate(20);
// dd($users);
        return view('admin.total_companies',[
            'user'=>$users
        ]);
    }
return redirect('admin_login');

});
Route::get('/approved_companies', function(){
    if(session('admin_name')){
        $users = DB::table('employer')
        ->where('admin_verify',1)
        ->paginate(20);
// dd($users);
        return view('admin.approved_applications',[
            'user'=>$users
        ]);
    }
return redirect('admin_login');

});
Route::get('delete_approved_companies/{encryptedEMPLOYERId}',function($encryptedEMPLOYERId){
    if(session('admin_name'))
    {
        $id =  Crypt::decrypt($encryptedEMPLOYERId);
        DB::table('employer')->where('employer_id',$id)->delete();
        return redirect()->back()->with('Success','Successfully deleted');
    }
    return redirect('admin_login');
});
Route::get('/rejected_companies', function(){
    if(session('admin_name')){
        $users = DB::table('employer')
        ->where('admin_verify',2)
        ->paginate(20);
// dd($users);
        return view('admin.rejected_companies',[
            'user'=>$users
        ]);
    }
return redirect('admin_login');

});
Route::get('approve_rejected_applications/{id}',function($id){
    if(session('admin_name'))
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
            // Handle validation failure, e.g., redirect back with error messages
        }
        $user = DB::table('employer')->where('employer_id', $id)->first();
        // $token = bin2hex(Str::random(16));

            $new_user= [];
            $new_user['name'] = $user->full_name;
            $new_user['email'] = $user->email;
        //     $new_user['token'] = $token;
        DB::table('employer')->where('employer_id', $id)->update(["admin_verify"=>1,"verification"=>1]);
        Mail::to($user->email)->send(new EmployerMail($new_user));

        return redirect()->back()->with('Success','Selected Application Approved Successfully');
    }
    return redirect('admin_login');
});
Route::get('/active_internships', function(){
    if(session('admin_name')){
        $now = now();
        $users = DB::table('internship_post')
            // ->where('application_start_date', '<', $now)
            ->where('application_deadline', '>', $now)
            ->paginate(20);
        return view('admin.active_internship',[
            'user'=>$users
        ]);
    }
return redirect('admin_login');

});
Route::get('/active_jobs', function(){
    if(session('admin_name')){
        $now = now();
        $users = DB::table('job_post')
        // ->where('start_date', '<', $now)
    ->where('application_deadline', '>', $now)
        ->paginate(20);
        return view('admin.active_jobs',[
            'user'=>$users
        ]);
    }
return redirect('admin_login');

});
Route::get('/total_posted_internships', function(){
    if(session('admin_name')){
        $users = DB::table('internship_post')
        ->paginate(20);
        return view('admin.total_posted_internship',[
            'user'=>$users
        ]);
    }
return redirect('admin_login');

});
Route::get('/total_posted_jobs', function(){
    if(session('admin_name')){
        $now = now();
        $users = DB::table('job_post')
        ->paginate(20);
        return view('admin.total_posted_jobs',[
            'user'=>$users
        ]);
    }
return redirect('admin_login');

});
Route::get('/ad_email', function(){
    if(session('admin_name')){
    $con = DB::table('contact_us')->orderBy('created_at', 'desc')->get();
    return view('admin.email',['con'=>$con]);
}
return redirect('admin_login');
});
Route::get('/app_company', function(){
    if(session('admin_name')){
    $con = DB::table('employer')->where('admin_verify', 0)->where('registered', 1)->get();
    return view('admin.company_approval',[
        'int'=>$con
    ]);
    }
    return redirect('admin_login');

});
Route::get('/approval_company/{id}', function($id){
    if(session('admin_name'))
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
            // Handle validation failure, e.g., redirect back with error messages
        }
        $user = DB::table('employer')->where('employer_id', $id)->first();
        // $token = bin2hex(Str::random(16));

            $new_user= [];
            $new_user['name'] = $user->company_name;
        //     $new_user['token'] = $token;
        DB::table('employer')->where('employer_id', $id)->update(["admin_verify"=>1,"verification"=>1]);
        Mail::to($user->email)->send(new EmployerApprovalMail($new_user));
        // Mail::to($user->email)->send(new SampleMail($new_user));
        return redirect('registered_companies')->with('Success','Successfully approved');
    }
    return redirect('admin_login');
});
Route::get('/reject_company/{id}', function($id){
    if(session('admin_name')){
        $con = DB::table('employer')->where('employer_id', $id)->update(["admin_verify"=>2]);
        return redirect('/registered_company')->with('Success','Successfully approved');
    }
    return redirect('admin_login');
});
Route::get('/candidate_list', function(){
    if(session('admin_name')){
    $con = DB::table('student')->paginate(8);
    return view('admin.candidate_list',[
        'con'=>$con
    ]);

}
return redirect('admin_login');
});
Route::get('/registered_company', function(){
    if(session('admin_name')){
    $con = DB::table('employer')->where('admin_verify',1)->paginate(8);
    return view('admin.registered_company',[
        'con'=>$con
    ]);
}
return redirect('admin_login');

});
Route::get('/registered_applications', function(){
    if(session('admin_name')){
    // Retrieve data using the DB facade and join
    $con = DB::table('application')
        ->select('*')
        ->join('student', 'application.student_id', '=', 'student.student_id')
        ->get();

    // Return the 'admin.registered_company' view and pass the data to the view
    return view('admin.registered_application', [
        'con' => $con
    ]);
}
return redirect('admin_login');
});
Route::get('/registered_app_interns', function(){
    if(session('admin_name')){
    // Retrieve data using the DB facade and join
    $con = DB::table('application')
        ->select('*')
        ->join('student', 'application.student_id', '=', 'student.student_id')
        ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
        ->where('type','Intern')
        ->orderBy('application.modified_at','desc')
        ->get();

    // Return the 'admin.registered_company' view and pass the data to the view
    return view('admin.registered_intern',["con"=>$con]);
}
return redirect('admin_login');
});
Route::get('/registered_app_jobs', function(){
    if(session('admin_name')){
    // Retrieve data using the DB facade and join
    $con = DB::table('application')
        ->select('*')
        ->join('student', 'application.student_id', '=', 'student.student_id')
        ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
        ->where('type','Job')
        ->orderBy('application.modified_at','desc')
        ->get();

    // Return the 'admin.registered_company' view and pass the data to the view
    return view('admin.registered_job',["con"=>$con]);
}
return redirect('admin_login');
});




//Admin 2 routes
Route::group(['prefix' => 'admin2', 'middleware' => 'CheckAdmin2Session'],function () {
    Route::get('/',[Admin2Controller::class, 'dashboard']);
    Route::get('/my_profile',[Admin2Controller::class, 'my_profile']);
    Route::get('/password_change', function(){ return view('admin2.password_change');});
    Route::post('password_change_function',[EmployerController::class,'password_change_function']);

    Route::get('/post_internships',[Admin2Controller::class, 'post_internships']);
    Route::get('/post_jobs',[Admin2Controller::class, 'post_jobs']);

    Route::get('/posted_internships',[Admin2Controller::class, 'posted_internships']);
    Route::get('/posted_jobs',[Admin2Controller::class, 'posted_jobs']);

    Route::get('/posted_internship_search/{input}', [AjaxController::class , 'posted_internship_search']);
    Route::get('/posted_job_search/{input}', [AjaxController::class , 'posted_job_search']);

    Route::get('/internships_applications',[Admin2Controller::class, 'internships_applications']);
    Route::get('/jobs_applications',[Admin2Controller::class, 'jobs_applications']);

    Route::get('/internship_application_search/{input}',[Admin2Controller::class, 'internship_application_search']);
    Route::get('/job_application_search/{input}',[Admin2Controller::class, 'job_application_search']);

    Route::get('/edit_internship/{input}',[Admin2Controller::class, 'edit_internship']);
    Route::get('/edit_job/{input}',[Admin2Controller::class, 'edit_job']);

    Route::post('update_internship', [Admin2Controller::class,'update_internship']);
    Route::post('update_job', [Admin2Controller::class,'update_job']);
});









// Ajax Controller
Route::get('/get-second-dropdown-data/{first_dropdown_value}', [AjaxController::class , 'degree']);
Route::get('/major/{first_dropdown_value}', [AjaxController::class , 'major']);
Route::get('/college-drop/{input}', [AjaxController::class , 'dropdown']);
Route::get('/search_dropdown/{input}', [AjaxController::class , 'search_dropdown']);
Route::get('/posted_internship_search/{input}', [AjaxController::class , 'posted_internship_search']);
Route::get('/posted_job_search/{input}', [AjaxController::class , 'posted_job_search']);

Route::get('/internship_application_search/{input}', [AjaxController::class , 'internship_application_search']);
Route::get('/job_application_search/{input}', [AjaxController::class , 'job_application_search']);

Route::get('/approved_internship_application_search/{input}', [AjaxController::class , 'approved_internship_application_search']);
Route::get('/approved_job_application_search/{input}', [AjaxController::class , 'approved_job_application_search']);

Route::get('/rejected_intern_application_search/{input}', [AjaxController::class , 'rejected_intern_application_search']);
Route::get('/rejected_job_application_search/{input}', [AjaxController::class , 'rejected_job_application_search']);

Route::get('/face_to_face_intern_application_search/{input}', [AjaxController::class , 'face_to_face_intern_application_search']);
Route::get('/face_to_face_job_application_search/{input}', [AjaxController::class , 'face_to_face_job_application_search']);

Route::get('/results_intern_application_search/{input}', [AjaxController::class , 'results_intern_application_search']);
Route::get('/results_job_application_search/{input}', [AjaxController::class , 'results_job_application_search']);

Route::get('/email_verify/{email}', [ForgotPasswordController::class , 'forgot_password']);
Route::get('/otp_verify/{email}/{otp}', [ForgotPasswordController::class , 'otp']);
Route::get('/reset/{email}', function ($email){
    $stu = DB::table('student')->where('email',$email)->first();
    $emp = DB::table('employer')->where('email',$email)->first();
    if($stu){
        if($stu->otp){
            return view('login.reset',['email'=>$email]);
        }
        else{
            return redirect('login_register')->with('error','Your request for reset password was not processed');
        }
    }
    elseif($emp){
        if($emp->otp){
            return view('login.reset',['email'=>$email]);
        }
        else{
            return redirect('login_register')->with('error','Your request for reset password was not processed');
        }
    }
    else{
        return redirect('login_register')->with('error','Your mail id does not exist to reset password');
    }

});
Route::get('/password_change', [ForgotPasswordController::class , 'reset']);
Route::get('reset', function (){
    return view('login.reset');
});


Route::get('/your-sort-endpoint', [EmployerController::class , 'sorting'])->name('your-sort-endpoint');
Route::get('/your-sort-endpoint-job', [EmployerController::class , 'sortingg'])->name('your-sort-endpoint-job');

Route::get('/intership_app_sort', [EmployerController::class , 'intership_app_sort'])->name('intership_app_sort');

Route::get('/get_Questions/{quizId}', function($quizId) {
    $t = DB::table('questions')->where('quiz_id', $quizId)->get();
    return response()->json(["test" => $t]);
});



Route::get('/checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');


Route::get('/payment', function () {
    return view('welcome');
});

Route::post('razorpay', [RazorpayController::class, 'razorpay'])->name('razorpay');
Route::get('success', [RazorpayController::class, 'success'])->name('success');
Route::get('cancel', [RazorpayController::class, 'cancel'])->name('cancel');

