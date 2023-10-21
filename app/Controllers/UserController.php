<?php

namespace App\Controllers;

// use App\Controller\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        // Load header view from the layout folder
        echo view('User/Layout/header');

        // Load sidebar view from the layout folder
        echo view('User/Layout/sidebar');

        // Load main content (index) view
        echo view('User/index');

        // Load modal view from the layout folder
        echo view('User/Layout/modal');

        // Load footer view from the layout folder
        echo view('User/Layout/footer');
        // echo view('header');
        // return view('login');
        // echo('user');
                // Your code here
    }

    public function profile()
    {
        // Load header view from the layout folder
        echo view('User/Layout/header');

        // Load sidebar view from the layout folder
        echo view('User/Layout/sidebar');

        // Load main content (index) view
        echo view('User/Profil/index');

        // Load modal view from the layout folder
        echo view('User/Layout/modal');

        // Load footer view from the layout folder
        echo view('User/Layout/footer');
        // echo view('header');
        // return view('login');
        // echo('user');
                // Your code here
    }

    public function konseling()
    {
        // Load header view from the layout folder
        echo view('User/Layout/header');

        // Load sidebar view from the layout folder
        echo view('User/Layout/sidebar');

        // Load main content (index) view
        echo view('User/Konseling/index');

        // Load modal view from the layout folder
        echo view('User/Layout/modal');

        // Load footer view from the layout folder
        echo view('User/Layout/footer');
        // echo view('header');
        // return view('login');
        // echo('user');
                // Your code here
    }

    public function logout()
    {
        // logout here
    }
}