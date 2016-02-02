<div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        FORM INPUT RESI
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                      <?php print $this->session->flashdata("pesan_notif"); ?>
                        <div class="form">
                     <?php $attributes= array('class' => 'cmxform form-horizontal'); ?>
                     <?php echo form_open_multipart("admin/resi_pengiriman/simpan", $attributes); ?>
                                <div class="form-group">
                                    <label for="nama" class="control-label col-md-2">Nama Pelanggan<span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="nama" autofocus name="nama" type="text" placeholder="Nama Pelanggan" autocomplete="off" value="<?php print $nama ?>" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="kategori">Kategori Pengiriman<span class="required">*</span></label>
                                    <div class="col-lg-5">
                                        <select class="form-control" name="kategori" id="kategori" required>
                                        <option value="" selected="selected">- - Pilih Kategori Pengiriman - -</option>
                                        <option value="JNE">Pengiriman JNE</option>
                                        <option value="POS">Pengiriman POS</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_resi" class="control-label col-md-2">No Resi<span class="required">*</span></label>
                                    <div class="col-lg-10">
                                        <input class="form-control" id="no_resi" autofocus name="no_resi" type="text" placeholder="No Resi" autocomplete="off" value="<?php print $no_resi ?>" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                     <label for="alamat" class="control-label col-md-2">Alamat  Pelanggan<span class="required">*</span></label>
                                     <div class="col-lg-10">
                                          <textarea class="wysihtml5 form-control" name="alamat" value="<?php print $alamat ?>" id="alamat" required rows="9" required><?php print $alamat  ?></textarea>
                                     </div>
                                </div>

                                <div class="form-group">
                                  <label for="alamat" class="control-label col-md-2"></label>
                                  <div class="col-lg-10">
                                  <span class="required">*</span>)  Harus Diisi
                                  </div>
                                </div>

                                <input type="hidden" name="tipe" value="<?php print $tipe; ?>" />
                                <input type="hidden" name="id_resi" value="<?php print $id_resi; ?>" />
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-6">
                                        <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                        <button class="btn btn-warning" type="reset"><i class="fa fa-repeat"></i> Reset</button>
                                        <button class="btn btn-danger" value="cancel"  onclick="goBack()" type="button"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
