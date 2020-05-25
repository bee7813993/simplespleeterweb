<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>deezer spleeter Web UI</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
    function saveFilename()
    {
        document.all.upldfilename.value = document.all.SoundInputFile.value;
    }
    </script>

  </head>
  <body>
    <h1>deezer spleeter Web UI</h1>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <div class="container">
      <form enctype="multipart/form-data" action="spleeter_result.php"  method="POST" onsubmit="saveFilename();" >
          <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="900000000" />
            <input type="hidden" name="uploaddfilename" id="upldfilename" />
            <label for="assInputFile">音源ファイル</label>
            <input type="file" id="SoundInputFile" class="form-control" name="SoundInputFile" />
            <p class="help-block">対応形式：wav,mp3,ogg,m4a,wma,flac</p>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
    
  </body>
</html>