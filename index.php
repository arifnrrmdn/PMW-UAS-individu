<!DOCTYPE html>

<!-- Developed by Websquare Indonesia -->

<!--[if lt IE 7 ]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>

<title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="shortcut icon" type="image/x-icon" href="images/logoicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Kreon:light,regular' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="css/style-sheet.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/style-sheet2.css" />-->
<link rel="stylesheet" type="text/css" href="css/nivo-slider.css" />
</head>

<body onLoad="initialize()">
	<header>
    <section class="logo"><a href="#"><img src="images/logo.png" /></a></section>
	<section class="title">Sistem Informasi Nilai Online <br /> <span>UNIVERSITAS KOMPUTER INDONESIA</span></section>
	<section class="clr"><center>Jl. Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132</center></section>
	</header>

<section id="container">
			<div>
			<center>
			<section id="navigator">
    <ul class="menus">
      <h2>LOGIN GENERAL</h2>
			
    </ul>
</section>
	<br /><br />

<form enctype="multipart/form-data" method="post" class="form-login">
<table>
	<tr>
    	<td><input type="text" name="username" placeholder="Username" required /></td>
    </tr>
	<tr>
    	<td><input type="password" name="password" placeholder="Password" required /></td>
    </tr>
	<tr>
    	<td><input id="submit" name="submit" type="submit" value="Login"></td>
    </tr>
</table>
</form>
    <?php

    require_once "koneksi/koneksi.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);

        // Validasi input
        if (empty($username) || empty($password)) {
            echo"<script>alert('Please fill out, Username OR Password OR Type correctly!') </script>";
            echo"<script type='text/javascript'>window.location ='./?lb=home'</script>";
        } else {
            // Query parameterized
            $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $_SESSION['username'] = $username;
                echo "<script type='text/javascript'>window.location ='admin/index.php'</script>";
            } else {
                echo "<script>alert('Invalid Username or Password.')</script>";
                echo "<script type='text/javascript'>window.location ='login.php'</script>";
            }
        }
    }

    $koneksi->close();
    ?>

</center>	</div>
    <section class="clr"></section>
</section>

<footer>
	<font color=#000> Copyright &copy; 2024 - UNIKOM BANDUNG <br />
    Developed By <a href="https://github.com/arifnrrmdn" target="_new">Arif N Ramadhan</a> </font>
</footer>

</body>

</html>