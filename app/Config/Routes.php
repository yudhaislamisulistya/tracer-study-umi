<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/pengguna-non-kesehatan', 'MainController::get_pengguna_non_kesehatan');
$routes->get('/pengguna-kesehatan', 'MainController::get_pengguna_kesehatan');
$routes->get('/pengguna', 'MainController::get_pengguna');
$routes->post('pengguna-non-kesehatan/store', 'MainController::post_pengguna_non_kesehatan');
$routes->post('pengguna-kesehatan/store', 'MainController::post_pengguna_kesehatan');
$routes->get('/', 'OtentikasiController::index');
$routes->post('/login/store', 'OtentikasiController::login_store');
$routes->post('/logout', 'OtentikasiController::logout', ['filter' => 'auth']);

$routes->get('/logout', 'OtentikasiController::logout_coba');
$routes->add('/get_alumni/(:any)/(:any)', 'OtentikasiController::get_alumni/$1/$2');
$routes->add('/get_activate_now/(:any)', 'OtentikasiController::get_activate_now/$1');
$routes->add('/get_password/(:any)', 'OtentikasiController::get_password/$1');
$routes->add('/get_regencies/(:any)', 'MainController::get_regencies/$1');
$routes->post('/post_activation', 'OtentikasiController::post_activation');

// Setelah Halaman Dashboard

$routes->get('/dashboard', 'MainController::index', ['filter' => 'auth']);
$routes->get('/biodata', 'MainController::biodata', ['filter' => 'auth']);

// Manajemen Data Biodata
$routes->post('/biodata/store', 'BiodataController::post_biodata', ['filter' => 'auth']);

// Manajemen Data Kuesioner
$routes->get('/kuesioner', 'KuesionerController::index', ['filter' => 'auth']);
$routes->post('/kuesioner/store', 'KuesionerController::post_kuesioner', ['filter' => 'auth']);
$routes->post('/kuesioner_2021/store', 'KuesionerController::post_kuesioner_2021', ['filter' => 'auth']);

// Manajemen Data Berita
$routes->get('/berita', 'BeritaController::index', ['filter' => 'auth']);
// Detail Data Berita
$routes->get('/berita/detail/(:any)', 'BeritaController::detail/$1', ['filter' => 'auth']);

// Manajamen Data Portal Alumni
$routes->get('/portal-alumni', 'PortalAlumniController::index', ['filter' => 'auth']);

// Manajamen Data Legalisir
$routes->get('/legalisir', 'LegalisirController::index', ['filter' => 'auth']);
$routes->post('/legalisir/store', 'LegalisirController::post_add_pengajuan', ['filter' => 'auth']);
$routes->get('/legalisir/pengajuan', 'LegalisirController::pengajuan', ['filter' => 'auth']);

// Manajemen Data Lowongan Kerja
$routes->get('/lowongan-kerja', 'LowonganKerjaController::index', ['filter' => 'auth']);

// Detail Lowongan Kerja
$routes->get('/lowongan-kerja/detail/(:any)', 'LowonganKerjaController::detail/$1', ['filter' => 'auth']);

// Ongkir
$routes->get("legalisir/raja_ongkir_cost/(:any)/(:any)/(:any)/(:any)", "LegalisirController::raja_ongkir_cost/$1/$2/$3/$4");

// Curiculum Vitae
$routes->get('/curiculum-vitae', 'CuriculumVitaeController::index', ['filter' => 'auth']);

// Get Token
$routes->get('/get_token', function () {
    // get token by session
    $token = session()->get('TOKEN');
    var_dump($token);
});


// Group Admin
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    // add name
    $routes->get('dashboard', 'MainController::admin_dashboard', ['as' => 'admin_dashboard']);
    $routes->get('statistik', 'MainController::admin_statistik', ['as' => 'admin_statistik']);
    $routes->group('alumni', function ($routes) {
        $routes->get('/', 'AlumniController::index', ['as' => 'admin_alumni']);
        // $routes->get('detail/(:any)', 'AlumniController::detail/$1', ['as' => 'admin_alumni_detail']);
        // $routes->get('edit/(:any)', 'AlumniController::edit/$1', ['as' => 'admin_alumni_edit']);
        // $routes->post('update', 'AlumniController::update', ['as' => 'admin_alumni_update']);
        // $routes->get('delete/(:any)', 'AlumniController::delete/$1', ['as' => 'admin_alumni_delete']);
    });
    // Akademik
    $routes->group('akademik', function ($routes) {
        $routes->group('program-studi', function ($routes) {
            $routes->get('/', 'ProgramStudiController::index', ['as' => 'admin_program_studi']);
            // $routes->get('detail/(:any)', 'ProgramStudiController::detail/$1', ['as' => 'admin_program_studi_detail']);
            // $routes->get('edit/(:any)', 'ProgramStudiController::edit/$1', ['as' => 'admin_program_studi_edit']);
            // $routes->post('update', 'ProgramStudiController::update', ['as' => 'admin_program_studi_update']);
            // $routes->get('delete/(:any)', 'ProgramStudiController::delete/$1', ['as' => 'admin_program_studi_delete']);
        });
        // Legalisir Dokumen
        $routes->group('legalisir-dokumen', function ($routes) {
            $routes->get('/', 'LegalisirController::admin_legalisir_dokumen', ['as' => 'admin_legalisir_dokumen']);
            // $routes->get('detail/(:any)', 'LegalisirController::detail/$1', ['as' => 'admin_legalisir_dokumen_detail']);
            // $routes->get('edit/(:any)', 'LegalisirController::edit/$1', ['as' => 'admin_legalisir_dokumen_edit']);
            // $routes->post('update', 'LegalisirController::update', ['as' => 'admin_legalisir_dokumen_update']);
            // $routes->get('delete/(:any)', 'LegalisirController::delete/$1', ['as' => 'admin_legalisir_dokumen_delete']);
        });
        // Registrasi Alumni
        $routes->group('registrasi-alumni', function ($routes) {
            $routes->get('/', 'RegistrasiController::index', ['as' => 'admin_registrasi']);
            // $routes->get('detail/(:any)', 'RegistrasiController::detail/$1', ['as' => 'admin_registrasi_detail']);
            // $routes->get('edit/(:any)', 'RegistrasiController::edit/$1', ['as' => 'admin_registrasi_edit']);
            // $routes->post('update', 'RegistrasiController::update', ['as' => 'admin_registrasi_update']);
            // $routes->get('delete/(:any)', 'RegistrasiController::delete/$1', ['as' => 'admin_registrasi_delete']);
        });
    });
    // Informasi Dan Berita
    $routes->group('informasi-dan-berita', function ($routes) {
        // Berita
        $routes->group('berita', function ($routes) {
            $routes->get('/', 'BeritaController::admin_berita', ['as' => 'admin_berita']);
            $routes->post('/', 'BeritaController::admin_berita_post', ['as' => 'admin_berita_alumni_post']);
            $routes->post('delete', 'BeritaController::delete_admin_berita', ['as' => 'admin_berita_alumni_delete']);
            $routes->post('update', 'BeritaController::update_admin_berita', ['as' => 'admin_berita_alumni_update']);
        });
        // Artikel
        $routes->group('artikel', function ($routes) {
            $routes->get('/', 'BeritaController::admin_artikel', ['as' => 'admin_artikel']);
            // $routes->get('detail/(:any)', 'BeritaController::detail/$1', ['as' => 'admin_artikel_detail']);
            // $routes->get('edit/(:any)', 'BeritaController::edit/$1', ['as' => 'admin_artikel_edit']);
            // $routes->post('update', 'BeritaController::update', ['as' => 'admin_artikel_update']);
            // $routes->get('delete/(:any)', 'BeritaController::delete/$1', ['as' => 'admin_artikel_delete']);
        });
        // Event
        $routes->group('event', function ($routes) {
            $routes->get('/', 'BeritaController::admin_event', ['as' => 'admin_event']);
            // $routes->get('detail/(:any)', 'BeritaController::detail/$1', ['as' => 'admin_event_detail']);
            // $routes->get('edit/(:any)', 'BeritaController::edit/$1', ['as' => 'admin_event_edit']);
            // $routes->post('update', 'BeritaController::update', ['as' => 'admin_event_update']);
            // $routes->get('delete/(:any)', 'BeritaController::delete/$1', ['as' => 'admin_event_delete']);
        });
    });
    // Manajemen Data
    $routes->group('manajemen-data', function ($routes) {
        // Status Pekerjaan
        $routes->group('status-pekerjaan', function ($routes) {
            $routes->get('/', 'StatusPekerjaanController::index', ['as' => 'admin_status_pekerjaan']);
        });
        // Pekerjaan
        $routes->group('pekerjaan', function ($routes) {
            $routes->get('/', 'PekerjaanController::index', ['as' => 'admin_pekerjaan']);
        });
        // Jenis Keluar
        $routes->group('jenis-keluar', function ($routes) {
            $routes->get('/', 'JenisKeluarController::index', ['as' => 'admin_jenis_keluar']);
            $routes->post('/', 'JenisKeluarController::post_jenis_keluar', ['as' => 'admin_jenis_keluar_alumni_post']);
            $routes->post('update', 'JenisKeluarController::update', ['as' => 'admin_jenis_keluar_alumni_update']);
            $routes->POST('delete', 'JenisKeluarController::delete', ['as' => 'admin_jenis_keluar_alumni_delete']);
        });
        // Negara
        $routes->group('negara', function ($routes) {
            $routes->get('/', 'NegaraController::index', ['as' => 'admin_negara']);
            // $routes->get('detail/(:any)', 'NegaraController::detail/$1', ['as' => 'admin_negara_detail']);
            // $routes->get('edit/(:any)', 'NegaraController::edit/$1', ['as' => 'admin_negara_edit']);
            // $routes->post('update', 'NegaraController::update', ['as' => 'admin_negara_update']);
            // $routes->get('delete/(:any)', 'NegaraController::delete/$1', ['as' => 'admin_negara_delete']);
        });
        // Provinsi
        $routes->group('provinsi', function ($routes) {
            $routes->get('/', 'ProvinsiController::index', ['as' => 'admin_provinsi']);
            // $routes->get('detail/(:any)', 'ProvinsiController::detail/$1', ['as' => 'admin_provinsi_detail']);
            // $routes->get('edit/(:any)', 'ProvinsiController::edit/$1', ['as' => 'admin_provinsi_edit']);
            // $routes->post('update', 'ProvinsiController::update', ['as' => 'admin_provinsi_update']);
            // $routes->get('delete/(:any)', 'ProvinsiController::delete/$1', ['as' => 'admin_provinsi_delete']);
        });
        // Kabupaten Kota
        $routes->group('kabupaten-kota', function ($routes) {
            $routes->get('/', 'KabupatenKotaController::index', ['as' => 'admin_kabupaten_kota']);
            // $routes->get('detail/(:any)', 'KabupatenKotaController::detail/$1', ['as' => 'admin_kabupaten_kota_detail']);
            // $routes->get('edit/(:any)', 'KabupatenKotaController::edit/$1', ['as' => 'admin_kabupaten_kota_edit']);
            // $routes->post('update', 'KabupatenKotaController::update', ['as' => 'admin_kabupaten_kota_update']);
            // $routes->get('delete/(:any)', 'KabupatenKotaController::delete/$1', ['as' => 'admin_kabupaten_kota_delete']);
        });
        // Biodata
        $routes->group('biodata', function ($routes) {
            $routes->get('/', 'BiodataController::admin_biodata', ['as' => 'admin_biodata']);
            $routes->post('/', 'BiodataController::import_biodata', ['as' => 'admin_import_biodata']);
            $routes->post('update', 'BiodataController::update', ['as' => 'admin_biodata_update']);
            $routes->POST('delete', 'BiodataController::delete', ['as' => 'admin_biodata_delete']);
        });
    });
    // Karir dan Pekerjaan
    $routes->group('karir-dan-pekerjaan', function ($routes) {
        // Lowongan Kerja
        $routes->group('lowongan-kerja', function ($routes) {
            $routes->get('/', 'LowonganKerjaController::admin_lowongan_kerja', ['as' => 'admin_lowongan_kerja']);
            $routes->post('/', 'LowonganKerjaController::admin_lowongan_kerja_post', ['as' => 'admin_lowongan_kerja_post']);
            $routes->post('delete', 'LowonganKerjaController::delete', ['as' => 'admin_lowongan_kerja_delete']);
            $routes->post('update', 'LowonganKerjaController::update', ['as' => 'admin_lowongan_kerja_update']);
        });
        // Pekerjaan Alumni
        $routes->group('pekerjaan-alumni', function ($routes) {
            $routes->get('/', 'PekerjaanController::index2', ['as' => 'admin_pekerjaan_alumni']);
            $routes->post('/', 'PekerjaanController::post_pekerjaan', ['as' => 'admin_pekerjaan_alumni_post']);
            $routes->post('update', 'PekerjaanController::update', ['as' => 'admin_pekerjaan_alumni_update']);
            $routes->POST('delete', 'PekerjaanController::delete', ['as' => 'admin_pekerjaan_alumni_delete']);
        });
        // Status Pekerjaan
        $routes->group('status-pekerjaan', function ($routes) {
            $routes->get('/', 'StatusPekerjaanController::index2', ['as' => 'admin_status_pekerjaan_alumni']);
            $routes->post('/', 'StatusPekerjaanController::post_status_pekerjaan', ['as' => 'admin_status_pekerjaan_alumni_post']);
            $routes->post('update', 'StatusPekerjaanController::update', ['as' => 'admin_status_pekerjaan_alumni_update']);
            $routes->POST('delete', 'StatusPekerjaanController::delete', ['as' => 'admin_status_pekerjaan_alumni_delete']);
        });
        // Daftar Perusahaan Alumni
        $routes->group('perusahaan-alumni', function ($routes) {
            $routes->get('/', 'AlumniController::admin_perusahaan_alumni', ['as' => 'admin_perusahaan_alumni']);
            // $routes->get('detail/(:any)', 'AlumniController::detail/$1', ['as' => 'admin_daftar_perusahaan_alumni_detail']);
            // $routes->get('edit/(:any)', 'AlumniController::edit/$1', ['as' => 'admin_daftar_perusahaan_alumni_edit']);
            // $routes->post('update', 'AlumniController::update', ['as' => 'admin_daftar_perusahaan_alumni_update']);
            // $routes->get('delete/(:any)', 'AlumniController::delete/$1', ['as' => 'admin_daftar_perusahaan_alumni_delete']);
        });
    });

    // Kuesioner
    $routes->group('kuesioner', function ($routes) {
        $routes->group('universitas-umum', function ($routes) {
            $routes->get('/', 'KuesionerController::admin_kuesioner_universitas_umum_download', ['as' => 'admin_kuesioner_universitas_umum_download']);
        });
    });
});

// Grpup API
$routes->group('api-v2', function ($routes) {
    $routes->group('alumni', function ($routes) {
        $routes->get('/', 'AlumniController::get_alumni_json');
        $routes->post('/', 'AlumniController::get_alumni_json');
    });
    $routes->group('program-studi', function ($routes) {
        $routes->get('/', 'ProgramStudiController::get_program_studi_json');
        $routes->post('/', 'ProgramStudiController::get_program_studi_json');
    });
    // Biodata API
    $routes->group('biodata', function ($routes) {
        $routes->get('/', 'BiodataController::get_biodata_json');
        $routes->post('/', 'BiodataController::get_biodata_json');
    });
    // Registrasi Alumni API
    $routes->group('registrasi-alumni', function ($routes) {
        $routes->get('/', 'RegistrasiController::get_registrasi_json');
        $routes->post('/', 'RegistrasiController::get_registrasi_json');
    });
});





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
