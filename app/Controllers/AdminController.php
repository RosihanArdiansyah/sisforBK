<?php

namespace App\Controllers;

// use App\Controller\BaseController;

class AdminController extends BaseController
{
    public function index()
    {   
        $userModel = new \App\Models\UserModel();
        $kelasModel = new \App\Models\KelasModel();
        $data['users'] = $userModel
            ->select('user.*, kelas.kelas as kls')
            ->join('kelas', 'user.kelas = kelas.ID')
            ->findAll();
        $data['kelas'] = $kelasModel->findAll();
        $jadwalModel = new \App\Models\JadwalModel();
        $data['jadwal'] = $jadwalModel
            ->select('jadwal.*, user.fullName as user_fullName')
            ->join('user', 'user.ID = jadwal.userID')
            // ->where('user.username', session()->get('username'))
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

            // Load footer view from the layout folder
            echo view('Admin/Layout/footer');
        } else {
            // Redirect to login or display an error message
            return redirect()->to('/')->with('error', 'Access denied');
        }
    }

    public function profile()
    {
        $userModel = new \App\Models\UserModel();
        $kelasModel = new \App\Models\KelasModel();
        $data['kelas'] = $kelasModel->findAll();
        $data['users'] = $userModel
            ->Where('user.username', session()->get('username'))
            ->findAll();
        $data['title'] = "Profil";
        if (session()->get('role') == 1) {
            // Load header view from the layout folder
            echo view('Admin/Layout/header', $data);

            // Load sidebar view from the layout folder
            echo view('Admin/Layout/sidebar');

            // Load main content (index) view
            echo view('Admin/Profil/index',$data);

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
        $kelasModel = new \App\Models\KelasModel();
        $data['users'] = $userModel->findAll();
        $data['kelas'] = $kelasModel->findAll();
        $data['title'] = "Data Pengguna";
        if (session()->get('role') == 1) {
            // Load header view from the layout folder
            echo view('Admin/Layout/header', $data);

            // Load sidebar view from the layout folder
            echo view('Admin/Layout/sidebar');

            // Load main content (index) view
            echo view('Admin/DataUser/index', $data);

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

    public function createJadwal()
    {
        $jadwalModel = new \App\Models\JadwalModel();

        $data = [
            'Jadwal' => $this->request->getPost('jadwal'),
            'Waktu' => $this->request->getPost('waktu'),
            'UserID' => $this->request->getPost('userID'),
            'Permasalahan' => $this->request->getPost('permasalahan'),
            'Status' => 1,
        ];
    
        // Add your user creation logic here
        if ($jadwalModel->insert($data)) {
            // Data inserted successfully
            return redirect()->to('/admin')->with('success', 'Schedule created successfully');
        } else {
            // Handle errors
            return redirect()->back()->withInput()->with('error', 'Failed to create user');
        };
        // Assuming success, return a JSON response
        return $this->response->setJSON(['success' => true]);
    }

    public function createRule()
    {
        $ruleModel = new \App\Models\PelanggaranModel();

        $data = [
            'NamaPelanggaran' => $this->request->getPost('namaPelanggaran'),
            'Poin' => $this->request->getPost('poin'),
        ];
    
        // Add your user creation logic here
        if ($ruleModel->insert($data)) {
            // Data inserted successfully
            return redirect()->to('/admin/dataRules')->with('success', 'Rule created successfully');
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

    public function showJadwal($id)
    {
        // Load the user model
        $jadwalModel = new \App\Models\JadwalModel();

        // Retrieve user data by ID
        $jadwalData = $jadwalModel->getWhere(['id' => $id])->getResult();

        // Check if user data was found
        if ($jadwalData) {
            // Display user data
            echo json_encode($jadwalData);
        } else {
            // Handle user not found error
            echo 'Jadwal not found';
        }
    }

    public function showRule($id)
    {
        // Load the user model
        $ruleModel = new \App\Models\PelanggaranModel();

        // Retrieve user data by ID
        $ruleData = $ruleModel->getWhere(['id' => $id])->getResult();

        // Check if user data was found
        if ($ruleData) {
            // Display user data
            echo json_encode($ruleData);
        } else {
            // Handle user not found error
            echo 'Rule not found';
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
            return redirect()->back()->with('success', 'User updated successfully');
        } else {
            // Handle errors
            echo json_encode(['success' => false, 'error' => 'Failed to update user']);
        }
    }

    public function updateJadwal()
    {
        $jadwalModel = new \App\Models\JadwalModel();

        $data = [
            'Jadwal' => $this->request->getPost('editJadwal'),
            'Waktu' => $this->request->getPost('editWaktu'),
            'UserID' => $this->request->getPost('editUserID'),
            'Permasalahan' => $this->request->getPost('editPermasalahan'),
            'Status' => $this->request->getPost('editStatus'),
        ];

        // Update the user data
        if ($jadwalModel->update($this->request->getPost('editJadwalId'), $data)) {
            // Data updated successfully
            echo json_encode(['success' => true]);
            return redirect()->to('/admin')->with('success', 'Jadwal updated successfully');
        } else {
            // Handle errors
            echo json_encode(['success' => false, 'error' => 'Failed to update jadwal']);
        }
    }

    public function updateRule()
    {
        $ruleModel = new \App\Models\PelanggaranModel();

        $data = [
            'NamaPelanggaran' => $this->request->getPost('editNamaPelanggaran'),
            'Poin' => $this->request->getPost('editPoin'),
        ];

        // Update the user data
        if ($ruleModel->update($this->request->getPost('editRuleID'), $data)) {
            // Data updated successfully
            echo json_encode(['success' => true]);
            return redirect()->back()->with('success', 'rule updated successfully');
        } else {
            // Handle errors
            echo json_encode(['success' => false, 'error' => 'Failed to update rule']);
        }
    }

}