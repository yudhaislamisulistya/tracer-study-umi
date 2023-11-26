<?=

view('layouts/header');

?>

<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <div class=" container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
                        <div class="alert-icon"><i class="flaticon-information"></i></div>
                        <div class="alert-text">Anda masuk sebagai <b>Admnistrator</b>. Silahkan pilih menu yang tersedia.</div>
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?=

view('layouts/footer');

?>