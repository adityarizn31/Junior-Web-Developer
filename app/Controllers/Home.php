<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Beasiswa Kampus'
        ];
        return view('v_home/index', $data);
    }
}
