<script>
function tampilkanPreview(img,idpreview)
{ //membuat objek gambar
  var gb = img.files;
  //loop untuk merender gambar
  for (var i = 0; i < gb.length; i++)
  { //bikin variabel
    var gbPreview = gb[i];
    var imageType = /image.*/;
    var preview=document.getElementById(idpreview);            
    var reader = new FileReader();
    if (gbPreview.type.match(imageType)) 
    { //jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element) 
      {
        return function(e) 
        {
          element.src = e.target.result;
        };
      })(preview);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview);
    }
      else
      { //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }    
}

function tampilkanPreview1(img1,idpreview1)
{ //membuat objek gambar
  var gb = img1.files;
  //loop untuk merender gambar
  for (var i = 0; i < gb.length; i++)
  { //bikin variabel
    var gbPreview1 = gb[i];
    var imageType = /image.*/;
    var preview1=document.getElementById(idpreview1);            
    var reader = new FileReader();
    if (gbPreview1.type.match(imageType)) 
    { //jika tipe data sesuai
      preview1.file = gbPreview1;
      reader.onload = (function(element) 
      {
        return function(e) 
        {
          element.src = e.target.result;
        };
      })(preview1);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview1);
    }
      else
      { //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }    
}

function tampilkanPreview2(img2,idpreview2)
{ //membuat objek gambar
  var gb = img2.files;
  //loop untuk merender gambar
  for (var i = 0; i < gb.length; i++)
  { //bikin variabel
    var gbPreview2 = gb[i];
    var imageType = /image.*/;
    var preview2=document.getElementById(idpreview2);            
    var reader = new FileReader();
    if (gbPreview2.type.match(imageType)) 
    { //jika tipe data sesuai
      preview2.file = gbPreview2;
      reader.onload = (function(element) 
      {
        return function(e) 
        {
          element.src = e.target.result;
        };
      })(preview2);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview2);
    }
      else
      { //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }    
}

function tampilkanPreview3(img3,idpreview3)
{ //membuat objek gambar
  var gb = img3.files;
  //loop untuk merender gambar
  for (var i = 0; i < gb.length; i++)
  { //bikin variabel
    var gbPreview3 = gb[i];
    var imageType = /image.*/;
    var preview3=document.getElementById(idpreview3);            
    var reader = new FileReader();
    if (gbPreview3.type.match(imageType)) 
    { //jika tipe data sesuai
      preview3.file = gbPreview3;
      reader.onload = (function(element) 
      {
        return function(e) 
        {
          element.src = e.target.result;
        };
      })(preview3);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview3);
    }
      else
      { //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }    
}
</script>