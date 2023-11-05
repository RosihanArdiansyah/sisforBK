<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index(): string
    {
        echo view('header');
        return view('login');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));

        $user = $this->userModel->where('username', $username)
            ->where('Password', $password)
            ->first();

        if ($user) {
            // Authentication successful
            // Set user role in session
            session()->set('role', $user['Role']);
            session()->set('username', $user['username']);
            session()->set('fullName', $user['fullName']);

            // Role-based redirection
            if ($user['Role'] == 0) {
                return redirect()->to('user');
            } elseif ($user['Role'] == 1) {
                return redirect()->to('admin');
            }
        } else {
            // Authentication failed
            return redirect()->to('/')->with('error', 'Invalid username or password');
        }
    }

    public function userDashboard()
    {
        // Check if the user is authenticated with the role
        if (session()->get('role') == 0) {
            // User dashboard
            return view('user');
        } else {
            return redirect()->to('/');
        }
    }

    public function adminDashboard()
    {
        // Check if the user is authenticated with the role
        if (session()->get('role') == 1) {
            // Admin dashboard
            return view('admin');
        } else {
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        // Clear all user session data
        session()->destroy();

        // Redirect to the homepage
        return redirect()->to('/');
    }
}
