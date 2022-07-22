<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\BizInfo\FoOffersController;
use App\Http\Controllers\Admin\BizInfo\LocalBrandsController as AdminLocalBrandsController;
use App\Http\Controllers\Admin\BizInfo\PartnersController;
use App\Http\Controllers\Admin\BizInfo\TenderController as TenderControllerAlias;
use App\Http\Controllers\Admin\BizInfo\TmOffersController;
use App\Http\Controllers\Admin\BranchesController;
use App\Http\Controllers\Admin\CarouselsController;
use App\Http\Controllers\Admin\ConferencesController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\Exhibition\TmExhibitionsController;
use App\Http\Controllers\Admin\FoExhibitionsController;
use App\Http\Controllers\Admin\GalleriesController;
use App\Http\Controllers\Admin\InformationsController;
use App\Http\Controllers\Admin\InvestmentsController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MembershipsController;
use App\Http\Controllers\Admin\NewsCciController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ParcipantsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '@dm1n',
    'middleware' => 'admin'
], static function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');

    Route::group([
        'prefix' => 'biz-info',
        'as' => 'admin.biz-info.'
    ], static function () {
        Route::resource('/tenders', TenderControllerAlias::class);
        Route::resource('/local-brands', AdminLocalBrandsController::class);
        Route::resource('/partners', PartnersController::class);
        Route::resource('/tm_offers', TmOffersController::class);
        Route::resource('/fo_offers', FoOffersController::class);
    });

    Route::group([
        'prefix' => 'exhibition',
        'as' => 'exhibition.',
    ], static function (){
        Route::resource('/tm_exhibitions', TmExhibitionsController::class);
        Route::resource('/fo_exhibitions', FoExhibitionsController::class);
        Route::resource('/parcipants_events', ParcipantsController::class);
    });

    Route::resource('/banners', BannersController::class);
    Route::resource('/abouts', AboutController::class);
    Route::resource('/memberships', MembershipsController::class);
    Route::resource('/investments', InvestmentsController::class);

    Route::resource('/branches', BranchesController::class);
    Route::get('/branch/{id}', [BranchesController::class, 'single'])->name('branch.single');
    Route::resource('/conferences', ConferencesController::class);
    Route::get('/conference/{id}', [ConferencesController::class, 'single'])->name('conference.single');

    Route::resource('/news', NewsController::class);
    Route::resource('/news_cci', NewsCciController::class);
    Route::resource('/galleries', GalleriesController::class);
    Route::get('/album/{id}', [GalleriesController::class, 'single'])->name('album');
    Route::resource('/carousels', CarouselsController::class);
    Route::resource('/informations', InformationsController::class);
    Route::resource('/contacts', ContactsController::class);

    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/userDelete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});
