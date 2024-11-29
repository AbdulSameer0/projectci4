<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('hello_message_test');
    }

    // public function view(string $page = 'home')
    // {

    // }
}
