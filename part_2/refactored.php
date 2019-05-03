<?
  namespace LinkMaker\Utility;

  class avgPalindromeLogin
  {

    /**
     * Average Function
     * 
     * @params   Array    $values    Array of numerical values.
     * @returns  Integer  $integer   Rounded average of initial value array.
     * 
     */
    public static function average($values)
    {
      $integer = round(array_sum($values) / count($values));
      return $integer;
    }

    /**
     * isPalindrome Function
     * 
     * @params  Array  $query    Mysqli_query row result.
     * @returns Bool   $result   Boolean value result of $cleanStr & $reversedStr.
     * @returns Bool   null      Returns false if full_name !isset.
     * 
     */
    public static function isPalindrome($query):bool
    {

      /**
       * 
       * Check if full_name isset within the query result,
       * Clean string, removing spaces and coverting to lowercase,
       * Split into array, reverse split array, implode reversed array into string,
       * Compare $cleanStr to $reversedStr to return Boolean.
       *  
       */ 

      if(isset($query['full_name'])){
        $str = $query['full_name'];

        $cleanStr = strtolower(str_replace(' ', '', $str));
        $strArray = str_split($cleanStr);
        $strArrayReverse = array_reverse($strArray);
        $reversedStr = implode("", $strArrayReverse);

        $result = $cleanStr == $reversedStr;

        return $result;

      }else{

        return false;

      }

    }

    /**
     * Login Function
     * @params String $username   Username string value determined by input.
     * @params String $password   Passwword string value determined by input.
     * @returns Array $result     Row array from table dependent on inputs.
     * 
     */
    public function login($username, $password)
    {

      /**
       * 
       * Set query string to $query,
       * Connect to database, return row result from database,
       * Close database connect.
       * 
       */

      $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

      $con = mysqli_connect("127.0.0.1", "root", null, "test");
      $result = mysqli_fetch_assoc(mysqli_query($con, $query));
      mysqli_close($con);

      return $result;

    }
  }

  print avgPalindromeLogin::average([1, 5, 2, 5]); 
  print avgPalindromeLogin::isPalindrome(avgPalindromeLogin::login("dave","123456"));


  /**
   * 
   * Assumptions & additional comments refactoring.
   * 
   * Class titles & variables names-
   *  As the initial class name would have caused errors due to it starting with an integer I made the choice to change it completely
   *  to something that made more sense. Though the combination of these functions don't really fit together and could be seperated
   *  further in a real world senario.
   * 
   *  Similarly several of the variables I felt where named inappropriately. e.g. $str in isPalindrome() would not have initially
   *  been a string. Though alterations could have been made in the login(), in this case I have choosen to do so in the
   *  isPalindrome function.
   * 
   * Average function - 
   *  Initial code used $integer as a variable name, however the result of the input values would be 3.25. 
   *  Due to this I rounded any values input to the nearest integer.
   * 
   */
?>
  