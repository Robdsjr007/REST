<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="./main.css">
    <title>Delete</title>
</head>
<body>
    <content>
        <div class="card">
            <table border="1" width="500">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuários</th>
                        <th>Senhas</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include './usuarios_table.php'; ?>
                </tbody>
            </table>
        </div>
    </content>
    <script src="./delete.js"></script>
</body>
</html>
