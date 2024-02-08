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
        $userModel = new \App\Models\UserModel();
        $kelasModel = new \App\Models\KelasModel();
        $data['kelas'] = $kelasModel->findAll();
        $data['users'] = $userModel
            ->select('user.*, kelas.kelas as kls')
            ->join('kelas', 'user.kelas = kelas.ID')
            ->Where('user.username', session()->get('username'))
            ->findAll();
        $data['title'] = "Profil";
        if (session()->get('role') == 0) {
            // User dashboard content

            // Load header view from the layout folder
            echo view('User/Layout/header', $data);

            // Load sidebar view from the layout folder
            echo view('User/Layout/sidebar');

            // Load main content (index) view
            echo view('User/Profil/index', $data);

            // Load footer view from the layout folder
            echo view('User/Layout/footer');
        } else {
            // Redirect to login or display an error message
            return redirect()->to('/')->with('error', 'Access denied');
        }
    }

    public function konseling()
    {
        $konselingModel = new \App\Models\KonselingModel();
        $jadwalModel = new \App\Models\JadwalModel();
        $pelanggaranModel = new \App\Models\PelanggaranModel();
        $userModel = new \App\Models\UserModel();
        $data['pelanggaran'] = $pelanggaranModel->findAll();
        $data['jadwal'] = $jadwalModel->findAll();
        $data['users'] = $userModel
            ->select('user.*, kelas.kelas as kls')
            ->join('kelas', 'user.kelas = kelas.ID')
            ->where('user.Role' , '0')
            ->findAll();
        $data['konselingData'] = $konselingModel
            ->select('konseling.*, jadwal.permasalahan AS permasalahan, jadwal.waktu AS ,jadwal.jadwal AS jadwal, jadwal.guruBK AS userID, user.fullName AS userName, pelanggaran.namaPelanggaran AS namaPelanggaran')
            ->join('jadwal', 'konseling.jadwalID = jadwal.ID')
            ->join('pelanggaran', 'konseling.pelanggaranID = pelanggaran.ID')
            ->join('user', 'jadwal.guruBK = user.ID')
            ->where('jadwal.userID', session()->get('ID'))
            ->findAll();        

        $data['title'] = "Data Konseling";
        // Load header view from the layout folder
        if (session()->get('role') == 0) {
            // User dashboard content

            // Load header view from the layout folder
            echo view('User/Layout/header', $data);

            // Load sidebar view from the layout folder
            echo view('User/Layout/sidebar');

            // Load main content (index) view
            echo view('User/Konseling/index', $data);

            // Load footer view from the layout folder
            echo view('User/Layout/footer');
        } else {
            // Redirect to login or display an error message
            return redirect()->to('/')->with('error', 'Access denied');
        }
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
            'UserID' => session()->get('ID'),
            'Permasalahan' => $this->request->getPost('permasalahan'),
            'GuruBK' => $this->request->getPost('guruBK'),
            'Status' => 0,
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

}