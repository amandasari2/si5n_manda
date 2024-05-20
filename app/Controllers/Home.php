<?php

namespace App\Controllers;

use App\Models\Home_model;

class Home extends BaseController
{
    public function __construct()
    {
        $this->Home_model = new Home_model();
    }

    public function index()
    {
        $data = array(
            'judul'     => 'Dashboard',
            'totalarsip' => $this->Home_model->totalarsip(),
            'totalkategori' => $this->Home_model->totalkategori(),
            'totaldepartemen' => $this->Home_model->totaldep(),
            'totaluser' => $this->Home_model->totaluser(),
            'page' => 'v_home'
        );
        return view('layout/v_gabung', $data);
    }
}
