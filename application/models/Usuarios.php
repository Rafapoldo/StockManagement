<?php
defined('BASEPATH') OR exit('No direct script access allowed');


        class Usuarios extends CI_Model{


            public function verificar_login(){
                // Verifica se os dados intoduzidos no quadro de login sao validos

                // Metodo sem query builder (para outros metodos ver o video aula numero 031 do João)
                $parametros = [
                    $this->input->post('text_usuario'),
                    md5($this->input->post('text_senha'))

                ];
                $resultado = $this->db->query('SELECT * FROM users WHERE user = ? AND password = ?', $parametros);

                // =================================================

                if($resultado->num_rows()==0){
                    // login Invalido
                    return false;
                }else {
                    // Login Valido

                    // Abre a sessão com dados do usuario
                    $dados_usuario = $resultado->row();
                    $this->session->set_userdata('id_user', $dados_usuario->id_user);
                    $this->session->set_userdata('user', $dados_usuario->user);
                    return true;

                }
            }

            
        }