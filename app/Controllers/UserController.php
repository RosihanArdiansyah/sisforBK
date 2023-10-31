<?php

namespace App\Controllers;

// use App\Controller\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        // Check if the user is authenticated with the role
        if (session()->get('role') == 0) {
            // User dashboard content

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
        } else {
            // Redirect to login or display an error message
            return redirect()->to('/')->with('error', 'Access denied');
        }
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