<?php
  include("config.php");

  ignore_user_abort(true);
  set_time_limit(0); // Disable the time limit for this script

  $filename = $_POST['filename'];
  $path = $folder.$filename;

  if ($input = fopen($path, "r")) {
    $size = filesize($path);
    $info = pathinfo($path);
    $ext = strtolower($info["extension"]);
    switch ($ext) {
      case "mp3":
      header("Content-Type: audio/mp3");
      header("Content-Disposition: attachment; filename=\"".$info["basename"]."\""); // Use 'attachment' to force a file download
      break;
      case "mp4":
      header("Content-Type: video/mp4");
      header("Content-Disposition: attachment; filename=\"".$info["basename"]."\""); // Use 'attachment' to force a file download
      break;
      // Add more headers for other content types here
      default;
      header("Content-Type: application/octet-stream");
      header("Content-Disposition: filename=\"".$info["basename"]."\"");
      break;
    }
    header("Content-Length: $size");
    header("Cache-Control: private"); // Use this to open files directly
    ob_clean();
    flush();
    while(!feof($input)) {
      $buffer = fread($input, 2048);
      echo $buffer;
    }
  }
  fclose ($input);
  exit;

?>
