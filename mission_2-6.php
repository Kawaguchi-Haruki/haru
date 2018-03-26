<?php
//それぞれのデータを拾って変数に格納
$name    = $_POST['name'];
$comment = $_POST['comment'];
$pass    = $_POST['pass'];

//送信時刻の関数
$time = date('Y.m.d.H:i:s');

//行数を取得
$dataFile = 'text2-6-0.txt';


//ファイルの有無で条件分岐
if (file_exists($dataFile)){
//条件分岐
	if(!empty($_POST['name']) and !empty($_POST['comment'])){
		echo "$name,$comment";
		$num =  count(file($dataFile));
		$numx = $num + 1;
		//commentをfileに格納する
		//ファイル作成
		$filename1 = 'text2-6-0.txt';
		//fileを開く
		//'a':追記モード
		$fp1 = fopen($filename1,'a');
		//書き込む
		fwrite($fp1,"$numx><$name><$comment><$time><$pass><"."\n");
		//閉じる
		fclose($fp1);
		
		//commentをfileに格納する
		//ファイル作成
		$filename2 = 'text2-6.txt';
		//fileを開く
		//'a':追記モード
		$fp2 = fopen($filename2,'a');
		//書き込む
		fwrite($fp2,"$numx><$name><$comment><$time"."\n");
		//閉じる
		fclose($fp2);

		
	}elseif($POST_['comment']=0 and !empty($POST_['name'])){
    		echo "$name,$comment";
    		//
    		//
		$num =  count(file($dataFile));
    		$numx = $num + 1;
    		//commentをfileに格納する
    		//ファイル作成
  		$filename1 = 'text2-6-0.txt';
		//fileを開く
		//'a':追記モード
  		$fp1 = fopen($filename1,'a');
		//書き込む
    		fwrite($fp1,"$numx><$name><0><$time><$pass><"."\n");
    		//閉じる
		fclose($fp1);

		//ファイル作成
		$filename2 = 'text2-6.txt';
		//fileを開く
		//'a':追記モード
		$fp2 = fopen($filename2,'a');
		//書き込む
		fwrite($fp2,"$numx><$name><0><$time"."\n");
		//閉じる
		fclose($fp2);

    	//それ以外の場合についてtxtに追加しない		
	}elseif(!empty($POST_['comment']) and !empty($POST_['name']) and !empty($POST_['delete'])){
		echo 入力してください;  		

 	}else{
    	}

}else{
	if(!empty($_POST['name']) and !empty($_POST['comment'])){
    	echo "$name,$comment";
		
    		//$numx = $num + 1;
 		//commentをfileに格納する
   		//ファイル作成
    		$filename1 = 'text2-6-0.txt';
    		//fileを開く
	    	//'a':追記モード
    		$fp1 = fopen($filename1,'a');
	    	//書き込む
    		fwrite($fp1,"1><$name><$comment><$time><$pass><"."\n");
	    	//閉じる
    		fclose($fp1);
		
		//ファイル作成
		$filename2 = 'text2-6.txt';
		//fileを開く
		//'a':追記モード
		$fp2 = fopen($filename2,'a');
		//書き込む
		fwrite($fp2,"1><$name><$comment><$time"."\n");
		//閉じる
		fclose($fp2);
		
  	}elseif($POST_['comment']=0 and !empty($POST_['name'])){
    		echo "$name,$comment";
    		//
    		//
    		//$numx = $num + 1;
	    	//commentをfileに格納する
    		//ファイル作成
    		$filename1 = 'text2-6-0.txt';
    		//fileを開く
    		//'a':追記モード
    		$fp1 = fopen($filename1,'a');
    		//書き込む
    		fwrite($fp1,"1><$name><0><$time><$pass><"."\n");
    		//閉じる
    		fclose($fp1);
		
		
		//ファイル作成
		$filename2 = 'text2-6.txt';
		//fileを開く
		//'a':追記モード
		$fp2 = fopen($filename2,'a');
		//書き込む
		fwrite($fp2,"1><$name><0><$time"."\n");
		//閉じる
		fclose($fp2);
  		
	}elseif(!empty($POST_['comment']) and !empty($POST_['name']) and !empty($POST_['delete'])){
		echo 入力してください;
    		//それ以外の場合についてtxtに追加しない
  	}else{
    	}
}

?>


<?php


$filedata = file('./text2-6.txt');
//削除用プログラム
if (!empty($_POST['delete'])){
	$del     = $_POST['delete'];
	echo $del;
	
	$fp = fopen('./text2-6.txt','w+');
	
	foreach($filedata as $line){
		$data = explode('><',$line);
//		投稿番号が削除番号に一致した時
		if($data[0] == $del){
//		元ファイルを開く
			$filedata2 = file('./text2-6-0.txt');
			$fp2 = fopen('./text2-6-0.txt','r');
			foreach($filedata2 as $line2){
				$data2 = explode('><',$line2);
//				元ファイルの削除指定番号の行を抜き出す。
				if($data2[0] == $del){
//					その行の5番目の要素(パスワード)が入力パスワードと同じ場合
					if($data2[4] == $_POST["dpass"]){
						echo '削除しました';
					}else{
						fputs($fp,$line);
//						echo $data2[4];
//						echo $_POST["dpass"];
//						echo $data2[4];
						echo 'パスワードが違います';
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
//編集番号フォームに有効な値が与えられた場合についてのみ実行する。

if(!empty($_POST['hensyu'])){
	$hen = $_POST['hensyu'];
	$filedata = file('./text2-6.txt');
	//
	
	$fp = fopen('./text2-6.txt','r');
	
	foreach($filedata as $line){
		//編集指定番号と一致した部分の氏名とコメントを抜き出す。
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
					echo 'パスワードが違います';
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
<title>僕の細道</title>
</head>


<body>

<h1>僕の細道 入口</1h>

<form action = 'mission_2-6.php' method = 'post'>
氏名<input type = 'text' name = 'name'></br>
コメント<input type = 'text' name = 'comment'></br>
パスワード<input type = 'text' name = 'pass'></br>
<input type = 'submit' value ='送信'>
</form>

<form action="mission_2-6.php" method="post">
削除対象番号<br>
<input type="text" name="delete"><br>
パスワード<input type="text" name="dpass"><br>
<input type="submit" value="削除"><br>
</form>


<form action="mission_2-6-2.php" method="post">
編集モード<br>
編集番号<input type="text" name="hensyu"><br>
パスワード<input type="text" name="hpass"><br>
<input type="submit" value="編集"><br>
</form>

<?php
//if(!empty($_POST['hensyu'])){
//	<form action="mission_2-5.php" method="post">
//	編集対象番号<br>
//	<input type="text" name="hensyu"><br>
//	<input type="submit" value="編集"><br>
//	</form>
//}
?>


</body>
</html>




<?php

if (file_exists($dataFile)){
	//$dataFile 'text2-5.txt';
	//$num =  count(file($dataFile));
	//textを読み込む
	$file = dirname(__FILE__) . '/text2-6.txt';
	
	//配列に格納
	$array = @file($file, FILE_IGNORE_NEW_LINES);
	
	//配列をループさせて1行ごとに表示
	//foreach:配列を反復処理
	
	foreach ($array as $num => $come) {
		echo "$come </br>";
	}
}else{
}
?>


