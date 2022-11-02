<?php 

namespace App\Controllers;
use App\Models\UserModel;

class Register extends BaseController 
{
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
            'nama'          => 'required|min_length[3]|max_length[50]|is_unique[users.nama]',
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
