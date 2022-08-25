<!DOCTYPE html>
<html>
  <head>
    <meta chaset="UTF-8">
    <title>字数カウンター</title>
    <link rel="stylesheet" href="./jisu.css">
  </head>
  <body>
    <header>
      <div class=logo>字数カウンター・就活用</div>
    </header>

    <main>
      <h1>字数：
      <?php
        error_reporting(~E_NOTICE);
      
        $txt = $_POST["txt"];
        $submit = $_POST["submit"];
        $reset = $_POST["reset"];
        $ndel = $_POST["ndel"];

        if (!empty($submit)){
          $ncount = substr_count($txt,"\n");
          $num = mb_strlen($txt) - 2*$ncount;
          echo $num;
        } else {
          echo "0";
        }
        
        if (!empty($reset)){
          $txt = null;
        }
        
        if (!empty($ndel)){
          $txt = str_replace("\r\n","",$txt);
        }
      ?>
      文字</h1>
    </main>

    <form action="" method="POST">
        <textarea name="txt" placeholder="ここに文字を入力" rows="14" cols="90"><?php if (isset($txt)){echo "$txt";}?></textarea><br><br>
        <input type="submit" name="submit" value="数える" class=button><br>
        <input type="submit" name="ndel" value="改行を削除" class=button><br>
        <input type="submit" name="reset" value="リセット" class=button><br>
    </form>
  <body>
</html>
