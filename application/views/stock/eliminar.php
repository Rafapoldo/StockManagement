<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 col-12">
            <div class="card p-4 text-center">
                <h4><?php echo $produto['designação'];?></h4>
                <p>Deseja mesmo eliminar?</p>
                <div class="pt-3 pb-3"></div>
                <a href="<?php echo site_url('gestao/home');?>" class="btn btn-primary">Cancelar</a>
                <a href="<?php echo site_url('gestao/eliminar/'.$produto['id_produto'].'/true');?>" class="btn btn-primary">Eliminar</a>

                
            
            
            </div>
        </div>
    </div>

</div>