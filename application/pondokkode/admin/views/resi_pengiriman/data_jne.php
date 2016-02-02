
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data JNE
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="row">
                        <label class="col-sm-3 control-label col-lg-3" ></label>
                        <div class="col-lg-6">
                        <div class="panel-body">
                            <?php print form_open("admin/resi_pengiriman/search_jne"); ?>
                           <div class="input-group m-bot15">
                               <span class="input-group-btn">
                                   <a class="btn btn-primary" href="<?php echo base_url() ?>admin/resi-pengiriman/tambah">Tambah</a>
                                </span>
                               <input type="text" autocomplete="off" name="cari_jne" placeholder="Cari Berdasarkan Nama" class="form-control" >
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </span>
                           </div>
                        </div>
                        </div>
                        </div>
                    <div class="panel-body">
                    <?php print $data_jne; ?>
                    <?php print $paging; ?>
                    </div>
                </section>
            </div>
        </div>
