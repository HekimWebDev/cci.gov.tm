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
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\MembershipsController;
use App\Http\Controllers\Admin\NewsCciController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AllController;
use App\Http\Controllers\BizInfo\FoOffersController as FrontFoOffersController;
use App\Http\Controllers\BizInfo\LocalBrandsController;
use App\Http\Controllers\BizInfo\PartnersController as FrontPartnersController;
use App\Http\Controllers\BizInfo\PositionController;
use App\Http\Controllers\BizInfo\TendersController;
use App\Http\Controllers\BizInfo\TmOffersController as FrontTmOffersController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsCciController as ControllersNewsCciController;
use App\Http\Controllers\NewsController as ControllersNewsController;
use App\Http\Controllers\ParcipantsController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '@dm1n',
    'middleware' => 'admin'
], static function () {
    Route::get('/', [AdminMainController::class, 'index'])->name('admin.index');

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

Route::post('check-email', static function (Request $request) {
    if (User::where('email', $request->get('email'))->exists()) {
        return \response()->json(false);
    } else {
        return \response()->json(true);
    }
});

Route::get('locale/{locale}',  [MainController::class, 'changeLocale'])->name('locale');

Route::group(['middleware' => 'set_locale'], (static function () {
    Route::get('/parcipants_event',  [ParcipantsController::class, 'single'])->name('parcipants');

    Route::resource('/form', FormsController::class);
    Route::get('/investment/{slug}',  [\App\Http\Controllers\InvestmentsController::class, 'single'])->name('investment');

    Route::get('/',  [MainController::class, 'index'])->name('home');
    Route::get('/membership/{slug}', [MainController::class, 'membership'])->name('membership');
    Route::get('/branch/{slug}',  [MainController::class, 'branch'])->name('branch');
    Route::get('/conference/{slug}', [MainController::class, 'conferences'])->name('conferences');
    Route::get('/album/{slug}',  [MainController::class, 'album'])->name('album_single');

    Route::get('/about/{slug}',  [\App\Http\Controllers\AboutController::class, 'about'])->name('abouts');

    Route::get('/news', [ControllersNewsController::class, 'index'])->name('news');
    Route::get('/news/{slug}', [ControllersNewsController::class, 'single'])->name('news_single');

    Route::get('/news-cci', [ControllersNewsCciController::class, 'index'])->name('news_cci');
    Route::get('/news-cci/{slug}', [ControllersNewsCciController::class, 'single'])->name('news_cci_single');

    Route::get('/benefist', static function () {
        $title = __('main.controllers.benefist');
        return view('org.benifist', compact('title'));
    })->name('benefist');

    Route::get('/membership-joining', static function () {
        $title = __('main.controllers.joining');
        return view('org.membership-joining', compact('title'));
    })->name('m-joining');

    Route::get('/contacts', [AllController::class, 'contacts'])->name('contacts');
    Route::get('/tm_exhibition', [AllController::class, 'tm_exhibition'])->name('tm-exhibition');
    Route::get('/fo_exhibition', [AllController::class, 'fo_exhibition'])->name('fo-exhibition');

    Route::group([
        'prefix' => 'biz-info',
        'as' => 'biz-info.'
    ], static function () {
        Route::get('/local-brands', LocalBrandsController::class)->name('local-brands');
        Route::get('/tenders', TendersController::class)->name('tenders');
        Route::get('/partners', FrontPartnersController::class)->name('partners');
        Route::get('/fo-offers', FrontFoOffersController::class)->name('fo-offers');
        Route::get('/tm-offers', FrontTmOffersController::class)->name('tm-offers');
        Route::get('/position', PositionController::class)->name('position');
    });
}));
