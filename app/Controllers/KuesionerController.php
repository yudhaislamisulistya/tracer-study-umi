<?php

namespace App\Controllers;

ini_set('max_execution_time', 300);
ini_set('memory_limit', '256M');

use App\Controllers\BaseController;
use App\Models\ModelKuesioner;
use CodeIgniter\Session\Session;
use Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KuesionerController extends BaseController
{
    public $ModelKuesioner;
    public function __construct()
    {
        $this->ModelKuesioner = new ModelKuesioner();
    }

    public function index()
    {
        $this->ModelKuesioner->insert_or_update_kuesioner();
        if (get_data_setup_ts_with_tahun_keluar(get_data_biodata(Session()->get('C_NPM'))->tahun_keluar) != NULL) {
            if (get_data_setup_ts_with_tahun_keluar(get_data_biodata(Session()->get('C_NPM'))->tahun_keluar)->jenis_kuesioner == "kue_2017") {
                return view('kuesioner/2021');
            } else if (get_data_setup_ts_with_tahun_keluar(get_data_biodata(Session()->get('C_NPM'))->tahun_keluar)->jenis_kuesioner == "kue_2021") {
                return view('kuesioner/2021');
            } else {
                $data['status'] = 0;
                return view('kuesioner', $data);
            }
        } else {
            $data['status'] = 0;
            return view('kuesioner', $data);
        }
    }

    public function post_kuesioner()
    {
        $data = array(
            'nimhsmsmh'            => $this->request->getPost('nim'),
            'kdptimsmh'            => $this->request->getPost('kode_pt'),
            'tahun_masuk'        => $this->request->getPost('tahun_masuk'),
            'tahun_lulus'        => $this->request->getPost('tahun_lulus'),
            'kdpstmsmh'            => $this->request->getPost('kode_prodi'),
            'nmmhsmsmh'            => $this->request->getPost('nama_lengkap'),
            'telpomsmh'            => $this->request->getPost('nomor_handphone'),
            'emailmsmh'     => $this->request->getPost('email'),
            'f21'            => $this->request->getPost('f21'),
            'f22'            => $this->request->getPost('f22'),
            'f23'            => $this->request->getPost('f23'),
            'f24'            => $this->request->getPost('f24'),
            'f25'            => $this->request->getPost('f25'),
            'f26'            => $this->request->getPost('f26'),
            'f27'            => $this->request->getPost('f27'),
            'f301'            => $this->request->getPost('f301'),
            'f302'            => $this->request->getPost('f302'),
            'f303'            => $this->request->getPost('f303'),
            'f401'            => $this->request->getPost('f401'),
            'f402'            => $this->request->getPost('f402'),
            'f403'            => $this->request->getPost('f403'),
            'f404'            => $this->request->getPost('f404'),
            'f405'            => $this->request->getPost('f405'),
            'f406'            => $this->request->getPost('f406'),
            'f407'            => $this->request->getPost('f407'),
            'f408'            => $this->request->getPost('f408'),
            'f409'            => $this->request->getPost('f409'),
            'f410'            => $this->request->getPost('f410'),
            'f411'            => $this->request->getPost('f411'),
            'f412'            => $this->request->getPost('f412'),
            'f413'            => $this->request->getPost('f413'),
            'f414'            => $this->request->getPost('f414'),
            'f415'            => $this->request->getPost('f415'),
            'f416'            => $this->request->getPost('f416'),
            'f501'            => $this->request->getPost('f501'),
            'f502'            => $this->request->getPost('f502'),
            'f503'            => $this->request->getPost('f503'),
            'f6'            => $this->request->getPost('f6'),
            'f7'            => $this->request->getPost('f7'),
            'f7a'            => $this->request->getPost('f7a'),
            'f8'            => $this->request->getPost('f8'),
            'f901'            => $this->request->getPost('f901'),
            'f902'            => $this->request->getPost('f902'),
            'f903'            => $this->request->getPost('f903'),
            'f904'            => $this->request->getPost('f904'),
            'f905'            => $this->request->getPost('f905'),
            'f906'            => $this->request->getPost('f906'),
            'f1001'            => $this->request->getPost('f1001'),
            'f1002'            => $this->request->getPost('f1002'),
            'f1101'            => $this->request->getPost('f1101'),
            'f1102'            => $this->request->getPost('f1102'),
            'f1201'            => $this->request->getPost('f1201'),
            'f1202'            => $this->request->getPost('f1202'),
            'f1301'            => $this->request->getPost('f1301'),
            'f1302'            => $this->request->getPost('f1302'),
            'f1303'            => $this->request->getPost('f1303'),
            'f14'            => $this->request->getPost('f14'),
            'f15'            => $this->request->getPost('f15'),
            'f1601'            => $this->request->getPost('f1601'),
            'f1602'            => $this->request->getPost('f1602'),
            'f1603'            => $this->request->getPost('f1603'),
            'f1604'            => $this->request->getPost('f1604'),
            'f1605'            => $this->request->getPost('f1605'),
            'f1606'            => $this->request->getPost('f1606'),
            'f1607'            => $this->request->getPost('f1607'),
            'f1608'            => $this->request->getPost('f1608'),
            'f1609'            => $this->request->getPost('f1609'),
            'f1610'            => $this->request->getPost('f1610'),
            'f1611'            => $this->request->getPost('f1611'),
            'f1612'            => $this->request->getPost('f1612'),
            'f1613'            => $this->request->getPost('f1613'),
            'f1614'            => $this->request->getPost('f1614'),
            'f1701'            => $this->request->getPost('f1701'),
            'f1702b'            => $this->request->getPost('f1702b'),
            'f1703'            => $this->request->getPost('f1703'),
            'f1704b'            => $this->request->getPost('f1704b'),
            'f1705'            => $this->request->getPost('f1705'),
            'f1706b'            => $this->request->getPost('f1706b'),
            'f1705a'            => $this->request->getPost('f1705a'),
            'f1706ba'            => $this->request->getPost('f1706ba'),
            'f1707'            => $this->request->getPost('f1707'),
            'f1708b'            => $this->request->getPost('f1708b'),
            'f1709'            => $this->request->getPost('f1709'),
            'f1710b'            => $this->request->getPost('f1710b'),
            'f1711'            => $this->request->getPost('f1711'),
            'f1712b'            => $this->request->getPost('f1712b'),
            'f1713'            => $this->request->getPost('f1713'),
            'f1714b'            => $this->request->getPost('f1714b'),
            'f1715'            => $this->request->getPost('f1715'),
            'f1716b'            => $this->request->getPost('f1716b'),
            'f1717'            => $this->request->getPost('f1717'),
            'f1718b'            => $this->request->getPost('f1718b'),
            'f1719'            => $this->request->getPost('f1719'),
            'f1720b'            => $this->request->getPost('f1720b'),
            'f1721'            => $this->request->getPost('f1721'),
            'f1722b'            => $this->request->getPost('f1722b'),
            'f1723'            => $this->request->getPost('f1723'),
            'f1724b'            => $this->request->getPost('f1724b'),
            'f1725'            => $this->request->getPost('f1725'),
            'f1726b'            => $this->request->getPost('f1726b'),
            'f1727'            => $this->request->getPost('f1727'),
            'f1728b'            => $this->request->getPost('f1728b'),
            'f1729'            => $this->request->getPost('f1729'),
            'f1730b'            => $this->request->getPost('f1730b'),
            'f1731'            => $this->request->getPost('f1731'),
            'f1732b'            => $this->request->getPost('f1732b'),
            'f1733'            => $this->request->getPost('f1733'),
            'f1734b'            => $this->request->getPost('f1734b'),
            'f1735'            => $this->request->getPost('f1735'),
            'f1736b'            => $this->request->getPost('f1736b'),
            'f1737'            => $this->request->getPost('f1737'),
            'f1738b'            => $this->request->getPost('f1738b'),
            'f1737a'            => $this->request->getPost('f1737a'),
            'f1738ba'            => $this->request->getPost('f1738ba'),
            'f1739'            => $this->request->getPost('f1739'),
            'f1740b'            => $this->request->getPost('f1740b'),
            'f1741'            => $this->request->getPost('f1741'),
            'f1742b'            => $this->request->getPost('f1742b'),
            'f1743'            => $this->request->getPost('f1743'),
            'f1744b'            => $this->request->getPost('f1744b'),
            'f1745'            => $this->request->getPost('f1745'),
            'f1746b'            => $this->request->getPost('f1746b'),
            'f1747'             => $this->request->getPost('f1747'),
            'f1748b'            => $this->request->getPost('f1748b'),
            'f1749'             => $this->request->getPost('f1749'),
            'f1750b'            => $this->request->getPost('f1750b'),
            'f1751'             => $this->request->getPost('f1751'),
            'f1752b'            => $this->request->getPost('f1752b'),
            'f1753'             => $this->request->getPost('f1753'),
            'f1754b'            => $this->request->getPost('f1754b'),
            'jenis_kuesioner'            => $this->request->getPost('jenis_kuesioner'),
            'validasi'          => 2,
            'status'            => 1,
            'status_active'     => 1,
            'status_lulus'      => 1,
            'waktu_pengisian' => date('Y-m-d H:i:s')
        );
        if ($this->ModelKuesioner->update_biodata($data)) {
            session()->setFlashdata('status', 'berhasil');
            return redirect()->to(base_url('kuesioner'));
        } else {
            session()->setFlashdata('status', 'gagal');
            return redirect()->to(base_url('kuesioner'));
        }
    }

    public function post_kuesioner_2021()
    {
        $data = array(
            'nimhsmsmh'            => $this->request->getPost('nim'),
            'kdptimsmh'            => $this->request->getPost('kode_pt'),
            'tahun_masuk'        => $this->request->getPost('tahun_masuk'),
            'tahun_lulus'        => $this->request->getPost('tahun_lulus'),
            'kdpstmsmh'            => $this->request->getPost('kode_prodi'),
            'nmmhsmsmh'            => $this->request->getPost('nama_lengkap'),
            'telpomsmh'            => $this->request->getPost('nomor_handphone'),
            'emailmsmh'     => $this->request->getPost('email'),
            'nikmsmh'     => $this->request->getPost('nik'),
            'npwpmsmh'     => $this->request->getPost('npwp'),
            'f21'            => $this->request->getPost('f21'),
            'f22'            => $this->request->getPost('f22'),
            'f23'            => $this->request->getPost('f23'),
            'f24'            => $this->request->getPost('f24'),
            'f25'            => $this->request->getPost('f25'),
            'f26'            => $this->request->getPost('f26'),
            'f27'            => $this->request->getPost('f27'),
            'f301'            => $this->request->getPost('f301'),
            'f302'            => $this->request->getPost('f302'),
            'f303'            => $this->request->getPost('f303'),
            'f401'            => $this->request->getPost('f401'),
            'f402'            => $this->request->getPost('f402'),
            'f403'            => $this->request->getPost('f403'),
            'f404'            => $this->request->getPost('f404'),
            'f405'            => $this->request->getPost('f405'),
            'f406'            => $this->request->getPost('f406'),
            'f407'            => $this->request->getPost('f407'),
            'f408'            => $this->request->getPost('f408'),
            'f409'            => $this->request->getPost('f409'),
            'f410'            => $this->request->getPost('f410'),
            'f411'            => $this->request->getPost('f411'),
            'f412'            => $this->request->getPost('f412'),
            'f413'            => $this->request->getPost('f413'),
            'f414'            => $this->request->getPost('f414'),
            'f415'            => $this->request->getPost('f415'),
            'f416'            => $this->request->getPost('f416'),
            'f501'            => $this->request->getPost('f501'),
            'f502'            => $this->request->getPost('f502'),
            'f503'            => $this->request->getPost('f503'),
            'f505'            => $this->request->getPost('f505'),
            'f506'            => $this->request->getPost('f506'),
            'f5a1'            => $this->request->getPost('f5a1'),
            'f5a2'            => $this->request->getPost('f5a2'),
            'f5b'            => $this->request->getPost('f5b'),
            'f5c'            => $this->request->getPost('f5c'),
            'f5d'            => $this->request->getPost('f5d'),
            'f6'            => $this->request->getPost('f6'),
            'f7'            => $this->request->getPost('f7'),
            'f7a'            => $this->request->getPost('f7a'),
            'f8'            => $this->request->getPost('f8'),
            'f901'            => $this->request->getPost('f901'),
            'f902'            => $this->request->getPost('f902'),
            'f903'            => $this->request->getPost('f903'),
            'f904'            => $this->request->getPost('f904'),
            'f905'            => $this->request->getPost('f905'),
            'f906'            => $this->request->getPost('f906'),
            'f1001'            => $this->request->getPost('f1001'),
            'f1002'            => $this->request->getPost('f1002'),
            'f1101'            => $this->request->getPost('f1101'),
            'f1102'            => $this->request->getPost('f1102'),
            'f1201'            => $this->request->getPost('f1201'),
            'f1202'            => $this->request->getPost('f1202'),
            'f1301'            => $this->request->getPost('f1301'),
            'f1302'            => $this->request->getPost('f1302'),
            'f1303'            => $this->request->getPost('f1303'),
            'f14'            => $this->request->getPost('f14'),
            'f15'            => $this->request->getPost('f15'),
            'f1601'            => $this->request->getPost('f1601'),
            'f1602'            => $this->request->getPost('f1602'),
            'f1603'            => $this->request->getPost('f1603'),
            'f1604'            => $this->request->getPost('f1604'),
            'f1605'            => $this->request->getPost('f1605'),
            'f1606'            => $this->request->getPost('f1606'),
            'f1607'            => $this->request->getPost('f1607'),
            'f1608'            => $this->request->getPost('f1608'),
            'f1609'            => $this->request->getPost('f1609'),
            'f1610'            => $this->request->getPost('f1610'),
            'f1611'            => $this->request->getPost('f1611'),
            'f1612'            => $this->request->getPost('f1612'),
            'f1613'            => $this->request->getPost('f1613'),
            'f1614'            => $this->request->getPost('f1614'),
            'f1701'            => $this->request->getPost('f1701'),
            'f1702b'            => $this->request->getPost('f1702b'),
            'f1703'            => $this->request->getPost('f1703'),
            'f1704b'            => $this->request->getPost('f1704b'),
            'f1705'            => $this->request->getPost('f1705'),
            'f1706b'            => $this->request->getPost('f1706b'),
            'f1705a'            => $this->request->getPost('f1705a'),
            'f1706ba'            => $this->request->getPost('f1706ba'),
            'f1707'            => $this->request->getPost('f1707'),
            'f1708b'            => $this->request->getPost('f1708b'),
            'f1709'            => $this->request->getPost('f1709'),
            'f1710b'            => $this->request->getPost('f1710b'),
            'f1711'            => $this->request->getPost('f1711'),
            'f1712b'            => $this->request->getPost('f1712b'),
            'f1713'            => $this->request->getPost('f1713'),
            'f1714b'            => $this->request->getPost('f1714b'),
            'f1715'            => $this->request->getPost('f1715'),
            'f1716b'            => $this->request->getPost('f1716b'),
            'f1717'            => $this->request->getPost('f1717'),
            'f1718b'            => $this->request->getPost('f1718b'),
            'f1719'            => $this->request->getPost('f1719'),
            'f1720b'            => $this->request->getPost('f1720b'),
            'f1721'            => $this->request->getPost('f1721'),
            'f1722b'            => $this->request->getPost('f1722b'),
            'f1723'            => $this->request->getPost('f1723'),
            'f1724b'            => $this->request->getPost('f1724b'),
            'f1725'            => $this->request->getPost('f1725'),
            'f1726b'            => $this->request->getPost('f1726b'),
            'f1727'            => $this->request->getPost('f1727'),
            'f1728b'            => $this->request->getPost('f1728b'),
            'f1729'            => $this->request->getPost('f1729'),
            'f1730b'            => $this->request->getPost('f1730b'),
            'f1731'            => $this->request->getPost('f1731'),
            'f1732b'            => $this->request->getPost('f1732b'),
            'f1733'            => $this->request->getPost('f1733'),
            'f1734b'            => $this->request->getPost('f1734b'),
            'f1735'            => $this->request->getPost('f1735'),
            'f1736b'            => $this->request->getPost('f1736b'),
            'f1737'            => $this->request->getPost('f1737'),
            'f1738b'            => $this->request->getPost('f1738b'),
            'f1737a'            => $this->request->getPost('f1737a'),
            'f1738ba'            => $this->request->getPost('f1738ba'),
            'f1739'            => $this->request->getPost('f1739'),
            'f1740b'            => $this->request->getPost('f1740b'),
            'f1741'            => $this->request->getPost('f1741'),
            'f1742b'            => $this->request->getPost('f1742b'),
            'f1743'            => $this->request->getPost('f1743'),
            'f1744b'            => $this->request->getPost('f1744b'),
            'f1745'            => $this->request->getPost('f1745'),
            'f1746b'            => $this->request->getPost('f1746b'),
            'f1747'             => $this->request->getPost('f1747'),
            'f1748b'            => $this->request->getPost('f1748b'),
            'f1749'             => $this->request->getPost('f1749'),
            'f1750b'            => $this->request->getPost('f1750b'),
            'f1751'             => $this->request->getPost('f1751'),
            'f1752b'            => $this->request->getPost('f1752b'),
            'f1753'             => $this->request->getPost('f1753'),
            'f1754b'            => $this->request->getPost('f1754b'),
            'f18'            => $this->request->getPost('f18'),
            'f18a'            => $this->request->getPost('f18a'),
            'f18b'            => $this->request->getPost('f18b'),
            'f18c'            => $this->request->getPost('f18c'),
            'f18d'            => $this->request->getPost('f18d'),
            'jenis_kuesioner'            => $this->request->getPost('jenis_kuesioner'),
            'validasi'          => 2,
            'status'            => 1,
            'status_active'     => 1,
            'status_lulus'      => 1,
            'waktu_pengisian' => date('Y-m-d H:i:s')
        );

        if ($this->ModelKuesioner->update_biodata($data)) {
            session()->setFlashdata('status', 'berhasil');
            return redirect()->to(base_url('kuesioner'));
        } else {
            session()->setFlashdata('status', 'gagal');
            return redirect()->to(base_url('kuesioner'));
        }
    }

    // Admin Kuisioner Umum

    public function admin_kuesioner_universitas_umum_download()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        try {
            $limit = 200;
            $offset = 0;

            $firstBatch = $this->ModelKuesioner->get_kuesioner_batch($offset, 1);
            if (!empty($firstBatch)) {
                $columnNames = array_keys((array)$firstBatch[0]);
                $columnLetter = 'A';
                foreach ($columnNames as $columnName) {
                    $sheet->setCellValue($columnLetter . '1', $columnName);
                    $columnLetter++;
                }
            }

            while (true) {
                $data = $this->ModelKuesioner->get_kuesioner_batch($offset, $limit);
                if (empty($data)) {
                    break;
                }

                $rowCount = $offset + 2;
                foreach ($data as $row) {
                    $columnLetter = 'A';
                    foreach ($row as $cellValue) {
                        $sheet->setCellValue($columnLetter . $rowCount, $cellValue);
                        $columnLetter++;
                    }
                    $rowCount++;
                }

                $offset += $limit;
            }

            // make name file is Kuesioner Universitas Umum YYYY-MM-DD HH:MM:SS.xlsx
            $filename = 'Kuesioner Universitas Umum ' . date('Y-m-d h:i:s') . '.xlsx';

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            ob_start();
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
            ob_end_flush();
            exit;
        } catch (\Exception $th) {
            var_dump($th);
            die();
        }
    }

    // Kuesioner Prodi
    public function admin_kuesioner_prodi()
    {
        $userSession = session()->get('STATUS');
        if ($userSession == 'admin') {
            return view('admin/kuesioner/prodi');
        } else if ($userSession == "admin-prodi") {
            return view('admin-prodi/kuesioner/prodi');
        }
    }

    public function admin_kuesioner_prodi_post()
    {
        try {
            $data = [
                'nama_kuesioner' => $this->request->getPost('nama_kuesioner'),
                'nama_prodi' => $this->request->getPost('nama_prodi'),
                'periode_mulai' => $this->request->getPost('periode_mulai'),
                'periode_selesai' => $this->request->getPost('periode_selesai'),
            ];

            $query = $this->ModelKuesioner->insert_data($data);

            if ($query) {
                session()->setFlashdata('success', 'Berhasil menambahkan data kuesioner');
                return redirect()->back();
            } else {
                session()->setFlashdata('error', 'Gagal menambahkan data kuesioner');
                return redirect()->back();
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal menghapus data kuesioner');
            return redirect()->back();
        }
    }

    public function update()
    {
        try {
            $data = [
                'kuesioner_id' => $this->request->getPost('editId'),
                'nama_kuesioner' => $this->request->getPost('editNamaKuesioner'),
                'nama_prodi' => $this->request->getPost('editNamaProdi'),
                'periode_mulai' => $this->request->getPost('editPeriodeMulai'),
                'periode_selesai' => $this->request->getPost('editPeriodeSelesai'),
            ];

            $query = $this->ModelKuesioner->update_data($data);

            if ($query) {
                session()->setFlashdata('success', 'Berhasil mengubah data kuesioner');
                return redirect()->back();
            } else {
                session()->setFlashdata('error', 'Gagal mengubah data kuesioner');
                return redirect()->back();
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal mengubah data kuesioner');
            return redirect()->back();
        }
    }

    public function delete()
    {
        try {
            $hapusId = $this->request->getPost('hapusId');
            $query = $this->ModelKuesioner->delete_data($hapusId);

            if ($query) {
                session()->setFlashdata('success', 'Berhasil menghapus data kuesioner');
                return redirect()->back();
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data kuesioner');
                return redirect()->back();
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal menghapus data kuesioner');
            return redirect()->back();
        }
    }

    public function admin_kuesioner_prodi_detail($id)
    {
        $data['kuesioner'] = $this->ModelKuesioner->get_kuesioner_prodi_detail($id);
        $data['pertanyaan'] = $this->ModelKuesioner->get_pertanyaan_by_kuesioner($id);

        foreach ($data['pertanyaan'] as $key => $pertanyaan) {
            $data['pertanyaan'][$key]->pilihan_jawaban = $this->ModelKuesioner->get_pilihan_jawaban_by_pertanyaan($pertanyaan->pertanyaan_id);
        }

        return view('admin/kuesioner/prodi_detail', compact('data'));
    }


    // FOR API
    public function add_question()
    {
        $data = [
            'kuesioner_id' => $this->request->getPost('kuesioner_id'),
            'teks_pertanyaan' => $this->request->getPost('teks_pertanyaan'),
            'tipe_pertanyaan' => $this->request->getPost('tipe_pertanyaan'),
        ];

        $query = $this->ModelKuesioner->insert_question($data);
        if ($query) {
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'success',
                'data' => $data
            ];
            return $this->response->setJSON($response);
        } else {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => 'error',
                'data' => $data
            ];
            return $this->response->setJSON($response);
        }
    }
    public function save_all_questions()
    {
        try {
            $data = json_decode($this->request->getBody(), true);

            if (is_null($data)) {
                throw new Exception("Data tidak valid");
            }

            foreach ($data as $item) {
                if (!isset($item['teks_pertanyaan'], $item['tipe_pertanyaan'])) {
                    continue;
                }

                $dataPertanyaan = [
                    'kuesioner_id' => $item['kuesioner_id'],
                    'teks_pertanyaan' => $item['teks_pertanyaan'],
                    'tipe_pertanyaan' => $item['tipe_pertanyaan']
                ];

                $pertanyaanId = $this->ModelKuesioner->insert_question($dataPertanyaan);

                if (!$pertanyaanId) {
                    throw new Exception("Gagal menyimpan pertanyaan");
                }

                if (isset($item['pilihan_jawaban']) && is_array($item['pilihan_jawaban'])) {
                    foreach ($item['pilihan_jawaban'] as $pilihan) {
                        $dataPilihan = [
                            'pertanyaan_id' => $pertanyaanId,
                            'teks_pilihan' => $pilihan
                        ];

                        if ($this->ModelKuesioner->insert_option($dataPilihan) !== 1) {
                            throw new Exception("Gagal menyimpan pilihan jawaban");
                        }
                    }
                }
            }

            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Pertanyaan dan pilihan jawaban berhasil disimpan',
            ];

            return $this->response->setJSON($response);
        } catch (\Exception $th) {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ];

            return $this->response->setJSON($response);
        }
    }
}
