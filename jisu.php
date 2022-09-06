<!DOCTYPE html>
<html>
  <head>
    <meta chaset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>字数カウンター</title>
    <link rel="stylesheet" href="./jisu.css">
  </head>
  <body>
    <header>
      <div class=logo>字数カウンター</div>
    </header>

    <main>
      <?php
        error_reporting(~E_NOTICE);
      
        $txt = $_POST["txt"];
        $submit = $_POST["submit"];
        $reset = $_POST["reset"];
        $ndel = $_POST["ndel"];

        if (!empty($submit)){
          $n_count = substr_count($txt,"\n");
          $num = mb_strlen($txt) - 2*$n_count;
          $k1 = substr_count($txt,' ');
          $k2 = substr_count($txt,'　');
          $k_count = $k1 + $k2;
          $k_num = $num - $k_count;
          $message = "字数（スペース込み）：".$num."\\n字数（スペース抜き）：".$k_num."\\n改行数：".$n_count."　スペース：".$k_count;
          $alert = "<script type='text/javascript'>alert('".$message."');</script>";
          echo $alert;
 
        }
        if (!empty($reset)){
          $txt = null;
        }
        
        if (!empty($ndel)){
          $txt = str_replace("\r\n","",$txt);
        }
        
      ?>

    </main>

    <form action="" method="POST">
        <textarea name="txt" placeholder="ここに文字を入力" rows="17" cols="90"><?php if (isset($txt)){echo "$txt";}?></textarea><br><br>
        <input type="submit" name="submit" value="数える" class=button><br>
        <input type="submit" name="ndel" value="改行を削除" class=button><br>
        <input type="submit" name="reset" value="リセット" class=button><br>
        <a href="https://t.co/Flxb6wm7z9">LINEで字数カウントする</a><br>
    </form><br>
  <body>
</html>
