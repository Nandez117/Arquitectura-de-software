<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function about(): View
    {
        $data1 = 'About us - Online Store';
        $data2 = 'About us';
        $description = 'This is an about page of a beautiful urbanwear vibe store';
        $author = 'Developed by: Nandez';

        return view('home.about')->with('title', $data1)
            ->with('subtitle', $data2)
            ->with('description', $description)
            ->with('author', $author);
    }

    public function contact(): View
    {
        $title = 'Contact - Online Store';
        $subtitle = 'Contact Us';
        $author = 'Developed by: Nandez';
        $address = 'Calle 10 # 20-30, Medellín, Colombia';
        $phone = '+57 300 123 4567';

        return view('home.contact')
            ->with('title', $title)
            ->with('subtitle', $subtitle)
            ->with('author', $author)
            ->with('address', $address)
            ->with('phone', $phone);
    }
}
