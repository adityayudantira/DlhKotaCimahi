<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // echo view('layout/header');
        // echo view('layout/sidebar');
        // echo view('main/dashboard');
        // echo view('layout/footer');

        return view('/pages/home');
    }

    public function indexair()
    {
        // echo view('layout/header');
        // echo view('layout/sidebar');
        // echo view('main/indeksair');
        // echo view('layout/footer');
        return view('/main/indeksair');
    }

    public function statusair()
    {
        // echo view('layout/header');
        // echo view('layout/sidebar');
        // echo view('main/mutuair');
        // echo view('layout/footer');
        return view('/main/mutuair');
    }

    public function bnpencemaran()
    {
        // echo view('layout/header');
        // echo view('layout/sidebar');
        // echo view('main/mutuair');
        // echo view('layout/footer');

        return view('/main/bebanpencemaran') ;
    }    

    public function BODEksisting()
    {
        return view('/pages/BODEksisting/index');
    }
    public function BODPotensial()
    {
        return view('/pages/BODPotensial');
    }

    public function dataTitikPantau()
    {
        return view('/pages/gis/v_titikPantau');
    }

    public function gisTitikPantau()
    {
        return view('/pages/gis/v_maps');
    }

}
