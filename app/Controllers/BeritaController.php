<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBerita;

class BeritaController extends BaseController
{
    public $ModelBerita;
    public function __construct()
    {
        $this->ModelBerita = new ModelBerita();
    }

    public function index()
    {
        try {
            $page = $this->request->getGet('page') ?? 1;
            $search = $this->request->getGet('search') ?? '';

            $perPage = 5;
            $offset = ($page - 1) * $perPage;
            $data['berita'] = $this->ModelBerita->get_berita_pagination($perPage, $offset, $search);
            $totalPosts = $this->ModelBerita->get_all_berita_by_search($search);
            $data['pagination_count'] = ceil(count($totalPosts) / $perPage);
            $data['perPage'] = $perPage;
            $data['totalRecords'] = count($totalPosts);
            $data['filter'] = [
                'search' => $search,
            ];
            return view('berita', $data);
        } catch (\Exception $th) {
            var_dump($th->getMessage());
            die();
        }
    }

    public function detail($berita_hash){
        try {
            $data['berita'] = $this->ModelBerita->get_detail_berita($berita_hash);
            $data['all_berita'] = $this->ModelBerita->get_all_berita();
            return view('detail-berita', $data);
        } catch (\Exception $th) {
            return redirect()->to(base_url('berita'));
        }
    }

    // Admin
    public function admin_berita(){
        return view('admin/informasi_dan_berita/berita');
    }

    public function admin_berita_post(){
        try {
            $data = [
                'berita_hash' => md5(date('Y-m-d H:i:s')),
                'judul' => $this->request->getPost('judulBerita'),
                'isi' => $this->request->getPost('isiBerita'),
                'penulis' => "Admin",
                'tanggal_publish' => $this->request->getPost('tanggalBerita'),
                'gambar' => null,
                'kategori' => $this->request->getPost('kategoriBerita'),
                'status' => $this->request->getPost('statusBerita'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $data['gambar'] = $this->request->getFile('gambarBerita')->getRandomName();
            
            $query = $this->ModelBerita->insert_data($data);

            if(!$query){
                session()->setFlashdata('error', 'Gagal menambahkan berita');
                return redirect()->to(base_url('admin/informasi-dan-berita/berita'));
            }else{
                $this->request->getFile('gambarBerita')->move('assets/img/berita', $data['gambar']);
                session()->setFlashdata('success', 'Berhasil menambahkan berita');
                return redirect()->to(base_url('admin/informasi-dan-berita/berita'));
            }
            
            
            session()->setFlashdata('success', 'Berhasil menambahkan berita');
            return redirect()->to(base_url('admin/informasi-dan-berita/berita'));
        } catch (\Exception $th) {
            var_dump($th->getMessage());
            die();
        }
    }

    public function update_admin_berita(){
        try {
            $data = [
                'judul' => $this->request->getPost('editJudulBerita'),
                'isi' => $this->request->getPost('editIsiBerita'),
                'penulis' => "Admin",
                'tanggal_publish' => $this->request->getPost('editTanggalBerita'),
                'kategori' => $this->request->getPost('editKategoriBerita'),
                'status' => $this->request->getPost('editStatusBerita'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $gambar = $this->request->getFile('editGambarBerita');

            if($gambar->getName() != ""){
                $data['gambar'] = $gambar->getRandomName();
                $gambar->move('assets/img/berita', $data['gambar']);
                $berita = $this->ModelBerita->get_detail_berita_by_id($this->request->getPost('editId'));
                if($berita->gambar != NULL){
                    unlink('assets/img/berita/'.$berita->gambar);
                }
            }
            
            $query = $this->ModelBerita->update_data($data, $this->request->getPost('editId'));

            if(!$query){
                session()->setFlashdata('error', 'Gagal mengubah berita');
                return redirect()->to(base_url('admin/informasi-dan-berita/berita'));
            }else{
                session()->setFlashdata('success', 'Berhasil mengubah berita');
                return redirect()->to(base_url('admin/informasi-dan-berita/berita'));
            }
        } catch (\Exception $th) {
            var_dump($th->getMessage());
            die();
        }
    }

    public function delete_admin_berita(){
        try {
            $hapusId = $this->request->getPost('hapusId');
            $query = $this->ModelBerita->delete_data($hapusId);

            if(!$query){
                session()->setFlashdata('error', 'Gagal menghapus berita');
                return redirect()->to(base_url('admin/informasi-dan-berita/berita'));
            }else{
                session()->setFlashdata('success', 'Berhasil menghapus berita');
                return redirect()->to(base_url('admin/informasi-dan-berita/berita'));
            }
        } catch (\Exception $th) {
            var_dump($th->getMessage());
            die();
        }
    }

    public function admin_artikel(){
        return view('admin/informasi_dan_berita/artikel');
    }

    public function admin_event(){
        return view('admin/informasi_dan_berita/event');
    }


}
