<?php
  class returnInteger
  {
    private $data = [];
    
    public function __set($name, $value)
    {
      $this->data[$name] = (int)round($value);
      return($name.' has been set to '.$this->data[$name]);
    }

    public function __get($name)
    {
      if(array_key_exists($name, $this->data)){
        return($this->data[$name]);
      }else{
        return($name.' is not set.');
      }
    }

    public function test($name)
    {
      if(array_key_exists($name, $this->data)){
        if(gettype($this->data[$name]) == "integer"){
          return('Test Passed');
        }else{
          return('Test Failed');
        }
      }
    }
  }

  $numberObj = new returnInteger;
  $numberObj->a = 3.14;
  $numberObj->b = 76.45;
  $numberObj->c = 20;
  $numberObj->d = 44542.45332;

  echo 'a: '.$numberObj->a.'<br/>';
  echo 'b: '.$numberObj->b.'<br/>';
  echo 'c: '.$numberObj->c.'<br/>';
  echo 'd: '.$numberObj->d.'<br/>';
  echo '<br/>';
  echo 'a: '.$numberObj->test('a').'<br/>';
  echo 'b: '.$numberObj->test('b').'<br/>';
  echo 'c: '.$numberObj->test('c').'<br/>';
  echo 'd: '.$numberObj->test('d').'<br/>';

?>