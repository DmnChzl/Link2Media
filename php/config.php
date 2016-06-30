<?php
  /* Change this line with your own path */
  $folder = '/home/link2media/';

  function format($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars

    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one
  }
?>
