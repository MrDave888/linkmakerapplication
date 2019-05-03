#!/usr/bin/env php
<?php
  require_once __DIR__ . '/vendor/autoload.php';

  // Module Imports.
  use Symfony\Component\Console\Application;
  use Console\ConvertMarkdownCommand;

  $application = new Application();
  $application -> add(new ConvertMarkdownCommand());
  $application -> run();
?>