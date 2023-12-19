<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPortalAlumni extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    // {
    //     "diagnostic": {
    //         "code": "0000",
    //         "status": "Success",
    //         "memory_usage": "51457 kb"
    //     },
    //     "response": {
    //         "items": [
    //         {
    //             "id_profil": 116887,
    //             "username": "02120100022",
    //             "nama": "ACHMAD ANUGRAH",
    //             "id_level": 66,
    //             "kode_level": "ALUMNI",
    //             "nm_level": "Alumni",
    //             "id_prodi": "",
    //             "nm_prodi": "Ekonomi Pembangunan",
    //             "nm_jenjang_prodi": "S1",
    //             "id_fakultas": 2,
    //             "nm_fakultas": "Fakultas Ekonomi dan Bisnis",
    //             "personal": {
    //             "username": "02120100022",
    //             "id_profil": 116887,
    //             "stambuk": "02120100022",
    //             "sts_aktif": "2",
    //             "ket_sts_aktif": "Lulus",
    //             "nama": "ACHMAD ANUGRAH",
    //             "tempat_lahir": "MAKASSAR",
    //             "tgl_lahir": "1991-07-14T00:00:00Z",
    //             "email": "02120100022@student.umi.ac.id",
    //             "jns_kelamin": "Laki-laki"
    //             }
    //         },
    //         ],
    //         "page": 1,
    //         "size": 20,
    //         "max_page": 2837,
    //         "total_pages": 2838,
    //         "total": 56744,
    //         "visible": 20
    //     }
    // }

    public function get_alumni_pagination($page, $size, $search)
    {
        // try {
        //     $query = $this->db_tracer->table('alumni')
        //         ->select('alumni.nama, alumni.tahun_keluar, program_studi.NAMA_PRODI')
        //         ->join('program_studi', 'alumni.kode_prodi = program_studi.C_KODE_PRODI')
        //         ->groupStart()
        //             ->like('nama', '%' . $search . '%')
        //             ->orLike('program_studi.nama_prodi', '%' . $search . '%')
        //         ->groupEnd()
        //         ->orderBy('alumni.id', 'DESC')
        //         ->limit($limit, $start)
        //         ->get();

        //     return $query->getResult();
        // } catch (\Exception $th) {
        //     return 0;
        // }
        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => getenv('app.endpointGateway') . 'alumnis?page=' . $page . '&size=' . $size,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "operator: web",
                    "appversion: 1.0.1",
                    'Authorization: Bearer ' . session()->get('TOKEN')
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $response = json_decode($response);
            return $response->response;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function get_all_alumni_by_search($search)
    {
        try {
            $query = $this->db_tracer->table('alumni')
                ->select('alumni.nama, alumni.tahun_keluar, program_studi.NAMA_PRODI')
                ->join('program_studi', 'alumni.kode_prodi = program_studi.C_KODE_PRODI')
                ->groupStart()
                    ->like('nama', '%' . $search . '%')
                    ->orLike('program_studi.nama_prodi', '%' . $search . '%')
                ->groupEnd()
                ->orderBy('alumni.id', 'DESC')
                ->get();
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
