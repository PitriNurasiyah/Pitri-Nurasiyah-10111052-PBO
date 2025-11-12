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
        <h2>LAPORAN DETAIL DATA SUPPLIER</h2>
        <table width="667" border="1">
            <tr>
                <th width="21">ID Supplier</th>
                <th width="122">Kode Supplier</th>
                <th width="158">Nama Supplier</th>
                <th width="47">Alamat Supplier</th>
                <th width="76">Telepon Supplier</th>
                <th width="83">Telepon Supplier</th>
            </tr>

            <?php
            $data_supplier= $db->tampil_data_supplier();
            $no = 1;
            foreach($data_supplier as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id_supplier']; ?></td>
                <td><?php echo $row['nama_supplier']; ?></td>
                <td><?php echo $row['alamat_supplier']; ?></td>
                <td><?php echo $row['telepon_supplier']; ?></td>
                <td><?php echo $row['email_supplier']; ?></td>
            </tr>
            <?php 
        } ?>

    </table>
    <script>
        window.print();
    </script>
</body>
</html>