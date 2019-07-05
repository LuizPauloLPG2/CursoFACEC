<?php include_once("../../include/header.php"); ?>
<div class="container">

<?php
$sql = ("SELECT * FROM table_cliente WHERE (1 = 1) ");

if (isset($_GET['search'])) {
    $sql .= ("AND nome_cliente LIKE '%" . $_GET['search'] . "%'");
}

$exec = Db::connection()->prepare($sql);
$exec->execute();
$clientes = $exec->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-sm table-striped table-hover border tabela-datatable">
    <thead>
        <tr>
            <th scope="col">#</th>
                <th scope="col">NOME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">STATUS</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $status = null; ?>
            <?php foreach ($clientes as $cliente) { ?>
                
                <!-- Modal -->
                <div class="modal fade" id="detalhes-<?php echo $cliente['id_cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">DETALHES DO CLIENTE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <p> NOME: <strong><?php echo $cliente['nome_cliente']; ?></strong> </p>
                                    <p> CPF: <strong><?php echo $cliente['cpf']; ?></strong> </p>
                                    <p> EMAIL: <strong><?php echo $cliente['email_cliente']; ?></strong> </p>
                                    <p> BIOGRAFIA: <strong><?php echo $cliente['biografia']; ?></strong> </p>
                                    <p> STATUS:  
                                        <strong> 
                                        <?php
                                            if ($cliente['status'] == 'A') {
                                                $status = '<span class="label-status-cliente badge badge-success">ATIVO</span>';
                                            } else {
                                                $status = '<span class="label-status-cliente badge badge-danger">INATIVO</span>';
                                            }
                                            echo $status;
                                        ?> 
                                        </strong> 
                                    </p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">FECHAR</button>
                            </div>
                        </div>
                    </div>
                </div>

                <tr>
                    <th scope="row"> <?php echo $cliente['id_cliente']; ?> </th>
                    <td><?php echo $cliente['nome_cliente']; ?></td>
                    <td><?php echo $cliente['email_cliente']; ?></td>
                    <td><?php echo $status; ?></td>
                    <td class="text-right">
                        <button data-toggle="modal" 
                                data-target="#detalhes-<?php echo $cliente['id_cliente']; ?>" 
                                type="button"
                                class="btn btn-primary btn-sm">DETALHES</button> 

                        <button type="button" 
                                data-id="<?php echo $cliente['id_cliente']; ?>"  
                                class="btn btn-danger btn-sm button_delete_cliente">APAGAR</button> 
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once("../../include/footer.php"); ?>