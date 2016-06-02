<?php
  include("config.php");
  $link = $_POST['link'];
  $media = $_POST['media'];

  $log = array();

  $filename = trim(shell_exec('youtube-dl --get-id ' .escapeshellarg($link)));

  if($media == 'audio') {
    $log['filename'] = $filename.'.mp3';

    if (file_exists($folder.$filename.'.mp3')) {
      $log['success'] = 0;
      echo json_encode($log);
      exit;
    } else {
      $command = 'youtube-dl -o "'.$folder.'%(id)s.%(ext)s" -x --audio-format mp3 ' .escapeshellarg($link);
    }
  } else {
    $log['filename'] = $filename.'.mp4';

    if (file_exists($folder.$filename.'.mp4')) {
      $log['success'] = 0;
      echo json_encode($log);
      exit;
    } else {
      $command = 'youtube-dl -o "'.$folder.'%(id)s.%(ext)s" -f mp4 ' .escapeshellarg($link);
    }
  }

  if (exec($command, $output, $ret)) {
    $log['success'] = 0;
  } else {
    $log['success'] = 1;
  }

  echo json_encode($log);
?>
