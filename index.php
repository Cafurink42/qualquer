
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
            border: 1px black ;
        }
        .container{
            border:1px solid black;
            width: 600px;
            text-align: center;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <form action = "index.php" method="post">
        <label>Nome</label>
        <input type  = "text" name  = "nome" required>
        <br>
        <br>
        <label>Historia</label>
        <textarea name  = "historia" required></textarea>
        <br>
        <br>
        <input type  = "submit" value = "Enviar história">
    </form>
<br>
<br>
<br>
<div class = "container">
<?php
$server_name = "localhost";
$username = "root";
$password = "";
$dbname = "testes";

$conn = new mysqli ($server_name, $username, $password, $dbname);

$name = $_POST["nome"];
$history= $_POST["historia"];

if($conn->connect_error){
    die("Erro na conexão com o banco de dados". $conn->connect_error);
}else{
    $insert_db  = "INSERT INTO usuarios (nome, historia) VALUES ('$name', '$history')";
    echo "História enviada com sucesso !";
}
$data_base = mysqli_query($conn, $insert_db);


$consulta = "SELECT * FROM usuarios";

$result = mysqli_query($conn, $consulta);

    while ($linha = mysqli_fetch_assoc($result)){
        echo "ID: " .$linha["id"] . "<br>";
        echo "Nome: " .$linha["nome"] ."<br>";
        echo "Historia: " .$linha["historia"] . "<br>";
        //echo "data/hora: " .$linha['datahora'].Date("Y-m-d H:i:s");
    }
    mysqli_free_result($result);

$conn->close();

?>
</div>
    
</body>
</html>