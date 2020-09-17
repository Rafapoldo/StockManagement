<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <div class="row m-5">
        <div class="col-sm-6 offset-sm-3 col-8 offset-2">
            <div class="card p-4 text-center">
                <h3>SETUP</h3>

                <div class="text-center m-2">
                    <a href="<?php echo site_url('geral/resetdb')?>" class="btn btn-primary">Reiniciar</a>
                </div>

                <div class="text-center m-2">
                    <a href="<?php echo site_url('geral/inserirusuarios')?>" class="btn btn-primary">Inserir Usuario</a>
                </div>

                <div class="text-center m-2">
                    <a href="<?php echo site_url('geral/inserirprodutos')?>" class="btn btn-primary">Inserir Produto</a>
                </div>



                <div class="text-center m-2">
                    <a href="<?php echo site_url('geral')?>" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>

</div>