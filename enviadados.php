<?php
 
/* Verificar se o formulário foi submetido */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apelido = filter_input(INPUT_POST, 'apelido');
    // $lastname = filter_input(INPUT_POST, 'lastname');
    $site = filter_input(INPUT_POST, 'site');
 
    /* validar os dados recebidos do formulario */
    if (empty($apelido) || empty($site)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }    

    /* validar os dados recebidos do formulario */
    // if (empty($apelido) || empty($lastname) || empty($email)){
    //     echo "Todos os campos do formulário devem conter valores ";
    //     exit();
    // }    
}
else{
   echo " Erro, formulário não submetido ";
   exit();
}
 
 
/* estabelece a ligação à base de dados */
$ligacao = new mysqli("localhost", "root", "", "admin_prod");
 
/* verifica se ocorreu algum erro na ligação */
if ($ligacao->connect_errno) {
    echo "Falha na ligação: " . $ligacao->connect_error; 
    exit();
}
    
//$consulta = "INSERT INTO users (apelido, lastname, email) VALUES ('$apelido', '$lastname', '$email' )";
$consulta = "INSERT INTO users (apelido, site) VALUES ('$apelido', '$site' )";

 
/* executar a consulta e testar se ocorreu erro */
if (!$ligacao->query($consulta)) {
    echo " Falha ao executar a consulta: \"$consulta\" <br>" . $ligacao->error;
    $ligacao->close();  /* fechar a ligação */
}
else{
    /* percorrer os registos (linhas) da tabela e mostrar na página */
    echo " Novo registo inserido com sucesso" ;
    echo "<br>" ;
    echo '<a href="index.php">voltar</a>';
    }
 
$ligacao->close();       /* fechar a ligação */

 
?>

