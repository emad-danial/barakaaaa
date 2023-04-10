<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
	public $table="app_settings";
	public $timestamps = true;
    protected $fillable = array('phone', 'facebook_link', 'twitter_link', 'youtube_link', 'google_plus_link', 'address', 'description', 'linkedin_link','policy_terms','location_google_map','UMARH_UPDATE_INFORMATION_TITLE','UMARH_UPDATE_INFORMATION_DESCRIPTION');

}
