<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <style>
*{
  text-decoration: none;
  color: black;
}

body{
    width: 100vw;
    height: 100vh;
}

button{
  margin-bottom: 50px;
}

table{
  width: 100vw;
  margin-bottom: 10px;
}
th{
 border: 1px solid black;
 background-color: darkblue;
 color: white;
}
td{
 border: 1px solid black;
}
    </style>
</head>
<body>
    <button><a href="index.html">Voltar a Página principal</a></button>
    
    <?php
          $json = file_get_contents('../users.txt');
          $usuarios = json_decode($json);

          echo "<table>";
          echo "<tr><th>IDs</th><th>Emails</th><th>Senhas</th></tr>";

          $i = 0;
          
        while (isset($usuarios[$i])) {

        echo "<tr>";
        echo "<td>" . $usuarios[$i]->id . "</td>";
        echo "<td>" . base64_decode($usuarios[$i]->email) . "</td>";
        echo "<td>" . base64_decode($usuarios[$i]->senha) . "</td>";
        echo "</tr>";
      
        $i++;
      } 
          echo "</table>";
        ?>
</body>
</html>