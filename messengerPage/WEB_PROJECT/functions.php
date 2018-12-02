<?php 
  include('Messenger.php'); 
  include('config.php');  
?>


<?php
	error_reporting(E_ALL);
	ini_set('display_errors',1);


	function process_form($post){

		if( ! validate_sender($post['sender'])){
			return array('status' => 0, 'message' => 'Unable to validate sender ID');
		}

		if( ! validate_sender($post['receiver'])){
			return array('status' => 0, 'message' => 'Unable to validate receiver ID');
		}

		$validation = validate_data($post);

		$data = $validation['data'];

		if( ! process_database( $data ) ){
			return array('status' => 0, 'message' => 'Unable to process database request');
		}

		return array('status'=> 1);
	}



	function validate_sender($sender){
		if( ! empty($sender)){
			return true;
		}
		return false;
	}


	function validate_receiver($receiver){
		if( ! empty($receiver)){
			return true;
		}
		return false;
	}



	function validate_data($post){

		global $whitelist;

		foreach( $whitelist as $key ){
			$fields[$key] = $post[$key];
		}

		$errors = array();

		foreach ($fields as $field => $data){
			if( empty( $data )){
				$errors[] = "Please enter your ", $field;
			}
		}


		if ( empty($errors)){
			return array('status' => 1, 'data' => $fields);
		} else {
			return array('status' => 0 'data' => $errors);
		}
	}



	function process_database($post){
		global $table;


		$mysql = new mysqli('localhost','root', '', 'lybl');


		if ($mysql->connect_error){
			return false;
		} else {
			if( $statement = $mysql->prepare( "INSERT INTO $table (sender,receiver,message) VALUES (?,?,?)" )){
				$statement->bind_param("sss", $sender, $receiver, $message);

				$sender = $_POST['sender'];
				$receiver = $_POST['receiver'];
				$message = $_POST['message'];

				if(! $statement->execute()){
					return false
				}
			} else {
				//var_dump($mysql->error); exit;
				return false;
			}
		}
		return true;
	}




	function validate_input($input_name){
		global $sent;

		if(empty($_POST)){
			return '';
		}

		//Makes the data fields blank after being sent
		if($sent){
			return '';
		}

		return _e($_POST[$input_name]);
	}




	function _e($string){
		return htmlentities($string, ENT_QUOTES, 'UTF-8',false);
	}


?>