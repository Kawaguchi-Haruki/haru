<?php

//$name    = $_POST['name'];
//$comment = $_POST['comment'];


//�ҏW�ԍ��t�H�[���ɗL���Ȓl���^����ꂽ�ꍇ�ɂ��Ă̂ݎ��s����B

if(!empty($_POST['hensyu'])){
	$hen = $_POST['hensyu'];
	$filedata = file('./text2-6.txt');
	//
	
	$fp = fopen('./text2-6.txt','r');
	
	foreach($filedata as $line){
		//�ҏW�w��ԍ��ƈ�v���������̎����ƃR�����g�𔲂��o���B
		$data = explode('><',$line);
//		echo $data[0];
		if($data[0] == $hen){
			$hnum     = $data[0];
			$hname    = $data[1];
			$hcomment = $data[2];
			echo $hname;
			echo $hcomment;
		}
	}
	fclose($fp);

}else{
}


?>


<?php


//�ҏW�ԍ��t�H�[���ɗL���Ȓl���^����ꂽ�ꍇ�ɂ��Ă̂ݎ��s����B

if(!empty($_POST['hname2']) and !empty($_POST['hcomment2'])){
	$hname2    = $_POST['hname2'];
	$hcomment2 = $_POST['hcomment2'];
	$htime     = date('Y.m.d.H:i:s');
	$hfiledata = file('./text2-6.txt');
	$hnum2     = $_POST['hnum2'];
	echo $hname2;
	echo $hcomment2;
	
	$hfp = fopen('./text2-6.txt','w+');
	
	foreach($hfiledata as $line){
		//�ҏW�w��ԍ��ƈ�v���������̎����ƃR�����g�𔲂��o���B
		$hdata = explode('><',$line);
//		echo $data[0];
		if($hdata[0] == $hnum2){
			fputs($hfp, "$hnum2><$hname2><$hcomment2><$htime"."\n");
		}else{
			fputs($hfp, $line);
		}
	}
	fclose($hfp);
	header('Location: mission_2-6.php');
	exit;

}else{
}

?>


<html>

<head>
<meta charset = "UFT-8">
<title>�l�̍ד�</title>
</head>

<body>

<h1>�l�̍ד� �ҏW</1h>

<form action = 'mission_2-6-2.php' method = 'post'>
����<input type = 'text' name = 'hname2' value = "<?= $hname ?>" ></br>
�R�����g<input type = 'text' name = 'hcomment2' value = "<?= $hcomment ?>"></br>
<input type="hidden" name="hnum2" value="<?= $hnum ?>">
<input type = 'submit' value ='���M'>
</form>



</body>
</html>
