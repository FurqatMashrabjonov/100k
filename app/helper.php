<?php


function phone_format($phone){
    if (strlen($phone) == 9){
        return "+998" . $phone;
    }else{
        return $phone;
    }
}

function successResponse($data, $message = null){
    return response()->json([
        'success' => true,
        'data' => $data,
        'message' => $message
    ]);
}


function FormatCreditCard($cc) {
    // REMOVE EXTRA DATA IF ANY
    $cc = str_replace(array('-', ' '), '', $cc);

    // GET THE CREDIT CARD LENGTH
    $cc_length = strlen($cc);


    $newCreditCard = substr($cc, -4);

    for ($i = $cc_length - 5; $i >= 0; $i--) {
        // ADDS HYPHEN HERE
        if ((($i + 1) - $cc_length) % 4 == 0) {
            $newCreditCard = ' ' . $newCreditCard;
        }
        $newCreditCard = $cc[$i] . $newCreditCard;
    }

    // REPLACE CHARACTERS WITH X EXCEPT FIRST FOUR AND LAST FOUR
    for ($i = 4; $i < $cc_length - 4; $i++) {
        if ($newCreditCard[$i] == ' ') {
            continue;
        }
        $newCreditCard[$i] = $newCreditCard[$i];
    }

    // RETURN THE FINAL FORMATED AND MASKED CREDIT CARD NO
    return $newCreditCard;
}


function errorResponse($data=null, $message = null){
    return response()->json([
        'success' => false,
        'data' => $data,
        'message' => $message
    ]);
}

function phone_hidden($phone){
    return substr($phone, 0, 7) . '****' . substr($phone, 11, 2);
}

function pImgUrl($product){
    return asset("products/" . $product->image->name);
}

function uImgUrl($user){
    return asset("avatars/" . $user->avatar);
}

function price_format($price){
    switch (strlen((string)$price)){
        case 9 : $price = substr((string)$price, 0, 3) . ' ' . substr((string)$price, 3, 3) . ' ' . substr((string)$price, 6, 3);
            break;
        case 8 : $price = substr((string)$price, 0, 2) . ' ' . substr((string)$price, 2, 3) . ' ' . substr((string)$price, 5, 3);
            break;
        case 7 : $price = substr((string)$price, 0, 1) . ' ' . substr((string)$price, 1, 3) . ' ' . substr((string)$price, 4, 3);
            break;
        case 6 : $price = substr((string)$price, 0, 3) . ' ' . substr((string)$price, 3, 3);
            break;
        case 5 : $price = substr((string)$price, 0, 2) . ' ' . substr((string)$price, 2, 3);
            break;
        case 4 : $price = substr((string)$price, 0, 1) . ' ' . substr((string)$price, 1, 3);

    }


    return $price . ' so\'m';
}


function status($model, $key){
    $status = \App\Models\Status::query()
        ->where("model", $model)
        ->where('key', $key)
        ->first();
    return $status->id;
}


function discount(){

}


function referalUrlMaker($token){
    return url()->to('/') . '/r/' . $token;
}

function teamUrlMaker($token){
    return url()->to('/') . '/u/' . $token;
}