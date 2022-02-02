<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Foexhibition;
use App\Models\Fooffer;
use App\Models\Informations;
use App\Models\Partner;
use App\Models\Tender;
use App\Models\Tmexhibition;
use App\Models\Tmoffer;

class AllController extends Controller
{
    public function contacts()
    {
        $adress = Informations::all();
        $contacts = Contact::all();
        $title = __('main.controllers.contacts');
        return view('org.contacts', compact('title', 'adress', 'contacts'));
    }
    public function tenders()
    {
        $title = __('main.controllers.tenders');
        $tenders = Tender::paginate(5);
        return view('org.tenders', compact('tenders', 'title'));
    }
    public function partners()
    {
        $title = __('main.controllers.partners');
        $partners = Partner::paginate(10);
        return view('org.partners', compact('partners', 'title'));
    }
    public function fo_offers()
    {
        $title = __('main.controllers.fo_offers');
        $fo_offers = Fooffer::query()->orderBy('number')->paginate(10);
        return view('org.fo-offers', compact('fo_offers', 'title'));
    }
    public function tm_offers()
    {
        $title = __('main.controllers.tm_offers');
        $tm_offers = Tmoffer::paginate(5);
        return view('org.tm-offers', compact('tm_offers', 'title'));
    }
    public function tm_exhibition()
    {
        $title = __('main.controllers.tm_ex');
        $tm_ex = Tmexhibition::paginate(10);
        return view('org.tm_exhibition', compact('tm_ex', 'title'));
    }
    public function fo_exhibition()
    {
        $title = __('main.controllers.fo_ex');
        $fo_ex = Foexhibition::paginate(10);
        return view('org.fo_exhibition', compact('fo_ex', 'title'));
    }
    
}
