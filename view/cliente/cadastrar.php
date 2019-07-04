<?php include_once("../../include/header.php"); ?>
<div class="container jumbotron conteudo-cadastro-cliente mt-2">
    <a class="btn btn-primary" href="../cliente/">LISTAR CLIENTES</a> 
    <hr>
    <div class="titulo-cadastro-cliente">
        Cadastro de cliente!
    </div>
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
                    <label for="NOME">NOME</label>
                    <input type="text" name="NOME" id="NOME" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="CPF">CPF</label>
                    <input type="text" name="CPF" id="CPF" maxlength="14" class="form-control mask_cpf">
                </div>
                <div class="form-group col-md-6">
                    <label for="EMAIL">EMAIL</label>
                    <input type="email" name="EMAIL" id="EMAIL" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="BIOGRAFIA">BIOGRAFIA</label>
                    <input type="text" name="BIOGRAFIA" id="BIOGRAFIA" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="STATUS">STATUS</label>
                    <select name="STATUS" id="STATUS" class="form-control">
                        <option value="">SELECIONE...</option>
                        <option value="A">ATIVO</option>
                        <option value="I">INATIVO</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-success btn-block" type="submit">CADASTRAR</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once("../../include/footer.php"); ?>
