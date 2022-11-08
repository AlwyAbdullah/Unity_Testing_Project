<?php

namespace App\Controllers;

use App\Models\FileModel;
use App\Models\UserModel;
use App\Models\TestResultModel;
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Home extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->users = new UserModel();
        $this->fileModel = new FileModel();
        $this->testModel = new TestResultModel();
    }

    public function index()
    {
        if ($this->session->get('level') == "admin") {
            $data = [
                'users' => $this->users->getUsers(),
                'tests' => $this->users->getAllTest()
            ];
            return view('Admin/index', $data);
        }
        return redirect()->to('login');
    }

    public function addUser()
    {
        if ($this->session->get('level') == "admin") {
            helper(['form']);
            $data = [];
            return view('Admin/add_user', $data);
        }
        return redirect()->to('login');
    }

    public function addModul()
    {
        if ($this->session->get('level') == "admin") {
            helper(['form']);
            $data = ["modul" => $this->fileModel->findAll(), ''];
            return view('Admin/add_modul', $data);
        }
        return redirect()->to('login');
    }

    public function saveModul()
    {
        //include helper form
        helper(['form', 'url']);
        //set rules validation form

        $file =  $this->request->getFile('materi');
        $fileName = $file->getName();

        $rules = [
            'judul_materi'          => 'required|is_unique[modul.judul_materi]',
        ];

        if ($this->validate($rules)) {
            if ($file->isValid() && !$file->hasMoved()) {
                $file->move(ROOTPATH . 'public/uploads/', $fileName);
                session()->setFlashData('message', 'Berhasil upload');
            }
            $model = new FileModel();
            $data = [
                'judul_materi' => $this->request->getVar('judul_materi'),
                'nama_file' => $fileName
            ];
            $model->save($data);
            session()->setFlashdata('message', 'Tambah Data Modul Berhasil');
            return redirect()->to('/Home/addModul');
        } else {
            session()->setFlashData('message', 'Gagal upload');
            $data['validation'] = $this->validator;
            echo view('Admin/add_modul', $data);
        }
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

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'nama'     => $this->request->getVar('nama'),
                'email'    => $this->request->getVar('email'),
                'nim'      => $this->request->getVar('nim'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'level'    => $this->request->getVar('level'),
            ];
            $model->save($data);
            session()->setFlashdata('message', 'Tambah Data User Berhasil');
            return redirect()->to('/Home');
        } else {
            $data['validation'] = $this->validator;
            echo view('Admin/add_user', $data);
        }
    }

    public function edit($id)
    {
        if ($this->session->get('level') == "admin") {
            $model = new UserModel();
            $data['users'] = $model->where('id', $id)->first();
            if (empty($data['users'])) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
            }

            return view('Admin/edit', $data);
        }
        return redirect()->to('login');
    }

    public function update($id)
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'nama'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email',
            'nim'           => 'required|min_length[10]|max_length[20]',
            'level'         => 'required'
        ];

        if ($this->validate($rules)) {
            $this->users->update($id, [
                'nama'     => $this->request->getVar('nama'),
                'email'    => $this->request->getVar('email'),
                'nim'      => $this->request->getVar('nim'),
                'level'    => $this->request->getVar('level'),
            ]);
            session()->setFlashdata('message', 'Edit Data User Berhasil');
            return redirect()->to('/Home');
        } else {
            $data['validation'] = $this->validator;
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $data = $this->users->find($id);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data User Tidak ditemukan !');
        }
        $this->users->delete($id);
        session()->setFlashdata('message', 'Delete Data User Berhasil');
        return redirect()->to('/Home');
    }

    public function deleteTest($id)
    {
        $data = $this->testModel->getTestId($id);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Test User Tidak ditemukan !');
        }
        $this->testModel->delete($id);
        session()->setFlashdata('message', 'Delete Data Hasil Test Berhasil');
        return redirect()->to('Home/testData');
    }

    public function editTest($id)
    {
        if ($this->session->get('level') == "admin") {
            $model = new TestResultModel();
            $data['tests'] = $model->where('id_test', $id)->first();
            if (empty($data['tests'])) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
            }

            return view('Admin/edit_test', $data);
        }
        return redirect()->to('login');
    }

    public function updateTest($id)
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'nim_users'              => 'required|min_length[10]|max_length[20]',
            'total_test'             => 'required',
            'test_passed'            => 'required',
            'test_failed'            => 'required',
            'nama_class'             => 'required',
            'tanggal_test'           => 'required'
        ];

        if ($this->validate($rules)) {
            $this->users->update($id, [
                'nim_users'         => $this->request->getVar('nim_users'),
                'total_test'        => $this->request->getVar('total_test'),
                'test_passed'       => $this->request->getVar('test_passed'),
                'test_failed'       => $this->request->getVar('test_failed'),
                'nama_class'        => $this->request->getVar('nama_class'),
                'tanggal_test'      => $this->request->getVar('tanggal_test'),
            ]);
            session()->setFlashdata('message', 'Edit Test Data User Berhasil');
            return redirect()->to('/Home/testData');
        } else {
            $data['validation'] = $this->validator;
            return redirect()->back();
        }
    }

    public function testData()
    {
        if ($this->session->get('level') == "admin") {
            $data['tests'] = $this->users->getAllTest();
            $data['allTest'] = $this->testModel->findAll();
            return view('Admin/test_data', $data);
        }
        return redirect()->to('login');
    }

    public function exportToExcel()
    {
        $excel = $this->users->getAllTest();
        $data['tests'] = $this->users->getAllTest();
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Nim');
        $sheet->setCellValue('D1', 'Total Test');
        $sheet->setCellValue('E1', 'Test Passed');
        $sheet->setCellValue('F1', 'Test Failed');
        $sheet->setCellValue('G1', 'Nama Class');
        $sheet->setCellValue('H1', 'Tanggal Test');
        $sheet->setCellValue('I1', 'Score Test');
        $rows = 2;
        $no = 1;
        foreach ($excel as $val) {
            $sheet->setCellValue('A' . $rows, $no);
            $sheet->setCellValue('B' . $rows, $val->nama);
            $sheet->setCellValue('C' . $rows, $val->nim);
            $sheet->setCellValue('D' . $rows, $val->total_test);
            $sheet->setCellValue('E' . $rows, $val->test_passed);
            $sheet->setCellValue('F' . $rows, $val->test_failed);
            $sheet->setCellValue('G' . $rows, $val->nama_class);
            $sheet->setCellValue('H' . $rows, $val->tanggal_test);
            $sheet->setCellValue('I' . $rows, round(($val->test_passed / $val->total_test) * 100, 2) . '%');
            $rows++;
            $no++;
        }

        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'DataTesting';
        
        // Redirect hasil generate xlsx ke web client
		header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Expires: 0');

		header('Cache-Control: must-revalidate');

		header('Pragma: public');

		header('Content-Length:' . filesize($fileName));

		flush();

		readfile($fileName);

        $writer->save('php://output');
        return view('Admin/test_data', $data);
    }

    public function profile()
    {
        if ($this->session->get('level') == "admin") {
            $data['users'] = $this->users->findAll();
            return view('Admin/index', $data);
        }
        return redirect()->to('login');
    }
}
