<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class Auth extends Controller
{
    public function login()
    {
        // Menampilkan halaman login
        return view('login');
    }

    public function loginProcess()
    {
        // Mengambil input dari form login (POST)
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validasi sederhana: pastikan email & password tidak kosong
        if (!$email || !$password) {
            return redirect()->to('/login')->with('error', 'Email dan password wajib diisi.');
        }

        // Koneksi database
        $db = Database::connect();

        // Cari user berdasarkan email
        $user = $db->table('users')->where('email', $email)->get()->getRowArray();

        // Kalau email tidak ditemukan
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Email tidak ditemukan.');
        }

        // Cek password: password form dibandingkan dengan hash di database
        if (!password_verify($password, $user['password'])) {
            return redirect()->to('/login')->with('error', 'Password salah.');
        }

        // Jika benar, set session (login sukses)
        session()->set([
            'user_id' => $user['id'],
            'name'    => $user['name'],
            'role'    => $user['role'],
            'logged_in' => true,
        ]);

        // Arahkan berdasarkan role
        if ($user['role'] === 'admin') {
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->to('/approvals');
    }

    public function logout()
    {
        // Hapus semua session login
        session()->destroy();
        return redirect()->to('/login');
    }
}