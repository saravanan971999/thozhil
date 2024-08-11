<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class Admin2Controller extends Controller
{
    public function dashboard(){
        $int = DB::table('internship_post')->where('employer_id',session('employer_id'))->count();
        $job = DB::table('job_post')->where('employer_id',session('employer_id'))->count();

        $int_app = DB::table('application')
            ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
            ->where('internship_post.employer_id',session('employer_id'))->count();
        $job_app = DB::table('application')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->where('job_post.employer_id',session('employer_id'))->count();

        return view('admin2.dashboard',compact('int', 'job', 'int_app', 'job_app'));
    }
    public function my_profile(){
            $emp = DB::table('employer')->where('employer_id', session('employer_id'))->first();
            return view('admin2.profile', ['emp' => $emp]);
    }

    public function post_internships(){
        $skills = DB::table('skills')->get();
        return view('admin2.post_internships',['skills'=>$skills]);
    }
    public function post_jobs(){
        $skills = DB::table('skills')->get();
        return view('admin2.post_jobs',['skills'=>$skills]);
    }



    public function posted_internships(){
        $internships = DB::table('internship_post')
            ->where('employer_id', session('employer_id'))
            ->orderBy('created_at', 'desc') // Order by creation date in descending order
            ->paginate(15);

        return view('admin2.posted_internship', ['internships' => $internships]);
    }
    public function posted_jobs(){
        $jobs = DB::table('job_post')
            ->where('employer_id', session('employer_id'))
            ->orderBy('created_at', 'desc') // Add this line to order by creation timestamp in descending order
            ->paginate(15);

        return view('admin2.posted_job', ['jobs' => $jobs]);
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

        return view('admin2.posted_internship_list', ['internships' => $internships])->render();
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
        return view('admin2.posted_job_list', ['jobs' => $jobs])->render();
    }



    public function internships_applications(){
        $applications = DB::table('application')
        ->select('application.*', 'student.full_name as student_name', 'student.resume as resume', 'student.phone as student_phone', 'student.email as student_email', 'internship_post.internship_title','internship_post.created_at as created', 'internship_post.updated_at as modified')
        ->join('internship_post', 'application.internship_id', '=', 'internship_post.internship_id')
        ->join('student', 'application.student_id', '=', 'student.student_id')
        ->where('internship_post.employer_id', session('employer_id'))
        ->where('application.status', 0)
        ->orderByDesc('application.created_at')
        ->get();

        return view('admin2.internship_app', ['applications' => $applications]);
    }
    public function jobs_applications(){
        $applications = DB::table('application')
        ->select('application.*', 'student.full_name as student_name', 'student.resume', 'student.phone as student_phone', 'student.email as student_email', 'job_post.job_title')
        ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
        ->join('student', 'application.student_id', '=', 'student.student_id')
        ->where('job_post.employer_id', session('employer_id'))
        ->where('application.status', 0)
        ->orderByDesc('application.created_at')
        ->get();

            // return $applications;
        return view('admin2.job_app', ['applications' => $applications]);
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
        // return $applications;
        return view('admin2.internship_app_list', ['applications' => $applications])->render();
    }

    public function job_application_search($input){
        $inpt = strtolower($input);


        $applications = DB::table('application')
            ->select('application.*', 'student.full_name as student_name', 'student.resume as resume', 'student.phone as student_phone', 'student.email as student_email', 'job_post.job_title' , 'job_post.company_name as company')
            ->join('job_post', 'application.job_id', '=', 'job_post.job_id')
            ->join('student', 'application.student_id', '=', 'student.student_id')
            ->where('job_post.employer_id', session('employer_id'))
            ->where('application.status', 0)
            ->where(function ($query) use ($inpt) {
                $query->where('job_post.job_title', 'like', '%' . $inpt . '%')
                    ->orWhere('student.full_name', 'like', '%' . $inpt . '%');
            })
            ->get();
        return view('admin2.job_app_list', ['applications' => $applications])->render();
    }


    public function edit_internship($id){

        if (session('employer_id')) {
            $int = DB::table('internship_post')->where('internship_id', $id)->first();
             $skills = DB::table('skills')->get();
            return view('admin2.edit_internship', [
                'int' => $int,
                'skills'=>$skills
            ]);
        }
            return redirect('/');
    }

    public function update_internship(Request $request)
    {
        if (session('employer_id')) {

            // dd($request->all());
            $FILEname = $request->input('oresume');
            $FILEPath = public_path('company_logo/' . $FILEname);
            if ($request->hasFile('photo')) {
                if (File::exists($FILEPath)) {
                    File::delete($FILEPath);
                }
                $file = $request->file('photo');
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $destination = public_path('company_logo');

                // Ensure the 'resumes' directory exists
                if (!File::exists($destination)) {

                    File::makeDirectory($destination, 0755, true);
                }

                $file->move($destination, $filename);
                $filepath = $filename;
        // dd(session('company_logo'))
            } else {
                // If no new file is uploaded, use the existing file path
                $filepath = $request->input('oresume');
            }
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
                'stipend_others'   =>  $request->input('otherStipend'),
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
                'company_logo' => $filepath,
                'updated_at' =>now(),
            ];

            DB::table('internship_post')->where('internship_id', $internshipId)->update($updatedValues);

            return redirect('admin2/posted_internships')->with('Updated','Successfully updated your internship');
        }

        return redirect('/');
    }


    public function edit_job($id){
        if (session('employer_id')) {
            $int = DB::table('job_post')->where('job_id', $id)->first();
            $skills = DB::table('skills')->get();
            return view('admin2.edit_job', [
                'int' => $int,
                'skills'=>$skills
            ]);
        }
        return redirect('/');
    }

    public function update_job(Request $request)
    {
        if (session('employer_id')) {
            $FILEname = $request->input('oresume');
            $FILEPath = public_path('company_logo/' . $FILEname);
            if ($request->hasFile('photo')) {
                if (File::exists($FILEPath)) {
                    File::delete($FILEPath);
                }
                $file = $request->file('photo');
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $destination = public_path('company_logo');

                // Ensure the 'resumes' directory exists
                if (!File::exists($destination)) {

                    File::makeDirectory($destination, 0755, true);
                }

                $file->move($destination, $filename);
                $filepath = $filename;
        // dd(session('company_logo'))
            } else {
                // If no new file is uploaded, use the existing file path
                $filepath = $request->input('oresume');
            }

            $jobId = $request->input('INTid');

            $updatedValues = [
                'company_name' =>  $request->input('company_name'),
                'job_type'   =>  $request->input('job_type'),
                'job_type_others'   =>  $request->input('otherjob_typeInput'),
                'job_title'  =>  $request->input('job_title'),
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
                'company_logo' => $filepath,
                'modified_at' =>now(),
            ];

            DB::table('job_post')->where('job_id', $jobId)->update($updatedValues);
            return redirect('admin2/posted_jobs')->with('Success','Successfully updated your job');
        }

        return redirect('/');
    }
}
