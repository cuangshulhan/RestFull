<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Mahasiswa extends CI_Controller
{
    //================================== Tampil Data saat load halaman ==================================

    public function index()
    {
        $client   = new Client();
        $request  = $client->request('GET', 'http://localhost/Restapi_Server_CI3/Api/Mahasiswa');
        $response = json_decode($request->getBody()->getContents(), true);

        $data['RowData'] = $response;

        $this->load->view('view', $data);
    }

    //================================== Cari Data berdasarkan ID ==================================

    public function cari($id)
    {
        $client   = new Client();
        $request  = $client->request('GET', 'http://localhost/Restapi_Server_CI3/Api/Mahasiswa', [
            'query' => ['id' => $id]
        ]);

        $response = json_decode($request->getBody()->getContents(), true);

        $data['RowData'] = $response;

        $this->load->view('view', $data);
    }

    //================================== Tambah Data baru ======================================

    public function add()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "jk" => $this->input->post('jk', true),
            "alamat" => $this->input->post('alamat', true),
        ];

        $client = new Client();
        $response = $client->request('POST', 'http://localhost/Restapi_Server_CI3/Api/Mahasiswa', [
            //'auth' => ['cuang', 'cuang123'],
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        redirect('mahasiswa');
    }

    //================================== Menampilkan data dan menu edit =============================

    public function edit($id)
    {
        $client    = new Client();

        $request1  = $client->request('GET', 'http://localhost/Restapi_Server_CI3/Api/Mahasiswa');
        $response1 = json_decode($request1->getBody()->getContents(), true);

        $request2  = $client->request('GET', 'http://localhost/Restapi_Server_CI3/Api/Mahasiswa', [
            'query' => ['id' => $id]
        ]);
        $response2 = json_decode($request2->getBody()->getContents(), true);


        $data['RowData'] = $response1;
        $data['DataEdit'] = $response2;

        $this->load->view('edit', $data);
    }

    //================================== Ubah data yang di edit =================================

    public function update()
    {
        $data = [
            "id" => $this->input->post('id', true),
            "nama" => $this->input->post('nama', true),
            "jk" => $this->input->post('jk', true),
            "alamat" => $this->input->post('alamat', true),
        ];

        $client = new Client();
        $response = $client->request('PUT', 'http://localhost/Restapi_Server_CI3/Api/Mahasiswa', [
            //'auth' => ['cuang', 'cuang123'],
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        redirect('mahasiswa');
    }

    //================================== Hapus Data =================================

    public function delete($id)
    {
        $data = [
            "id" => $id
        ];

        $client = new Client();
        $response = $client->request('DELETE', 'http://localhost/Restapi_Server_CI3/Api/Mahasiswa', [
            //'auth' => ['cuang', 'cuang123'],
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        redirect('mahasiswa');
    }
}
