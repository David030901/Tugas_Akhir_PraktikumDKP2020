<?php
  function hasil(){
    $tanggal = $_POST['tanggal'];
    $namcus = $_POST['namcus'];
    $noId = $_POST['noId'];
    $jk = $_POST['jk'];
    $durasi = $_POST['durasi'];
    $tipe = $_POST['tipe'];
    $deluxe = 850000;
    $superior = 500000;
    $diskon;
    $total;
    error_reporting(0);
            
        //Output program dan Pemanggilan Array
        foreach($namcus as $key => $val){
        ?>
          <table border="0" width="500" cellpadding="1" cellspacing="1" >
            
            <tr>
              <td><?php echo '&nbsp Tanggal Booking';?></td>
              <td><?php echo '&nbsp : ';?></td>
              <td><?php echo '&nbsp'.$tanggal;?></td>
            </tr>
    
            <tr>
              <td><?php echo '&nbsp Nama Customer';?></td>
              <td><?php echo '&nbsp : ';?></td>
              <td><?php echo '&nbsp'.$namcus[$key];?></td>
            </tr>
    
            <tr>
              <td><?php echo '&nbsp No Identitas';?></td>
              <td><?php echo '&nbsp : ';?></td>
              <td><?php echo '&nbsp'.$noId[$key];?></td>
            </tr>
    
            <tr>
              <td><?php echo '&nbsp Tipe Paket';?></td>
              <td><?php echo '&nbsp : ';?></td>
              <td><?php echo '&nbsp'.$tipe;?></td>
            </tr>
        
            <tr>
              <td><?php echo '&nbsp Durasi Trip';?></td>
              <td><?php echo '&nbsp : ';?></td>
              <td><?php echo '&nbsp'.$durasi.' Hari';?></td>
            </tr>

            </tr>
              <td><br> <?php $jk = $_POST['jk'];
              if ($jk == 'pria')
              {
                $hasil = 'Selamat datang mas '.$namcus[$key]; 
              }
              else 
              {
                $hasil = 'Selamat datang mbak '.$namcus[$key];
              }        
                echo $hasil;?>
              </td> 
            </tr>

            <tr>
              <td><?php echo '&nbsp Diskon';?></td>
              <td><?php echo '&nbsp : ';?></td>
              <td>
                <?php
                //Menentukan Diskon
                if($tipe){
                  if($durasi == ""){
                      echo "Durasi belum diisi";
                  }elseif($tipe == "Deluxe"){
                    $hasil = $deluxe * $durasi ;
                    $hasil;
                  }elseif($tipe == "Superior"){
                    $hasil = $superior * $durasi;
                    $hasil;
                  }
                
                  if($hasil > 2000000){
                    $diskon = (20/100)*$hasil;
                    $total = $hasil - $diskon;
                    echo "&nbspPotongan diskon 20%";
                  }elseif($hasil > 1500000){
                    $diskon = (10/100)*$hasil;
                    $total = $hasil - $diskon;
                    echo "&nbspPotongan diskon 10%";
                  }else{
                    echo "&nbspAnda tidak berhak mendapatkan diskon";
                    }
                }?>
              </td>
            </tr>
                
            <tr>
              <td><?php echo '&nbsp Total Bayar';?></td>
              <td><?php echo '&nbsp : ';?></td>
              <td>
                <?php
                //Menentukan Total Biaya
                if($tipe){
                  if($durasi == ""){
                      echo "Durasi belum diisi";
                  }elseif($tipe == "1"){
                    $hasil = $deluxe * $durasi ;
                    $hasil;
                  }elseif($tipe == "2"){
                    $hasil = $superior * $durasi;
                    $hasil;
                  }

                  if($hasil > 2000000){
                    $diskon = (20/100)*$hasil;
                    $total = $hasil - $diskon;
                    echo "&nbsp".$total;
                  }elseif($hasil > 1500000){
                    $diskon = (10/100)*$hasil;
                    $total = $hasil - $diskon;
                    echo "&nbsp".$total;
                  }else{
                    echo "&nbsp".$hasil;
                  }
                }?>
              </td>
            </tr>
          </table>
        <?php
      }
    }?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>:)Mari Liburan</title>
    <style media="screen">
      .link{
        font-family: sans-serif;
        color:blue;
      }
    </style>
  </head>
<body background="gambar/2.jpg">
 <form method="GET" action="hasil.php">
 <table width="500" border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <th><h2> Booking Paket Liburan </h2></th>
  </tr>
  <tr>
    <td>
      <table width="500" border="0" cellpadding="6" cellspacing="6" align="center">
        
        <tr height="40">
            <td width="200" valign="center">Tanggal Booking</td>
            <td width="10" valign="center"> : </td>
            <td><input type="date" name="tanggal"></td>
        </tr>
        
        <tr height="30">
          <td width="200" valign="center">Nama Customer</td>
          <td width="10" valign="center"> : </td>
          <td><input name="namcus[]" type="text" size="20" /></td>
        </tr>
        
        <tr height="30">
          <td width="200" valign="center">No Identitas</td>
          <td width="10" valign="center"> : </td>
          <td><input name="noId[]" type="text" size="40" /></td>
        </tr>
    
        <tr height="30">
          <td width="200" valign="center">Tipe Paket</td>
          <td width="10" valign="center"> : </td>
          <td>
            <select name="tipe">
              <option name="-" value="-" hidden>-</option>
              <option name="deluxe" value="Deluxe">Deluxe</option>
              <option name="superior" value="Superior">Superior</option>
            </select>
          </td>
        </tr>

        <tr height="30">
          <td width="200" valign="center">Jenis Kelamin</td>
          <td width="10" valign="center"> : </td>
          <td>
            <select name="jk" id="jk">
              <option value='pria'>--Pria--</option>
              <option value='wanita'>--Wanita--</option>
            </select>
          </td>
        </tr>
    
        <tr height="30">
          <td width="200" valign="center">Durasi Trip</td>
          <td width="10" valign="center"> : </td>
          <td><input name="durasi" type="text" size="10" />Hari</td>
        </tr>
    
        <tr>
          <td align="right" colspan="2"><input type="submit" name="btnOk" value="Checkout" /></td>
          <td><input type="reset" name="btnCancel" value="Reset" /></td>
        </tr>
    
      </table>
      </table>    
</form>
</body>
</html>
