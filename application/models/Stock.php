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
            
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        }