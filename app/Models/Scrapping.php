<?php

namespace App\Models;

class Scrapping 
{
    public function scrapping()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://scp.fandom.com/wiki/SCP_Foundation_Wikia');
        //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if( curl_error($ch) ){
            return 'Error'.$ch;
        }
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
