<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Clientes</h3>

            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

    <form action="http://<?php echo APP_HOST; ?>/cliente/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nome">Nome do cliente</label>
                    <input type="text" class="form-control"  name="nome" placeholder="Seu nome" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="nome">Telefone</label>
                    <input type="text" class="form-control"  name="telefone" placeholder="Seu nome" value="<?php echo $Sessao::retornaValorFormulario('telefone'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="nome">Data de nascimento</label>
                    <input type="text" class="form-control"  name="dtnasc" placeholder="Seu nome" value="<?php echo $Sessao::retornaValorFormulario('dtnasc'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="nome">CPF</label>
                    <input type="text" class="form-control"  name="cpf" placeholder="Seu nome" value="<?php echo $Sessao::retornaValorFormulario('cpf'); ?>" required>
                </div>
               

                <button type="submit" class="btn btn-success btn-sm">Enviar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>