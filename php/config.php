<?php
  /* Change this line with your own path */
  $folder = '/home/link2media/';

  function format($string, $encoding='utf-8')
  {
    // Convert accented characters into HTML entities
    $string = htmlentities($string, ENT_NOQUOTES, $encoding);

    // Replace HTML entities for just get the first non-accented characters
    $string = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $string);

    // Replace ligatures such as : Œ, Æ...
    $string = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $string);

    // Removes special chars
    $string = preg_replace('#&[^;]+;#', '', $string);

    // Replaces all spaces with hyphens
    $string = preg_replace('/\s/', '-', $string);

     // Replaces multiple hyphens with single one
    return preg_replace('/-+/', '-', $string);
  }
?>
