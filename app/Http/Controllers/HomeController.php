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
        $viewData = [];
        $viewData['description'] = 'This is an about page ...';
        $viewData['author'] = 'Developed by: Your Name';

        return view('home.about')->with('viewData', $viewData);
    }

    public function contact(): View
    {
        $viewData = [];
        $viewData['name'] = 'Daniel Correa';
        $viewData['address'] = 'Cl. 4 Sur # 43 - 100, El Poblado, Medellín, Antioquia';
        $viewData['phone'] = '+57 300 000 0000';

        return view('home.contact')->with('viewData', $viewData);
    }
}
