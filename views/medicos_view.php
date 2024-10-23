<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Visualização de Consultas</title>
    <link rel="stylesheet" href="/views/css/medicos_view.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-logo">SP Medical Group</div>
            <div class="header-nav">
                <a href="/views/html/homepaciente.html">Página inicial</a>
            </div>
        </div>

        <h1>Visualização de consultas</h1>

        <input type="text" id="filterInput" placeholder="Filtrar por nome..." onkeyup="filterTable()">

        <table id="consultaTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Maria Silva</td>
                    <td>2024-10-01</td>
                    <td>Concluída</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>João Souza</td>
                    <td>2024-10-05</td>
                    <td>Pendente</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Ana Paula</td>
                    <td>2024-10-10</td>
                    <td>Concluída</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Pedro Lima</td>
                    <td>2024-10-15</td>
                    <td>Cancelada</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function filterTable() {
            const input = document.getElementById('filterInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('consultaTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let match = false;

                for (let j = 0; j < cells.length; j++) {
                    if (cells[j].textContent.toLowerCase().includes(filter)) {
                        match = true;
                        break;
                    }
                }

                rows[i].style.display = match ? '' : 'none';
            }
        }
    </script>
</body>
</html>