<script language="javascript">
function validate_user(form) {
  var e = form.elements;

  /* Your validation code. */

  if(e['pass_user'].value != e['konfrim_pass_user'].value) {
    alert('Password konfirmasi Anda salah.');
    e['konfrim_pass_user'].focus();
    return false;
  }
  return true;
}
</script>
    <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php print $title; ?>
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                         <?php $attributes= array('class' => 'cmxform form-horizontal','onsubmit' => 'return validate_user(this)'); ?>
                         <?php echo form_open_multipart("admin/master/user/simpan", $attributes); ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nama_user" class="control-label col-md-3">Nama<span class="required">*</span></label>
                                        <div class="col-lg-8">
                                            <input class="form-control" id="nama_user" autofocus name="nama_user" type="text" placeholder="Nama User" autocomplete="off" value="<?php print $nama_user ?>" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="email_user" class="control-label col-md-3">Email<span class="required">*</span></label>
                                        <div class="col-lg-8">
                                            <input class="form-control" id="email_user" autofocus name="email_user" type="email" placeholder="Email User" autocomplete="off" value="<?php print $email_user ?>" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="user_name" class="control-label col-md-3">Username<span class="required">*</span></label>
                                        <div class="col-lg-8">
                                            <input class="form-control" id="user_name" name="user_name" type="text" placeholder="Username" autocomplete="off" value="<?php print $user_name ?>" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="pass_user" class="control-label col-md-3">Password<?php print $required ?></label>
                                        <div class="col-lg-8">
                                            <input class="form-control" id="pass_user" name="pass_user" type="password" placeholder="<?php print $place_pass; ?>"  autocomplete="off" <?php print $validasi; ?>/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="konfrim_pass_user" class="control-label col-md-3">Konfirmasi Password<?php print $required ?></label>
                                        <div class="col-lg-8">
                                            <input class="form-control" id="konfrim_pass_user" name="konfrim_pass_user" type="password" placeholder="<?php print $place_kon_pass; ?>"  <?php print $validasi; ?>/>
                                        </div>
                                    </div>
                                </div>
                           </div>

                             <div class="row">
                                <div class="col-md-8">
                                   <div class="form-group">
                                       <label for="foto_user" class="control-label col-md-3">Foto<span class="required">*</span></label>
                                        <div class="col-md-8">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="<?php print $frame_foto; ?>" alt="" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                           <span class="btn btn-white btn-file">
                                                           <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                           <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                           <input type="file" id="foto_user" name="<?php echo $foto_user; ?>" class="default" <?php print $penting; ?>/>
                                                           </span>
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                </div>
                                            </div>
                                            <span class="label label-danger">NOTE!</span>
                                                     <span>
                                                     Thumbnail gambar terlampir didukung oleh Firefox terbaru,
                                                     Chrome, Opera, Safari dan hanya Internet Explorer 10
                                            </span>
                                        </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="form-group">
                                <label for="alamat" class="control-label col-md-2"></label>
                                <div class="col-lg-10">
                                <span class="required">*</span>)  Harus Diisi
                                </div>
                              </div>                              

                            <input type="hidden" name="foto_user_value" value="<?php echo $foto_user_value; ?>" />
                            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
                            <input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />

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
