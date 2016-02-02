<div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Data Sistem
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <?php print $this->session->flashdata("pesan_notif"); ?>
                <div class="panel-body">
                <form method="POST" action="<?php print base_url() ?>admin/pengaturan/sistem/simpan" id="form_umum" class="form-horizontal form-bordered">
                <?php print $data_sistem; ?>
                <br/>
                <div class="form-group">
                    <div class="col-lg-offset- col-lg-6">
                        <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <button class="btn btn-warning" type="reset"><i class="fa fa-repeat"></i> Reset</button>
                        <button class="btn btn-danger" value="cancel"  onclick="goBack()" type="button"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                    </div>
                </div>
                </form>
                </div>
            </section>
        </div>
    </div>
