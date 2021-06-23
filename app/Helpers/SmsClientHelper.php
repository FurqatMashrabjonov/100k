<?php


namespace App\Helpers;


use App\Models\Currency;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SmsClientHelper
{
    public static function send($number, $code)
    {
        if ($number) {
            Cache::put('code', $code);
            $number = substr($number, 1);
            return self::RequestSmsClient($number, $code);
        } else {
            return false;
        }
    }

    public static function RequestSmsClient($number, $code)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post('http://sms.etc.uz:8084/json2sms', [
            "login" => config("sms.login"),
            "pwd" => config("sms.password"),
            "CgPN" => config("sms.cgpn"),
            "CdPN" => (int)$number,
            "text" => "code: " . $code
        ]);

        if ($response->status() === 200) {
            return true;
        } else {
            return false;
        }
    }

    public static function check($code)
    {
        if ($code === Cache::get('code')) {
            Cache::forget('code');
            return true;
        } else {
            return false;
        }
    }

    public static function number($number)
    {
        $res = '';
        $phone_code = substr($number, 3, 2);
        switch ($phone_code) {
            case 95:
            case 97:
            case 99:
                $res = "Uzmobile";
                break;
            case 93:
            case 94:
                $res = "UCELL";
                break;
            case 90:
            case 91:
                $res = "Beeline";
                break;
            case 98:
                $res = "Perfectum";
        }

        return $res;
    }


    public static function getCurrency($id){
        return  Currency::query()->where('id', (int)$id)->first()['symbol'];
    }
}