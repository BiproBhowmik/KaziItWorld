<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurClints;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class OurClintsController extends Controller
{
    public function addOurClints(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'commonName' => 'required',
			'commonValue' => 'required',
			'commonImage' => 'required',
		]);
		$common = new OurClints;

		$common->clName = $request->commonName;
		$common->clVal = $request->commonValue;
		$common->clLogo = $request->commonImage->store('public/images');

		$common->save();
		return back()->with('success', 'Data Inserted Successfully');
    }

    public function clfindByIdAjax($id)
    {
    	$common = OurClints::where('clId',$id)
		->first();

		return response()->json($common);
    }

        public function UpdateOurClint(Request $request)
	{
		// $validated = $request->validate([
  //       	'summernote' => 'required',
		// 	'commonVlink' => 'required',
		// 	'commonImage' => 'required',
  //   	]);

		//dd($request->commonUpImage);

		$common = OurClints::select('*')->where('clId', $request->updateCommonId)->first();

		if ($request->hasfile('updateCommonImage')) {
			if ($common->clLogo) {
			Storage::delete([$common->clLogo]);
			}
    		
    		$clPhoto = $request->updateCommonImage->store('public/images');

			OurClints::where('clId',$request->updateCommonId)
			->update(['clName'=>$request->updateCommonName,'clLogo'=>$clPhoto,'clVal'=>$request->updateCommonValue]);
		}
		else
		{
			OurClints::where('clId',$request->updateCommonId)
			->update(['clName'=>$request->updateCommonName,'clVal'=>$request->updateCommonValue]);
		}

		return back()->with('success', 'Data Updated Successfully');

	}

	public function ajaxDeleteCl($id)
    {
    	$clint = OurClints::select('*')->where('clId', $id)->first();
		if ($clint->clLogo) {
		Storage::delete([$clint->clLogo]);
		}
    	$common = OurClints::where('clId',$id)
		->delete();

		return response()->json($common);
    }

    	public function allClintAjax(){
   
	    $clint = OurClints::select('*')
		->get();

		return response()->json($clint);
		// return response()->json(['data'=>$clint->catName]);
	}
}
