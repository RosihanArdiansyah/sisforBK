<?php

namespace App\Controllers;

// use App\Controller\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $jadwalModel = new \App\Models\JadwalModel();
        $data['jadwal'] = $jadwalModel->findAll();
        $data['title'] = "Dashboard";
        // Check if the user is authenticated with the role
        if (session()->get('role') == 1) {
            // User dashboard content

            // Load header view from the layout folder
            echo view('Admin/Layout/header', $data);

            // Load sidebar view from the layout folder
            echo view('Admin/Layout/sidebar');

            // Load main content (index) view
            echo view('Admin/index', $data);

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
        $data['title'] = "Profil";
        if (session()->get('role') == 1) {
            // Load header view from the layout folder
            echo view('Admin/Layout/header', $data);

            // Load sidebar view from the layout folder
            echo view('Admin/Layout/sidebar');

            // Load main content (index) view
            echo view('Admin/Profil/index');

            // Load modal view from the layout folder
            echo view('Admin/Layout/modal');

            // Load footer view from the layout folder
            echo view('Admin/Layout/footer');    
        } else {
            // Redirect to login or display an error message
            return redirect()->to('/')->with('error', 'Access denied');
        }
        
        
    }

    public function konseling()
    {
        $konselingModel = new \App\Models\KonselingModel();
        $data['konselingData'] = $konselingModel
            ->select('konseling.id, konseling.jadwalID, konseling.pelanggaranID, jadwal.permasalahan, jadwal.waktu, jadwal.userID, user.fullName AS userName, pelanggaran.namaPelanggaran AS pelanggaranName')
            ->join('jadwal', 'konseling.jadwalID = jadwal.id')
            ->join('pelanggaran', 'konseling.pelanggaranID = pelanggaran.id')
            ->join('user', 'jadwal.userID = user.id')
            ->findAll();        

        $data['title'] = "Data Konseling";
        if (session()->get('role') == 1) {
            // Load header view from the layout folder
            echo view('Admin/Layout/header', $data);

            // Load sidebar view from the layout folder
            echo view('Admin/Layout/sidebar');

            // Load main content (index) view
            echo view('Admin/Konseling/index', $data);

            // Load modal view from the layout folder
            echo view('Admin/Layout/modal');

            // Load footer view from the layout folder
            echo view('Admin/Layout/footer');        
        } else {
            // Redirect to login or display an error message
            return redirect()->to('/')->with('error', 'Access denied');
        }
                // Your code here
    }

    public function dataRules()
    {
        $ruleModel = new \App\Models\PelanggaranModel();
        $data['rules'] = $ruleModel->findAll();
        $data['title'] = "Data Pelanggaran";
        if (session()->get('role') == 1) {
            // Load header view from the layout folder
            echo view('Admin/Layout/header', $data);

            // Load sidebar view from the layout folder
            echo view('Admin/Layout/sidebar');

            // Load main content (index) view
            echo view('Admin/DataPelanggaran/index', $data);

            // Load modal view from the layout folder
            echo view('Admin/Layout/modal');

            // Load footer view from the layout folder
            echo view('Admin/Layout/footer');        
        } else {
            // Redirect to login or display an error message
            return redirect()->to('/')->with('error', 'Access denied');
        }
                // Your code here
    }

    public function dataUser()
    {
        $userModel = new \App\Models\UserModel();
        $data['users'] = $userModel->findAll();
        $data['title'] = "Data Pengguna";
        if (session()->get('role') == 1) {
            // Load header view from the layout folder
            echo view('Admin/Layout/header', $data);

            // Load sidebar view from the layout folder
            echo view('Admin/Layout/sidebar');

            // Load main content (index) view
            echo view('Admin/DataUser/index', $data);

            // Load modal view from the layout folder
            echo view('Admin/Layout/modal');

            // Load footer view from the layout folder
            echo view('Admin/Layout/footer');        
        } else {
            // Redirect to login or display an error message
            return redirect()->to('/')->with('error', 'Access denied');
        }
        

        
                // Your code here
    }

    public function logout()
    {
        // logout here
    }
}