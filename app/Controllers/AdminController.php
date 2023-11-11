<?php

namespace App\Controllers;

// use App\Controller\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $jadwalModel = new \App\Models\JadwalModel();
        $data['jadwal'] = $jadwalModel
            ->select('jadwal.*, user.fullName as user_fullName')
            ->join('user', 'user.ID = jadwal.userID')
            ->where('user.username', session()->get('username'))
            ->findAll();

        $data['title'] = "Dashboard";
        $data['username'] = session()->get('username');
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

    public function createUser()
    {
        $userModel = new \App\Models\UserModel();
        $TTL = $this->request->getPost('TTL');
        $NIS = $this->request->getPost('NIS');
        $Bapak = $this->request->getPost('Bapak');
        $Ibu = $this->request->getPost('Ibu');
        $Kelas = $this->request->getPost('Kelas');

        if (empty($NIS)) {
            $NIS = NULL; // Set a default value
        }else if(empty($Bapak)){
            $Bapak = NULL; // Set a default value
        }else if(empty($Ibu)){
            $Ibu = NULL; // Set a default value
        }else if(empty($Kelas)){
            $Kelas = NULL; // Set a default value
        }else if(empty($TTL)){
            $TTL = NULL; // Set a default value
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'fullName' => $this->request->getPost('fullName'),
            'TTL' => $TTL,
            'NIS' => $NIS,
            'Bapak' => $Bapak,
            'Ibu' => $Ibu,
            'Kelas' => $Kelas,
            'Role' => $this->request->getPost('Role'),
        ];
    
        // Add your user creation logic here
        if ($userModel->insert($data)) {
            // Data inserted successfully
            return redirect()->to('/admin/dataUser')->with('success', 'User created successfully');
        } else {
            // Handle errors
            return redirect()->back()->withInput()->with('error', 'Failed to create user');
        };
        // Assuming success, return a JSON response
        return $this->response->setJSON(['success' => true]);
    }

    public function show($id)
    {
        // Load the user model
        $userModel = new \App\Models\UserModel();

        // Retrieve user data by ID
        $userData = $userModel->getWhere(['id' => $id])->getResult();

        // Check if user data was found
        if ($userData) {
            // Display user data
            echo json_encode($userData);
        } else {
            // Handle user not found error
            echo 'User not found';
        }
    }

    public function updateUser()
    {
        $userModel = new \App\Models\UserModel();

        $TTL = $this->request->getPost('editTTL');
        $NIS = $this->request->getPost('editNIS');
        $Bapak = $this->request->getPost('editBapak');
        $Ibu = $this->request->getPost('editIbu');
        $Kelas = $this->request->getPost('editKelas');

        if (empty($NIS)) {
            $NIS = NULL; // Set a default value
        }else if(empty($Bapak)){
            $Bapak = NULL; // Set a default value
        }else if(empty($Ibu)){
            $Ibu = NULL; // Set a default value
        }else if(empty($Kelas)){
            $Kelas = NULL; // Set a default value
        }else if(empty($TTL)){
            $TTL = NULL; // Set a default value
        }

        // Get the form data
        $data = [
            // Add similar lines for other fields
            'username' => $this->request->getPost('editUsername'),
            'fullName' => $this->request->getPost('editFullName'),
            $TTL,
            $NIS,
            $Bapak,
            $Ibu,
            $Kelas,
            'Role' => $this->request->getPost('editRole'),
            // ...
        ];

        // Update the user data
        if ($userModel->update($this->request->getPost('editUserId'), $data)) {
            // Data updated successfully
            echo json_encode(['success' => true]);
            return redirect()->to('/admin/dataUser')->with('success', 'User updated successfully');
        } else {
            // Handle errors
            echo json_encode(['success' => false, 'error' => 'Failed to update user']);
        }
    }

}