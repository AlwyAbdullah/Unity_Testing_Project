<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\FileModel;

class UnityHome extends BaseController
{
    protected $unityHome;

    public function __construct()
    {
        $this->unityHome = new UserModel();
        $this->fileModel = new FileModel();
        $this->session = session();
    }

    public function index()
    {
        if ($this->session->get('level') == "user") {
            $nim = (int)$this->session->get('nim');
            $data['result'] = $this->unityHome->getAllTestResults($nim);
            return view('home/index', $data);
        }
        return redirect()->to('login');
    }

    public function saveUpdatePassword()
    {
        if ($this->session->get('level') == "user") {
            $nim = (int)$this->session->get('nim');
            $id = (int)$this->session->get('id');
            $data['result'] = $this->unityHome->getAllTestResults($nim);
            $oldPass = $this->request->getVar('oldPass');
            $newPass = $this->request->getVar('newPass');
            $verify_pass = password_verify($oldPass, $this->session->get('password'));
            if ($verify_pass) {
                helper(['form']);
                //set rules validation form
                $rules = [
                    'newPass'      => 'required|min_length[8]|max_length[200]',
                    're_pass'       => 'matches[newPass]'
                ];
                if ($this->validate($rules)) {
                    $this->unityHome->update($id, [
                        'password'      => password_hash($newPass, PASSWORD_DEFAULT)
                    ]);
                    // $this->unityHome->update(['password' => $this->session->get('password')], ['password', password_hash($newPass, PASSWORD_DEFAULT)]);
                    session()->setFlashdata('message', 'Edit Password User Berhasil');
                    return redirect()->to('/UnityHome');
                } else {
                    $data['validation'] = $this->validator;
                    return view('home/changePassword', $data);
                }
            } else {
                session()->setFlashdata('message', 'Password Salah');
                return redirect()->to('UnityHome/updatePassword');
            }
        }
    }

    public function updatePassword()
    {
        if ($this->session->get('level') == "user") {
            helper(['form']);
            return view('home/changePassword');
        }
        return redirect()->to('login');
    }

    public function modul()
    {
        if ($this->session->get('level') == "user") {
            $data['modul'] = $this->fileModel->findAll();
            return view('home/modul', $data);
        }
    }

    public function testData()
    {
        if ($this->session->get('level') == "user") {
            $nim = (int)$this->session->get('nim');
            $data['result'] = $this->unityHome->getAllTestResults($nim);
            return view('home/test_result', $data);
        }
        return redirect()->to('login');
    }
}
