<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;



class Mahasiswa extends REST_Controller
{
    public function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('Mahasiswa_model', 'mhs');
    }

    //====================================== Tampil Data =====================================================

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $mahasiswa = $this->mhs->getMahasiswa();
        } else {
            $mahasiswa = $this->mhs->getMahasiswa($id);
        }

        if ($mahasiswa) {
            $this->response([
                'status' => true,
                'data' => $mahasiswa
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->response([
                'status' => false,
                'message' => 'Id Not Found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    //====================================== Simpan Data =====================================================

    public function index_post()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat')
        ];

        if ($this->mhs->createMahasiswa($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'New mahasiswa has been cretaed.'
            ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code

        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to create new data.'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (400) being the HTTP response code
        }
    }

    //====================================== Update Data =====================================================

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nama' => $this->put('nama'),
            'jk' => $this->put('jk'),
            'alamat' => $this->put('alamat')
        ];

        if ($this->mhs->updateMahasiswa($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'mahasiswa has been updated.'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to update data.'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (400) being the HTTP response code
        }
    }

    //====================================== Hapus Data =====================================================

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'Provide an ID'
            ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (400) being the HTTP response code
        } else {
            if ($this->mhs->deleteMahasiswa($id) > 0) {
                // OK
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Delete Successful'
                ], REST_Controller::HTTP_NO_CONTENT); // OK (204) being the HTTP response code
            } else {
                //Gagal
                $this->response([
                    'status' => false,
                    'message' => 'Id Not Found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }
    }
}
