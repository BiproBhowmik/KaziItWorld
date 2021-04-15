<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function addAboutUs(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'summernote' => 'required',
		]);
		$common = new AboutUs;

		$common->auText = $request->summernote;

		$common->save();
		return back()->with('success', 'Data Inserted Successfully');
    }

    public function uppAboutUs(Request $request)
	{
		$validated = $request->validate([
        	'summernote' => 'required',
    	]);

		//dd($request->commonUpImage);

		$aboutUs = AboutUs::select('*')->first();

		AboutUs::where('auId',$request->abtId)
		->update(['auText'=>$request->summernote]);

		return back()->with('success', 'Data Updated Successfully!');

	}
}
