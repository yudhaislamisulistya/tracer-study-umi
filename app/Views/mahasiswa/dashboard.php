<?= view('mahasiswa/layouts/header.php') ?>

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                <!--begin::Content-->
                <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class=" container ">
                            <!--begin::Row-->
                            <div class="row mt-0 mt-lg-8">
                                <div class="col-xl-12">
                                    <h3>Portal Mahasiswa Terintegrasi</h3>
                                    <!--begin::Card-->
                                    <div class="card card-custom gutter-b ">
                                        <!--begin::Card body-->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-4 d-flex flex-column mt-3 ">
                                                        <a href="<?= base_url('kkn') ?>">
                                                        <div class="flex-grow-1 bg-info p-8 rounded-xl flex-grow-1 bgi-no-repeat"
                                                            style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url(assets/media/svg/humans/custom-3.svg)">
                                                            <h4 class="btn btn-light-primary mt-2 font-weight-bolder">KKN</h4>
                                                            <p class="text-inverse-danger my-6">
                                                                Kuliah Kerja Nyata
                                                            </p>
                                                        </div>
                                                    </a>
                                                    </div>
                                                <!-- <div class="col-lg-4 d-flex flex-column mt-3">
                                                    <div class="flex-grow-1 bg-danger p-8 rounded-xl flex-grow-1 bgi-no-repeat"
                                                        style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url(assets/media/svg/humans/custom-5.svg)">
                                                        <h4 class="text-inverse-danger mt-2 font-weight-bolder"><a
                                                                class="text-white" href="">KHS</a></h4>
                                                        <p class="text-inverse-danger my-6">
                                                            Kartu Hasil Studi
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 d-flex flex-column mt-3">
                                                    <div class="flex-grow-1 bg-primary p-8 rounded-xl flex-grow-1 bgi-no-repeat"
                                                        style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url(assets/media/svg/humans/custom-4.svg)">
                                                        <h4 class="text-inverse-danger mt-2 font-weight-bolder"><a
                                                                class="text-white" href="">Tagihan Pembayaran</a></h4>
                                                        <p class="text-inverse-danger my-6">
                                                            Cek Tagihan Pembayaran
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 d-flex flex-column mt-3">
                                                    <div class="flex-grow-1 bg-success p-8 rounded-xl flex-grow-1 bgi-no-repeat"
                                                        style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url(assets/media/svg/humans/custom-6.svg)">
                                                        <h4 class="text-inverse-danger mt-2 font-weight-bolder"><a
                                                                class="text-white" href="">Wisuda</a></h4>
                                                        <p class="text-inverse-danger my-6">
                                                            Wisuda
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 d-flex flex-column mt-3">
                                                    <div class="flex-grow-1 bg-warning p-8 rounded-xl flex-grow-1 bgi-no-repeat"
                                                        style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url(assets/media/svg/humans/custom-1.svg)">
                                                        <h4 class="text-inverse-danger mt-2 font-weight-bolder"><a
                                                                class="text-white" href="">KRS</a></h4>
                                                        <p class="text-inverse-danger my-6">
                                                            Registrasi Kartu Rencana Studi
                                                        </p>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!--end:: Card body-->
                                    </div>
                                    <!--end:: Card-->
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->

<?= view('mahasiswa/layouts/footer.php') ?>