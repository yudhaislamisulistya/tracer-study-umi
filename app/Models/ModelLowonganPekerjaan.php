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

    // public function get_lowongan_pekerjaan_paginate($limit, $start, $perusahaan, $programStudi, $keahlian, $periodePembukaan, $periodePenutupan, $gajiMin, $gajiMax, $penempatan)
    // {        
    //     try {
    //         $query = $this->dbext_tracer->table('lowongan_kerja')
    //             ->like('nama_perusahaan', '%'.$perusahaan.'%')
    //             ->like('jenjang', '%'.$programStudi.'%')
    //             ->like('nama_formasi', '%'.$keahlian.'%')
    //             ->like('domisili', '%'.$penempatan.'%');

    //         if (!empty($periodePembukaan)) {
    //             $query = $query->where('periode_mulai >=', $periodePembukaan);
    //         }

    //         if (!empty($periodePenutupan)) {
    //             $query = $query->where('periode_selesai <=', $periodePenutupan);
    //         }

    //         if (!empty($gajiMin)) {
    //             $query = $query->where('kisaran_gaji_min >=', $gajiMin);
    //         }
    //         if (!empty($gajiMax)) {
    //             $query = $query->where('kisaran_gaji_max <=', $gajiMax);
    //         }

    //         $query = $query
    //             ->orderBy('lowongan_kerja.lowongan_id', 'DESC')
    //             ->limit($limit, $start)
    //             ->get();

    //         return $query->getResult();
    //     } catch (\Exception $th) {
    //         return 0;
    //     }
    // }

    // public function get_all_lowongan_pekerjaan($perusahaan, $programStudi, $keahlian, $periodePembukaan, $periodePenutupan, $gajiMin, $gajiMax, $penempatan){
    //     try {
    //         $query = $this->dbext_tracer->table('lowongan_kerja')
    //             ->like('nama_perusahaan', '%'.$perusahaan.'%')
    //             ->like('jenjang', '%'.$programStudi.'%')
    //             ->like('nama_formasi', '%'.$keahlian.'%')
    //             ->like('domisili', '%'.$penempatan.'%');

    //         if (!empty($periodePembukaan)) {
    //             $query = $query->where('periode_mulai >=', $periodePembukaan);
    //         }

    //         if (!empty($periodePenutupan)) {
    //             $query = $query->where('periode_selesai <=', $periodePenutupan);
    //         }

    //         if (!empty($gajiMin)) {
    //             $query = $query->where('kisaran_gaji_min >=', $gajiMin);
    //         }
    //         if (!empty($gajiMax)) {
    //             $query = $query->where('kisaran_gaji_max <=', $gajiMax);
    //         }
    //         $query = $query->orderBy('lowongan_kerja.lowongan_id', 'DESC')
    //                 ->get();

    //         return $query->getResult();
    //     } catch (\Exception $th) {
    //         return 0;
    //     }
    // }

    public function get_lowongan_pekerjaan_paginate($limit, $start, $sort)
    {
        try {
            $query = $this->dbext_tracer->table('lowongan_kerja');

            // Apply sorting
            switch ($sort) {
                case 'gaji_tertinggi':
                    $query->orderBy('kisaran_gaji_max', 'DESC');
                    break;
                case 'gaji_terendah':
                    $query->orderBy('kisaran_gaji_min', 'ASC');
                    break;
                case 'pembukaan_terbaru':
                    $query->orderBy('periode_mulai', 'DESC');
                    break;
                case 'pembukaan_terlama':
                    $query->orderBy('periode_mulai', 'ASC');
                    break;
                case 'penutupan_terbaru':
                    $query->orderBy('periode_selesai', 'DESC');
                    break;
                case 'penutupan_terlama':
                    $query->orderBy('periode_selesai', 'ASC');
                    break;
                default:
                    $query->orderBy('lowongan_kerja.lowongan_id', 'DESC'); // default sorting
            }

            $query->limit($limit, $start);
            return $query->get()->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_all_lowongan_pekerjaan($sort)
    {
        try {
            $query = $this->dbext_tracer->table('lowongan_kerja');

            // Apply sorting
            switch ($sort) {
                case 'gaji_tertinggi':
                    $query->orderBy('kisaran_gaji_max', 'DESC');
                    break;
                case 'gaji_terendah':
                    $query->orderBy('kisaran_gaji_min', 'ASC');
                    break;
                case 'pembukaan_terbaru':
                    $query->orderBy('periode_mulai', 'DESC');
                    break;
                case 'pembukaan_terlama':
                    $query->orderBy('periode_mulai', 'ASC');
                    break;
                case 'penutupan_terbaru':
                    $query->orderBy('periode_selesai', 'DESC');
                    break;
                case 'penutupan_terlama':
                    $query->orderBy('periode_selesai', 'ASC');
                    break;
                default:
                    $query->orderBy('lowongan_kerja.lowongan_id', 'DESC'); // default sorting
            }

            return $query->get()->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }


    public function get_detail_lowongan_pekerjaan($job_hash)
    {
        try {
            $query = $this->dbext_tracer->table('lowongan_kerja')
                ->where('job_hash', $job_hash)
                ->get();
            return $query->getUnbufferedRow();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function update_job_hash($id, $job_hash)
    {
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

    public function insert_data($data)
    {
        try {
            $this->dbext_tracer->table('lowongan_kerja')->insert($data);
            return 1;
        } catch (\Exception $th) {
            var_dump($th->getMessage());
            return 0;
        }
    }

    public function delete_data($id)
    {
        try {
            $this->dbext_tracer->table('lowongan_kerja')->delete(['lowongan_id' => $id]);
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function update_data($data, $id)
    {
        try {
            $this->dbext_tracer->table('lowongan_kerja')->update($data, ['lowongan_id' => $id]);
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }
}
