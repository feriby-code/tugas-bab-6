<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class FormController extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = new MahasiswaModel();
    }

    public function index() {

        $all = $this->db->findAll();

        $data = [
            'mahasiswa' => $all
        ];

        return view('index', $data);
    }

    public function tambah(){
        if (isset($_POST['nim'])) {

            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $prodi = $_POST['prodi'];
            $fakultas = $_POST['fakultas'];

            $upload = [
                'nim' => $nim,
                'nama' => $nama,
                'prodi' => $prodi,
                'fakultas' => $fakultas,
            ];

            $this->db->insert($upload);

            return redirect()->to(base_url('/'));
        }else{
            return view('/');
        }
    }
    
    public function edit() {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $fakultas = $_POST['fakultas'];
        
        $this->db->where('nim', $nim)
        ->set('nim', $nim)
        ->set('nama', $nama)
        ->set('prodi', $prodi)
        ->set('fakultas', $fakultas)
        ->update();
        return redirect()->to(base_url('/'));
    }

    public function hapus($id){
        $nim = $id;
        $this->db->delete($nim);
        return redirect()->to(base_url('/'));
    }

}

?>