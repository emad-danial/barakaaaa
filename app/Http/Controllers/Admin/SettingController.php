<?php

namespace App\Http\Controllers\Admin;

use App\models\AppSetting;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
//        return view('settings.edit');
        return view('admin.settings.edit')->with('settings', AppSetting::first());
    }


    public function update(Request $request)
    {

        $this->validate($request, [
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'youtube_link' => 'required',
            'google_plus_link' => 'required',
            'address' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'linkedin_link' => 'required',
            'about_us' => 'required',
            'about_us_description' => 'required',
            'home_top_umarh' => 'required',
            'home_top_hajj' => 'required',
            'home_top_stopOver' => 'required',
            'home_top_visit' => 'required',
             'home_top_hotels' => 'required',
              'home_top_flights' => 'required',
            'policy_terms' => 'required',
             'cover_title' => 'required',
              'cover_description' => 'required',
              'email' => 'required',
              'emailwebsite' => 'required',
               'UMARH_UPDATE_INFORMATION_TITLE' => 'required',
                'UMARH_UPDATE_INFORMATION_DESCRIPTION' => 'required',
              'location_google_map' => 'required',
        ]);

        $setting = AppSetting::first();

        $setting->phone = $request->phone;
        $setting->phone1 = $request->phone1;
        $setting->phone2 = $request->phone2;
        $setting->facebook_link = $request->facebook_link;
        $setting->twitter_link = $request->twitter_link;
        $setting->youtube_link = $request->youtube_link;
        $setting->google_plus_link = $request->google_plus_link;
        $setting->address = $request->address;
        $setting->description = $request->description;
        $setting->linkedin_link = $request->linkedin_link;
         $setting->about_us = $request->about_us;
        $setting->about_us_description = $request->about_us_description;
        $setting->home_top_umarh = $request->home_top_umarh;
        $setting->home_top_hajj = $request->home_top_hajj;
        $setting->home_top_stopOver = $request->home_top_stopOver;
         $setting->home_top_hotels = $request->home_top_hotels;
        $setting->home_top_visit = $request->home_top_visit;
        $setting->home_top_flights = $request->home_top_flights;
          $setting->policy_terms = $request->policy_terms;
          $setting->cover_title = $request->cover_title;
          $setting->cover_description = $request->cover_description;
           $setting->email = $request->email;
            $setting->emailwebsite = $request->emailwebsite;
            $setting->UMARH_UPDATE_INFORMATION_TITLE = $request->UMARH_UPDATE_INFORMATION_TITLE;
            $setting->UMARH_UPDATE_INFORMATION_DESCRIPTION = $request->UMARH_UPDATE_INFORMATION_DESCRIPTION;
            
            $setting->location_google_map = $request->location_google_map;
        $setting->save();

        flash()->success("Success Update");
        return redirect()->back();


    }
}
