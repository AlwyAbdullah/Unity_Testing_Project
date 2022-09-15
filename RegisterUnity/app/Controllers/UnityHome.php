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

    public function modul()
    {
        if ($this->session->get('level') == "user") {
            $data['modul'] = $this->fileModel->findAll();
            return view('home/modul', $data);
        }
    }

    public function downloadModul($id)
    {
        $data = $this->fileModel->find($id);
        
        return $this->response->download("uploads/$data->nama_file", null);
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
