<?php
defined('BASEPATH') OR exit('No direct script access allowed');


        class Stock extends CI_Model{



            public function tudo(){
                //    vai buscar toda a informação de produtos
                return $this->db->get('produtos')->result_array();
                // isso é a mesma coisa que 'SELECT * FROM produtos'
            }

    
            // ==============================================================================


            public function dados_produto($id){
                // retorna os dados do produto
                return $this->db->from('produtos')->where('id_produto', $id)->get()->result_array();
            }

            // ==============================================================================

            public function editar_produto($id){
                // executa as operaçoes de edição dos dados do produto

                // verifica se ja existe produto com o mesmo nome

                $designacao = $this->input->post('text_designação');
                $resultado = $this->db->from('produtos')
                                       ->where('id_produto<>', $id)
                                       ->where('designação', $designacao)
                                       ->get();
                if($resultado->num_rows()!=0){
                    return array(
                        'resultado' => false,
                        'mensagem' => 'Já existe outro produto com o mesmo nome.'
                    );
                }

                // Atualiza os dados do produto
                $this->db->set('designação', $designacao)
                         ->where('id_produto', $id)
                         ->update('produtos');
                return array(
                    'resultado' => true,
                    'mensagem' => ''
                );
            }

            
            // ==============================================================================

        public function novo_produto(){
            //grava um  novo produto na base de dados

            // verifica se ja existe produto com o mesmo nome

            $designacao = $this->input->post('text_designação');
            
            $resultado = $this->db->from('produtos')
                                    ->where('designação', $designacao)
                                    ->get();
                                   
            if($resultado->num_rows()!=0){
                return array(
                    'resultado' => false,
                    'mensagem' => 'Já existe um produto com a mesma designação'
                );
            }
            // Grava o novo produto
            $dados = array(
                'designação' => $designacao,
                'quantidade' => 0

            );
            $this->db->insert('produtos', $dados);
                     
            return array(
                'resultado' => true,
                'mensagem' => ''
            );

            
        }

            // ==============================================================================

            public function eliminar($id){
                // elimina o produto

             $this->db->delete('produtos', array('id_produto' => $id));
        
        
        
        }

        // ==============================================================================

         public function alterar_quantidade($id, $quantidade){
            // altera a quantidade de produtos e registra o movimento

            // altera a quantidade do produto
            $this->db->where('id_produto', $id)
                      ->set('quantidade', 'quantidade + '.$quantidade, FALSE) 
                      ->update('produtos');
            
            // adiciona nova entrada em movimentos
    
            $dados = array(
                'id_produto' => $id,
                'quantidade' => $quantidade,
                'data_hora' => date('Y-m-d H:i:s')
            );
            $this->db->insert('movimentos', $dados);
        }

        
        // ==============================================================================

        public function movimentos(){
                // retorna a tabela de movimentos
            
            $resultados = $this->db->select('m.*, p.designação designação, p.quantidade temp')
                                   ->from('movimentos as m')
                                   ->join('produtos as p', 'm.id_produto = p.id_produto', 'left')
                                   ->get();
            return $resultados->result_array();
        }
        
        // ==============================================================================

        public function limpar_movimentos(){
            // limpa o resgistro de mvimentos 
            $this->db->empty_table('movimentos');
            $this->db->query('ALTER TABLE movimentos AUTO_INCREMENT = 1');
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
}

            
            
           
