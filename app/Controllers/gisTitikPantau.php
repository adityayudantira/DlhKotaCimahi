<?php

namespace App\Controllers;

use App\Models\M_titikPantau;

class gisTitikPantau extends BaseController
{

    public function __construct()
    {
        $this->M_titikPantau = new M_titikPantau();  
    }

    public function index()
    {
        $data = [
            'title' => 'Data Titik Pantau',
            'titikPantau' => $this->M_titikPantau->get_all_data(),
            'isi'   => 'pages/gis/v_maps',
        ];
        echo view('layout/wrapper', $data);
    }
    
}
