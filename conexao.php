<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:camilaf.database.windows.net,1433; Database = loja", "camDB", "Camila050406");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "camDB", "pwd" => "Camila050406", "Database" => "loja", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:camilaf.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Recupera os dados do formulário
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['senha'];

// Insere os dados no banco de dados
$sql = "INSERT INTO contato (nome, email, senha) VALUES ('$name', '$email', '$senha')";
if ($conn->query($sql) === TRUE) {
    echo "Mensagem enviada com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
