<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-sm-8 col-12 text-left">
                <a href="<?php echo site_url('gestao/novo')?>" class="btn btn-primary">Novo Produto...</a>
                <a href="<?php echo site_url('gestao/movimentos')?>" class="btn btn-primary">Movimentos...</a>
            </div>
            <div class="col-sm-4 col-12 text-right">
                <a href="<?php echo site_url('geral/logout')?>" class="btn btn-primary">Logout</a>
            </div>
        </div>

        <hr>

        <div class="mt-3 mb-3">
            <?php if(count($produtos)==0)  : ?>
                <p class="text-center"> Não existem produtos registrados.</p>
            <?php else : ?> 
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <th class="text-left">Produto</th>
                        <th class="text-center">Quantidade</th>
                        <th></th>
                    </thead>


                    <?php foreach($produtos as $produto) : ?>
                        <tr>
                            <td class="text-left">
                                <a href="<?php echo site_url('gestao/editar/'.$produto['id_produto']) ?>" class="mr-3"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-brush-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z"/>
                                </svg></a>
                                <?php echo $produto['designação'] ?>
                            </td>

                            <td class="text-center">
                                <?php echo $produto['quantidade'] ?>
                            </td>

                            <td class="text-right">
                                <a href="<?php echo site_url('gestao/adicionar/'.$produto['id_produto']) ?>" class="mr-3"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg></a>
                               
                                <a href="<?php echo site_url('gestao/subtrair/'.$produto['id_produto']) ?>" class="mr-3"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm2.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                                </svg></a>
                                
                                <a href="<?php echo site_url('gestao/eliminar/'.$produto['id_produto']) ?>" class="mr-3"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                </svg></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>   
                </table>


            <hr>
            <p>Total Produtos: <b><?php echo count($produtos); ?></b></p>


            <?php endif; ?>

        </div>
        
        
</div>






