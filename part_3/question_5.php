<?php
  /**
   * 
   * Q: Explain what the <=> operator does, giving an example.
   * 
   * A: The <=> is called a spaceship operator it is new to php 7 and is used to compare 2 values. 
   *    The pression returns -1, 0, or 1 when the first expression is less, equal to, or more than the second expression.
   *    A multitude of values types can be compared including strings, integers and floats. A good reason to use this in comparison to more
   *    traditional operators is that it reduces the amount of operations needed to recieve the same information.
   * 
   *  Q: Do the same for $foo:?$bar
   * 
   *  A: The ?: operator acts like a short hand for a ternary operator. If the first expression of the operator is false or empty it will 
   *     return the second expression. Otherwise it will always return the first.
   */

   echo 0 <=> 1 ;
   echo '  0 & 1 Should return -1';
   echo '<br/>';
   echo 1 <=> 1;
   echo ' 1 & 1 Should return 0';
   echo '<br/>';
   echo 1 <=> 0;
   echo ' 1 & 0 Should return 1';

   echo '<br/>';

   echo 'a' <=> 'b' ;
   echo ' a & b Should return -1';
   echo '<br/>';
   echo 'a' <=> 'a';
   echo ' a & a Should return 0';
   echo '<br/>';
   echo 'b' <=> 'a';
   echo ' b & a Should return 1';

   echo '<br/>';

   echo false?:2;
   echo '<br/>';
   echo 1?:2;
   echo '<br/>';
   echo null?:2;
   echo '<br/>';
   echo 'a'?:'b';
   echo '<br/>';
   echo false?:'b';
   echo '<br/>';
   echo ''?:'b';

?>