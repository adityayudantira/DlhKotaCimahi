<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\M_titikPantau;

class dataTitikPantau extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->M_titikPantau = new M_titikPantau();  
    }

    //untuk menampilkan data
    public function index()
    {
        $data = [
            'title' => 'Data Titik Pantau',
            'titikPantau' => $this->M_titikPantau->get_all_data(),
            'isi'   => 'pages/gis/v_titikPantau',
        ];
        echo view('layout/wrapper', $data);
    }
    
    // untuks add data
    public function add() 
    {
        $data = [
            'title' => 'Tambah Titik Pantau',
            'isi'   => 'pages/gis/v_addtitikPantau',
        ];
        echo view('layout/wrapper', $data);
    }


    // untuk save data
    public function save() 
    {
        $valid = $this->validate([
            'nama_sungai' => [
                'label' => 'Nama Sungai',
                'rules'  => 'required',
                'errors'=> [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
            'nama_titikPantau' => [
                'label' => 'Nama Titik Pantau',
                'rules'  => 'required',
                'errors'=> [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
            'latitude' => [
                'label' => 'Latitude',
                'rules'  => 'required',
                'errors'=> [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
            'longitude' => [
                'label' => 'Longitude',
                'rules'  => 'required',
                'errors'=> [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules'  => 'required',
                'errors'=> [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules'  => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]|max_size[foto,15000]',
                'errors'=> [
                    'uploaded' => '{field} Wajib Diisi',
                ]
            ],
            'video' => [
                'label' => 'Video',
                'rules'  => 'uploaded[video]|mime_in[video,video/mp4,video/mkv]|max_size[foto,1500000]',
                'errors'=> [
                    'uploaded' => '{field} Wajib Diisi',
                ]
            ],
        ]);

        if (!$valid){
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dataTitikPantau/add'));
        } else{
            
            $video = $this->request->getFile('video');
            $image = $this->request->getFile('foto');
            $namev = $video->getRandomName();
            $name = $image->getRandomName();
            $data =[
                'nama_sungai' => $this->request->getPost('nama_sungai'),
                'nama_titikPantau' => $this->request->getPost('nama_titikPantau'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'foto' => $name,
                'video' => $namev,
            ];
            $video->move(ROOTPATH.'/public/assets/img/',$namev);
            $image->move(ROOTPATH.'/public/assets/img/',$name);
            $this->M_titikPantau->insert_data($data);
            session()->setFlashdata('success','Data Titik Pantau Berhasil Ditambahkan !');
            return redirect()->to(base_url('dataTitikPantau'));
        }
        
    }

    // untuks edit data
    public function edit($id) 
    {
        $data = [
            'title' => 'Edit Titik Pantau',
            'titikPantau' => $this->M_titikPantau->detail($id),
            'isi'   => 'pages/gis/v_edittitikPantau',
        ];
        echo view('layout/wrapper', $data);
    }

    // untuk update data
    public function update($id) 
    {
        $valid = $this->validate([
            'nama_sungai' => [
                'label' => 'Nama Sungai',
                'rules'  => 'required',
                'errors'=> [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
            'nama_titikPantau' => [
                'label' => 'Nama Titik Pantau',
                'rules'  => 'required',
                'errors'=> [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
            'latitude' => [
                'label' => 'Latitude',
                'rules'  => 'required',
                'errors'=> [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
            'longitude' => [
                'label' => 'Longitude',
                'rules'  => 'required',
                'errors'=> [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules'  => 'required',
                'errors'=> [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules'  => 'mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]|max_size[foto,15000]',
                'errors'=> [
                    'max_size' => '{field} Max Size 15Mb',
                ]
            ],
            'video' => [
                'label' => 'Video',
                'rules'  => 'uploaded[video]|mime_in[video,video/mp4,video/mkv]|max_size[foto,1500000]',
                'errors'=> [
                    'uploaded' => '{field} Wajib Diisi',
                ]
            ],
        ]);

        if (!$valid){
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dataTitikPantau/edit/'.$id));
        } else{
            
            $video = $this->request->getFile('video');
            $image = $this->request->getFile('foto');
            $namev = $video->getRandomName();
            $name = $image->getRandomName();
            $data =[
                'nama_sungai' => $this->request->getPost('nama_sungai'),
                'nama_titikPantau' => $this->request->getPost('nama_titikPantau'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'foto' => $name,
                'video' => $namev,
            ];
            $video->move(ROOTPATH.'/public/assets/img/',$namev);
            $image->move(ROOTPATH.'/public/assets/img/',$name);
            $this->M_titikPantau->update_data($data,$id);
            session()->setFlashdata('success','Data Titik Pantau Berhasil Diubah !');
            return redirect()->to(base_url('dataTitikPantau'));
        }
        
    }

    public function delete($id)
    {
        $this->M_titikPantau->delete_data($id);
        session()->setFlashdata('success','Data Titik Pantau Berhasil Dihapus !');
        return redirect()->to(base_url('dataTitikPantau'));
    }
}
