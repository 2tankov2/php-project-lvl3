<?php

namespace App\Http\Controllers;

class AppController extends Controller
{
    public function index($errors = null)
    {
        return view('index', ['errors' => $errors]);
    }
}
