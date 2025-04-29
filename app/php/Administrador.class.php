<?php

    require_once("Usuario.class.php");
    require_once("Departamento.class.php");
    require_once("Produto.class.php");
    require_once("Venda.class.php");
    require_once("Cupom.class.php");

    class Administrador{

        public $usu;
        public $dep;
        public $pro;
        public $ven;
        public $cup;

        public function __construct(){
        
            $this->usu = new Usuario();
            $this->dep = new Departamento();
            $this->pro = new Produto();
            $this->ven = new Venda();
            $this->cup = new Cupom();
            
        }

        public function mesSigla($mes){
            switch ($mes) {
                case 1: $mes = "Jan"; break;
                case 2: $mes = "Fev"; break;
                case 3: $mes = "Mar"; break;
                case 4: $mes = "Abr"; break;
                case 5: $mes = "Mai"; break;
                case 6: $mes = "Jun"; break;
                case 7: $mes = "Jul"; break;
                case 8: $mes = "Ago"; break;
                case 9: $mes = "Set"; break;
                case 10: $mes = "Out"; break;
                case 11: $mes = "Nov"; break;
                case 12: $mes = "Dez"; break;
            }
            return $mes;
        }

        public function fileArq(&$file_post){

                $file_ary = array();
                $file_count = count($file_post['name']);
                $file_keys = array_keys($file_post);
            
                for ($i=0; $i<$file_count; $i++) {
                    foreach ($file_keys as $key) {
                        $file_ary[$i][$key] = $file_post[$key][$i];
                    }
                }
            
                return $file_ary;
            
        }

        public function dataHora($valor){
            $data = explode("-",substr($valor, 0, -9));
            $hora = substr($valor, 11);
            return array($data[2]."/".$data[1]."/".$data[0], $hora);
        }

    }

?>