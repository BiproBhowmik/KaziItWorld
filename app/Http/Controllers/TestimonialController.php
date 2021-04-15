<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
	public function addTestim(Request $request)
	{
    	// Validation
		$validated = $request->validate([
			'commonName' => 'required',
			'commonPosition' => 'required',
			'commonSpeach' => 'required',
			'commonValue' => 'required',
			'commonImage' => 'required',
		]);
		$common = new Testimonial;

		$common->tsTmName = $request->commonName;
		$common->tsTmPosition = $request->commonPosition;
		$common->tsTmSpeach = $request->commonSpeach;
		$common->tsTmValue = $request->commonValue;

		// $image = $request->file('commonImage');
		// $imageName = time().'.'.$image->getClientOriginalExtension();
		// $path = public_path('/images');
		// $image->move($path, $imageName);
		// $common->tsTmPho = 'public/images/'.$imageName;

		$common->tsTmPho = $request->commonImage->store('public/images');

		$common->save();
		return back()->with('success', 'Data Inserted Successfully');
	}


	public function tsTmfindByIdAjax($id)
	{
		$common = Testimonial::where('tsTmId',$id)
		->first();

		return response()->json($common);
	}

	public function UpdateTestimonial(Request $request)
	{
		// $validated = $request->validate([
  //       	'summernote' => 'required',
		// 	'commonVlink' => 'required',
		// 	'commonImage' => 'required',
  //   	]);

		//dd($request->commonUpImage);

		$Testimonial = Testimonial::select('*')->where('tsTmId', $request->updateCommonId)->first();

		if ($request->hasfile('updateCommonImage')) {

			if ($Testimonial->tsTmPho) {
				Storage::delete([$Testimonial->tsTmPho]);
			}
			$tsTmPhoto = $request->updateCommonImage->store('public/images');

			Testimonial::where('tsTmId',$request->updateCommonId)
			->update(['tsTmName'=>$request->updateCommonName,'tsTmPosition'=>$request->updateCommonPosition,'tsTmSpeach'=>$request->updateCommonSpeach,'tsTmValue'=>$request->updateCommonValue,'tsTmPho'=>$tsTmPhoto]);
		}
		else
		{
			Testimonial::where('tsTmId',$request->updateCommonId)
			->update(['tsTmName'=>$request->updateCommonName,'tsTmPosition'=>$request->updateCommonPosition,'tsTmSpeach'=>$request->updateCommonSpeach,'tsTmValue'=>$request->updateCommonValue]);
		}

		

		

		


		

		return back()->with('success', 'Data Updated Successfully');

	}

	public function ajaxDeletetsTsTm($id)
	{
		$Testimonial = Testimonial::select('*')->where('tsTmId', $id)->first();
		if ($Testimonial->tsTmPho) {
			Storage::delete([$Testimonial->tsTmPho]);
		}
		$common = Testimonial::where('tsTmId',$id)
		->delete();

		return response()->json($common);
	}
}
