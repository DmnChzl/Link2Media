<?php
  include("config.php");
  $link = $_POST['link'];
  $media = $_POST['media'];

  $log = array();

  //print_r($_POST);

  if($media == 'audio') {
    $log['filename'] = 'Music.mp3';
    /* Change this line with your own path */
    $command = 'youtube-dl -o "'.$homefolder.'Music.%(ext)s" -x --audio-format mp3 ' .escapeshellarg($link);
  } else {
    $log['filename'] = 'Video.mp4';
    /* Change this line with your own path */
    $command = 'youtube-dl -o "'.$homefolder.'Video.%(ext)s" -f mp4 ' .escapeshellarg($link);
  }

  if (exec($command, $output, $ret)) {
    $log['success'] = 0;
  } else {
    $log['success'] = 1;
  }

  echo json_encode($log);
?>
