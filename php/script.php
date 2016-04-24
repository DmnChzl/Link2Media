<?php
  $link = $_POST['link'];
  $media = $_POST['media'];

  $log = array();

  if($media == 'audio') {
    $log['filename'] = 'Music.mp3';
    $command = 'youtube-dl -o "/home/link2media/Music.%(ext)s" -x --audio-format mp3 ' .escapeshellarg($link);
  } else {
    $log['filename'] = 'Video.mp4';
    $command = 'youtube-dl -o "/home/link2media/Video.%(ext)s" -f mp4 ' .escapeshellarg($link);
  }

  if (exec($command, $output, $ret)) {
    $log['success'] = 0;
  } else {
    $log['success'] = 1;
  }

  echo json_encode($log);
?>
