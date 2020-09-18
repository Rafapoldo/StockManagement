<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-8 offset-sm-2 col 12">
            <div class="card p-4">
                <h4><?php echo $produto['designação']?></h4>
                <p>Quantidade atual:<?php echo $produto['quantidade']?> </p>
                <hr>

                <form action="<?php echo site_url('gestao/subtrair/'.$produto['id_produto'])?>" method="post">
                    <div class="form-group">
                        <div class="col-sm-2 offset-sm-5 col-4 offset-4">
                            <input type="number"
                                name="count_quantidade"
                                class="form-control"
                                placeholder="Designação"
                                value="1"
                                min="1"
                                max="1000"
                                >
                                
                        </div>   

                    </div>


                    <div class="text-center">
                        <a href="<?php echo site_url('gestao/home'); ?>" class="btn btn-primary">Cancelar</a>
                        <button class="btn btn-primary" type="submit">Subtrair</button>
                    </div>
                                 
                
                
                
                
                </form>
            
            
            </div>
        </div>
    </div>

</div>