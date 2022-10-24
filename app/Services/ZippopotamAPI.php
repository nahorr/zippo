<?php

namespace App\Services;

use App\Models\ZipCode;
use Illuminate\Support\Facades\Http;

class ZippopotamAPI
{
    public $zipcode;
    public $url;

    public function __construct($zipcode)
    {
        $this->zipcode = $zipcode;
        $this->url = 'https://api.zippopotam.us/us/';
        
    }

    public function getResponse()
    {
        try {

            $fullpath = $this->url.$this->zipcode;

            return Http::get($fullpath);

        } catch (\Throwable $th) {
            
            return null;
        }
        

    }

    public function postResponse()
    {
        return ZipCode::create([
            'user_id' => auth()->user()->id,
            'zip_code' => $this->zipcode,
            'valid_response' => $this->getResponse()->ok() ?? false,
            'json_response' => $this->getResponse()->json(),
        ]);
    }
}