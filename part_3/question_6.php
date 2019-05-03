<?php 

// Q6: Explain Polymorphism and why it’s useful - we don’t mind if you google it, 
//     but don’t just copy and paste your answer (we’ll check) - rewrite it as though 
//     you were explaining it to someone else.

// A: Polymorphism is the use of a single function of the same name across multiple subclasses
//     that produces different outputs dependent on that subclass. To illustrate futher I have
//     provided an example below.

  class animal
  {
    public function run()
    {
      return 'Runs';
    }
  }

  class dog extends animal
  {
    public function run()
    {
      return 'Runs Fasts';
    }
  }

  class cheetah extends animal
  {
    public function run()
    {
      return 'Runs the fastest';
    }
  }

  $animal = new animal;
  $dog = new dog;
  $cheetah = new cheetah;

  echo $animal->run();
  echo '<br/>';
  echo $dog->run();
  echo '<br/>';
  echo $cheetah->run();
?>