<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurService;

class OurServiceController extends Controller
{
    public function ajaxAddOS(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'commonTitle' => 'required',
			'commonDisc' => 'required',
			'commonClass' => 'required',
			'commonValue' => 'required',
		]);
		$common = new OurService;

		$common->osIco = $request->commonClass;
		$common->osTitle = $request->commonTitle;
		$common->osDisc = $request->commonDisc;
		$common->osVal = $request->commonValue;

		$common->save();

		return response()->json($common);
    }

    public function osfindByIdAjax($id)
    {
    	$common = OurService::where('osId',$id)
		->first();

		return response()->json($common);
    }

	public function ajaxDeleteOS($id)
    {
    	
    	$common = OurService::where('osId',$id)->delete();

		return response()->json($common);
    }

            public function ajaxUppOS(Request $request)
	{
		// $validated = $request->validate([
  //       	'summernote' => 'required',
		// 	'commonVlink' => 'required',
		// 	'commonImage' => 'required',
  //   	]);

		// dd($request);

		// Fqna::where('fQnaId',$request->commonId)->update(['fQnaQ'=>$request->commonQ, 'fQnaA'=>$request->commonA]);


		OurService::where('osId', $request->updateCommonId)->update(['osIco'=>$request->updateCommonClass, 'osTitle'=>$request->updateCommonTitle, 'osDisc'=>$request->updateCommonDisc, 'osVal'=>$request->updateCommonValue]);

		$ourServ = OurService::select('*')->where('osId', $request->updateCommonId)->first();

		return response()->json($ourServ);

	}
}
