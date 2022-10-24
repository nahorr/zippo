<?php

namespace App\Console\Commands;

use App\Services\ZippopotamAPI;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class ZipSearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zip:search {zipCode}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Accepts a 5-digit US zip code as the only argument and when run, it should NOT log the search but
    should instead perform the search and then list the results to the console';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->validate_zipcode();

        $zipapi = new ZippopotamAPI($this->argument('zipCode'));
        $result = $zipapi->getResponse();

        dd($result->json());
    }

    public function validate_zipcode(){

        $validator = Validator::make([
            'zipCode' => $this->argument('zipCode'),
        ], [
            'zipCode' => ['required','numeric','digits:5']
        ]);

        if ($validator->fails()) {
            $this->info('Please enter 5-digit Zip Code: ');
        
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }
    }
}
