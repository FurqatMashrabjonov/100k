<?php


namespace App\Helpers;


use App\Models\Checkout;
use App\Models\City;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class TelegramBotHelper
{
    public static function sendCheckout($checkout)
    {

$product = Product::query()->where("id", $checkout->product_id)->first();
$city = City::query()->where('region_id', $checkout->region_id)->first();

        $msg =''. pImgUrl($product) .'%0A'.
            'Telefon raqami: ' . $checkout->phone. '%0A'.
            'Ismi: '. $checkout->name . '%0A'.
            'Tovar nomi: '. $product->name . '%0A'.
            'Address: ' . $checkout->region->name . ', '. $city->name . ', ' . $checkout->address . '%0A'.
            'Statusi: '. $checkout->with_status->description . '%0A'.
            'Soni: ' . $checkout->count.'%0A'. url('admin/checkouts');

        //-1001556186396
        //-570040735 test
        Http::get("https://api.telegram.org/bot1700851435:AAEK-_JYp-sYxBZk71GZA_lRMfjKvl8nATE/sendMessage?chat_id=-1001556186396&text=" . $msg );
    }

    public static function sendTest($checkout)
    {
//        reply_markup: {
//        inline_keyboard: [
//            [
//                    {
//                        text: 'Edit Text',
//                        // we shall check for this value when we listen
//                        // for "callback_query"
//                        callback_data: 'edit'
//                    }
//                ]
//            ]
//
//        }

        $product = Product::query()->where("id", $checkout->product_id)->first();
        $city = City::query()->where('region_id', $checkout->region_id)->first();

        $msg =''. pImgUrl($product) .'%0A'.
            'Telefon raqami: ' . $checkout->phone. '%0A'.
            'Ismi: '. $checkout->name . '%0A'.
            'Tovar nomi: '. $product->name . '%0A'.
            'Address: ' . $checkout->region->name . ', '. $city->name . ', ' . $checkout->address . '%0A'.
            'Statusi: '. $checkout->with_status->description . '%0A'.
            'Soni: ' . $checkout->count.'%0A'. url('admin/checkouts');

        if ($checkout->status === Checkout::NOT_ACCEPTED){
            $arr = array(
                array("text" => "Qabul qilish(Test rejimda)", "callback_data" => "checkout_accepted/" . $checkout->id),
                );
        }else if ($checkout->status === Checkout::NOT_SALED){
            $arr = array(
                array("text" => "Yetkazilmoqda", "callback_data" => "checkout_salling/" . $checkout->id),
                array("text" => "Yetkazildi", "callback_data" => "checkout_saled/" . $checkout->id),
//                array("text" => "Bekor qilish", "callback_data" => "checkout_abort/" . $checkout->id),
            );
        } else if ($checkout->status === Checkout::DELIVING){
            $arr = array(
                array("text" => "Yetkazildi", "callback_data" => "checkout_saled/" . $checkout->id),
            );
        } else if ($checkout->status === Checkout::SALED){
            $arr = [];
        }

        $keyboard = array(
            "inline_keyboard" => array($arr)
        );
        $keyboard = json_encode($keyboard, true);
        $response = Http::get('https://api.telegram.org/bot1715611825:AAGSFRtpNIVgE6a6Vanq_u-HB8UfJaakOmA/sendMessage?chat_id=-570040735&parse_mode=HTML&reply_markup=' . $keyboard . "&text=" . $msg);
    }
}