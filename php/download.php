<?php
  include("config.php");
  $filename= $_POST['filename'];
  /* Change this line with your own path */
  $file = $homefolder . $filename;

  if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/stream-octet');
    header("Content-Transfer-Encoding: binary");
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' .filesize($file));
    readfile($file);
    unlink($file);
  } else {
    header("HTTP/1.0 404 Not Found");
  }
?>
