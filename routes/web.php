<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FqnaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\OurServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\UserMessageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\OurClintsController;
use App\Http\Controllers\TestimonialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend/index');
})->name('index');

Route::middleware(['auth:sanctum', 'verified'])->get('admin', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('slider', function () {
    return view('backend/sliderPage');
})->name('slider');

Route::get('aboutUs', function () {
    return view('backend/aboutUsPage');
})->name('aboutUs');

Route::get('ourService', function () {
    return view('backend/ourServicePage');
})->name('ourService');

Route::get('ourClints', function () {
    return view('backend/ourClintsPage');
})->name('ourClints');

Route::get('ourTeam', function () {
    return view('backend/ourTeamPage');
})->name('ourTeam');

Route::get('portfolio', function () {
    return view('backend/portfolioPage');
})->name('portfolio');

Route::get('testimonial', function () {
    return view('backend/testimonialPage');
})->name('testimonial');




Route::post('/addSlider', [SliderController::class, 'addSlider'])->name('addSlider');
Route::get('/slfindByIdAjax/{id}', [SliderController::class, 'slfindByIdAjax'])->name('slfindByIdAjax');
Route::post('/UpdateSlider', [SliderController::class, 'UpdateSlider'])->name('UpdateSlider');
Route::delete('ajaxDeleteSl/{id}', [SliderController::class, 'ajaxDeleteSl'])->name('ajaxDeleteSl');


Route::post('/uppAboutUs', [AboutUsController::class, 'uppAboutUs'])->name('uppAboutUs');
Route::post('/addAboutUs', [AboutUsController::class, 'addAboutUs'])->name('addAboutUs');

Route::post('/ajaxAddOS', [OurServiceController::class, 'ajaxAddOS'])->name('ajaxAddOS');
Route::get('/osfindByIdAjax/{id}', [OurServiceController::class, 'osfindByIdAjax'])->name('osfindByIdAjax');
Route::post('/ajaxUppOS', [OurServiceController::class, 'ajaxUppOS'])->name('ajaxUppOS');
Route::delete('ajaxDeleteOS/{id}', [OurServiceController::class, 'ajaxDeleteOS'])->name('ajaxDeleteOS');

Route::post('/addOurClints', [OurClintsController::class, 'addOurClints'])->name('addOurClints');
Route::get('/clfindByIdAjax/{id}', [OurClintsController::class, 'clfindByIdAjax'])->name('clfindByIdAjax');
Route::post('/UpdateOurClint', [OurClintsController::class, 'UpdateOurClint'])->name('UpdateOurClint');
Route::delete('ajaxDeleteCl/{id}', [OurClintsController::class, 'ajaxDeleteCl'])->name('ajaxDeleteCl');

Route::post('/addTeamMember', [OurTeamController::class, 'addTeamMember'])->name('addTeamMember');
Route::get('/tmfindByIdAjax/{id}', [OurTeamController::class, 'tmfindByIdAjax'])->name('tmfindByIdAjax');
Route::post('/UpdateTeam', [OurTeamController::class, 'UpdateTeam'])->name('UpdateTeam');
Route::delete('ajaxDeleteTm/{id}', [OurTeamController::class, 'ajaxDeleteTm'])->name('ajaxDeleteTm');

Route::post('/addTestim', [TestimonialController::class, 'addTestim'])->name('addTestim');
Route::get('/tsTmfindByIdAjax/{id}', [TestimonialController::class, 'tsTmfindByIdAjax'])->name('tsTmfindByIdAjax');
Route::post('/UpdateTestimonial', [TestimonialController::class, 'UpdateTestimonial'])->name('UpdateTestimonial');
Route::delete('ajaxDeletetsTsTm/{id}', [TestimonialController::class, 'ajaxDeletetsTsTm'])->name('ajaxDeletetsTsTm');



Route::post('/addPortfolio', [PortfolioController::class, 'addPortfolio'])->name('addPortfolio');
Route::get('/prfindByIdAjax/{id}', [PortfolioController::class, 'prfindByIdAjax'])->name('prfindByIdAjax');
Route::post('/updatePortfolio', [PortfolioController::class, 'updatePortfolio'])->name('updatePortfolio');
Route::delete('ajaxDeletePr/{id}', [PortfolioController::class, 'ajaxDeletePr'])->name('ajaxDeletePr');
//Route::get('/porDetails/{prId}', [PortfolioController::class, 'porDetails'])->name('porDetails');
Route::get('/porDetails/{id}', [PortfolioController::class, 'porDetails'])->name('porDetails');

Route::get('/allClintAjax', [OurClintsController::class, 'allClintAjax'])->name('allClintAjax');


//frontend Header

Route::get('onePageService', function () {
    return view('frontend/onePageService');
})->name('onePageService');

Route::get('onePageAboutUs', function () {
    return view('frontend/onePageAboutUs');
})->name('onePageAboutUs');

Route::get('onePageOurClint', function () {
    return view('frontend/onePageOurClint');
})->name('onePageOurClint');

Route::get('onePagePortfolio', function () {
    return view('frontend/onePagePortfolio');
})->name('onePagePortfolio');

Route::get('onePageTeam', function () {
    return view('frontend/onePageTeam');
})->name('onePageTeam');

Route::get('onePageTestimonial', function () {
    return view('frontend/onePageTestimonial');
})->name('onePageTestimonial');


