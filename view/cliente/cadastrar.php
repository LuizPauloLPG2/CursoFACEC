<?php include_once("../../include/header.php"); ?>
<div class="container jumbotron conteudo-cadastro-cliente">
    <div class="titulo-cadastro-cliente">
        Cadastro de cliente!
    </div>
    <hr>
    <?php if(isset($_GET['erro'])){ ?>
        <div class="alert alert-danger" role="alert"><?php echo $_GET['msg']; ?></div>
    <?php } ?>
    <?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-success" role="alert"> CADASTRADO COM SUCESSO! </div>
    <?php } ?>
    <div class="formulario-cadastro-cliente">
        <form action="../../model/cliente/post.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="text" name="NOME" id="NOME" class="form-control" placeholder="NOME">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="CPF" id="CPF" maxlength="14" class="form-control mask_cpf" placeholder="CPF">
                </div>
                <div class="form-group col-md-6">
                    <input type="email" name="EMAIL" id="EMAIL" class="form-control" placeholder="EMAIL">
                </div>
                <div class="form-group col-md-6">
                    <select name="STATUS" id="STATUS" class="form-control">
                        <option value="">SELECIONE STATUS...</option>
                        <option value="A">ATIVO</option>
                        <option value="I">INATIVO</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <textarea name="BIOGRAFIA" id="BIOGRAFIA" class="form-control" rows="3" placeholder="BIOGRAFIA"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-success btn-block" type="submit">CADASTRAR</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once("../../include/footer.php"); ?>
