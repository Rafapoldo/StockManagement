<?php
defined('BASEPATH') OR exit('No direct script access allowed');


        class Basedados extends CI_Model{

            public function reset(){
                // faz um reset na base de dados

                // elimina todos os dados das tabelas
                $this->db->empty_table('users');
                $this->db->empty_table('produtos');

                // recomeça o AUTO_INCRMENT
                $this->db->query('ALTER TABLE users AUTO_INCREMENT = 1');
                $this->db->query('ALTER TABLE produtos AUTO_INCREMENT = 1');
                $this->db->query('ALTER TABLE movimentos AUTO_INCREMENT = 1');
                
            }
               
            
            // ===================================================================

            public function inserir_usuarios(){
                // insere usuarios na base de dados

                $dados = [ 
                    'user' => 'admin',
                    'password' => md5('admin')
                ];
                $this->db->insert('users', $dados);

                $dados = [ 
                    'user' => 'ana',
                    'password' => md5('ana')
                ];
                $this->db->insert('users', $dados);

                $dados = [ 
                    'user' => 'rui',
                    'password' => md5('rui')
                ];
                $this->db->insert('users', $dados);
            }


            // ==================================================================

            public function inserir_produtos(){

                // Insere produtos na base de dados 
                // Apaga todos os dados da tabela dos produtos e acrescenta o AUTO_INCREMENT
                $this->db->empty_table('produtos');
                $this->db->query('ALTER TABLE produtos AUTO_INCREMENT = 1');

                $dados = [
                    ['designação' => 'CPUs'             , 'quantidade' => 10],
                    ['designação' => 'Memórias'         , 'quantidade' => 20],
                    ['designação' => 'Monitores'        , 'quantidade' => 30],
                    ['designação' => 'Disco Rigidos'    , 'quantidade' => 40],
                ];

                $this->db->insert_batch('produtos', $dados);

                // Adiciona 10 produtos de cada um destes elementos
                // Limpa a base de dados dos movimentos

                $this->db->empty_table('movimentos');
                $this->db->query('ALTER TABLE movimentos AUTO_INCREMENT = 1');


                $dados = array(
                    [
                        'id_produto' => 1,
                        'quantidade' => 10,
                        'data_hora'  => date('Y-m-d H:m:s')


                    ],

                    [
                        'id_produto' => 2,
                        'quantidade' => 20,
                        'data_hora'  => date('Y-m-d H:m:s')


                    ],

                    [
                        'id_produto' => 3,
                        'quantidade' => 30,
                        'data_hora'  => date('Y-m-d H:m:s')


                    ],

                    [
                        'id_produto' => 4,
                        'quantidade' => 40,
                        'data_hora'  => date('Y-m-d H:m:s')


                    ],
                );

                $this->db->insert_batch('movimentos', $dados);
            }








        }