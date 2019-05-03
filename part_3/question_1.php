<?php
  class countRepations
  {
    public function countRepationInString($string)
    {

      $count = [];
      $strArr = str_split($string);

      foreach($strArr as $str){
        if(array_key_exists($str, $count)){
          $count[$str]++;
        }else{
          $count[$str] = 1;
        }
      }

      return $count;

    }
  }

  $counter = new countRepations;
  echo '<pre>';
  print_r($counter -> countRepationInString("floccinaucinihilipilification"));
  echo '</pre>';
?>