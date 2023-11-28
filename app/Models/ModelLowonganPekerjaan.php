<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLowonganPekerjaan extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    public function get_lowongan_pekerjaan_paginate($limit, $start, $perusahaan, $programStudi, $keahlian, $periodePembukaan, $periodePenutupan, $gajiMin, $gajiMax, $penempatan)
    {        
        try {
            $query = $this->dbext_tracer->table('lowongan_kerja')
                ->like('nama_perusahaan', '%'.$perusahaan.'%')
                ->like('jenjang', '%'.$programStudi.'%')
                ->like('nama_formasi', '%'.$keahlian.'%')
                ->like('domisili', '%'.$penempatan.'%');

            if (!empty($periodePembukaan)) {
                $query = $query->where('periode_mulai >=', $periodePembukaan);
            }

            if (!empty($periodePenutupan)) {
                $query = $query->where('periode_selesai <=', $periodePenutupan);
            }

            if (!empty($gajiMin)) {
                $query = $query->where('kisaran_gaji_min >=', $gajiMin);
            }
            if (!empty($gajiMax)) {
                $query = $query->where('kisaran_gaji_max <=', $gajiMax);
            }

            $query = $query
                ->orderBy('lowongan_kerja.lowongan_id', 'DESC')
                ->limit($limit, $start)
                ->get();

            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_all_lowongan_pekerjaan($perusahaan, $programStudi, $keahlian, $periodePembukaan, $periodePenutupan, $gajiMin, $gajiMax, $penempatan){
        try {
            $query = $this->dbext_tracer->table('lowongan_kerja')
                ->like('nama_perusahaan', '%'.$perusahaan.'%')
                ->like('jenjang', '%'.$programStudi.'%')
                ->like('nama_formasi', '%'.$keahlian.'%')
                ->like('domisili', '%'.$penempatan.'%');

            if (!empty($periodePembukaan)) {
                $query = $query->where('periode_mulai >=', $periodePembukaan);
            }

            if (!empty($periodePenutupan)) {
                $query = $query->where('periode_selesai <=', $periodePenutupan);
            }

            if (!empty($gajiMin)) {
                $query = $query->where('kisaran_gaji_min >=', $gajiMin);
            }
            if (!empty($gajiMax)) {
                $query = $query->where('kisaran_gaji_max <=', $gajiMax);
            }
            $query = $query->orderBy('lowongan_kerja.lowongan_id', 'DESC')
                    ->get();

            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_detail_lowongan_pekerjaan($job_hash){
        try {
            $query = $this->dbext_tracer->table('lowongan_kerja')
                    ->where('job_hash', $job_hash)
                    ->get();
            return $query->getUnbufferedRow();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function update_job_hash($id, $job_hash){
        try {
            $query = $this->dbext_tracer->table('lowongan_kerja')
                    ->where('lowongan_id', $id)
                    ->update([
                        'job_hash' => $job_hash
                    ]);
            return $query;
        } catch (\Exception $th) {
            return 0;
        }
    }

    // Admin
    public function get_total_lowongan_pekerjaan()
    {
        try {
            $sql = "SELECT COUNT(*) AS total_lowongan_pekerjaan FROM lowongan_kerja";
            $query = $this->dbext_tracer->query($sql);
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
