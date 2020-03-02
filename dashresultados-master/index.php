<!DOCTYPE html>
<?php include 'inc/head.php' ?>
</head>
<body>
	<?php include 'inc/topo.php' ?>
	<div class="container">
		<h1>Olá Mundo</h1>

<div class="panel-body">
	
<?php


$conn = new mysqli($servername, $username, $password, $db);
    // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Connected successfully";
      
        $sql = "SELECT * FROM users ";
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo  "Nome: " . $row["name"]. " " . $row["lastname"]. "<br> Sites Feitos: " . $row["site"]. "<br><br>";
    }
        }
        ?>
</div>


	</div>
</body>
</html>