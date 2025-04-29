<?php

	class BancoDeDados{

		private $ser = "127.0.0.1";
		private $usu = "u134451290_paulo";
		private $sen = "P@ulo6085";
		private $dat = "u134451290_bd_xoxo";

		private $mysqli;
		private $result;
		
		public function __get($var){
			return $this->$var;
		}

		public function conectar(){
			$this->mysqli = new mysqli($this->ser, $this->usu, $this->sen, $this->dat);
			$b = true;
			if(mysqli_connect_errno()){
				echo "Erro: ".mysqli_connect_error();
				$b = false;
			}
			return $b;
		}

		public function desconectar(){
			$b = true;
			if(!$this->mysqli->close()){
				$b = false;
			}
			return $b;
		}

		public function query($sql){
			$b = true;
			if(!$this->mysqli->query($sql)){
				$b = false;
			}
			return $b;
		}

		public function result($sql){
			$this->result = $this->mysqli->query($sql);
		}

	}

?>