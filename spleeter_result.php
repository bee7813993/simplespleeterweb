<?php
// spleeter をインストールしたフォルダに「spleeter_2work.bat」ファイルを置きそのパスを指定する。
$spleeter_bat="F:\\Git\\spleeter\\spleeter_2work.bat";

$DEBUGMSG ="";

function tempDir($prefix = "spleeterwork"){
  $OutPutDIR = __DIR__ . "\OutPut";
  $tmp_file_name= tempnam(sys_get_temp_dir() , $prefix );
  @unlink($tmp_file_name);
  $tempDirname =$OutPutDIR . basename($tmp_file_name);
  @mkdir($tempDirname);
  return $tempDirname;

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>deezer spleeter Web UI Result</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?php

$OUTPUTTYPE="wav";
if(isset($_REQUEST['outputtype']) ){
    $OUTPUTTYPE=$_REQUEST['outputtype'];
    setcookie('outputtype',$OUTPUTTYPE,time()+60*60*24*180);
}

$BITRATE="192k";
if(isset($_REQUEST['bitrate']) ){
    $BITRATE=$_REQUEST['bitrate'];
    setcookie('bitrate',$BITRATE,time()+60*60*24*180);
}

$STEMS="2stems";
if(isset($_REQUEST['stems']) ){
    $STEMS=$_REQUEST['stems'];
    setcookie('stems',$STEMS,time()+60*60*24*180);
    $STEMS='spleeter:'.$STEMS;
}

$DEBUGMSG .= print_r($_REQUEST, TRUE);
$DEBUGMSG .= print_r($_FILES, TRUE);

$tempDirName = tempDir("spleeterwork");
$DEBUGMSG .= $tempDirName . "\n";
if($_FILES['SoundInputFile']['error'] != 0){
   if($_FILES['SoundInputFile']['error'] == 4 ) {
   print "<p> 音源ファイルが指定されていません </p>\n";
   }else {
   print "<p> ファイルのアップロードに失敗しました Code : ".$_FILES['SoundInputFile']['error']." </p>\n";
   }
   print '<button type="button" class="btn btn-primary" onclick="history.back()">戻る</button>';
   print '</body>    </html>';
   die();
}

$uploadfile = $tempDirName . '\\' . $_FILES['SoundInputFile']['name'];
if (move_uploaded_file($_FILES['SoundInputFile']['tmp_name'], $uploadfile)) {
    $DEBUGMSG .= "File is valid, and was successfully uploaded. PATH:$uploadfile\n";
} else {
    $DEBUGMSG .= "Possible file upload attack!\n";
   print "<p> ファイルのアップロードに失敗しました </p>\n";
   print "<pre>\n";
   print $DEBUGMSG;
   print "</pre>\n";
   print '<button type="button" class="btn btn-primary" onclick="history.back()">戻る</button>';
   print '</body>    </html>';
   die();
}


// コマンド実行
$cmd = $spleeter_bat. " \"" . $uploadfile . "\"  \"" . $tempDirName."\" ".$OUTPUTTYPE." ".$BITRATE." ".$STEMS;
$DEBUGMSG .= $cmd;

$CMDRESULTEXT = "";
exec  ($cmd,$CMDRESULTEXT,$RETVAL);

if($RETVAL == 1){


   print "<p> ファイルの処理に失敗しました </p>\n";
   print '<button type="button" class="btn btn-primary" onclick="history.back()">戻る</button>';
   print '</body>    </html>';

  echo "Failed, LOG";
print "<pre>";
var_dump ($RETVAL);
print $DEBUGMSG;
var_dump ($CMDRESULTEXT);
print "</pre>";
   die();

}

?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<?php

?>

    <div class="container">
    <h1>deezer spleeter Web UI Result</h1>
    <h2>変換結果フォルダ</h2>
    <a href="
<?php
    echo basename($tempDirName).'/';
?>    
    " class="btn btn-primary btn-lg active" role="button" aria-pressed="true">置き場</a>
	</div>

    
  </body>
</html>