<?php include_once("../../include/header.php"); ?>
<div class="container mt-5">
    <!-- get URL -->
    <!-- post PRIVADO -->

    <form method="get">
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" name="search" class="form-control" placeholder="PESQUISAR...">
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-success">PESQUISAR</button>
            </div>
            <div class="form-group col-md-6 text-right">
                <a class="btn btn-primary" href="cadastrar.php">CADASTRAR NOVO</a>
            </div>
        </div>
    </form>
    <?php
    $sql = ("SELECT * FROM table_cliente WHERE (1 = 1) ");

    if (isset($_GET['search'])) {
        $sql .= ("AND nome_cliente LIKE '%" . $_GET['search'] . "%'");
    }

    $exec = Db::connection()->prepare($sql);
    $exec->execute();
    $clientes = $exec->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente) { ?>
                <tr>
                    <th scope="row"> <?php echo $cliente['id_cliente']; ?> </th>
                    <td><?php echo $cliente['nome_cliente']; ?></td>
                    <td><?php echo $cliente['email_cliente']; ?></td>
                    <td>
                        <?php
                        if ($cliente['status'] == 'A') {
                            echo '<span class="badge badge-success">ATIVO</span>';
                        } else {
                            echo '<span class="badge badge-danger">INATIVO</span>';
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once("../../include/footer.php"); ?>