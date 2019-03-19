<?php
include "header.php";
include "connsystem.php";
extract($_GET);
$selectgaji = mysqli_query($mysqli,"SELECT * FROM penggajian WHERE idgaji LIKE '%$nik'");
$data = mysqli_fetch_array($selectgaji);
$periode = strtotime(substr($data['idgaji'],2,2).'/1/20'.substr($data['idgaji'],0,2));
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pegawai
      <small>Form Gaji</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Pegawai</li>
      <li class="active">Form Gaji</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box row">
    <div class="box-header">
      <h3 class="box-title">
        Formulir Penggajian
      </h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" id="form" action="aksigaji.php">
    <div class="box-body">
      <input type="hidden" name="aksi" <?PHP if(! empty($aksi)) echo ' value="'.$aksi.'"';?>>
      <div class="form-group">
        <label for="nik">NIK</label>
        <input readonly type="text" name="nik" class="form-control" placeholder="NIK" <?PHP if(! empty($nik)) echo ' value="'.$nik.'"';?>>
      </div>
      <div class="form-group">
        <label for="periode">Periode</label>
        <input type="date" name="periode" class="form-control" placeholder="Periode" required <?PHP if(! empty($data)) echo ' value="'.date("Y-m-d",$periode).'" readonly';?>>
      </div>
      <div class="col-sm-6">
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////// Penerimaan Langsung /////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Penerimaan Langsung</h3>
        <div class="form-group">
          <label for="gaji">Jumlah Gaji</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Jumlah Gaji" name="gaji" <?PHP if(! empty($data)) echo ' value="'.$data['gaji'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="tunjkedisiplinan">Tunjangan Kedisiplinan</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Tunjangan Kedisiplinan" name="tunjkedisiplinan" <?PHP if(! empty($data)) echo ' value="'.$data['tunjkedisiplinan'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="tunjtransport">Tunjangan Transport</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Tunjangan Transport" name="tunjtransport" <?PHP if(! empty($data)) echo ' value="'.$data['tunjtransport'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="tunjjabatan">Tunjangan Jabatan</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Tunjangan Jabatan" name="tunjjabatan" <?PHP if(! empty($data)) echo ' value="'.$data['tunjjabatan'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="tunjlain">Tunjangan Lain</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Tunjangan Lain" name="tunjlain" <?PHP if(! empty($data)) echo ' value="'.$data['tunjlain'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="incentive">Incentive</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Incentive" name="incentive" <?PHP if(! empty($data)) echo ' value="'.$data['incentive'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="thr">Tunjangan Hari Raya</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Tunjangan Hari Raya" name="thr" <?PHP if(! empty($data)) echo ' value="'.$data['thr'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="gajilainlain">Lain-lain</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Lain-lain" name="gajilainlain" <?PHP if(! empty($data)) echo ' value="'.$data['gajilainlain'].'"';?>/>
        </div>
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////// Penerimaan Tidak Langsung ////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Penerimaan Tidak Langsung</h3>
        <div class="form-group">
          <label for="jhtperusahaan">Jaminan Hari Tua (JHT) Perusahaan</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Jaminan Hari Tua (JHT) Perusahaan" name="jhtperusahaan" <?PHP if(! empty($data)) echo ' value="'.$data['jhtperusahaan'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="jkk">Jaminan Kecelakaan Kerja (JKK)</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Jaminan Kecelakaan Kerja (JKK)" name="jkk" maxlength="10" <?PHP if(! empty($data)) echo ' value="'.$data['jkk'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="jkm">Jaminan Kematian (JKM)</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Jaminan Kematian (JKM)" name="jkm" <?PHP if(! empty($data)) echo ' value="'.$data['jkm'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="bpjskesehatanperusahaan">BPJS Kesehatan Perusahaan</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control pull-right" placeholder="BPJS Kesehatan Perusahaan" name="bpjskesehatanperusahaan" <?PHP if(! empty($data)) echo ' value="'.$data['bpjskesehatanperusahaan'].'"';?>/>
        </div>
      </div>
      <div class="col-sm-6">
      <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////// Potongan ///////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Potongan</h3>
        <div class="form-group">
          <label for="potunpaidleave">Unpaid Leave</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Unpaid Leave" name="potunpaidleave" <?PHP if(! empty($data)) echo ' value="'.$data['potunpaidleave'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="potjhtperusahaan">Jaminan Hari Tua (JHT) Perusahaan</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Jaminan Hari Tua (JHT) Perusahaan" name="potjhtperusahaan" <?PHP if(! empty($data)) echo ' value="'.$data['potjhtperusahaan'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="potjhtkaryawan">Potongan Jaminan Hari Tua (JHT) Karyawan</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Potongan Jaminan Hari Tua (JHT) Karyawan" name="potjhtkaryawan" <?PHP if(! empty($data)) echo ' value="'.$data['potjhtkaryawan'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="potjkk">Potongan Jaminan Kecelakaan Kerja</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Potongan Jaminan Kecelakaan Kerja" name="potjkk" <?PHP if(! empty($data)) echo ' value="'.$data['potjkk'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="potjkm">Potongan Jaminan Kematian</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Potongan Jaminan Kematian" name="potjkm" <?PHP if(! empty($data)) echo ' value="'.$data['potjkm'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="potbpjskesehatanperusahaan">Potongan BPJS Kesehatan Perusahaan</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Potongan BPJS Kesehatan Perusahaan" name="potbpjskesehatanperusahaan" <?PHP if(! empty($data)) echo ' value="'.$data['potbpjskesehatanperusahaan'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="potbpjskesehatankaryawan">Potongan BPJS Kesehatan Karyawan</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Potongan BPJS Kesehatan Karyawan" name="potbpjskesehatankaryawan" <?PHP if(! empty($data)) echo ' value="'.$data['potbpjskesehatankaryawan'].'"';?>/>
        </div>
        <div class="form-group">
            <label for="potpph21">Potongan PPH 21</label>
            <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Potongan PPH 21" name="potpph21" <?PHP if(! empty($data)) echo ' value="'.$data['potpph21'].'"';?>/>
        </div>
        <div class="form-group">
            <label for="potpinjamankaryawan">Potongan Pinjaman Karyawan</label>
            <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Potongan Pinjaman Karyawan" name="potpinjamankaryawan" <?PHP if(! empty($data)) echo ' value="'.$data['potpinjamankaryawan'].'"';?>/>
        </div>
        <div class="form-group">
            <label for="potlainlain">Potongan Lain-lain</label>
            <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Potongan Lain-lain" name="potlainlain" <?PHP if(! empty($data)) echo ' value="'.$data['potlainlain'].'"';?>/>
        </div>
        <div class="box-footer">
          <input type="submit" class="btn btn-primary" value="submit">
        </div>
      <!-- END -->
      </div>
    </div>
    </form>
  </div>
  <!-- Main content -->
  <section class="content">

  </section>
</div>

<?php
include "footer.php"
 ?>
<script type="text/javascript">
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<script type="text/javascript">

//   (function($, undefined) {

//   "use strict";

//   // When ready.
//   $(function() {
    
//     var $form = $( "#form" );
//     var $input = $form.find( "input" );

//     $input.on( "keyup", function( event ) {
      
      
//       // When user select text in the document, also abort.
//       var selection = window.getSelection().toString();
//       if ( selection !== '' ) {
//         return;
//       }
      
//       // When the arrow keys are pressed, abort.
//       if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
//         return;
//       }
      
      
//       var $this = $( this );
      
//       // Get the value.
//       var input = $this.val();
      
//       var input = input.replace(/[\D\s\._\-]+/g, "");
//           input = input ? parseInt( input, 10 ) : 0;

//           $this.val( function() {
//             return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
//           } );
//     } );
    
//     /**
//      * ==================================
//      * When Form Submitted
//      * ==================================
//      */
//     $form.on( "submit", function( event ) {
      
//       var $this = $( this );
//       var arr = $this.serializeArray();
    
//       for (var i = 0; i < arr.length; i++) {
//           arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, ''); // Sanitize the values.
//       };
      
//       console.log( arr );
      
//       event.preventDefault();
//     });
    
//   });
// })(jQuery);

</script>