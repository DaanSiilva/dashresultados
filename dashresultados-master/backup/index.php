<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dash</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>
        <div class="container">
            <!-- <p>Teste</p> -->
            <br>
            <br>
            <br>
        
        </div>
        <div class="container">
            <form action="" method="post">
                <input type="text" name="users"> New player  <br><br>
                <input name="mainsubmit" type="submit" value="Enviar">
            </form>
        </body>
    </html>
    <?php
    $db = new PDO('mysql:dbname=admin_prod;host=localhost', 'root', '');
    if (isset($_POST['mainsubmit'])) {
    $nameDisease = $_POST['users'];
    $req = $db->prepare('INSERT into users (name, site) VALUES(:name, 0)');
    $req->bindParam(':name', $nameDisease);
    $req->execute();
    $query = $db->query('SELECT * FROM users');
    while ($result = $query->fetch()) { ?>
    <form action="" method="post">
        <p><?php echo $result['name'] . " : " . $result['site'];?>
            <input name="secondsubmit" type="submit" value="+1" />
            <input type="hidden" name="id" value="<?php echo $result['id'];?>" />
        </p>
    </form>
    <?php }
    }
    if (isset($_POST['secondsubmit'])) {
    $req = $db->prepare("UPDATE users SET site = site + 1 WHERE id = " . $_POST['id']);
    $req->execute();
    $query = $db->query('SELECT * FROM users');
    while ($result = $query->fetch()) {?>
    <form action="" method="post">
        <p><?php echo $result['name'] . " : " . $result['site'];?>
            <input name="secondsubmit" type="submit" value="+1" />
            <input type="hidden" name="id" value="<?php echo $result['id'];?>" />
        </p>
    </form>
    <?php }
    }
    ?>
    <?php
    //conectando
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "admin_prod";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Connected successfully";
    // echo "<br>";
    // echo "<br>";
    $sql = "SELECT id, apelido, lastname, site FROM users";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo  "Nome: " . $row["apelido"]. " " . $row["lastname"]. "<br> Sites Feitos: " . $row["site"]. "<br><br>";
    }
    } else {
    //echo "tem nada";
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
    <div class="panel-body">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "admin_prod";      
        $conn = new mysqli($servername, $username, $password, $db);
        $sql = "SELECT * FROM users ";
        $result = $conn->query($sql);


    while($row = $result->fetch_assoc()) {
        $percent = $row["site"];
        $name = $row['name'];
        $id = $row['id'];
        echo "<small>";
        echo $name;
        echo "</small>";
        echo '<div class="progress">';
            echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent.'%">';
                //<span class="sr-only">72% Complete</span>
            echo '</div>';
        echo '</div>';
        ?>
        <form action="" method="post">
        <p><?php echo $row['name'] . " : " . $row['site'];?>
            <input name="secondsubmit" type="submit" value="+1" />
            <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
        </p>
    </form>
        <?php 

         
    }
        
        ?>
<br>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "admin_prod";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);
        $sql = "SELECT * FROM users ";
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo  "Nome: " . $row["name"]. " " . $row["lastname"]. "<br> Sites Feitos: " . $row["site"]. "<br><br>";
    }
        }
        ?>
        
        
    </div>
    
    <br>
    
    <!-- <?php
    //conectando
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "admin_prod";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    $sql = "SELECT apelido FROM users";
    $result = $conn->query($sql);
    echo "<select name='apelido'>";
        while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['apelido'] . "'>" . $row['apelido'] . "</option>";
        }
    echo "</select>";
    ?> -->
</div>
</body>
</html>