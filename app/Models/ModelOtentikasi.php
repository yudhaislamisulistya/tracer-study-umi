<?php


namespace App\Models;
use CodeIgniter\Model;


class ModelOtentikasi extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    // Mengecek User Terdaftar di Database
    public function check_user($nim, $nama)
    {
        try {
            $data = $this->db_tracer->table('alumni')
                ->where('nim', $nim)
                ->Where('nama', $nama)
                ->get()->getUnbufferedRow();
            if ($data) {
                $results = [
                    'status' => 200,
                    'data' => $data
                ];
            }else{
                $results = [
                    "status" => 401,
                    "pesan" => "Data Tidak Ditemukan",
                ];
            }
            return $results;
        } catch (\Exception $e) {
            $results = [
                "status" => 401,
                "pesan" => "Gagal Mengambil Data",
                "kesalahan" => $e,
            ];
            return $results;
        }
    }
    // Mengirim Link Activation Melalui Email 
    public function send_link_activation($nama, $nim, $email, $nohp, $activation_code)
    {
        try {
            $insert = $this->dbext_tracer->table('ref_registrasi')
                ->insert([
                    'nim' => $nim,
                    'nama' => $nama,
                    'email' => $email,
                    'nomor_handphone' => $nohp,
                    'activation' => $activation_code,
                    "status" => "1"
                ]);
            if ($insert) {
                $results = 1;
            }else{
                $results = [
                    "status" => 888,
                    "pesan" => "NIM Sudah Tercatat Didalam Database dan Telah di Registrasi",
                ];
            }

            return $results;
        } catch (\Exception $e) {
            $results = [
                "status" => 401,
                "pesan" => "Gagal Mengirim Link Aktivasi",
                "kesalahan" => $e,
            ];
            return $results;
        }
    }
    // Verifikasi Akun
    public function verification_account($activation_code)
    {
        try {
            $data = $this->dbext_tracer->table('ref_registrasi')
                ->where('activation', $activation_code)
                ->get()->getUnbufferedRow();
            if ($data) {
                $results = 1;
            }else{
                $results = 0;
            }
            return $results;
        } catch (\Exception $e) {
            $results = [
                "status" => 401,
                "pesan" => "Gagal Mengambil Data",
                "kesalahan" => $e,
            ];
            return $results;
        }
    }
    // Verifikasi Akun
    public function set_password($activation_code, $password)
    {
        try {
            $data = $this->dbext_tracer->table('ref_registrasi')
                ->where('activation', $activation_code)
                ->update([
                    "password" => $password,
                    'password_hash' => password_hash($password, PASSWORD_BCRYPT),
                    "status" => "2"
                ]);
            if ($data) {
                $results = 1;
            }else{
                $results = 0;
            }
            return $results;
        } catch (\Exception $e) {
            $results = [
                "status" => 401,
                "pesan" => "Gagal Mengambil Data",
                "kesalahan" => $e,
            ];
            return $results;
        }
    }

    // Mengecek Apakah Akun Ada Atau Tidak Ada
    public function validation_login($nim, $password)
    {
        $data = $this->dbext_tracer->table('ref_registrasi')
                ->where('nim', $nim)
                ->where('status', '2')
                ->get()
                ->getUnbufferedRow();

        if ($data) {
            $pass = $data->password;
            if ($password === $pass) {
                $pass_hash = $data->password_hash;
                if (password_verify($pass, $pass_hash)) {
                    $status = 'alumni';
                    if($data->nim == "admin"){
                        $status = 'admin';
                    }
                    $ses_data = [
                        'C_NPM'       => $data->nim,
                        'PASSWORD'     => $data->password,
                        'U_DATE'     => $data->updated_at,
                        'STATUS'     => $status,
                        'logged_in'     => TRUE
                    ];
                    Session()->set($ses_data);
                    return true;
                }
            }else{
                Session()->setFlashdata('status', 'Password Yang Anda Masukkan Salah Yah, Silahkan Coba Lagi Yah :(');
                return false;
            }
        }else{
            Session()->setFlashdata('status', 'NIM Tidak Terdaftar Atau Akun Alumni Belum di Aktivasi');
            return false;
        }
    }

    // Mengambil Data Kabupaten atau Kota Berdasarkan Code

    public function regencies_with_code($code)
    {
        try {
            $data = $this->dbext_tracer->table('regencies')
                ->where('province_id', $code)
                ->get()->getResult();
            if ($data) {
                $results = [
                    'status' => 200,
                    'data' => $data
                ];
            }else{
                $results = [
                    "status" => 401,
                    "pesan" => "Data Tidak Ditemukan",
                ];
            }
            return $results;
        } catch (\Exception $e) {
            $results = [
                "status" => 401,
                "pesan" => "Gagal Mengambil Data",
                "kesalahan" => $e,
            ];
            return $results;
        }
    }
}
