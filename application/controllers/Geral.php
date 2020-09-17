<?php
defined('BASEPATH') OR exit('No direct script access allowed');


        class Geral extends CI_Controller{

            //==============================================

            public function index(){


                // no caso de existir sessao ativa, apresenta o menu inicial
                if($this->session->has_userdata('id_user')){
                    $this->menuInicial();
                }else{
                    $this->quadroLogin();
                }
               
                
            }
                
               
            //==============================================

            public function quadroLogin(){
                // no caso de existir sessao ativa, apresenta o menu inicial
                if($this->session->has_userdata('id_user')){
                    $this->menuInicial();
                }
                $this->load->view('layout/_header');
                $this->load->view('layout/cabecalho');

                $this->load->view('usuarios/login');

                $this->load->view('layout/rodape');
                $this->load->view('layout/_footer');

            }
            //==============================================

            public function menuInicial(){
                // apresenta o menu inicial no caso de existir uma sessao ativa
                if(!$this->session->has_userdata('id_user')){
                    $this->quadroLogin();
                }else {
                    redirect('gestao/home');

                }

            }



            //==============================================

            public function verificarLogin(){

                // verifica se foi feito corretamente o login
                if($this->session->has_userdata('id_user')){
                    $this->menuInicial();
                } else {

                    // Verifica se foi feito login correto
                    $this->load->model('usuarios');
                    if($this->usuarios->verificar_login()){
                        $this->menuInicial();
                    } else{
                            // login invalido
                            $this->loginInvalido();
                        }
                

                }
               
            }//==============================================

            public function loginInvalido(){
                // verifica se foi feito corretamente o login
                if($this->session->has_userdata('id_user')){
                    $this->menuInicial();
                } else {
                    $this->load->view('layout/_header');
                    $this->load->view('layout/cabecalho');
                    $dados = [
                        'mensagem' => "Login Invalido",
                        'tipo'     => 'danger',
                        'link'     => 'geral'
                    ];
                    $this->load->view('layout/mensagem', $dados);
                    $this->load->view('usuarios/login');
                    $this->load->view('layout/rodape');
                    $this->load->view('layout/_footer');


                }

            }//==============================================
                
            public function logout(){
                // Executa o logout do user
                if($this->session->has_userdata('id_user')){
                    // remove os dados da sessao
                    $this->session->unset_userdata('id_user');
                    $this->session->unset_userdata('user');
                }
                // volta ao quadro de login

                $this->menuInicial();

            }

            //==============================================
            
            public function setup(){
                $this->load->view('layout/_header');
                $this->load->view('layout/cabecalho');


                $this->load->view('setup/setup');
            

                $this->load->view('layout/rodape');
                $this->load->view('layout/_footer');
                
            }

            //==============================================
            
            public function resetdb(){
                // limpar todos os dados da db
                // carrega o arquivo 
                $this->load->model('basedados');
                // executa a função dentro dele
                $this->basedados->reset();

                // Apresenta a View
                $this->load->view('layout/_header');
                $this->load->view('setup/setup');

                $dados = [
                    'mensagem' => 'Sistema base de dados reiniciado com sucesso!',
                    'tipo' => 'success'
                ];
                $this->load->view('layout/mensagem', $dados);
                $this->load->view('layout/_footer');




            }

             //==============================================
            
             public function inserirusuarios(){
               
                // insere usuarios na base de dados 
                $this->load->model('basedados');
                // executa a função dentro dele
                $this->basedados->inserir_usuarios();

                
                // Apresenta a View
                $this->load->view('layout/_header');
                $this->load->view('setup/setup');

                $dados = [
                    'mensagem' => 'Usuários inseridos com sucesso!',
                    'tipo' => 'success'
                ];
                $this->load->view('layout/mensagem', $dados);
                $this->load->view('layout/_footer');


            }

            //==============================================
            
            public function inserirprodutos(){
               
                // insere produtos na base de dados 
                $this->load->model('basedados');
                // executa a função dentro dele
                $this->basedados->inserir_produtos();

                
                // Apresenta a View
                $this->load->view('layout/_header');
                $this->load->view('setup/setup');

                $dados = [
                    'mensagem' => 'Produtos inseridos com sucesso!',
                    'tipo' => 'success'
                ];
                $this->load->view('layout/mensagem', $dados);
                $this->load->view('layout/_footer');


            }








        }
?>