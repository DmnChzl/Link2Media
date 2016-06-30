<?php
  include("config.php");
  $link = $_POST['link'];
  $media = $_POST['media'];
  $ext = '.txt';

  $log = array();

  $filename = trim(shell_exec('youtube-dl --get-title ' .escapeshellarg($link)));
  $filename = format($filename);

  if($media == 'audio') {
	$ext = '.mp3';
    $log['filename'] = $filename.$ext;

    if(file_exists($folder.$filename.$ext)) {
      $log['success'] = 0;
      echo json_encode($log);
      exit;
    } else {
      $command = 'youtube-dl -o "'.$folder.$filename.'.%(ext)s" -x --audio-format mp3 ' .escapeshellarg($link);
    }
  } else {
	$ext = '.mp4';
    $log['filename'] = $filename.$ext;

    if(file_exists($folder.$filename.$ext)) {
      $log['success'] = 0;
      echo json_encode($log);
      exit;
    } else {
      $command = 'youtube-dl -o "'.$folder.$filename.'.%(ext)s" -f mp4 ' .escapeshellarg($link);
    }
  }

  if(exec($command, $output, $ret)) {
    shell_exec('touch '.$folder.$filename.$ext);
    $log['success'] = 0;
  } else {
    $log['success'] = 1;
  }

  echo json_encode($log);
?>

