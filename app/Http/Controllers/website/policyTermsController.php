<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class policyTermsController extends Controller
{
	public function index(){
		return view('website.policyTerms');
	}
}
