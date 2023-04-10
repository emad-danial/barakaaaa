<?php

namespace App\Http\Controllers\API\tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class helper extends Controller
{
    public static function base64_image($image_string){
        $icon =$image_string;
        $icon_new_name = time() . $icon->getClientOriginalName();
        $icon->move('uploads/evisa', $icon_new_name);
        return  'uploads/evisa/' . $icon_new_name;
    }
}
