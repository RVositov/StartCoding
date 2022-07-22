<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home() {
        return View('home');
    }
    public function index() {
        return View('index');
    }
    public function create() {
        return View('create');
    }
}
