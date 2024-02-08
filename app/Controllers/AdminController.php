<?php

namespace App\Controllers;

// use App\Controller\BaseController;

class AdminController extends BaseController
{
    public function index()
    {   
        $userModel = new \App\Models\UserModel();
        $kelasModel = new \App\Models\KelasModel();
        $ruleModel = new \App\Models\PelanggaranModel();
        $data['users'] = $userModel
            ->select('user.*, kelas.kelas as kls')
            ->join('kelas', 'user.kelas = kelas.ID')
            ->where('user.Role' , '0')
            ->findAll();
        $data['kelas'] = $kelasModel->findAll();
        $jadwalModel = new \App\Models\JadwalModel();
        $data['jadwal'] = $jadwalModel
            ->select('jadwal.*, user.fullName as user_fullName')
            ->join('user', 'user.ID = jadwal.userID')
            // ->where('user.username', session()->get('username'))
            ->findAll();
        $data['pelanggaran'] = $ruleModel->findAll();
        $data['title'] = "Dashboard";
        $data['username'] = session()->get('username');
        // Check if the user is authenticated with the role
        if (session()->get('role') == 1) {
            // User dashboard content

            // Load header view from the layout folder
            echo view('Admin/Layout/header', $data);

            // Load sidebar view from the layout folder
            echo view('Admin/Layout/sidebar');

            // Load modal view from the Admin/Layout folder and pass $data to it
            // echo view('Admin/Layout/modal', $data);

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
            ->select('user.*')
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
            ->select('konseling.*, jadwal.permasalahan AS permasalahan, jadwal.waktu AS ,jadwal.jadwal AS jadwal, jadwal.userID AS userID, user.fullName AS userName, pelanggaran.namaPelanggaran AS namaPelanggaran')
            ->join('jadwal', 'konseling.jadwalID = jadwal.ID')
            ->join('pelanggaran', 'konseling.pelanggaranID = pelanggaran.ID')
            ->join('user', 'jadwal.userID = user.ID')
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
        $data['users'] = $userModel
        ->where('user.Role' , '0')
        ->findAll();
        $data['kelas'] = $kelasModel->findAll();
        $data['title'] = "Data Pengguna";
        $data['route'] = "dataUser";
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

    public function dataGuru()
    {
        $userModel = new \App\Models\UserModel();
        $kelasModel = new \App\Models\KelasModel();
        $data['users'] = $userModel
        ->where('user.Role' , '1')
        ->findAll();
        $data['kelas'] = $kelasModel->findAll();
        $data['title'] = "Data Pengguna";
        $data['route'] = "dataGuru";
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
            'GuruBK' => session()->get('ID'),
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

    public function createReport()
    {
        $konselingModel = new \App\Models\KonselingModel();

        $data = [
            'ID' => $this->request->getPost('addReportId'),
            'JadwalID' => $this->request->getPost('addReportJadwalId'),
            'Waktu' => $this->request->getPost('addReportWaktu'),
            // 'UserID' => $this->request->getPost('addReportUserID'),
            'GuruBK' => session()->get('ID'),
            'PelanggaranID' => $this->request->getPost('addReportPelanggaran'),
            'Tindakan' => $this->request->getPost('addReportTindakan'),
            'Sanksi' => $this->request->getPost('addReportSanksi'),
        ];
    
        // Add your user creation logic here
        if ($konselingModel->save($data)) {
            // Data inserted successfully
            return redirect()->back()->with('success', 'Report created successfully');
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

    public function showReport($id)
    {
        // Load the user model
        $jadwalModel = new \App\Models\JadwalModel();
        $konselingModel = new \App\Models\KonselingModel();

        // Retrieve user data by ID
        $jadwalData = $jadwalModel->getWhere(['id' => $id])->getResult();
        $konselingData = $konselingModel
        ->select('konseling.*, konseling.ID AS reportID, jadwal.permasalahan AS permasalahan, jadwal.waktu AS waktu,jadwal.jadwal AS jadwal, jadwal.userID AS userID, user.fullName AS userName, pelanggaran.namaPelanggaran AS namaPelanggaran')
            ->join('jadwal', 'konseling.jadwalID = jadwal.ID')
            ->join('pelanggaran', 'konseling.pelanggaranID = pelanggaran.ID')
            ->join('user', 'jadwal.userID = user.ID')
            ->getWhere(['jadwalID' => $id])->getResult();

        // Check if user data was found
        if ($konselingData) {
            // Display user data
            echo json_encode($konselingData);
        } else if($jadwalData){
            // Handle user not found error
            echo json_encode($jadwalData);
            
        } else {
            echo 'Report not found';
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
        $Password = $this->request->getPost('editPassword');

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
        if(empty($Password)){
            $data = [
                // Add similar lines for other fields
                'username' => $this->request->getPost('editUsername'),
                'fullName' => $this->request->getPost('editFullName'),
                'TTL' =>$TTL,
                'NIS' =>$NIS,
                'Bapak' => $Bapak,
                'Ibu' =>$Ibu,
                'Kelas' =>$Kelas,
                'Role' => $this->request->getPost('editRole'),
                // ...
            ];
        }else{
            $data = [
                // Add similar lines for other fields
                'username' => $this->request->getPost('editUsername'),
                'fullName' => $this->request->getPost('editFullName'),
                'TTL' =>$TTL,
                'NIS' =>$NIS,
                'Bapak' => $Bapak,
                'Ibu' =>$Ibu,
                'Kelas' =>$Kelas,
                'Role' => $this->request->getPost('editRole'),
                'Password' =>md5($this->request->getPost('editPassword')),
                // ...
            ];
        }
        

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
            'Jadwal' => $this->request->getPost('jadwal'),
            'Waktu' => $this->request->getPost('waktu'),
            'UserID' => $this->request->getPost('userID'),
            'Permasalahan' => $this->request->getPost('permasalahan'),
            'Status' => $this->request->getPost('status'),
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

    public function printJadwal($id)
    {
        $jadwalModel = new \App\Models\JadwalModel();
        $data['jadwal'] = $jadwalModel
        ->select('jadwal.*, user.fullName as user_fullName, kelas.kelas as kls')
        ->join('user', 'user.ID = jadwal.userID')
        ->join('kelas', 'kelas.ID = user.Kelas')
        ->where('jadwal.ID', $id)
        ->findAll();

        // Render the 'print' view without the layout
        return view('Admin/Layout/print', $data);
    }

    public function deleteJadwal($id){
        $jadwalModel = new \App\Models\JadwalModel();
        $deleted = $jadwalModel->where('ID', $id)->delete();

        if ($deleted) {
            // Deletion was successful
            echo json_encode(['success' => true, 'message' => 'Jadwal deleted successfully']);
            return redirect()->back()->with('success', 'Jadwal deleted successfully');
        } else {
            // Handle errors during deletion
            echo json_encode(['success' => false, 'error' => 'Failed to delete jadwal']);
        }
    }

    public function deleteUser($id){
        $userModel = new \App\Models\UserModel();
        $deleted = $userModel->where('ID', $id)->delete();

        if ($deleted) {
            // Deletion was successful
            echo json_encode(['success' => true, 'message' => 'User deleted successfully']);
            return redirect()->back()->with('success', 'User deleted successfully');
        } else {
            // Handle errors during deletion
            echo json_encode(['success' => false, 'error' => 'Failed to delete user']);
        }
    }

    public function deleteRule($id){
        $ruleModel = new \App\Models\PelanggaranModel();
        $deleted = $ruleModel->where('ID', $id)->delete();

        if ($deleted) {
            // Deletion was successful
            echo json_encode(['success' => true, 'message' => 'User deleted successfully']);
            return redirect()->back()->with('success', 'User deleted successfully');
        } else {
            // Handle errors during deletion
            echo json_encode(['success' => false, 'error' => 'Failed to delete user']);
        }
    }

    public function recapReport($id){
        // Load the user model
        $jadwalModel = new \App\Models\JadwalModel();
        $konselingModel = new \App\Models\KonselingModel();

        // Retrieve user data by ID
        $jadwalData = $jadwalModel->getWhere(['userID' => $id])->getResult();

        $konselingData = [];
        foreach ($jadwalData as $jadwal) {
            $tempKonselingData = $konselingModel
                ->select('konseling.*, konseling.ID AS reportID, jadwal.permasalahan AS permasalahan, jadwal.waktu AS waktu, jadwal.jadwal AS jadwal, jadwal.userID AS userID, user.username AS userName,user.fullName AS fullName, pelanggaran.namaPelanggaran AS namaPelanggaran, pelanggaran.poin AS poin, guru.fullName AS guruName')
                ->join('jadwal', 'konseling.jadwalID = jadwal.ID')
                ->join('pelanggaran', 'konseling.pelanggaranID = pelanggaran.ID')
                ->join('user', 'jadwal.userID = user.ID')
                ->join('user as guru', 'konseling.guruBK = guru.ID')
                ->getWhere(['jadwalID' => $jadwal->ID])->getResult();

            $konselingData = array_merge($konselingData, $tempKonselingData);
        }

        // Check if user data was found
        if ($konselingData) {
            // Display user data
            echo json_encode($konselingData);
        } else if($jadwalData){
            // Handle user not found error
            echo json_encode($jadwalData);
            
        } else {
            echo 'Report not found';
        }
        
    }


}