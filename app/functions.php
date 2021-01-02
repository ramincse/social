<?php
/**
 * File Uploading System
 */
function fileUpload( $file, $location = '', $file_format = ['jpg', 'png', 'gif', 'jpeg'], $file_type = null ){
	//File Info
	$file_name 		= $file['name'];
	$file_name_tmp 	= $file['tmp_name'];

	//File Extension
	$file_array 	= explode('.', $file_name);
	$file_extension = strtolower( end($file_array) );

	//File Type
	if ( !isset( $file_type['type'] ) ) {
		$file_type['type'] = 'image';
	}

	//File Default Value
	if ( !isset( $file_type['file_name'] ) ) {
		$file_type['file_name'] = '';
	}
	if ( !isset( $file_type['fname'] ) ) {
		$file_type['fname'] = '';
	}
	if ( !isset( $file_type['lname'] ) ) {
		$file_type['lname'] = '';
	}

	//File name with type
	if ( $file_type['type'] == 'image' ) {
		$file_unique_name = md5( time() . rand() ) . '.' . $file_extension;
	}elseif( $file_type['type'] == 'file' ){
		$file_unique_name = date('d_m_Y_g_h_s') . '_' . $file_type['file_name'] . '_' . $file_type['fname'] . '_' . $file_type['lname'] . '.' . $file_extension;
	}	

	//Check File Format
	$mess = '';
	if ( in_array($file_extension, $file_format) == false ) {
		$mess = '<p class="alert alert-danger">Invalid file format ! <button class="close" data-dismiss="alert">&times;</button></p>';
	}else{
		move_uploaded_file( $file_name_tmp, $location . $file_unique_name );
	}

	// Return Fila name and Message
	return [
		'mess' 		=> $mess,
		'file_name' => $file_unique_name,
	];	
}

	/**
	 * Data Check
	 */
	function dataCheck($conn, $col_name, $data, $tbl )
	{
		$sql = "SELECT * FROM $tbl WHERE $col_name='$data'";
		$data = $conn -> query($sql);
		$num = $data -> num_rows;

		if ( $num > 0 ) {
			return false;
		}else{
			return true;
		}
	}

	/**
	 * Form old data refill
	 */
	function old($field_name){
		if ( isset($field_name) ) {
			if ( isset($_POST[$field_name]) ) {
				echo $_POST[$field_name];
			}			
		}
	}
?>