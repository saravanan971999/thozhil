<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use App\Mail\MissedTestMail;
use Illuminate\Support\Facades\Mail;

class CheckMissedTests extends Command
{
    protected $signature = 'check:missed-tests';
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Executing check:missed-tests command at ' . now());
        $missedCandidates = DB::table('tests')
        ->whereNull('status')
        ->where('conducting_datetime', '<', now()->subHour())
        ->whereNull('test_missed')
        ->get();

    foreach ($missedCandidates as $candidate) {
        $appID = DB::table('application')
        ->where('application_id',$candidate->application_id)
        ->first();
        $test = DB::table('tests')->where('application_id',$candidate->application_id)->first();
        $user = DB::table('student')->where('student_id',$appID->student_id)->first();
        if($appID->type == "Intern"){
            $y = DB::table('internship_post')->where('internship_id',$appID->internship_id)
                ->first();
            $yy = $y->internship_title;
        }
        else{
            $y = DB::table('job_post')->where('job_id',$appID->job_id)
            ->first();
            $yy = $y->job_title;
        }

        $new_user =[];
        $new_user['email']=$user->email;
        $new_user['title']=$yy;
        $new_user['test']=$test->conducting_datetime;
        Mail::to($new_user['email'])->send(new MissedTestMail($new_user));

        // Update the candidate record to mark the test as missed
        DB::table('tests')->where('application_id',$candidate->application_id)->update(['test_missed' => 1]);
    }
    }
}
