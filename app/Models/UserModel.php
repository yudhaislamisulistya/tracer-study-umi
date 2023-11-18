<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup              = 'gamelan';
    protected $table                = 't_mst_user_login';
    protected $primaryKey           = 'C_USERNAME';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ["C_USERNAME","PASSWORD", "PASSWORD_X", "C_KODE_JENIS_USER", "U_DATE"];


    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    private $db_gamelan;
    private $db_kkn;

    public function __construct()
    {
        $this->db_gamelan = db_connect('gamelan');
        $this->db_kkn = db_connect("kkn");
    }


    public function registrasi_kkn($nim, $nama, $jenis_kelamin, $program_studi, $fakultas, $periode_kkn, $jenis_pendaftaran, $nohp, $ukuran_jaket)
    {
        try {
            $this->db_kkn->table('fr_registrasi')
            ->insert([
                "nim" => $nim,
                "nama" => $nama,
                "jenis_pendaftaran" => $jenis_pendaftaran,
                "nohp" => $nohp,
                "ukuran_jaket" => $ukuran_jaket,
                "jenis_kelamin" => $jenis_kelamin,
                "program_studi" => $program_studi,
                "fakultas" => $fakultas,
                "periode_kkn" => $periode_kkn,
                "akses" => 1
            ]);
            return 1;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function validation_login($stambuk, $password)
    {
        $data = $this->db_gamelan->table('t_mst_user_login')->where('C_USERNAME', $stambuk)->where('C_KODE_JENIS_USER', 'mahasiswa')->get()->getUnbufferedRow();

        if ($data) {
            $pass = $data->PASSWORD_X;
            if ($password === $pass) {
                $pass_md5_form = md5($password);
                $pass_md5 = $data->PASSWORD;
                if ($pass_md5_form === $pass_md5) {
                    $ses_data = [
                        'C_USERNAME'       => $data->C_USERNAME,
                        'PASSWORD'     => $data->PASSWORD,
                        'U_DATE'     => $data->U_DATE,
                        'logged_in'     => TRUE
                    ];
                    Session()->set($ses_data);
                    return true;
                }
            }else{
                Session()->setFlashdata('status', 'Password Failure');
                return false;
            }
        }else{
            Session()->setFlashdata('status', 'NIM Tidak Terdaftar');
            return false;
        }
    }
}
