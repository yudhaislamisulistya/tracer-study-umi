<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBiodata;
use App\Models\ModelOtentikasi;
use CodeIgniter\Session\Session;
use DateTime;

class OtentikasiController extends BaseController
{
    public $ModelOtentikasi;
    public $ModelBiodata;

    public function __construct()
    {
        $this->ModelOtentikasi = new ModelOtentikasi();
        $this->ModelBiodata = new ModelBiodata();
    }
    public function index()
    {
        if (Session()->get('logged_in')) {
            return redirect()->to(base_url('dashboard'));
        } else {
            return view('login');
        }
    }

    public function login_store()
    {
        $nim = $this->request->getPost('nim');
        $password = $this->request->getPost('password');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => getenv('app.endpointGateway') . 'login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "password": "' . $password . '",
                "username": "' . $nim . '"
            }',
            CURLOPT_HTTPHEADER => array(
                'accept: application/json',
                'operator: web',
                'appversion: 1',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($httpcode == 200) {
            $data = json_decode($response);

            if ($data->response->username == "superadmin-ts") {
                $data = [
                    "ID_PROFIL" => $data->response->id_profil,
                    'C_NPM'       => $nim,
                    'PASSWORD'     => $password,
                    'U_DATE'     => DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')),
                    'STATUS'     => 'admin',
                    "TOKEN" => $data->response->access_token,
                    'logged_in'     => TRUE
                ];
                session()->set($data);
                return redirect()->to(base_url('admin/dashboard'));
            } else if ($data->response->username == "admin-ts" || strpos($data->response->username, "stpmp") !== false) {
                $dataResponse = json_decode($response);
                $data = [
                    "ID_PROFIL" => $dataResponse->response->id_profil,
                    'C_NPM'       => $nim,
                    'PASSWORD'     => $password,
                    'U_DATE'     => DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')),
                    'STATUS'     => 'admin-prodi',
                    "TOKEN" => $dataResponse->response->access_token,
                    'logged_in'     => TRUE
                ];
                $biodataController = new BiodataController();
                $dataUserCurrent = $biodataController->get_current_user_admin_or_prodi($dataResponse->response->access_token);
                $data['ID_PRODI'] = $dataUserCurrent["response"]["id_unit_univ"];
                $data['C_EMAIL'] = $dataUserCurrent["response"]["personal"]["email"];
                $data["C_NAMA"] = $dataUserCurrent["response"]["personal"]["nama"];
                $data["C_KODE_PRODI"] = $dataUserCurrent["response"]["id_unit_univ"];
                session()->set($data);
                return redirect()->to(base_url('admin-prodi/dashboard'));
            } else {
                $data = [
                    "ID_PROFIL" => $data->response->id_profil,
                    'C_NPM'       => $nim,
                    'PASSWORD'     => $password,
                    'U_DATE'     => DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')),
                    'STATUS'     => 'alumni',
                    "TOKEN" => $data->response->access_token,
                    'logged_in'     => TRUE
                ];
                session()->set($data);
                $check = $this->ModelBiodata->check_data($nim);
                $biodata = new BiodataController();
                $dataUserCurrent = $biodata->get_current_user();



                if ($dataUserCurrent["response"] === null) {
                    return redirect()->to(base_url('/logout-v2'));
                }

                $data['id_prodi'] = $dataUserCurrent["response"]["id_prodi"];
                session()->set($data);

                $nama_lengkap = $dataUserCurrent["response"]["nama"];
                $jenis_kelamin = $dataUserCurrent["response"]["personal"]["jns_kelamin"];
                if ($jenis_kelamin == "Laki-laki") {
                    $jenis_kelamin = "L";
                } else {
                    $jenis_kelamin = "P";
                }
                $tempat_lahir = $dataUserCurrent["response"]["personal"]["tempat_lahir"];
                $tanggal_lahir = $dataUserCurrent["response"]["personal"]["tgl_lahir"];
                $program_studi = $dataUserCurrent["response"]["nm_prodi"];
                $kode_prodi = $dataUserCurrent["response"]["id_prodi"];

                if (!$check) {
                    $this->ModelBiodata->insert_data_default($kode_prodi, $nim, $nama_lengkap, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $program_studi);
                }
                return redirect()->to(base_url('dashboard'));
            }
        } else {
            session()->setFlashdata('status', 'NIM atau Password Salah');
            return redirect()->to(base_url('/'));
        }



        // if ($this->ModelOtentikasi->validation_login($nim, $password)) {
        //     if(session()->get('STATUS') == "admin"){
        //         return redirect()->to(base_url('admin/dashboard'));
        //     }else{
        //         return redirect()->to(base_url('dashboard'));
        //     }
        // }else{
        //     return redirect()->to(base_url('/'));
        // }
    }

    public function logout()
    {
        Session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function get_alumni($nim, $nama)
    {
        return $this->response->setJSON($this->ModelOtentikasi->check_user($nim, $nama));
    }

    public function post_activation()
    {
        $nama = $this->request->getPost('nama');
        $nim = $this->request->getPost('nim');
        $emailTo = $this->request->getPost('email');
        $nohp = $this->request->getPost('nohp');
        $activation_code = random_string('alnum', 100);
        $message = '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="font-family:arial, "helvetica neue", helvetica, sans-serif">
                        <head> 
                        <meta charset="UTF-8"> 
                        <meta content="width=device-width, initial-scale=1" name="viewport"> 
                        <meta name="x-apple-disable-message-reformatting"> 
                        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
                        <meta content="telephone=no" name="format-detection"> 
                        <title>New message</title> 
                        <!--[if (mso 16)]>
                        <style type="text/css">
                        a {text-decoration: none;}
                        </style>
                        <![endif]--> 
                        <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> 
                        <!--[if gte mso 9]>
                    <xml>
                        <o:OfficeDocumentSettings>
                        <o:AllowPNG></o:AllowPNG>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                        </o:OfficeDocumentSettings>
                    </xml>
                    <![endif]--> 
                        <style type="text/css">
                    #outlook a {
                        padding:0;
                    }
                    .es-button {
                        mso-style-priority:100!important;
                        text-decoration:none!important;
                    }
                    a[x-apple-data-detectors] {
                        color:inherit!important;
                        text-decoration:none!important;
                        font-size:inherit!important;
                        font-family:inherit!important;
                        font-weight:inherit!important;
                        line-height:inherit!important;
                    }
                    .es-desk-hidden {
                        display:none;
                        float:left;
                        overflow:hidden;
                        width:0;
                        max-height:0;
                        line-height:0;
                        mso-hide:all;
                    }
                    [data-ogsb] .es-button {
                        border-width:0!important;
                        padding:10px 30px 10px 30px!important;
                    }
                    @media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% } h1 { font-size:36px!important; text-align:center } h2 { font-size:26px!important; text-align:center } h3 { font-size:20px!important; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:36px!important } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:20px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0!important } .es-m-p0r { padding-right:0!important } .es-m-p0l { padding-left:0!important } .es-m-p0t { padding-top:0!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-m-p5 { padding:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5b { padding-bottom:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p10 { padding:10px!important } .es-m-p10t { padding-top:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10l { padding-left:10px!important } .es-m-p15 { padding:15px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15b { padding-bottom:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p20 { padding:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p25 { padding:25px!important } .es-m-p25t { padding-top:25px!important } .es-m-p25b { padding-bottom:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p25l { padding-left:25px!important } .es-m-p30 { padding:30px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p30r { padding-right:30px!important } .es-m-p30l { padding-left:30px!important } .es-m-p35 { padding:35px!important } .es-m-p35t { padding-top:35px!important } .es-m-p35b { padding-bottom:35px!important } .es-m-p35r { padding-right:35px!important } .es-m-p35l { padding-left:35px!important } .es-m-p40 { padding:40px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:40px!important } .es-m-p40l { padding-left:40px!important } }
                    </style> 
                        </head> 
                        <body style="width:100%;font-family:arial, "helvetica neue", helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0"> 
                        <div class="es-wrapper-color" style="background-color:#FAFAFA"> 
                        <!--[if gte mso 9]>
                                <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                                    <v:fill type="tile" color="#fafafa"></v:fill>
                                </v:background>
                            <![endif]--> 
                        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FAFAFA"> 
                            <tr> 
                            <td valign="top" style="padding:0;Margin:0"> 
                            <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
                                <tr> 
                                <td class="es-info-area" align="center" style="padding:0;Margin:0"> 
                                <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" bgcolor="#FFFFFF"> 
                                    <tr> 
                                    <td align="left" style="padding:20px;Margin:0"> 
                                    <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                        <tr> 
                                        <td align="center" valign="top" style="padding:0;Margin:0;width:560px"> 
                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                            <tr> 
                                            <td align="center" class="es-infoblock" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:14px;color:#CCCCCC;font-size:12px"><a target="_blank" href="" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px">View online version</a></p></td> 
                                            </tr> 
                                        </table></td> 
                                        </tr> 
                                    </table></td> 
                                    </tr> 
                                </table></td> 
                                </tr> 
                            </table> 
                            <table cellpadding="0" cellspacing="0" class="es-header" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top"> 
                                <tr> 
                                <td align="center" style="padding:0;Margin:0"> 
                                <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"> 
                                    <tr> 
                                    <td align="left" style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px"> 
                                    <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                        <tr> 
                                        <td class="es-m-p0r" valign="top" align="center" style="padding:0;Margin:0;width:560px"> 
                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                            <tr> 
                                            <td align="center" style="padding:0;Margin:0;padding-bottom:20px;font-size:0px"><img src="https://uerrvf.stripocdn.email/content/guids/CABINET_3fcc03090962537a47b974230f7a1d79/images/group_44_nfS.png" alt="Logo" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;font-size:12px" width="80" title="Logo"></td> 
                                            </tr> 
                                        </table></td> 
                                        </tr> 
                                    </table></td> 
                                    </tr> 
                                </table></td> 
                                </tr> 
                            </table> 
                            <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
                                <tr> 
                                <td align="center" style="padding:0;Margin:0"> 
                                <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px"> 
                                    <tr> 
                                    <td align="left" style="Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px"> 
                                    <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                        <tr> 
                                        <td align="center" valign="top" style="padding:0;Margin:0;width:560px"> 
                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                            <tr> 
                                            <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px;font-size:0px"><img src="https://uerrvf.stripocdn.email/content/guids/CABINET_67e080d830d87c17802bd9b4fe1c0912/images/55191618237638326.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="100"></td> 
                                            </tr> 
                                            <tr> 
                                            <td align="center" style="padding:0;Margin:0;padding-bottom:10px"><h1 style="Margin:0;line-height:46px;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:46px;font-style:normal;font-weight:bold;color:#333333">Aktivasi Akun Alumni Anda Sekarang!</h1></td> 
                                            </tr> 
                                            <tr> 
                                            <td align="center" class="es-m-p0r es-m-p0l" style="Margin:0;padding-top:5px;padding-bottom:5px;padding-left:40px;padding-right:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">Anda menerima pesan ini karena alamat email Anda telah terdaftar di situs kami. Silakan klik tombol di bawah ini untuk memverifikasi akun alumni anda Anda dan mengonfirmasi bahwa Anda adalah pemilik akun ini.</p></td> 
                                            </tr> 
                                            <tr> 
                                            <td align="center" style="padding:0;Margin:0;padding-bottom:5px;padding-top:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">Jika Anda tidak mendaftar dengan kami, harap abaikan email ini.</p></td> 
                                            </tr> 
                                            <tr> 
                                            <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><span class="es-button-border" style="border-style:solid;border-color:#2CB543;background:#5C68E2;border-width:0px;display:inline-block;border-radius:20px;width:auto"><a href="' . base_url('/get_activate_now') . '/' . $activation_code . '" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:20px;border-style:solid;border-color:#5C68E2;border-width:10px 30px 10px 30px;display:inline-block;background:#5C68E2;border-radius:6px;font-family:arial, "helvetica neue", helvetica, sans-serif;font-weight:normal;font-style:normal;line-height:24px;width:auto;text-align:center;border-left-width:30px;border-right-width:30px; color: white">Aktivasi Akun</a></span></td> 
                                            </tr> 
                                            <tr> 
                                            <td align="center" class="es-m-p0r es-m-p0l" style="Margin:0;padding-top:5px;padding-bottom:5px;padding-left:40px;padding-right:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">Setelah Konfirmasi Akun. Akun Anda Akan Segera Aktif!</p></td> 
                                            </tr> 
                                        </table></td> 
                                        </tr> 
                                    </table></td> 
                                    </tr> 
                                </table></td> 
                                </tr> 
                            </table> 
                            <table cellpadding="0" cellspacing="0" class="es-footer" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top"> 
                                <tr> 
                                <td align="center" style="padding:0;Margin:0"> 
                                <table class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:640px"> 
                                    <tr> 
                                    <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px"> 
                                    <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                        <tr> 
                                        <td align="left" style="padding:0;Margin:0;width:600px"> 
                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                            <tr> 
                                            <td align="center" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px;font-size:0"> 
                                            <table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                                <tr> 
                                                <td align="center" valign="top" style="padding:0;Margin:0;padding-right:40px"><a target="_blank" href="https://www.facebook.com/umi.makassar.75" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Facebook" src="https://uerrvf.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png" alt="Fb" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
                                                <td align="center" valign="top" style="padding:0;Margin:0;padding-right:40px"><a target="_blank" href="https://twitter.com/umiacid" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Twitter" src="https://uerrvf.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png" alt="Tw" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
                                                <td align="center" valign="top" style="padding:0;Margin:0;padding-right:40px"><a target="_blank" href="https://www.instagram.com/umi.ac.id/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Instagram" src="https://uerrvf.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png" alt="Inst" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
                                                <td align="center" valign="top" style="padding:0;Margin:0"><a target="_blank" href="https://www.youtube.com/channel/UCwK8mjH_7YHXj1Y_I4GF1eQ" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Youtube" src="https://uerrvf.stripocdn.email/content/assets/img/social-icons/logo-black/youtube-logo-black.png" alt="Yt" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
                                                </tr> 
                                            </table></td> 
                                            </tr> 
                                            <tr> 
                                            <td align="center" style="padding:0;Margin:0;padding-bottom:35px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:18px;color:#333333;font-size:12px">Tracer Study&nbsp;© 2021, Inc. All Rights Reserved.</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:18px;color:#333333;font-size:12px"><strong><span>Rektorat Universitas Muslim Indonesia<br>Jl. Urip Sumoharjo No.km.5, Panaikang,<br>Kec. Panakkukang Kota Makassar,<br>Sulawesi Selatan 90231</span></strong></p></td> 
                                            </tr> 
                                        </table></td> 
                                        </tr> 
                                    </table></td> 
                                    </tr> 
                                </table></td> 
                                </tr> 
                            </table> 
                            <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
                                <tr> 
                                <td class="es-info-area" align="center" style="padding:0;Margin:0"> 
                                <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" bgcolor="#FFFFFF"> 
                                    <tr> 
                                    <td align="left" style="padding:20px;Margin:0"> 
                                    <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                        <tr> 
                                        <td align="center" valign="top" style="padding:0;Margin:0;width:560px"> 
                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                            <tr> 
                                            <td align="center" class="es-infoblock" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:14px;color:#CCCCCC;font-size:12px"><a target="_blank" href="" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px"></a>No longer want to receive these emails?&nbsp;<a href="" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px">Unsubscribe</a>.<a target="_blank" href="" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px"></a></p></td> 
                                            </tr> 
                                        </table></td> 
                                        </tr> 
                                    </table></td> 
                                    </tr> 
                                </table></td> 
                                </tr> 
                            </table></td> 
                            </tr> 
                        </table> 
                        </div>  
                        </body>
                    </html>';
        $status = $this->response->setJSON($this->ModelOtentikasi->send_link_activation($nama, $nim, $emailTo, $nohp, $activation_code));
        if ($status == 1) {
            $email = \Config\Services::email();
            $email->setTo($emailTo);
            $email->setFrom('portal.alumni@umi.ac.id', 'UMI - Tracer Study');
            $email->setSubject('Link Aktivasi Akun Alumni UMI');
            $email->setMessage($message);
            $email->send();
            $results = [
                "status" => 200,
                "pesan" => "Kode Akivasi Berhasil Terkirim",
            ];
        } else {
            $results = $status;
        }
        return $this->response->setJSON($results);
    }

    // Konfirmasi Akun Dengan Activation Code
    public function get_activate_now($activation_code)
    {
        $status = $this->ModelOtentikasi->verification_account($activation_code);
        if ($status == 1) {
            $data['statusCode'] = 200;
            $data['activationCode'] = $activation_code;
            return view('aktivasi_akun', $data);
        } else {
            $data['statusCode'] = 403;
            return view('aktivasi_akun', $data);
        }
    }

    // Mengirimkan Password Ke Akun Alumni
    public function get_password($activation_code)
    {
        $password = "UMI-" . random_string('alnum', 5);
        if ($this->ModelOtentikasi->set_password($activation_code, $password) == 1) {
            $message = '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="font-family:arial, "helvetica neue", helvetica, sans-serif">
                            <head> 
                            <meta charset="UTF-8"> 
                            <meta content="width=device-width, initial-scale=1" name="viewport"> 
                            <meta name="x-apple-disable-message-reformatting"> 
                            <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
                            <meta content="telephone=no" name="format-detection"> 
                            <title>New message</title> 
                            <style type="text/css">
                        #outlook a {
                            padding:0;
                        }
                        .es-button {
                            mso-style-priority:100!important;
                            text-decoration:none!important;
                        }
                        a[x-apple-data-detectors] {
                            color:inherit!important;
                            text-decoration:none!important;
                            font-size:inherit!important;
                            font-family:inherit!important;
                            font-weight:inherit!important;
                            line-height:inherit!important;
                        }
                        .es-desk-hidden {
                            display:none;
                            float:left;
                            overflow:hidden;
                            width:0;
                            max-height:0;
                            line-height:0;
                            mso-hide:all;
                        }
                        [data-ogsb] .es-button {
                            border-width:0!important;
                            padding:10px 30px 10px 30px!important;
                        }
                        @media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% } h1 { font-size:36px!important; text-align:center } h2 { font-size:26px!important; text-align:center } h3 { font-size:20px!important; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:36px!important } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:20px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0!important } .es-m-p0r { padding-right:0!important } .es-m-p0l { padding-left:0!important } .es-m-p0t { padding-top:0!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-m-p5 { padding:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5b { padding-bottom:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p10 { padding:10px!important } .es-m-p10t { padding-top:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10l { padding-left:10px!important } .es-m-p15 { padding:15px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15b { padding-bottom:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p20 { padding:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p25 { padding:25px!important } .es-m-p25t { padding-top:25px!important } .es-m-p25b { padding-bottom:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p25l { padding-left:25px!important } .es-m-p30 { padding:30px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p30r { padding-right:30px!important } .es-m-p30l { padding-left:30px!important } .es-m-p35 { padding:35px!important } .es-m-p35t { padding-top:35px!important } .es-m-p35b { padding-bottom:35px!important } .es-m-p35r { padding-right:35px!important } .es-m-p35l { padding-left:35px!important } .es-m-p40 { padding:40px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:40px!important } .es-m-p40l { padding-left:40px!important } }
                        </style> 
                            </head> 
                            <body style="width:100%;font-family:arial, "helvetica neue", helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0"> 
                            <div class="es-wrapper-color" style="background-color:#FAFAFA"> 
                            <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FAFAFA"> 
                                <tr> 
                                <td valign="top" style="padding:0;Margin:0"> 
                                <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
                                    <tr> 
                                    <td class="es-info-area" align="center" style="padding:0;Margin:0"> 
                                    <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" bgcolor="#FFFFFF"> 
                                        <tr> 
                                        <td align="left" style="padding:20px;Margin:0"> 
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                            <tr> 
                                            <td align="center" valign="top" style="padding:0;Margin:0;width:560px"> 
                                            <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                            </table></td> 
                                            </tr> 
                                        </table></td> 
                                        </tr> 
                                    </table></td> 
                                    </tr> 
                                </table> 
                                <table cellpadding="0" cellspacing="0" class="es-header" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top"> 
                                    <tr> 
                                    <td align="center" style="padding:0;Margin:0"> 
                                    <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"> 
                                        <tr> 
                                        <td align="left" style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px"> 
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                            <tr> 
                                            <td class="es-m-p0r" valign="top" align="center" style="padding:0;Margin:0;width:560px"> 
                                            <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                                <tr> 
                                                <td align="center" style="padding:0;Margin:0;padding-bottom:20px;font-size:0px"><img src="https://uerrvf.stripocdn.email/content/guids/CABINET_3fcc03090962537a47b974230f7a1d79/images/group_44_nfS.png" alt="Logo" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;font-size:12px" width="80" title="Logo"></td> 
                                                </tr> 
                                            </table></td> 
                                            </tr> 
                                        </table></td> 
                                        </tr> 
                                    </table></td> 
                                    </tr> 
                                </table> 
                                <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
                                    <tr> 
                                    <td align="center" style="padding:0;Margin:0"> 
                                    <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px"> 
                                        <tr> 
                                        <td align="left" style="Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px"> 
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                            <tr> 
                                            <td align="center" valign="top" style="padding:0;Margin:0;width:560px"> 
                                            <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                                <tr> 
                                                <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px;font-size:0px"><img src="https://uerrvf.stripocdn.email/content/guids/CABINET_67e080d830d87c17802bd9b4fe1c0912/images/55191618237638326.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="100"></td> 
                                                </tr> 
                                                <tr> 
                                                <td align="center" style="padding:0;Margin:0;padding-bottom:10px"><h1 style="Margin:0;line-height:46px;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:46px;font-style:normal;font-weight:bold;color:#333333">Terimkasih Kasih Telah Mengaktifkan Akun Alumni Anda!</h1></td> 
                                                </tr> 
                                                <tr> 
                                                <tr> 
                                                <td align="center" style="padding:0;Margin:0;padding-bottom:5px;padding-top:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">Jika Anda tidak mendaftar dengan kami, harap abaikan email ini.</p></td> 
                                                </tr> 
                                                <tr> 
                                                <td align="center" style="padding:0;Margin:0;padding-bottom:10px"><h4 style="Margin:0;line-height:46px;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:bold;color:#333333">Password Anda Adalah : ' . $password . '</h4></td> 
                                                </tr> 
                                            </table></td> 
                                            </tr> 
                                        </table></td> 
                                        </tr> 
                                    </table></td> 
                                    </tr> 
                                </table> 
                                <table cellpadding="0" cellspacing="0" class="es-footer" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top"> 
                                    <tr> 
                                    <td align="center" style="padding:0;Margin:0"> 
                                    <table class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:640px"> 
                                        <tr> 
                                        <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px"> 
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                            <tr> 
                                            <td align="left" style="padding:0;Margin:0;width:600px"> 
                                            <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                                <tr> 
                                                <td align="center" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px;font-size:0"> 
                                                <table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                                    <tr> 
                                                    <td align="center" valign="top" style="padding:0;Margin:0;padding-right:40px"><a target="_blank" href="https://www.facebook.com/umi.makassar.75" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Facebook" src="https://uerrvf.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png" alt="Fb" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
                                                    <td align="center" valign="top" style="padding:0;Margin:0;padding-right:40px"><a target="_blank" href="https://twitter.com/umiacid" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Twitter" src="https://uerrvf.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png" alt="Tw" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
                                                    <td align="center" valign="top" style="padding:0;Margin:0;padding-right:40px"><a target="_blank" href="https://www.instagram.com/umi.ac.id/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Instagram" src="https://uerrvf.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png" alt="Inst" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
                                                    <td align="center" valign="top" style="padding:0;Margin:0"><a target="_blank" href="https://www.youtube.com/channel/UCwK8mjH_7YHXj1Y_I4GF1eQ" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px"><img title="Youtube" src="https://uerrvf.stripocdn.email/content/assets/img/social-icons/logo-black/youtube-logo-black.png" alt="Yt" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td> 
                                                    </tr> 
                                                </table></td> 
                                                </tr> 
                                                <tr> 
                                                <td align="center" style="padding:0;Margin:0;padding-bottom:35px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:18px;color:#333333;font-size:12px">Tracer Study&nbsp;© 2021, Inc. All Rights Reserved.</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:18px;color:#333333;font-size:12px"><strong><span>Rektorat Universitas Muslim Indonesia<br>Jl. Urip Sumoharjo No.km.5, Panaikang,<br>Kec. Panakkukang Kota Makassar,<br>Sulawesi Selatan 90231</span></strong></p></td> 
                                                </tr> 
                                            </table></td> 
                                            </tr> 
                                        </table></td> 
                                        </tr> 
                                    </table></td> 
                                    </tr> 
                                </table> 
                                <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
                                    <tr> 
                                    <td class="es-info-area" align="center" style="padding:0;Margin:0"> 
                                    <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" bgcolor="#FFFFFF"> 
                                        <tr> 
                                        <td align="left" style="padding:20px;Margin:0"> 
                                        <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                            <tr> 
                                            <td align="center" valign="top" style="padding:0;Margin:0;width:560px"> 
                                            <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
                                                <tr> 
                                                <td align="center" class="es-infoblock" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, "helvetica neue", helvetica, sans-serif;line-height:14px;color:#CCCCCC;font-size:12px"><a target="_blank" href="" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px"></a>No longer want to receive these emails?&nbsp;<a href="" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px">Unsubscribe</a>.<a target="_blank" href="" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px"></a></p></td> 
                                                </tr> 
                                            </table></td> 
                                            </tr> 
                                        </table></td> 
                                        </tr> 
                                    </table></td> 
                                    </tr> 
                                </table></td> 
                                </tr> 
                            </table> 
                            </div>  
                            </body>
                        </html>';
            $email = \Config\Services::email();
            $email->setTo(get_email_with_activation_code($activation_code)->email);
            $email->setFrom('portal.alumni@umi.ac.id', 'UMI - Tracer Study');
            $email->setSubject('Password Akun Alumni Anda');
            $email->setMessage($message);
            $email->send();
            return redirect()->to(base_url('/'));
        }
    }

    function logout_coba()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function logout_v2()
    {
        session()->destroy();
        return redirect()->to(base_url('/?status=Data%20Belum%20Tersedia'));
    }
}
