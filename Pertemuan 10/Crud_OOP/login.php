<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
</head>
<body>
    <h3>Form Login</h3>
    <form method="POST" action="proses_barang.php?action=login">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="Login">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
        <?php
        if(isset($_GET['msg'])){
            echo "<p style='color:red;'>".$_GET['msg']."</p>";
        }
        ?>
    </form>
</body>
</html>
