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
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menampilkan berita');
        }
    }

    public function detail($berita_hash)
    {
        try {
            $data['berita'] = $this->ModelBerita->get_detail_berita($berita_hash);
            $data['all_berita'] = $this->ModelBerita->get_all_berita();
            return view('detail-berita', $data);
        } catch (\Exception $th) {
            return redirect()->to(base_url('berita'));
        }
    }

    // Admin
    public function admin_berita()
    {
        return view('admin/informasi_dan_berita/berita');
    }

    public function admin_berita_post()
    {
        try {
            $data = [
                'berita_hash' => md5(date('Y-m-d H:i:s')),
                'judul' => $this->request->getPost('judulBerita'),
                'isi' => $this->request->getPost('isiBerita'),
                'penulis' => "Admin",
                'tanggal_publish' => $this->request->getPost('tanggalBerita'),
                'gambar' => 'default-image.png', // default image 'default-image.png
                'kategori' => $this->request->getPost('kategoriBerita'),
                'status' => $this->request->getPost('statusBerita'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $file = $this->request->getFile('gambarBerita');

            // Check if file is uploaded and is valid
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $data['gambar'] = $file->getRandomName();
                $file->move('assets/img/berita', $data['gambar']);
            }

            $query = $this->ModelBerita->insert_data($data);

            if (!$query) {
                return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menambahkan berita');
            } else {
                return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil menambahkan berita');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menambahkan berita: ' . $th->getMessage());
        }
    }

    public function update_admin_berita()
    {
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

            if ($gambar->getName() != "") {
                $data['gambar'] = $gambar->getRandomName();
                $gambar->move('assets/img/berita', $data['gambar']);
                $berita = $this->ModelBerita->get_detail_berita_by_id($this->request->getPost('editId'));
                if ($berita->gambar != NULL) {
                    unlink('assets/img/berita/' . $berita->gambar);
                }
            }

            $query = $this->ModelBerita->update_data($data, $this->request->getPost('editId'));

            if (!$query) {
                return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal mengubah berita');
            } else {
                return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil mengubah berita');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal mengubah berita');
        }
    }

    public function delete_admin_berita()
    {
        try {
            $hapusId = $this->request->getPost('hapusId');
            $query = $this->ModelBerita->delete_data($hapusId);

            if (!$query) {
                return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menghapus berita');
            } else {
                return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil menghapus berita');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menghapus berita');
        }
    }

    public function admin_artikel()
    {
        return view('admin/informasi_dan_berita/artikel');
    }

    public function admin_event()
    {
        return view('admin/informasi_dan_berita/event');
    }

    // // Admin Prodi
    // Admin Prodi Berita View
    public function admin_prodi_berita()
    {
        return view('admin-prodi/informasi_dan_berita/berita');
    }

    // Admin Prodi Berita Post
    public function admin_prodi_berita_post()
    {
        try {
            $data = [
                'kode_prodi' => session()->get('C_KODE_PRODI'),
                'berita_hash' => md5(date('Y-m-d H:i:s')),
                'judul' => $this->request->getPost('judulBerita'),
                'isi' => $this->request->getPost('isiBerita'),
                'penulis' => "Admin",
                'tanggal_publish' => $this->request->getPost('tanggalBerita'),
                'gambar' => 'default-image.png', // default image 'default-image.png
                'kategori' => $this->request->getPost('kategoriBerita'),
                'status' => $this->request->getPost('statusBerita'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $file = $this->request->getFile('gambarBerita');

            // Check if file is uploaded and is valid
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $data['gambar'] = $file->getRandomName();
                $file->move('assets/img/berita', $data['gambar']);
            }

            $query = $this->ModelBerita->insert_data($data);

            if (!$query) {
                return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menambahkan berita');
            } else {
                return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil menambahkan berita');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menambahkan berita: ' . $th->getMessage());
        }
    }


    // Admin Prodi Berita Update
    public function update_admin_prodi_berita()
    {
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

            if ($gambar->getName() != "") {
                $data['gambar'] = $gambar->getRandomName();
                $gambar->move('assets/img/berita', $data['gambar']);
                $berita = $this->ModelBerita->get_detail_berita_by_id($this->request->getPost('editId'));
                if ($berita->gambar != NULL) {
                    unlink('assets/img/berita/' . $berita->gambar);
                }
            }

            $query = $this->ModelBerita->update_data($data, $this->request->getPost('editId'));

            if (!$query) {
                return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal mengubah berita');
            } else {
                return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil mengubah berita');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal mengubah berita');
        }
    }

    // Admin Prodi Berita Delete
    public function delete_admin_prodi_berita()
    {
        try {
            $hapusId = $this->request->getPost('hapusId');
            $query = $this->ModelBerita->delete_data($hapusId);

            if (!$query) {
                return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menghapus berita');
            } else {
                return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil menghapus berita');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menghapus berita');
        }
    }

    // Admin Prodi Artikel View
    public function admin_prodi_artikel()
    {
        return view('admin-prodi/informasi_dan_berita/artikel');
    }

    // Admin Prodi Artikel Post
    public function admin_prodi_artikel_post()
    {
        try {
            $data = [
                'kode_prodi' => session()->get('C_KODE_PRODI'),
                'berita_hash' => md5(date('Y-m-d H:i:s')),
                'judul' => $this->request->getPost('judulArtikel'),
                'isi' => $this->request->getPost('isiArtikel'),
                'penulis' => "Admin",
                'tanggal_publish' => $this->request->getPost('tanggalArtikel'),
                'gambar' => "default-image.png",
                'kategori' => $this->request->getPost('kategoriArtikel'),
                'status' => $this->request->getPost('statusArtikel'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $file = $this->request->getFile('gambarArtikel');

            // Validate file upload
            if ($file->isValid() && !$file->hasMoved()) {
                $data['gambar'] = $file->getRandomName();
                $file->move('assets/img/berita', $data['gambar']);
            }

            $query = $this->ModelBerita->insert_data($data);

            if (!$query) {
                return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menambahkan artikel');
            } else {
                return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil menambahkan artikel');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menambahkan artikel: ' . $th->getMessage());
        }
    }


    // Admin Prodi Artikel Update
    public function update_admin_prodi_artikel()
    {
        try {
            $data = [
                'judul' => $this->request->getPost('editJudulArtikel'),
                'isi' => $this->request->getPost('editIsiArtikel'),
                'penulis' => "Admin",
                'tanggal_publish' => $this->request->getPost('editTanggalArtikel'),
                'kategori' => $this->request->getPost('editKategoriArtikel'),
                'status' => $this->request->getPost('editStatusArtikel'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $gambar = $this->request->getFile('editGambarArtikel');

            if ($gambar->getName() != "") {
                $data['gambar'] = $gambar->getRandomName();
                $gambar->move('assets/img/berita', $data['gambar']);
                $berita = $this->ModelBerita->get_detail_berita_by_id($this->request->getPost('editId'));
                if ($berita->gambar != NULL) {
                    unlink('assets/img/berita/' . $berita->gambar);
                }
            }

            $query = $this->ModelBerita->update_data($data, $this->request->getPost('editId'));

            if (!$query) {
                return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal mengubah artikel');
            } else {
                return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil mengubah artikel');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal mengubah artikel');
        }
    }

    // Admin Prodi Artikel Delete
    public function delete_admin_prodi_artikel()
    {
        try {
            $hapusId = $this->request->getPost('hapusId');
            $query = $this->ModelBerita->delete_data($hapusId);

            if (!$query) {
                return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menghapus artikel');
            } else {
                return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil menghapus artikel');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menghapus artikel');
        }
    }


    // Admin Prodi Event View
    public function admin_prodi_event()
    {
        return view('admin-prodi/informasi_dan_berita/event');
    }

    // Admin Prodi Event Post
    public function admin_prodi_event_post()
    {
        try {
            $data = [
                'kode_prodi' => session()->get('C_KODE_PRODI'),
                'berita_hash' => md5(date('Y-m-d H:i:s')),
                'judul' => $this->request->getPost('judulEvent'),
                'isi' => $this->request->getPost('isiEvent'),
                'penulis' => "Admin",
                'tanggal_publish' => $this->request->getPost('tanggalEvent'),
                'gambar' => "default-image.png",
                'kategori' => $this->request->getPost('kategoriEvent'),
                'status' => $this->request->getPost('statusEvent'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $file = $this->request->getFile('gambarEvent');

            // Validate file upload
            if ($file->isValid() && !$file->hasMoved()) {
                $data['gambar'] = $file->getRandomName();
                $file->move('assets/img/berita', $data['gambar']);
            }

            $query = $this->ModelBerita->insert_data($data);

            if (!$query) {
                return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menambahkan Event');
            } else {
                return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil menambahkan Event');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menambahkan Event: ' . $th->getMessage());
        }
    }

    // Admin Prodi Event Update
    public function update_admin_prodi_event()
    {
        try {
            $data = [
                'judul' => $this->request->getPost('editJudulEvent'),
                'isi' => $this->request->getPost('editIsiEvent'),
                'penulis' => "Admin",
                'tanggal_publish' => $this->request->getPost('editTanggalEvent'),
                'kategori' => $this->request->getPost('editKategoriEvent'),
                'status' => $this->request->getPost('editStatusEvent'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $gambar = $this->request->getFile('editGambarEvent');

            if ($gambar->getName() != "") {
                $data['gambar'] = $gambar->getRandomName();
                $gambar->move('assets/img/berita', $data['gambar']);
                $berita = $this->ModelBerita->get_detail_berita_by_id($this->request->getPost('editId'));
                if ($berita->gambar != NULL) {
                    unlink('assets/img/berita/' . $berita->gambar);
                }
            }

            $query = $this->ModelBerita->update_data($data, $this->request->getPost('editId'));

            if (!$query) {
                return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal mengubah event');
            } else {
                return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil mengubah event');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal mengubah event');
        }
    }

    // Admin Prodi Event Delete
    public function delete_admin_prodi_event()
    {
        try {
            $hapusId = $this->request->getPost('hapusId');
            $query = $this->ModelBerita->delete_data($hapusId);

            if (!$query) {
                return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menghapus event');
            } else {
                return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil menghapus event');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menghapus event');
        }
    }
}
