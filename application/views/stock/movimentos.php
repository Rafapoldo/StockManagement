<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container pt-3 pb-3">
    <div class="row">
        <div class="col-6">
            <a href="<?php echo site_url('gestao/home');?>" class="btn btn-primary">Voltar</a>
        </div>
        <div class="col-6 text-right">
             <a href="<?php echo site_url('gestao/limparregistomovimentos');?>" class="btn btn-primary">Limpar registros de movimentos</a>   
        </div>    
        
    </div>
    <hr>
    <?php if(count($movimentos)==0) :   ?>
    <div class="text-center pt-2 pb-2">
        Não existem movimentos!
    </div>
    <?php else: ?>

    <table class="table table-striped">
        <thead class="thead-dark">
            <th>Data</th>
            <th>Produto</th>
            <th>Movimento</th>
        </thead>

        <?php foreach ($movimentos as $movimento): ?>
        <tr>   
            <td><?php echo $movimento['data_hora'] ?></td>
            <td><?php echo $movimento['designação'] ?></td>
            <td><?php echo $movimento['quantidade'] ?></td>
        </tr> 
        <?php endforeach; ?>  

    </table>

    <hr>

    <p>movimentos: <b><?php echo count($movimentos)?></b></p>
    
    <?php endif;?>


</div>

            
                 

                
            
            
            