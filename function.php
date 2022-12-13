<?php

session_start();
//menkoneksikan ke database
$conn = mysqli_connect("localhost","root","","stockbarang");

//Menambah barang baru
if(isset($_POST['addnewbarang'])){
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];
    $kodebarang = $_POST['kodebarang'];
    
    $addtotable = mysqli_query($conn, "insert into stock (namabarang, deskripsi, stock, kodebarang) values('$namabarang', '$deskripsi', '$stock', '$kodebarang')");
    if($addtotable){
        header('location:index.php');
     } else {
        echo 'Gagal';
        header('location:index.php');
     }
};

//Menambah barang masuk
if(isset($_POST['barangmasuk'])){
  $barangnya = $_POST['barangnya'];
  $penerima = $_POST[ 'penerima'];
  $qty = $_POST['qty'];

  $cekstocksekarang = mysqli_query($conn, "select * from stock where idbarang='$barangnya'");
  $ambildatanya = mysqli_fetch_array ($cekstocksekarang);

  $stocksekarang = $ambildatanya['stock' ];
  $tambahkanstocksekarangdenganquantity=$stocksekarang + $qty;

  $addtomasuk = mysqli_query($conn,"insert into masuk (idbarang, keterangan, qty) values(' $barangnya','$penerima', '$qty')");
  $updatestockmasuk = mysqli_query($conn, "update stock set stock= '$tambahkanstocksekarangdenganquantity' where idbarang= '$barangnya'");
  
  if($addtomasuk) {
     header ('location:masuk.php');
  }
  else {
      echo 'Gagal';
      header('location:masuk.php');
   }
}


//Menambah barang RETUR
if(isset($_POST['barangretur'])){
   $barangnya = $_POST['barangnya'];
   $penerima = $_POST[ 'penerima'];
   $keterangan = $_POST['keterangan'];
   $qty = $_POST['qty'];
 
   $cekstocksekarang = mysqli_query($conn, "select * from stock where idbarang='$barangnya'");
   $ambildatanya = mysqli_fetch_array ($cekstocksekarang);
 
   $stocksekarang = $ambildatanya['stock' ];
   $addtomasuk = mysqli_query($conn,"insert into retur (idbarang,penerima, keterangan, qty) values(' $barangnya','$penerima','$keterangan', '$qty')");
   
   if($addtomasuk) {
      header ('location:retur.php');
   }
   else {
       echo 'Gagal';
       header('location:retur.php');
    }
 }




//Menambah barang keluar
if(isset($_POST['addbarangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $namabarang = $_POST['namabarang'];
    $penerima = $_POST[ 'penerima'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];
  
    $cekstocksekarang = mysqli_query($conn, "select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array ($cekstocksekarang);
  
    $stocksekarang = $ambildatanya['stock' ];

    if($stocksekarang >= $qty){
       //kalau barangnya cukup
      $tambahkanstocksekarangdenganquantity=$stocksekarang - $qty;
   
      $addtokeluar = mysqli_query($conn,"insert into keluar (idbarang, penerima, keterangan,qty) values(' $barangnya', '$penerima','$keterangan', '$qty')");
      $updatestockmasuk = mysqli_query($conn, "update stock set stock= '$tambahkanstocksekarangdenganquantity' where idbarang= '$barangnya'");
      
      if($addtokeluar&&$updatestockmasuk) {
         header ('location:keluar.php');
      }
      else {
         echo 'Gagal';
         header('location:keluar.php');
      }
   }else{
      //kalau barangnya ga cukup
      echo '
      <script>
         alert("Stock saat ini tidak mencukupi");
         window.location.href="keluar.php";
      </script>
      ';
   }
  }


  //update info barang
  
if(isset($_POST['updatebarang'])){

    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $kodebarang = $_POST['kodebarang'];
    $update = mysqli_query($conn, "update stock set namabarang ='$namabarang', deskripsi='$deskripsi',kodebarang='$kodebarang' where idbarang ='$idb'");
    if($update){
        header ('location:index.php');
     } else {
        echo 'Gagal';
       header ('location:index.php');
     }
   }

   //menghapus barang di stock
   if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb'];
    $hapus = mysqli_query($conn, "delete from stock where idbarang='$idb'");
    
    if($hapus){
        header ('location:index.php');
     } else {
        echo 'Gagal';
       header ('location:index.php');
     }
   };

   //mengubah barang data masuk
   if(isset($_POST['updatebarangmasuk'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn,"select * from masuk where idmasuk='$idm'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg){
       $selisih = $qty - $qtyskrg;
       $kurangin = $stockskrg + $selisih;
       $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
       $updatenya = mysqli_query($conn,"update masuk set qty='$qty' , keterangan='$keterangan'where idmasuk='$idm'");
         if($kurangistocknya&&$updatenya){
            header ('location:masuk.php');
            }else {
             echo 'Gagal';
             header ('location:masuk.php');
            }
         }

    else {
      $selisih = $qtyskrg-$qty;
      $kurangin = $stockskrg - $selisih;
      $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
      $updatenya = mysqli_query($conn,"update masuk set qty='$qty' , keterangan='$keterangan'where idmasuk='$idm'");
        if($kurangistocknya&&$updatenya){
           header ('location:masuk.php');
           }else {
            echo 'Gagal';
            header ('location:masuk.php');
           }

    }
   };

 //Menghapus barang masuk
if(isset($_POST['hapusbarangmasuk'])){
$idb = $_POST['idb'];
$qty = $_POST['kty'];
$idm = $_POST['idm'];
$getdatastock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
$data = mysqli_fetch_array($getdatastock);
$stok = $data['stock'];


$selisih = $stok-$qty;
$update = mysqli_query($conn, "update stock set stock='$selisih' where idbarang='$idb'");
$hapusdata = mysqli_query ($conn, "delete from masuk where idmasuk='$idm'");

if($update&&$hapusdata){
   header ('location:masuk.php');
 } else {
   header ('location:masuk.php');
 }
}

//mengubah data barang keluar

 if(isset($_POST['updatebarangkeluar'])){
   $idb = $_POST['idb'];
   $idk = $_POST['idk'];
   $penerima = $_POST['penerima'];
   $keterangan = $_POST['keterangan'];
   $qty = $_POST['qty'];

   $lihatstock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
   $stocknya = mysqli_fetch_array($lihatstock);
   $stockskrg = $stocknya['stock'];


   $qtyskrg = mysqli_query($conn,"select * from keluar where idkeluar='$idk'");
   $qtynya = mysqli_fetch_array($qtyskrg);
   $qtyskrg = $qtynya['qty'];

   if($qty>$qtyskrg){
      $selisih = $qty - $qtyskrg;
      $kurangin = $stockskrg - $selisih;
      $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
      $updatenya = mysqli_query($conn,"update keluar set qty='$qty' , penerima='$penerima', keterangan='$keterangan' where idkeluar='$idk'");
        if($kurangistocknya&&$updatenya){
           header ('location:keluar.php');
           }else {
            echo 'Gagal';
            header ('location:keluar.php');
           }
        }

   else {
     $selisih = $qtyskrg-$qty;
     $kurangin = $stockskrg + $selisih;
     $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
     $updatenya = mysqli_query($conn,"update keluar set qty='$qty' , penerima='$penerima',keterangan = '$keterangan' where idkeluar='$idk'");
       if($kurangistocknya&&$updatenya){
          header ('location:keluar.php');
          }else {
           echo 'Gagal';
           header ('location:keluar.php');
          }

   }
  };

//Menghapus barang keluar
if(isset($_POST['hapusbarangkeluar'])){
$idb = $_POST['idb'];
$qty = $_POST['kty'];
$idk = $_POST['idk'];
$getdatastock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
$data = mysqli_fetch_array($getdatastock);
$stok = $data['stock'];

$selisih = $stok+$qty;
$update = mysqli_query($conn, "update stock set stock='$selisih' where idbarang='$idb'");
$hapusdata = mysqli_query ($conn, "delete from keluar where idkeluar='$idk'");

if($update&&$hapusdata){
  header ('location:keluar.php');
} else {
  header ('location:keluar.php');
}
}

//mengubah data barang retur

   if(isset($_POST['updatebarangretur'])){

      $idb = $_POST['idb'];
      $idr = $_POST['idr'];
      $penerima = $_POST['penerima'];
      $keterangan = $_POST['keterangan'];
      $qty = $_POST['qty'];
      $update = mysqli_query($conn, "update retur set penerima='$penerima',keterangan='$keterangan' where idretur ='$idr'");
      if($update){
          header ('location:retur.php');
       } else {
          echo 'Gagal';
         header ('location:retur.php');
       }
     }

//Menghapus barang RETUR
if(isset($_POST['hapusbarangretur'])){
$idb = $_POST['idb'];
$qty = $_POST['qty'];
$idr = $_POST['idr'];

$hapusdata = mysqli_query ($conn, "delete from retur where idretur='$idr'");

if($hapusdata){
  header ('location:retur.php');
} else {
  header ('location:retur.php');
}
}

//menghapus rincian keluar
if(isset($_POST['hapusrinciankeluar'])){
   $hapusdata = mysqli_query($conn,"delete  from rinciankeluar");

   if($hapusdata){
      header ('location:rinciankeluar.php');
   } else {
      header ('location:rinciankeluar.php');
   }
}

//menghapus rincian masuk
if(isset($_POST['hapusrincianmasuk'])){
   $hapusdata = mysqli_query($conn,"delete  from rincianmasuk");

   if($hapusdata){
      header ('location:rinciankeluar.php');
   } else {
      header ('location:rinciankeluar.php');
   }
}

?>