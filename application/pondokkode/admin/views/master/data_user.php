
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data User
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <?php print $this->session->flashdata("pesan_notif"); ?>
                    <div class="row">
                        <label class="col-sm-3 control-label col-lg-3" ></label>
                        <div class="col-lg-6">
                        <div class="panel-body">
                            <?php print form_open("admin/master/user/search"); ?>
                           <div class="input-group m-bot15">
                               <span class="input-group-btn">
                                   <a class="btn btn-primary" href="<?php echo base_url() ?>admin/master/user/tambah">Tambah</a>
                                </span>
                               <input type="text" autocomplete="off" name="data_user" placeholder="Cari Berdasarkan Username" class="form-control" >
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </span>
                           </div>
                        </div>
                        </div>
                        </div>
                    <div class="panel-body">
                    <?php print $data_user; ?>
                    <?php print $paging; ?>
                    </div>
                </section>
            </div>
        </div>
