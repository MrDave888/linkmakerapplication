<?php
  class readDirectory
  {

    public function readAllDirectories($dirStr)
    {

      $directory = new RecursiveDirectoryIterator($dirStr);
      $iterator = new RecursiveIteratorIterator($directory);
      $dirArr = [];
      foreach($iterator as $dirIterator){
        array_push($dirArr, $dirIterator);
      }
      return $dirArr;
    }

  }

  $dirReader = new readDirectory;

  echo '<pre>';
  print_r( $dirReader->readAllDirectories(__DIR__) );
  echo '<br/>';
  print_r( $dirReader->readAllDirectories('../') );
  echo '</pre>';
?>