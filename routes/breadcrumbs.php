<?php

use App\Models\About;
use App\Models\Branch;
use App\Models\Brands;
use App\Models\Contact;
use App\Models\Foexhibition;
use App\Models\Fooffer;
use App\Models\Gallery;
use App\Models\Informations;
use App\Models\Investment;
use App\Models\Membership;
use App\Models\News;
use App\Models\NewsCci;
use App\Models\Parcipants;
use App\Models\Partner;
use App\Models\Tender;
use App\Models\Tmexhibition;
use App\Models\Tmoffer;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Гавная', route('admin.index'));
});
// {{ Breadcrumbs::render('home') }}

//------------------------------------------------News----------------------------------------------------
//Home > News
Breadcrumbs::for('news', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Новости', route('news.index'));
});
//Home > News > News-Create
Breadcrumbs::for('newsName', function (BreadcrumbTrail $trail) {
    $trail->parent('news');
    $trail->push('Создание новостей', route('news.create'));
});
//Home > News > NewsName-Edit
Breadcrumbs::for('newsEdit', function (BreadcrumbTrail $trail, News $news) {
    $trail->parent('news');
    $trail->push($news->title, route('news.edit', $news));
});
// -------------------------------------------------End news--------------------------------------------------
//                                           =========================
//------------------------------------------------News cci----------------------------------------------------
//Home > News-cci
Breadcrumbs::for('newscci', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(' Новости ТППT ', route('news_cci.index'));
});
//Home > News > News-Cci-Create
Breadcrumbs::for('newsNameCci', function (BreadcrumbTrail $trail) {
    $trail->parent('newscci');
    $trail->push('Создание новостей ТППT', route('news_cci.create'));
});
//Home > News > NewsName-Edit
Breadcrumbs::for('newsEditCci', function (BreadcrumbTrail $trail, NewsCci $news) {
    $trail->parent('newscci');
    $trail->push($news->title, route('news_cci.edit', $news));
});
// -------------------------------------------------End news cci--------------------------------------------------
//                                           =========================
// -------------------------------------------------Gallery---------------------------------------------------
// Home > Gallery
Breadcrumbs::for('gallery', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Галерея', route('galleries.index'));
});
// Home > Gallery-Create
Breadcrumbs::for('galleryCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('gallery');
    $trail->push('Создать галерею', route('galleries.create'));
});
// Home > Gallery-Edit
Breadcrumbs::for('galleryEdit', function (BreadcrumbTrail $trail, Gallery $gallery) {
    $trail->parent('gallery');
    $trail->push($gallery->title, route('galleries.edit', $gallery));
});
// Home > Gallery-Edit
Breadcrumbs::for('gallerySingle', function (BreadcrumbTrail $trail, Gallery $gallery) {
    $trail->parent('gallery');
    $trail->push($gallery->title, route('album', $gallery));
});
// -------------------------------------------------End Gallery--------------------------------------------------------
//                                           =========================
// -------------------------------------------------Carousel Banners---------------------------------------------------
// Home > Carousel
Breadcrumbs::for('carousel', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Карусельные баннеры', route('carousels.index'));
});
// Home > Carousel-Create
Breadcrumbs::for('carouselCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('carousel');
    $trail->push('Создать баннер', route('carousels.create'));
});
// -------------------------------------------------End Carousel Banners---------------------------------------------------
//                                           =========================
// -------------------------------------------------Reklam Banners---------------------------------------------------------
// Home > Banner
Breadcrumbs::for('banner', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Рекламный баннер', route('banners.index'));
});
// Home > Banner-Create
Breadcrumbs::for('bannerCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('banner');
    $trail->push('Создать рекламный баннер', route('banners.create'));
});
// -------------------------------------------------End Reklam Banners---------------------------------------------------
//                                           =========================
// -------------------------------------------------Tenders--------------------------------------------------------------
// Home > Tenders
Breadcrumbs::for('tender', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Тендеры', route('admin.biz-info.tenders.index'));
});
// Home > Tenders-Create
Breadcrumbs::for('tenderCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('tender');
    $trail->push('Создать тендер', route('admin.biz-info.tenders.create'));
});
// Home > Tenders-Edit
Breadcrumbs::for('tenderEdit', function (BreadcrumbTrail $trail, Tender $tender) {
    $trail->parent('tender');
    $trail->push($tender->title, route('admin.biz-info.tenders.edit', $tender));
});
// Home > Tenders-Single
Breadcrumbs::for('tenderSingle', function (BreadcrumbTrail $trail, Tender $tender) {
    $trail->parent('tender');
    $trail->push($tender->title, route('admin.biz-info.tenders.show', $tender));
});
// -------------------------------------------------End Tenders---------------------------------------------------
//                                           =========================
// -------------------------------------------------Brands--------------------------------------------------------------
// Home > Brands
Breadcrumbs::for('brand', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Местные бренды', route('admin.biz-info.local-brands.index'));
});
// Home > Brands-Create
Breadcrumbs::for('brandCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('brand');
    $trail->push('Создать бренд', route('admin.biz-info.local-brands.create'));
});
// Home > Brands-Edit
Breadcrumbs::for('brandEdit', function (BreadcrumbTrail $trail, Brands $brand) {
    $trail->parent('brand');
    $trail->push($brand->title, route('admin.biz-info.local-brands.edit', $brand));
});
// -------------------------------------------------End Brands---------------------------------------------------
//                                           =========================
// --------------------------------------------------Partners-----------------------------------------------------
// Home > Partners
Breadcrumbs::for('partner', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Партнеры', route('admin.biz-info.partners.index'));
});
// Home > Partners-Create
Breadcrumbs::for('partnerCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('partner');
    $trail->push('Добавить партнера', route('admin.biz-info.partners.create'));
});
// Home > Partners-Edit
Breadcrumbs::for('partnerEdit', function (BreadcrumbTrail $trail, Partner $partner) {
    $trail->parent('partner');
    $trail->push($partner->name, route('admin.biz-info.partners.edit', $partner));
});
// Home > Partners-Single
Breadcrumbs::for('partnerSingle', function (BreadcrumbTrail $trail, Partner $partner) {
    $trail->parent('partner');
    $trail->push($partner->name, route('admin.biz-info.partners.show', $partner));
});
// -------------------------------------------------End Partners---------------------------------------------------
//                                           =========================
// -------------------------------------------------Tm-Offers------------------------------------------------------
// Home > Tm-Offers
Breadcrumbs::for('tm_offer', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Тм предложения', route('admin.biz-info.tm_offers.index'));
});
// Home > Tm-Offers-Create
Breadcrumbs::for('tm_offerCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('tm_offer');
    $trail->push('Создать предложения', route('admin.biz-info.tm_offers.create'));
});
// Home > Tm-Offers-Edit
Breadcrumbs::for('tm_offerEdit', function (BreadcrumbTrail $trail, Tmoffer $tm_offer) {
    $trail->parent('tm_offer');
    $trail->push($tm_offer->name, route('admin.biz-info.tm_offers.edit', $tm_offer));
});
// -------------------------------------------------End Tm-Offers---------------------------------------------------
//                                           =========================
// -------------------------------------------------Fo-Offers-------------------------------------------------------
// Home > Fo-Offers
Breadcrumbs::for('fo_offer', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Зарубежные предложения', route('admin.biz-info.fo_offers.index'));
});
// Home > Fo-Offers-Create
Breadcrumbs::for('fo_offerCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('fo_offer');
    $trail->push('Создать предложения', route('admin.biz-info.fo_offers.create'));
});
// Home > Fo-Offers-Edit
Breadcrumbs::for('fo_offerEdit', function (BreadcrumbTrail $trail, Fooffer $fo_offer) {
    $trail->parent('fo_offer');
    $trail->push($fo_offer->name, route('admin.biz-info.fo_offers.edit', $fo_offer));
});
// -------------------------------------------------End Fo-Offers---------------------------------------------------
//                                           =========================
// -------------------------------------------------Form-------------------------------------------------------
// Home > Fo-Offers
Breadcrumbs::for('form', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Вопросы по анкетам', route('form.index'));
});
// -------------------------------------------------End Tm-Offers---------------------------------------------------
//                                           =========================
// -------------------------------------------------Tm-Exhibition-------------------------------------------------------
// Home > Tm-Exhibition
Breadcrumbs::for('tm_exhibitions', static function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Выставки в Туркменистане', route('exhibition.tm_exhibitions.index'));
});
// Home > Tm-Exhibition-Create
Breadcrumbs::for('tm_exhibitionsCreate', static function (BreadcrumbTrail $trail) {
    $trail->parent('tm_exhibitions');
    $trail->push('Создать Выставки', route('exhibition.tm_exhibitions.create'));
});
// Home > Tm-Exhibition-Edit
Breadcrumbs::for('tm_exhibitionsEdit', static function (BreadcrumbTrail $trail, Tmexhibition $tm_exhibitions) {
    $trail->parent('tm_exhibitions');
    $trail->push('Редактирование выстовки', route('exhibition.tm_exhibitions.edit', $tm_exhibitions));
});
// -------------------------------------------------End Tm-Offers---------------------------------------------------
//                                           =========================
// -------------------------------------------------Fo-Exhibition-------------------------------------------------------
// Home > Fo-Exhibition
Breadcrumbs::for('fo_exhibitions', static function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Выставки за рубежом', route('exhibition.fo_exhibitions.index'));
});
// Home > Fo-Exhibition-Create
Breadcrumbs::for('fo_exhibitionsCreate', static function (BreadcrumbTrail $trail) {
    $trail->parent('fo_exhibitions');
    $trail->push('Создать Выставки', route('exhibition.fo_exhibitions.create'));
});
// Home > Fo-Exhibition-Edit
Breadcrumbs::for('fo_exhibitionsEdit', static function (BreadcrumbTrail $trail, Foexhibition $fo_exhibitions) {
    $trail->parent('fo_exhibitions');
    $trail->push('Редактирование выстовки', route('exhibition.fo_exhibitions.edit', $fo_exhibitions));
});
// -------------------------------------------------End Tm-Offers---------------------------------------------------
//                                           =========================
// --------------------------------------------------Branches-----------------------------------------------------
// Home > Branches
Breadcrumbs::for('branches', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Предприятие', route('branches.index'));
});
// Home > Branches-Create
Breadcrumbs::for('branchesCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('branches');
    $trail->push('Добавить предприятие', route('branches.create'));
});
// Home > Branches-Edit
Breadcrumbs::for('branchesEdit', function (BreadcrumbTrail $trail, Branch $branches) {
    $trail->parent('branches');
    $trail->push($branches->name, route('branches.edit', $branches));
});
// Home > Branches-Single
Breadcrumbs::for('branchesSingle', function (BreadcrumbTrail $trail, Branch $branches) {
    $trail->parent('branches');
    $trail->push($branches->name, route('branch.single', $branches));
});
// -------------------------------------------------End Partners---------------------------------------------------
//                                           =========================
// --------------------------------------------------Contacts-----------------------------------------------------
// Home > Contacts
Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Контакты', route('contacts.index'));
});
// Home > Contacts-Create
Breadcrumbs::for('contactsCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('contacts');
    $trail->push('Добавить Контакты', route('contacts.create'));
});
// Home > Contacts-Edit
Breadcrumbs::for('contactsEdit', function (BreadcrumbTrail $trail, Contact $contacts) {
    $trail->parent('contacts');
    $trail->push($contacts->name, route('contacts.edit', $contacts));
});
// -------------------------------------------------End Contacts---------------------------------------------------
//                                           =========================
// --------------------------------------------------Information-----------------------------------------------------
// Home > Information
Breadcrumbs::for('informations', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Контакты', route('informations.index'));
});
// Home > Information-Create
Breadcrumbs::for('informationsCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('informations');
    $trail->push('Добавить Контакты', route('informations.create'));
});
// Home > Information-Edit
Breadcrumbs::for('informationsEdit', function (BreadcrumbTrail $trail, Informations $informations) {
    $trail->parent('informations');
    $trail->push('Редактирование информация', route('informations.edit', $informations));
});
// -------------------------------------------------End Information---------------------------------------------------
//                                           =========================
// --------------------------------------------------Parcipants-----------------------------------------------------
// Home > Parcipants
Breadcrumbs::for('parcipants_events', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Участникам мероприятий', route('exhibition.parcipants_events.index'));
});
// Home > Parcipants-Create
Breadcrumbs::for('parcipants_eventsCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('parcipants_events');
    $trail->push('Добавить страницы', route('exhibition.parcipants_events.create'));
});
// Home > Parcipants-Edit
Breadcrumbs::for('parcipants_eventsEdit', function (BreadcrumbTrail $trail, Parcipants $parcipants_events) {
    $trail->parent('parcipants_events');
    $trail->push('Редактирование страницы', route('exhibition.parcipants_events.edit', $parcipants_events));
});
// -------------------------------------------------End Parcipants---------------------------------------------------
//                                           =========================
// --------------------------------------------------Abouts-----------------------------------------------------
// Home > Abouts
Breadcrumbs::for('abouts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Страницы "о нас"', route('abouts.index'));
});
// Home > Abouts-Create
Breadcrumbs::for('aboutsCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('abouts');
    $trail->push('Добавить страницы', route('abouts.create'));
});
// Home > Abouts-Edit
Breadcrumbs::for('aboutsEdit', function (BreadcrumbTrail $trail, About $abouts) {
    $trail->parent('abouts');
    $trail->push('Редактирование страницы - '.$abouts->title, route('abouts.edit', $abouts));
});
// -------------------------------------------------End Abouts---------------------------------------------------
//                                           =========================
// --------------------------------------------------Membership-----------------------------------------------------
// Home > Membership
Breadcrumbs::for('memberships', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Страницы "о членстве"', route('memberships.index'));
});
// Home > Membership-Create
Breadcrumbs::for('membershipsCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('memberships');
    $trail->push('Добавить страницы', route('memberships.create'));
});
// Home > Membership-Edit
Breadcrumbs::for('membershipsEdit', function (BreadcrumbTrail $trail, Membership $memberships) {
    $trail->parent('memberships');
    $trail->push('Редактирование страницы - '.$memberships->title, route('memberships.edit', $memberships));
});
// -------------------------------------------------End Membership---------------------------------------------------
//                                           =========================
// --------------------------------------------------Investments-----------------------------------------------------
// Home > Investments
Breadcrumbs::for('investments', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Страницы "Инвестиции"', route('investments.index'));
});
// Home > Investments-Create
Breadcrumbs::for('investmentsCreate', function (BreadcrumbTrail $trail) {
    $trail->parent('investments');
    $trail->push('Добавить страницы', route('investments.create'));
});
// Home > Investments-Edit
Breadcrumbs::for('investmentsEdit', function (BreadcrumbTrail $trail, Investment $investments) {
    $trail->parent('investments');
    $trail->push('Редактирование страницы - '.$investments->name, route('investments.edit', $investments));
});
// -------------------------------------------------End Investments---------------------------------------------------
//                                           =========================
