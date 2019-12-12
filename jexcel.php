<?php

// Include config file
require "conn_tps.php";


$result = mysqli_query($link, "SELECT nama_tps, no,berat FROM tps ORDER BY no DESC"); 
$nama_tps=array();
$nomor_tps=array();
$berat_tps=array();
$size = "";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $i=0;
        $nama_tps[$i]=$row["nama_tps"]; 
        $nomor_tps[$i]=$row["no"];
        $berat_tps[$i]=$row["berat"];
        $i++;
    }
    } else {
    echo "0 results";
    }



?>

<html>
<script src="https://bossanova.uk/jexcel/v3/jexcel.js"></script>
<link rel="stylesheet" href="https://bossanova.uk/jexcel/v3/jexcel.css" type="text/css" />

<script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>
<link rel="stylesheet" href="https://bossanova.uk/jsuites/v2/jsuites.css" type="text/css" />

<div id="spreadsheet"></div>



<script>

    // copy array data
    var data = new Array();

var data = [
    [
    <?php echo json_encode($nama_tps)?>, 
    <?php echo json_encode($berat_tps)?>
    
    ]
];
    
jexcel(document.getElementById('spreadsheet'), {
    data:data,
    columns: [
        {
            type: 'text',
            title:'Nama',
            width:200
        },
        {
            type: 'text',
            title:'Berat',
            width:120
        },
        {
            type: 'image',
            title:'Gambar TPS',
            width:150,
        },
     ]
});
</script>
</html>