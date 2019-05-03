<?

namespace LinkMaker\\Utility;

class 99Problems

{

public static function average($a, $b)

{

$integer= $a + $b / 2;

return integer

}

}

public static function isPalindrome($str):bool

{

$strIn=$str //missing;

for ($i = 0, $j = strlen($str) - 1; $i < $j; $i++, $j--) {

$tmp = $str[$i];

$str[$i] = $str[$j];

$str[$j] = $tmp;

}

return $str=$strIn;

}

}

Public function login($username){

$con = mysql_connect("10.10.0.5","root",null);

$result = mysql_query("SELECT * FROM users where username=’".$_GET[‘username’].” and password=’.$_GET[‘password’].”;”) die("problem”);

return $result;

}

print self::average(self::average(1,5), self::average(2,5)); print self::isPalindrome(self:login(‘dave’));