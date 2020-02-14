<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dash</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>

	<div class="container">
	<p>Teste</p>
	</div>

<div class="container">
	<?php
	//conectando
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "admin_prod";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo "<br>";
echo "<br>";


$sql = "SELECT id, apelido, lastname, site FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  "Nome: " . $row["apelido"]. " " . $row["lastname"]. "<br> Sites Feitos: " . $row["site"]. "<br><br>";
    }
} else {
    echo "0 results";
}



?>
<!-- CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
apelido VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
site VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

INSERT INTO users (apelido, lastname, site)
VALUES (Danilo, Santos, danilo.silva@doutoresdaweb.com.br) -->




        <form method="POST" action="enviadados.php">
            apelido: 
            <br> 
            <input type="text" name="apelido"><br>
            <!-- sobrenome:<br>
            <input type="text" name="lastname"><br> -->
            site:
            <br>
            <input type="text" name="site"><br>
            <br>
            <input type="submit" value="Inserir">
        </form>
        <br>
<form method="post" action="enviadados2.php">
    <button type="submit" name="passed" id="passed" class="btn btn-success btn-flat"><i class="fa fa-check"></i>+</button>
</form>
</div>






</body>
</html>