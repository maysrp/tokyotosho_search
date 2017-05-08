<?php
	class tokyo{
		public $tokyo;
		public function __construct(){
			$this->tokyo = new medoo([
    				'database_type' => 'mysql',
 				    'database_name' => 'tokyo',
 				    'server' => 'localhost',
 			        'username' => 'root',
  				    'password' => '',
			        'charset' => 'utf8',
   			 		'port' => 3306,
    				'prefix' => 'info_',
			]);
		}
		public function search($name,$start=0,$num){
			$num=(int)$num;
			$start=(int)$start;
			$name=trim($name);
			$where['name[~]']=$name;
			$where['LIMIT']=array($start,$num);
			$info=$this->tokyo->select('tokyo','*',$where);
			$this->json($info);
		}
		public function json($info){
			header('Content-type:text/json');
			echo json_encode($info);
		}



	}