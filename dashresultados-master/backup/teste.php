<html>
<body>
<form action="" method="post">
    <input type="text" name="disease">name
    <input name="mainsubmit" type="submit" value="submit">
 </form>
 </body>
 </html>

<?php
$db = new PDO('mysql:dbname=admin-teste;host=localhost', 'root', '');
if (isset($_POST['mainsubmit'])) {
    $nameDisease = $_POST['disease'];
    $req = $db->prepare('INSERT into disease (name, vote) VALUES(:name, 0)');
    $req->bindParam(':name', $nameDisease);

    $req->execute();
    $query = $db->query('SELECT * FROM disease');

    while ($result = $query->fetch()) { ?>
        <form action="" method="post">
            <p><?php echo $result['name'] . " : " . $result['vote'];?>
                <input name="secondsubmit" type="submit" value="+1" />
                <input type="hidden" name="id" value="<?php echo $result['id'];?>" />
            </p>
        </form>
    <?php }
}

if (isset($_POST['secondsubmit'])) {
    $req = $db->prepare("UPDATE disease SET vote = vote + 1 WHERE id = " . $_POST['id']);
    $req->execute();
    $query = $db->query('SELECT * FROM disease');

    while ($result = $query->fetch()) {?>
        <form action="" method="post">
            <p><?php echo $result['name'] . " : " . $result['vote'];?>
                <input name="secondsubmit" type="submit" value="+1" />
                <input type="hidden" name="id" value="<?php echo $result['id'];?>" />
            </p>
        </form>
    <?php }
}
?>

<!-- create table users (id MEDIUMINT NOT NULL AUTO_INCREMENT, name VARCHAR(30), site INTEGER, PRIMARY KEY (id)) 




create table users (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
apelido VARCHAR(30),
site INTEGER,   
PRIMARY KEY (id))





-->