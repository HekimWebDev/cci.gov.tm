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

    public function tm_exhibition()
    {
        $title = __('main.controllers.tm_ex');
        $tm_ex = Tmexhibition::paginate(10);
        return view('org.tm_exhibition', compact('tm_ex', 'title'));
    }
    public function fo_exhibition()
    {
        $title = __('main.controllers.fo_ex');
        $fo_ex = Foexhibition::orderByDesc('id')->paginate(10);
        return view('org.fo_exhibition', compact('fo_ex', 'title'));
    }

}
