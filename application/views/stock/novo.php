<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 col 12">
            <div class="card p-4">
                <h3>Novo Produto</h3>
                <hr>

                <form action="<?php echo site_url('gestao/novogravar')?>" method="post">
                    <div class="form-group">
                        <label for="">Designação:</label>
                        <input type="text"
                                name="text_designação"
                                class="form-control"
                                placeholder="Designação"
                                required
                                >
                            

                    </div>
                                
                    <?php if(isset($mensagem)) :   ?>
                    <div class="alert alert-danger text-center">
                        <?php echo $mensagem; ?>
                    </div>
                    <?php endif; ?>


                    <div class="text-center">
                        <a href="<?php echo site_url('gestao/home'); ?>" class="btn btn-primary">Cancelar</a>
                        <button class="btn btn-primary" type="submit">Gravar</button>
                    </div>
                                 
                
                
                
                
                </form>
            
            
            </div>
        </div>
    </div>

</div>