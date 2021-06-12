<?php
namespace App\Helpers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use App\Models\Customer;
use GuzzleHttp\Psr7\Request;

class Helper{
    public static function nameDate($date){
        return Carbon::parse($date)->format('d-M-Y');
    }

    public static function error404($message){
        return response()->json([
            'status' => false,
            'data' => [
                'message' => $message
            ]
        ], 404);
    }

    public static function success200($message){
        return response()->json([
            'status' => true,
            'data' => [
                'message' => $message
            ]
        ], 200);
    }
}
