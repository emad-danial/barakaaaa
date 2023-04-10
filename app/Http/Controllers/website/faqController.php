<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class faqController extends Controller
{
	public function index(){
		$faqs=DB::select('SELECT * FROM faq');
		return view('website.faq',['faqs'=>$faqs]);
	}
}
