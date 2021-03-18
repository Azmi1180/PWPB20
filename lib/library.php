<?php
  include'lib/helper.php';

  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'db_pwpb';

  $mysqli = mysqli_connect($host, $user, $pass, $db) or die('Tidak dapat Koneksi ke database');
  function console_log($output, $with_script_tags = true) {
      $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
  ');';
      if ($with_script_tags) {
          $js_code = '<script>' . $js_code . '</script>';
      }
      echo $js_code;
  }
?>
