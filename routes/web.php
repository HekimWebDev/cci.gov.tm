<?php

use App\Http\Controllers\AllController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsCciController as ControllersNewsCciController;
use App\Http\Controllers\NewsController as ControllersNewsController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '@dm1n', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/banners', 'BannersController');
    Route::resource('/abouts', 'AboutController');
    Route::resource('/memberships', 'MembershipsController');
    Route::resource('/investments', 'InvestmentsController');
    Route::resource('/tenders', 'TenderController');
    Route::get('/tender/{id}', 'TenderController@single')->name('tender.single');
    Route::resource('/branches', 'BranchesController');
    Route::get('/branch/{id}', 'BranchesController@single')->name('branch.single');
    Route::resource('/conferences', 'ConferencesController');
    Route::get('/conference/{id}', 'ConferencesController@single')->name('conference.single');
    Route::resource('/partners', 'PartnersController');
    Route::get('/partner/{id}', 'PartnersController@single')->name('partner.single');
    Route::resource('/news', 'NewsController');
    Route::resource('/news_cci', 'NewsCciController');
    Route::resource('/tm_offers', 'TmOffersController');
    Route::resource('/fo_offers', 'FoOffersController');
    Route::resource('/tm_exhibitions', 'TmExhibitionsController');
    Route::resource('/fo_exhibitions', 'FoExhibitionsController');
    Route::resource('/galleries', 'GalleriesController');
    Route::get('/album/{id}', 'GalleriesController@single')->name('album');
    Route::resource('/carousels', 'CarouselsController');
    Route::resource('/informations', 'InformationsController');
    Route::resource('/contacts', 'ContactsController');
    Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/user/edit/{id}', 'UserController@update')->name('user.update');
    Route::delete('/userDelete/{id}', 'UserController@destroy')->name('user.delete');
});
Route::post('check-email', function (Request $request) {
    if (User::where('email', $request->get('email'))->exists()) {
        return \response()->json(false);
    } else {
        return \response()->json(true);
    }
});

Route::get('locale/{locale}', 'MainController@changeLocale')->name('locale');
// Route::get('/', function () {
//     return redirect()->route('home');
// });
Route::group(['middleware' => 'set_locale'], (function () {
    Route::resource('/parcipants_events', 'ParcipantsController');
    Route::get('/parcipants_event', 'ParcipantsController@single')->name('parcipants');

    Route::resource('/form', 'FormsController');
    Route::get('/investment/{slug}', 'InvestmentsController@single')->name('investment');

    Route::get('/', 'MainController@index')->name('home');
    Route::get('/membership/{slug}', 'MainController@membership')->name('membership');
    Route::get('/branch/{slug}', 'MainController@branch')->name('branch');
    Route::get('/conference/{slug}', [MainController::class, 'conferences'])->name('conferences');
    Route::get('/album/{slug}', 'MainController@album')->name('album_single');

    Route::get('/about/{slug}', 'AboutController@about')->name('abouts');

    Route::get('/news', [ControllersNewsController::class, 'index'])->name('news');
    Route::get('/news/{slug}', [ControllersNewsController::class, 'single'])->name('news_single');

    Route::get('/news-cci', [ControllersNewsCciController::class, 'index' ])->name('news_cci');
    Route::get('/news-cci/{slug}', [ControllersNewsCciController::class, 'single'])->name('news_cci_single');

    Route::get('/benefist', function () {
        $title = __('main.controllers.benefist');
        return view('org.benifist', compact('title'));
    })->name('benefist');

    Route::get('/membership-joining', function () {
        $title = __('main.controllers.joining');
        return view('org.membership-joining', compact('title'));
    })->name('m-joining');

    Route::get('/contacts', [AllController::class, 'contacts'])->name('contacts');
    Route::get('/tenders', [AllController::class, 'tenders'])->name('tenders');
    Route::get('/partners', [AllController::class, 'partners'])->name('partners');
    Route::get('/fo-offers', [AllController::class, 'fo_offers'])->name('fo-offers');
    Route::get('/tm-offers', [AllController::class, 'tm_offers'])->name('tm-offers');
    Route::get('/tm_exhibition', [AllController::class, 'tm_exhibition'])->name('tm-exhibition');
    Route::get('/fo_exhibition', [AllController::class, 'fo_exhibition'])->name('fo-exhibition');
}));
