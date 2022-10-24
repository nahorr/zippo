<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\ZipCode;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Notifications\Notifiable;
use App\Notifications\SendZipSearchNotification;
use Illuminate\Support\Facades\Validator;

class SendZipSearchReport extends Command
{
    use Notifiable;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:zip_search_report {email} {hours=24}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send zip search report';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();

        if ($user){

            $this->validate_email_hours();

            $searched_zipcodes = ZipCode::where('user_id',$user->id)
                ->where('created_at', '<=', Carbon::now()->addHours($this->argument('hours')))->pluck('zip_code')->toArray();

            $user->notify(new SendZipSearchNotification($searched_zipcodes, $this->argument('hours')));
        }else{

            echo "No user with email found!\n";
        }

    }

    public function validate_email_hours(){

        $validator = Validator::make([
            'email' => $this->argument('email'),
            'hours' => $this->argument('hours'),
        ], [
            'email' => ['required','email'],
            'hours' => ['required','integer','min:1','max:24'],
        ]);

        if ($validator->fails()) {
            $this->info('See error messages below: ');
        
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }
    }
}
