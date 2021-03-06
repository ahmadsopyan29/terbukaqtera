<?php
include "header.php";
if($level=='0'){
$selectindustri = mysqli_query($mysqli,"SELECT * FROM customer_industry WHERE status='1'");
extract($_GET);
if(! empty($hasil)){
  echo "<script> alert('".$hasil."');</script>";
}
?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Customer
      <small>List Industry</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Customer</li>
      <li class="active">List Industry</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="box-title">List Industry</h3>
          </div>
        </div>
      </div>
    <!-- /.box-header -->
    <div class="box-body">
          <div class="col-sm-7">
            <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
              <thead>
                <tr role="row">
                  <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-sort="ascending" aria-label="activate to sort column ascending">Code</th>
                  <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-sort="ascending" aria-label="activate to sort column ascending">Nama</th>
                  <th>Opsi</th>
                </tr>
                </thead><tbody>

                  <?php
                  $counter=0;
                  while ($dataindustri = mysqli_fetch_array($selectindustri)) {
                    if ($counter%2!=0) {
                      echo "<tr role='row' class='odd'>";
                    } elseif ($counter%2==0) {
                      echo "<tr role='row' class='even'>";
                    }
                    echo "<td>".$dataindustri['code']."</td>";
                    echo "<td>".$dataindustri['industry_name']."</td>";
                    echo "<td><a href='testact.php?aksi=hapus_industri&&id=".$dataindustri['id']."' ";?>onclick="return confirm('Are you sure?')">Hapus</a></td>
                    <?php
                    echo "</tr>";
                    $counter++;
                  }
                  ?></tbody>
            </table>
          </div>
          <div class="col-sm-1"></div>
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-12">
                <h5 class="pull-right">Tambah Industry</h5>
              </div>
            </div>
            <form role="form" method="post" action="testact.php?aksi=tambah_industri" enctype='multipart/form-data'>
              <div class="form-group">
                <label for="code">Code Industry</label>
                <input type="text" class="form-control" name="code" placeholder="Code Industry" required />
              </div>
              <div class="form-group">
                <label for="nama">Industry Baru</label>
                <input type="text" class="form-control" name="nama" placeholder="Industry Baru" required />
              </div>
              <div class="box-footer pull-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
            <div class="col-sm-12">
              <div class="box-footer pull-right">
                <a href="datacustomer.php"><button type="button" class="btn btn-danger">Back to Data Customer</button></a>
              </div>
            </div>
        </div>
    </div>
</section>

</div>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      'pageLength'  : 100,
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  </script>

<?php
} else {
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      403
      <small>Forbidden</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Error</li>
    </ol>
  </section>
  <section class="content">
    <div class="error-page">
      <h2 class="headline text-yellow">#403</h2>

      <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! Access forbidden!</h3>

        <p>
          Unfortunately, you do not have permission to access this page.<br>
          (The request was valid, but the server is refusing action. The user might not have the necessary permissions for a resource, or may need an account of some sort).
          <!-- 
          Meanwhile, you may <a href="index.html">return to dashboard</a> or contact your webmaster if you think this is a server error. Thank you.
          -->
        </p>
      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
  <!-- /.content -->
</div>
<?php
}
include "footer.php"
?>
