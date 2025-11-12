<?php
include ('koneksi.php');
$db = new database();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        form#background_border{
            margin: 0px 230px;
            color:''white;
        }
    </style>
</head>
<body>
        <h2>LAPORAN DETAIL DATA Customer</h2>
        <table width="667" border="1">
            <tr>
                <th width="21">ID Customer</th>
                <th width="122">Kode Barang</th>
                <th width="158">Nama Customer</th>
                <th width="47">Alamat Customer</th>
                <th width="76">Telepon Customer</th>
                <th width="83">Telepon Customer</th>
            </tr>

            <?php
            $data_customer= $db->tampil_data_customer();
            $no = 1;
            foreach($data_customer as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id_customer']; ?></td>
                <td><?php echo $row['nama_customer']; ?></td>
                <td><?php echo $row['alamat_customer']; ?></td>
                <td><?php echo $row['telepon_customer']; ?></td>
                <td><?php echo $row['email_customer']; ?></td>
            </tr>
            <?php 
        } ?>

    </table>
    <script>
        window.print();
    </script>
</body>
</html>