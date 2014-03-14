<?php

require_once 'db.php';
require_once 'constants.php';
if(isset($_REQUEST['method'])){
    switch($_REQUEST['method']){
        case "products":
        	$section=htmlentities(trim($_REQUEST['section']));
        	if($section=='ALL')
				echo json_encode(Db::getInstance()->products());
			else
				echo json_encode(Db::getInstance()->frontProducts());
		break;
		case "FrontSlide":
			echo json_encode(Db::getInstance()->frontSlide());
		break;
		case "quotes":
			echo json_encode(Db::getInstance()->quotes());
		break;
    }
}
else{
	echo 'Bad Request';
}
?>
