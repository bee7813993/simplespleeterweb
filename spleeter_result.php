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

$DEBUGMSG .= print_r($_REQUEST, TRUE);
$DEBUGMSG .= print_r($_FILES, TRUE);

$tempDirName = tempDir("spleeterwork");
$DEBUGMSG .= $tempDirName . "\n";
$uploadfile = $tempDirName . '\\' . $_FILES['SoundInputFile']['name'];
if (move_uploaded_file($_FILES['SoundInputFile']['tmp_name'], $uploadfile)) {
    $DEBUGMSG .= "File is valid, and was successfully uploaded. PATH:$uploadfile\n";
} else {
    $DEBUGMSG .= "Possible file upload attack!\n";
}

// コマンド実行
$cmd = $spleeter_bat. " \"" . $uploadfile . "\"  \"" . $tempDirName."\"";
$DEBUGMSG .= $cmd;
$CMDRESULTEXT = "";
exec  ($cmd,$CMDRESULTEXT,$RETVAL);

if($RETVAL == 1){

  echo "Failed, LOG";
var_dump ($RETVAL);
print "<pre>";
print $DEBUGMSG;
var_dump ($CMDRESULTEXT);
print "</pre>";

}



?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<?php

?>

    <h1>deezer spleeter Web UI Result</h1>
    

    <div class="container">
    <h2>変換結果フォルダ</h2>
    <a href="
<?php
    echo basename($tempDirName).'/';
?>    
    " class="btn btn-primary btn-lg active" role="button" aria-pressed="true">置き場</a>
	</div>

    
  </body>
</html>