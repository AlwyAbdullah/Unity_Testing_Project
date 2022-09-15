<?php 

namespace App\Controllers;
use App\Models\UserModel;

class Register extends BaseController 
{

    // protected $register;

    // public function __construct()
    // {
    //     $this->register = new RegisterModel();
    // }

    // public function index()
    // {
    //     return view('register/signup');
    // }

    // public function signup()
    // {
    //     return view('register/signup');
    // }

    // public function store()
    // {
    //     if (!$this->validate([
    //         'nama' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Harus diisi'
    //             ]
    //         ],
    //         'email' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Harus diisi'
    //             ]
    //         ],
    //         'nim' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Harus diisi'
    //             ]
    //         ],
    //         'password' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Harus diisi'
    //             ]
    //         ],
    //         'confirmpassword' => 'matches[password]'
    //     ])) {
    //         session()->setFlashdata('error', $this->validator->listErrors());
    //         return redirect()->to('/register/signup')->withInput();
    //     }
 
    //     $this->register->insert([
    //         'nama' => $this->request->getVar('nama'),
    //         'email' => $this->request->getVar('email'),
    //         'nim' => $this->request->getVar('nim'),
    //         'password' => $this->request->getVar('password'),
    //         'created_at' => date('y-m-d h:i:s'),
    //     ]);
    //     session()->setFlashdata('message', 'Signup berhasil');
    //     return redirect()->to('/home');
    // }

    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register/signup', $data);
    }
 
    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'nama'          => 'required|min_length[3]|max_length[20]|is_unique[users.nama]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'nim'           => 'required|min_length[10]|max_length[20]',
            'password'      => 'required|min_length[8]|max_length[200]',
            're_pass'       => 'matches[password]'
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'nama'     => $this->request->getVar('nama'),
                'email'    => $this->request->getVar('email'),
                'nim'      => $this->request->getVar('nim'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'level'    => "user",
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('register/signup', $data);
        }
    }
}

/* End of file Controllername.php */
