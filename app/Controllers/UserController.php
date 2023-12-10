<?php

namespace App\Controllers;

// use App\Controller\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new \App\Models\UserModel();
        $kelasModel = new \App\Models\KelasModel();
        $ruleModel = new \App\Models\PelanggaranModel();
        $data['users'] = $userModel
            ->select('user.*')
            ->where('user.Role' , '1')
            ->findAll();
        $data['kelas'] = $kelasModel->findAll();
        $jadwalModel = new \App\Models\JadwalModel();
        $data['jadwal'] = $jadwalModel
            ->select('jadwal.*, user.fullName as user_fullName')
            ->join('user', 'user.ID = jadwal.guruBK')
            ->where('jadwal.userID', session()->get('ID'))
            ->findAll();
        $data['pelanggaran'] = $ruleModel->findAll();
        $data['title'] = "Dashboard";
        $data['username'] = session()->get('username');
        // Check if the user is authenticated with the role
        if (session()->get('role') == 0) {
            // User dashboard content

            // Load header view from the layout folder
            echo view('User/Layout/header', $data);

            // Load sidebar view from the layout folder
            echo view('User/Layout/sidebar');

            // Load main content (index) view
            echo view('User/index', $data);

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

    public function createJadwal()
    {
        $jadwalModel = new \App\Models\JadwalModel();

        $data = [
            'Jadwal' => $this->request->getPost('jadwal'),
            'Waktu' => $this->request->getPost('waktu'),
            'UserID' => session()->get('ID'),
            'Permasalahan' => $this->request->getPost('permasalahan'),
            'GuruBK' => $this->request->getPost('guruBK'),
            'Status' => 0,
        ];
    
        // Add your user creation logic here
        if ($jadwalModel->insert($data)) {
            // Data inserted successfully
            return redirect()->back()->with('success', 'Schedule created successfully');
        } else {
            // Handle errors
            echo json_encode($data);
            return redirect()->back()->withInput()->with('error', 'Failed to create user');
        };
        // Assuming success, return a JSON response
        return $this->response->setJSON(['success' => true]);
    }

    public function updateJadwal()
    {
        $jadwalModel = new \App\Models\JadwalModel();

        $data = [
            'Jadwal' => $this->request->getPost('jadwal'),
            'Waktu' => $this->request->getPost('waktu'),
            'GuruBK' => $this->request->getPost('userID'),
            'Permasalahan' => $this->request->getPost('permasalahan'),
        ];

        // Update the user data
        if ($jadwalModel->update($this->request->getPost('addJadwalId'), $data)) {
            // Data updated successfully
            echo json_encode(['success' => true]);
            return redirect()->to('/admin')->with('success', 'Jadwal updated successfully');
        } else {
            // Handle errors
            echo json_encode(['success' => false, 'error' => 'Failed to update jadwal']);
        }
    }

    public function logout()
    {
        // logout here
    }
}