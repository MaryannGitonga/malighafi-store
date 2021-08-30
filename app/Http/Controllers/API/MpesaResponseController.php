<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaResponseController extends Controller
{
    public function validation($request){
        Log::info("Validation endpoint hit");
        Log::info($request->all());

        return [
            'ResultCode' => '0',
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000, 100000)
        ];
    }
    public function confirmation($request){
        Log::info("Confirmation endpoint hit");
        Log::info($request->all());
        return [
            'ResultCode' => '0',
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000, 100000)
        ];
    }
    public function stkPush($request){
        Log::info("STKPush endpoint hit");
        Log::info($request->all());
        return [
            'ResultCode' => '0',
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000, 100000)
        ];
    }
    public function b2cCallback($request){
        Log::info("B2C endpoint hit");
        Log::info($request->all());
        return [
            'ResultCode' => '0',
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000, 100000)
        ];
    }
}
