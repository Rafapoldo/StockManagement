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
        
        
        
}

