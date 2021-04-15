<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OurTeam;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class OurTeamController extends Controller
{
    public function addTeamMember(Request $request)
	{
    	// Validation
		$validated = $request->validate([
			'commonName' => 'required',
			'commonPosition' => 'required',
			'commonValue' => 'required',
			'commonImage' => 'required',
		]);
		$common = new OurTeam;

		$common->tmName = $request->commonName;
		$common->tmPosition = $request->commonPosition;
		$common->tmValue = $request->commonValue;
		if ($request->commonFbLink)
		$common->tmFbLink = $request->commonFbLink;
		if ($request->commonTwLink)
		$common->tmTwLink = $request->commonTwLink;
		if ($request->commonInLink)
		$common->tmInLink = $request->commonInLink;
		if ($request->commonLnLink)
		$common->tmLnLink = $request->commonLnLink;

		// $image = $request->file('commonImage');
		// $imageName = time().'.'.$image->getClientOriginalExtension();
		// $path = public_path('/images');
		// $image->move($path, $imageName);
		// $common->tmPho = 'public/images/'.$imageName;

		$common->tmPho = $request->commonImage->store('public/images');

		$common->save();
		return back()->with('success', 'Data Inserted Successfully');
	}


	public function tmfindByIdAjax($id)
	{
		$common = OurTeam::where('tmId',$id)
		->first();

		return response()->json($common);
	}

	public function UpdateTeam(Request $request)
	{
		// $validated = $request->validate([
  //       	'summernote' => 'required',
		// 	'commonVlink' => 'required',
		// 	'commonImage' => 'required',
  //   	]);

		//dd($request->commonUpImage);

		$ourTeam = OurTeam::select('*')->where('tmId', $request->updateCommonId)->first();

		if ($ourTeam->tmPho) {
			Storage::delete([$ourTeam->tmPho]);
		}

		$tmPhoto = $request->updateCommonImage->store('public/images');


		OurTeam::where('tmId',$request->updateCommonId)
		->update(['tmName'=>$request->updateCommonName,'tmPosition'=>$request->updateCommonPosition,'tmValue'=>$request->updateCommonValue,'tmFbLink'=>$request->updateCommonFbLink,'tmTwLink'=>$request->updateCommonTwLink,'tmInLink'=>$request->updateCommonInLink,'tmLnLink'=>$request->updateCommonLnLink,'tmPho'=>$tmPhoto]);

		return back()->with('success', 'Data Updated Successfully');

	}

	public function ajaxDeleteTm($id)
	{
		$ourTeam = OurTeam::select('*')->where('tmId', $id)->first();
		if ($ourTeam->tmPho) {
			Storage::delete([$ourTeam->tmPho]);
		}
		$common = OurTeam::where('tmId',$id)
		->delete();

		return response()->json($common);
	}
}
