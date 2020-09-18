<?php
defined('BASEPATH') OR exit('No direct script access allowed');


        class Gestao extends CI_Controller{
        
        
        public function home(){
                //  Apresenta o menu inicial com a lista de produtos e suas respectivas quantidades
                $this->load->view('layout/_header');
                $this->load->view('layout/cabecalho');

                $this->load->model('stock');
                $dados['produtos'] = $this->stock->tudo();
                $this->load->view('stock/inicio', $dados);

                $this->load->view('layout/rodape');
                $this->load->view('layout/_footer');
        }
        // =======================================================

        public function editar($id){
                // editar a designação do produto
                $this->load->view('layout/_header');
                $this->load->view('layout/cabecalho');

                $this->load->model('stock');
                $dados['produto'] = $this->stock->dados_produto($id)[0];
                $this->load->view('stock/editar', $dados);

                $this->load->view('layout/rodape');
                $this->load->view('layout/_footer');

        }

        // =======================================================

        public function editarGuardar($id){
                // executa as operações de atualização dos dados do produto
                $this->load->model('stock');
                $resultado = $this->stock->editar_produto($id);

                // verifica se a operação foi concluida com sucesso
                if(!$resultado['resultado']){
                        $this->load->view('layout/_header');
                        $this->load->view('layout/cabecalho');

                        $this->load->model('stock');
                        $dados['produto'] = $this->stock->dados_produto($id)[0];
                        $dados['mensagem'] = $resultado['mensagem'];
                        $this->load->view('stock/editar', $dados);

                        $this->load->view('layout/rodape');
                        $this->load->view('layout/_footer');
                }else {
                        // voltar a apresentar a pagina inicial com a tabela dos produtos 
                        $this->home();

                }

        }

        // =======================================================

        public function novo(){
                
                $this->load->view('layout/_header');
                $this->load->view('layout/cabecalho');

                // apresenta um formulario para adicionar um novo produto
                $this->load->view('stock/novo');

                $this->load->view('layout/rodape');
                $this->load->view('layout/_footer');
        }

        // =======================================================

        public function novoGravar(){
                // Grava novo produto na base de dados
                $this->load->model('stock');
                $resultado = $this->stock->novo_produto();

                 // verifica se a operação foi concluida com sucesso
                 if(!$resultado['resultado']){
                        $this->load->view('layout/_header');
                        $this->load->view('layout/cabecalho');

                        $this->load->view('stock/novo', $resultado);

                        $this->load->view('layout/rodape');
                        $this->load->view('layout/_footer');
                }else {
                        // voltar a apresentar a pagina inicial com a tabela dos produtos 
                        $this->home();

                }

        }
        
         // =======================================================


         public function eliminar($id, $resposta=false){
                // elimina o produto
                $this->load->model('stock');
                
                // verifica se a operação foi concluida com sucesso
                if(!$resposta){
                        $dados['produto'] = $this->stock->dados_produto($id)[0];

                        // Apresenta a view com a questao
                        $this->load->view('layout/_header');
                        $this->load->view('layout/cabecalho');
                        
                        $this->load->view('stock/eliminar', $dados);


                        $this->load->view('layout/rodape');
                        $this->load->view('layout/_footer');
                }else {
                        // quando é dada resposta
                        $this->stock->eliminar($id);
                        $this->home();

                }

        }

        // =======================================================

        public function adicionar($id){
                // apresenta o quadro para adicionar
                

                // verifica se a operação foi concluida com sucesso
                if(is_null($this->input->post('count_quantidade'))){

                        // apresenta o quadro para adicionar a quantidade
                        $this->load->view('layout/_header');
                        $this->load->view('layout/cabecalho');

                        $this->load->model('stock');
                        $dados['produto'] = $this->stock->dados_produto($id)[0];
                        $this->load->view('stock/adicionar', $dados);

                        $this->load->view('layout/rodape');
                        $this->load->view('layout/_footer');
                }else {
                        // adiciona o valor
                        
                        $this->load->model('stock');
                        $this->stock->alterar_quantidade($id, $this->input->post('count_quantidade'));
                        $this->home();

                }

        }

        // =======================================================

        public function subtrair($id){
                // apresenta o quadro para subtrair
                

                // verifica se a operação foi concluida com sucesso
                if(is_null($this->input->post('count_quantidade'))){

                        // apresenta o quadro para subtrair a quantidade
                        $this->load->view('layout/_header');
                        $this->load->view('layout/cabecalho');

                        $this->load->model('stock');
                        $dados['produto'] = $this->stock->dados_produto($id)[0];
                        $this->load->view('stock/subtrair', $dados);

                        $this->load->view('layout/rodape');
                        $this->load->view('layout/_footer');
                }else {
                        // subtrai o valor
                        
                        $this->load->model('stock');
                        $this->stock->alterar_quantidade($id, -$this->input->post('count_quantidade'));
                        $this->home();

                }

        }

        // =======================================================

        public function movimentos(){
                // apresenta a lista de movimentos
                $this->load->view('layout/_header');
                $this->load->view('layout/cabecalho');

                $this->load->model('stock');
                $dados['movimentos'] = $this->stock->movimentos();
                $this->load->view('stock/movimentos', $dados);

                $this->load->view('layout/rodape');
                $this->load->view('layout/_footer');
        }

        // =======================================================

        public function limparRegistoMovimentos(){
                // limpar tabela de movimentos
        
                $this->load->model('stock');
                $this->stock->limpar_movimentos();
                $this->movimentos();
        }



















}

