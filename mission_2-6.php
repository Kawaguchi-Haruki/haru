<?php
//���ꂼ��̃f�[�^���E���ĕϐ��Ɋi�[
$name    = $_POST['name'];
$comment = $_POST['comment'];
$pass    = $_POST['pass'];

//���M�����̊֐�
$time = date('Y.m.d.H:i:s');

//�s�����擾
$dataFile = 'text2-6-0.txt';


//�t�@�C���̗L���ŏ�������
if (file_exists($dataFile)){
//��������
	if(!empty($_POST['name']) and !empty($_POST['comment'])){
		echo "$name,$comment";
		$num =  count(file($dataFile));
		$numx = $num + 1;
		//comment��file�Ɋi�[����
		//�t�@�C���쐬
		$filename1 = 'text2-6-0.txt';
		//file���J��
		//'a':�ǋL���[�h
		$fp1 = fopen($filename1,'a');
		//��������
		fwrite($fp1,"$numx><$name><$comment><$time><$pass><"."\n");
		//����
		fclose($fp1);
		
		//comment��file�Ɋi�[����
		//�t�@�C���쐬
		$filename2 = 'text2-6.txt';
		//file���J��
		//'a':�ǋL���[�h
		$fp2 = fopen($filename2,'a');
		//��������
		fwrite($fp2,"$numx><$name><$comment><$time"."\n");
		//����
		fclose($fp2);

		
	}elseif($POST_['comment']=0 and !empty($POST_['name'])){
    		echo "$name,$comment";
    		//
    		//
		$num =  count(file($dataFile));
    		$numx = $num + 1;
    		//comment��file�Ɋi�[����
    		//�t�@�C���쐬
  		$filename1 = 'text2-6-0.txt';
		//file���J��
		//'a':�ǋL���[�h
  		$fp1 = fopen($filename1,'a');
		//��������
    		fwrite($fp1,"$numx><$name><0><$time><$pass><"."\n");
    		//����
		fclose($fp1);

		//�t�@�C���쐬
		$filename2 = 'text2-6.txt';
		//file���J��
		//'a':�ǋL���[�h
		$fp2 = fopen($filename2,'a');
		//��������
		fwrite($fp2,"$numx><$name><0><$time"."\n");
		//����
		fclose($fp2);

    	//����ȊO�̏ꍇ�ɂ���txt�ɒǉ����Ȃ�		
	}elseif(!empty($POST_['comment']) and !empty($POST_['name']) and !empty($POST_['delete'])){
		echo ���͂��Ă�������;  		

 	}else{
    	}

}else{
	if(!empty($_POST['name']) and !empty($_POST['comment'])){
    	echo "$name,$comment";
		
    		//$numx = $num + 1;
 		//comment��file�Ɋi�[����
   		//�t�@�C���쐬
    		$filename1 = 'text2-6-0.txt';
    		//file���J��
	    	//'a':�ǋL���[�h
    		$fp1 = fopen($filename1,'a');
	    	//��������
    		fwrite($fp1,"1><$name><$comment><$time><$pass><"."\n");
	    	//����
    		fclose($fp1);
		
		//�t�@�C���쐬
		$filename2 = 'text2-6.txt';
		//file���J��
		//'a':�ǋL���[�h
		$fp2 = fopen($filename2,'a');
		//��������
		fwrite($fp2,"1><$name><$comment><$time"."\n");
		//����
		fclose($fp2);
		
  	}elseif($POST_['comment']=0 and !empty($POST_['name'])){
    		echo "$name,$comment";
    		//
    		//
    		//$numx = $num + 1;
	    	//comment��file�Ɋi�[����
    		//�t�@�C���쐬
    		$filename1 = 'text2-6-0.txt';
    		//file���J��
    		//'a':�ǋL���[�h
    		$fp1 = fopen($filename1,'a');
    		//��������
    		fwrite($fp1,"1><$name><0><$time><$pass><"."\n");
    		//����
    		fclose($fp1);
		
		
		//�t�@�C���쐬
		$filename2 = 'text2-6.txt';
		//file���J��
		//'a':�ǋL���[�h
		$fp2 = fopen($filename2,'a');
		//��������
		fwrite($fp2,"1><$name><0><$time"."\n");
		//����
		fclose($fp2);
  		
	}elseif(!empty($POST_['comment']) and !empty($POST_['name']) and !empty($POST_['delete'])){
		echo ���͂��Ă�������;
    		//����ȊO�̏ꍇ�ɂ���txt�ɒǉ����Ȃ�
  	}else{
    	}
}

?>


<?php


$filedata = file('./text2-6.txt');
//�폜�p�v���O����
if (!empty($_POST['delete'])){
	$del     = $_POST['delete'];
	echo $del;
	
	$fp = fopen('./text2-6.txt','w+');
	
	foreach($filedata as $line){
		$data = explode('><',$line);
//		���e�ԍ����폜�ԍ��Ɉ�v������
		if($data[0] == $del){
//		���t�@�C�����J��
			$filedata2 = file('./text2-6-0.txt');
			$fp2 = fopen('./text2-6-0.txt','r');
			foreach($filedata2 as $line2){
				$data2 = explode('><',$line2);
//				���t�@�C���̍폜�w��ԍ��̍s�𔲂��o���B
				if($data2[0] == $del){
//					���̍s��5�Ԗڂ̗v�f(�p�X���[�h)�����̓p�X���[�h�Ɠ����ꍇ
					if($data2[4] == $_POST["dpass"]){
						echo '�폜���܂���';
					}else{
						fputs($fp,$line);
//						echo $data2[4];
//						echo $_POST["dpass"];
//						echo $data2[4];
						echo '�p�X���[�h���Ⴂ�܂�';
					}
				}
			}
			fclose($fp2);
		}else{
		fputs($fp,$line);
		}
//		}else{
//			
//			fputs($fp,'delete'."\n");
	}
	fclose($fp);
}else{
}

?>

<?php
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
			$hname = $data[1];
			$hcomment = $data[2];
			$filedata2 = file('./text2-6-0.txt');
			$fp2 = fopen('./text2-6-0.txt','r');
			
			foreach($filedata2 as $line2){
				$data = explode('><',$line);
				if($data2[0] == $hen){
					if($data2[4] == $_POST["hpass"]){
						header('Location: mission_2-6-2.php');
						exit;
					}else{
					echo '�p�X���[�h���Ⴂ�܂�';
					}
				}else{
				}
			}
			fclose($fp2);

		}else{
		}
	}
	fclose($fp);
}else{
}
?>


<html>


<head>
<meta charset = "UFT-8">
<title>�l�̍ד�</title>
</head>


<body>

<h1>�l�̍ד� ����</1h>

<form action = 'mission_2-6.php' method = 'post'>
����<input type = 'text' name = 'name'></br>
�R�����g<input type = 'text' name = 'comment'></br>
�p�X���[�h<input type = 'text' name = 'pass'></br>
<input type = 'submit' value ='���M'>
</form>

<form action="mission_2-6.php" method="post">
�폜�Ώ۔ԍ�<br>
<input type="text" name="delete"><br>
�p�X���[�h<input type="text" name="dpass"><br>
<input type="submit" value="�폜"><br>
</form>


<form action="mission_2-6-2.php" method="post">
�ҏW���[�h<br>
�ҏW�ԍ�<input type="text" name="hensyu"><br>
�p�X���[�h<input type="text" name="hpass"><br>
<input type="submit" value="�ҏW"><br>
</form>

<?php
//if(!empty($_POST['hensyu'])){
//	<form action="mission_2-5.php" method="post">
//	�ҏW�Ώ۔ԍ�<br>
//	<input type="text" name="hensyu"><br>
//	<input type="submit" value="�ҏW"><br>
//	</form>
//}
?>


</body>
</html>




<?php

if (file_exists($dataFile)){
	//$dataFile 'text2-5.txt';
	//$num =  count(file($dataFile));
	//text��ǂݍ���
	$file = dirname(__FILE__) . '/text2-6.txt';
	
	//�z��Ɋi�[
	$array = @file($file, FILE_IGNORE_NEW_LINES);
	
	//�z������[�v������1�s���Ƃɕ\��
	//foreach:�z��𔽕�����
	
	foreach ($array as $num => $come) {
		echo "$come </br>";
	}
}else{
}
?>


