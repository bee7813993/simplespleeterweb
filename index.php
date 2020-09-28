<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>deezer spleeter Web UI</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--  OLD <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">  -->

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
    <div class="container">
    <h1>deezer spleeter Web UI</h1>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!--  OLD <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!--  OLD <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>  -->
      <form enctype="multipart/form-data" action="spleeter_result.php"  method="POST" onsubmit="saveFilename();" >
          <div class="form-group row">
            <input type="hidden" name="MAX_FILE_SIZE" value="900000000" />
            <input type="hidden" name="uploaddfilename" id="upldfilename" />
            <label for="SoundInputFile" class="col-sm-2 col-form-label">音源ファイル</label>
            <div class="col-sm-10">
            <input type="file" id="SoundInputFile" class="form-control-file " name="SoundInputFile" />
            <p class="form-text text-muted">対応形式：wav,mp3,ogg,m4a,wma,flac</p>
            </div>
          </div>
          <div class="form-group row">
          <label for="outputtype" class="col-sm-2 col-form-label" >出力形式</label>
          <div class="btn-group btn-group-toggle col-sm-10" data-toggle="buttons">
            <label class="btn btn-secondary 
                 <?php echo (!isset($_COOKIE['outputtype']) ||(isset( $_COOKIE['outputtype']) && $_COOKIE['outputtype']==="wav")) ?  "active" :  "";
                 ?>
            ">
              <input type="radio" name="outputtype" value="wav" id="outputtype1"  
                 <?php echo (!isset($_COOKIE['outputtype']) ||(isset($_COOKIE['outputtype']) && $_COOKIE['outputtype']==="wav") )?  "checked" :  "";
                 ?>
              >wav
            </label>
            <label class="btn btn-secondary 
                 <?php echo (isset($_COOKIE['outputtype']) && $_COOKIE['outputtype']==="m4a") ?  "active" :  "";
                 ?>
            ">
              <input type="radio" name="outputtype" value="m4a" id="outputtype2"  
                 <?php echo (isset($_COOKIE['outputtype']) && $_COOKIE['outputtype']==="m4a") ?  "checked" :  "";
                 ?>
              >m4a
            </label>
            <label class="btn btn-secondary 
                 <?php echo (isset($_COOKIE['outputtype']) && $_COOKIE['outputtype']==="mp3") ?  "active" :  "";
                 ?>
            ">
              <input type="radio" name="outputtype" value="mp3" id="outputtype3"  
                 <?php echo (isset($_COOKIE['outputtype']) && $_COOKIE['outputtype']==="mp3") ?  "checked" :  "";
                 ?>
              >mp3
            </label>
            <label class="btn btn-secondary 
                 <?php echo (isset($_COOKIE['outputtype']) && $_COOKIE['outputtype']==="ogg") ?  "active" :  "";
                 ?>
            ">
              <input type="radio" name="outputtype" value="ogg" id="outputtype4"  
                 <?php echo (isset($_COOKIE['outputtype']) && $_COOKIE['outputtype']==="ogg") ?  "checked" :  "";
                 ?>
              >ogg
            </label>
            <label class="btn btn-secondary 
                 <?php echo (isset($_COOKIE['outputtype']) && $_COOKIE['outputtype']==="flac") ?  "active" :  "";
                 ?>
            ">
              <input type="radio" name="outputtype" value="flac" id="outputtype5" 
                 <?php echo (isset($_COOKIE['outputtype']) && $_COOKIE['outputtype']==="flac") ?  "checked" :  "";
                 ?>
              >flac
            </label>
          </div>
          </div>
          <div class="form-group row">
          <label for="bitrate" class="col-sm-2 col-form-label" >ビットレート</label>
            
          <div class="btn-group btn-group-toggle  col-sm-10" data-toggle="buttons">
            <label class="btn btn-secondary 
                 <?php echo (isset($_COOKIE['bitrate']) && $_COOKIE['bitrate']==="96k") ?  "active" :  "";
                 ?>
              ">
              <input type="radio" name="bitrate" value="96k" id="bitrate1" 
                 <?php echo (isset($_COOKIE['bitrate']) && $_COOKIE['bitrate']==="96k") ?  "checked" :  "";
                 ?>
               >96k
            </label>
            <label class="btn btn-secondary 
                 <?php echo (isset($_COOKIE['bitrate']) && $_COOKIE['bitrate']==="128k") ?  "active" :  "";
                 ?>
            ">
              <input type="radio" name="bitrate" value="128k" id="bitrate2"  
                 <?php echo (isset($_COOKIE['bitrate']) && $_COOKIE['bitrate']==="128k") ?  "checked" :  "";
                 ?>
              >128k
            </label>
            <label class="btn btn-secondary 
                 <?php echo (!isset($_COOKIE['bitrate']) || (isset($_COOKIE['bitrate']) && $_COOKIE['bitrate']==="192k")) ?  "active" :  "";
                 ?>
            ">
              <input type="radio" name="bitrate" value="192k" id="bitrate3" 
                 <?php echo (!isset($_COOKIE['bitrate']) || (isset($_COOKIE['bitrate']) && $_COOKIE['bitrate']==="192k")) ?  "checked" :  "";
                 ?>
              >192k
            </label>
            <label class="btn btn-secondary 
                 <?php echo (isset($_COOKIE['bitrate']) && $_COOKIE['bitrate']==="240k") ?  "active" :  "";
                 ?>
            ">
              <input type="radio" name="bitrate" value="240k" id="bitrate4"  
                 <?php echo (isset($_COOKIE['bitrate']) && $_COOKIE['bitrate']==="240k") ?  "checked" :  "";
                 ?>
              >240k
            </label>
            <label class="btn btn-secondary 
                 <?php echo (isset($_COOKIE['bitrate']) && $_COOKIE['bitrate']==="320k") ?  "active" :  "";
                 ?>
            ">
              <input type="radio" name="bitrate" value="320k" id="bitrate5" 
                 <?php echo (isset($_COOKIE['bitrate']) && $_COOKIE['bitrate']==="320k") ?  "checked" :  "";
                 ?>
              >320k
            </label>

          </div>
                        <small class="form-text text-muted text-right">ビットレートに対応した形式のみ有効</small>
          </div>

          <div class="form-group row">
          <label for="stems" class="col-sm-2 col-form-label" >分割数（STEM）</label>
            
          <div class="btn-group btn-group-toggle  col-sm-10" data-toggle="buttons">
            <label class="btn btn-secondary 
                 <?php echo (!isset($_COOKIE['stems']) || (isset($_COOKIE['stems']) && $_COOKIE['stems']==="2stems" )) ?  "active" :  "";
                 ?>
              ">
              <input type="radio" name="stems" value="2stems" id="stems1" 
                 <?php echo (!isset($_COOKIE['stems']) || (isset($_COOKIE['stems']) && $_COOKIE['stems']==="2stems" )) ?  "checked" :  "";
                 ?>
               >2stems <small>(オフボーカル＋ボーカル抽出)</small>
            </label>
            <label class="btn btn-secondary 
                 <?php echo (isset($_COOKIE['stems']) && $_COOKIE['stems']==="4stems") ?  "active" :  "";
                 ?>
            ">
              <input type="radio" name="stems" value="4stems" id="stems2"  
                 <?php echo (isset($_COOKIE['stems']) && $_COOKIE['stems']==="4stems") ?  "checked" :  "";
                 ?>
              >4stems <small>(＋ベース＋ドラム抽出)</small>
            </label>
            <label class="btn btn-secondary 
                 <?php echo ( (isset($_COOKIE['stems']) && $_COOKIE['stems']==="5stems")) ?  "active" :  "";
                 ?>
            ">
              <input type="radio" name="stems" value="5stems" id="stems3" 
                 <?php echo ( (isset($_COOKIE['stems']) && $_COOKIE['stems']==="5stems")) ?  "checked" :  "";
                 ?>
              >5stems <small>(＋ピアノ抽出)</small>
            </label>
          </div>
          </div>




          <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </body>
</html>