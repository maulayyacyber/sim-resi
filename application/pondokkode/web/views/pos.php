<!-- Page content of course! -->
<main class="bs-docs-masthead" id="content" role="main" tabindex="-1">
  <div class="container">
    <h1><i class="fa fa-truck fa-flip-horizontal"></i> Resi Pengiriman POS</h1>
    </div>
</main>
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <ul class="nav navbar-nav navbar-right">
  </ul>
    <div class="navbar-header">
    </div>
  </div>
</nav>
<!-- main content -->
<div class="col-md-offset-1 col-md-10">
<div class="panel panel-success">
  <div class="panel-heading"><i class="fa fa-truck fa-flip-horizontal"></i> Resi Pengiriman POS</div>
  <div class="row">
    <label class="col-sm-3 control-label col-lg-3" ></label>
      <div class="col-lg-6">
          <div class="panel-body">
          <form role="form" id="formID" action="<?php print base_url()?>web/search_pos" method="post">
            <div class="input-group m-bot15">
            <input type="text" class="validate[required,minSize[3]] text-input form-control minsize" class="form-control" id="search" autocomplete="off" name="data_pos" placeholder="Cari Berdasarkan Nama Konsumen" class="form-control">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
            </span>
            </div>
          </div>
      </div>
  </div>
  <div class="panel-body">
   <div class="table-responsive">
        <?php print $data_pos ?>
   </div>
  <!-- /.table-responsive -->
  <!-- paging -->
    <nav>
      <ul class="pagination">
        <?php print $paging ?>
     </ul>
   </nav>
   <!-- end paging -->
  </div>
</div>
</div>
<!-- end content -->
