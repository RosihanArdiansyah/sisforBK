<?php

namespace App\Controllers;

// use App\Controller\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        // Check if the user is authenticated with the role
        if (session()->get('role') == 1) {
            // User dashboard content

            // Load header view from the layout folder
            echo view('Admin/Layout/header');

            // Load sidebar view from the layout folder
            echo view('Admin/Layout/sidebar');

            // Load main content (index) view
            echo view('Admin/index');

            // Load modal view from the layout folder
            echo view('Admin/Layout/modal');

            // Load footer view from the layout folder
            echo view('Admin/Layout/footer');
        } else {
            // Redirect to login or display an error message
            return redirect()->to('/')->with('error', 'Access denied');
        }
    }

    public function profile()
    {
        // Load header view from the layout folder
        echo view('Admin/Layout/header');

        // Load sidebar view from the layout folder
        echo view('Admin/Layout/sidebar');

        // Load main content (index) view
        echo view('Admin/Profil/index');

        // Load modal view from the layout folder
        echo view('Admin/Layout/modal');

        // Load footer view from the layout folder
        echo view('Admin/Layout/footer');
        // echo view('header');
        // return view('login');
        // echo('Admin');
                // Your code here
    }

    public function konseling()
    {
        // Load header view from the layout folder
        echo view('Admin/Layout/header');

        // Load sidebar view from the layout folder
        echo view('Admin/Layout/sidebar');

        // Load main content (index) view
        echo view('Admin/Konseling/index');

        // Load modal view from the layout folder
        echo view('Admin/Layout/modal');

        // Load footer view from the layout folder
        echo view('Admin/Layout/footer');
        // echo view('header');
        // return view('login');
        // echo('Admin');
                // Your code here
    }

    public function dataRules()
    {
        // Load header view from the layout folder
        echo view('Admin/Layout/header');

        // Load sidebar view from the layout folder
        echo view('Admin/Layout/sidebar');

        // Load main content (index) view
        echo view('Admin/DataPelanggaran/index');

        // Load modal view from the layout folder
        echo view('Admin/Layout/modal');

        // Load footer view from the layout folder
        echo view('Admin/Layout/footer');
        // echo view('header');
        // return view('login');
        // echo('Admin');
                // Your code here
    }

    public function dataUser()
    {
        // Load header view from the layout folder
        echo view('Admin/Layout/header');

        // Load sidebar view from the layout folder
        echo view('Admin/Layout/sidebar');

        // Load main content (index) view
        echo view('Admin/DataUser/index');

        // Load modal view from the layout folder
        echo view('Admin/Layout/modal');

        // Load footer view from the layout folder
        echo view('Admin/Layout/footer');
        // echo view('header');
        // return view('login');
        // echo('Admin');
                // Your code here
    }

    public function logout()
    {
        // logout here
    }
}