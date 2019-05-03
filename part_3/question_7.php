Q7: What is the Scope Resolution Operator and how do you use it?
A:  A Scope Operator is the token ::, this allows the access of static, constant, or overwritten properties within another class. 
    There are examples of this in my markdown conversion application when accessing the imported class InputArgument and InputOption.
    InputArgument::REQUIRED,
    InputOption::VALUE_NONE
    Other variations of this example could be:
    InputArgument::OPTIONAL,
    InputOption::OPTIONAL.
    All of which point to const properties within the InputArgument or InputOption class within InputArguement.php and InputOption.php 
    respectively.