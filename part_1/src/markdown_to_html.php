<?php
  // Namespace
  namespace Console;

  // Module Imports
  use Symfony\Component\Console\Command\Command;
  use Symfony\Component\Console\Input\InputArgument;
  use Symfony\Component\Console\Input\InputInterface;
  use Symfony\Component\Console\Input\InputOption;
  use Symfony\Component\Console\Output\OutputInterface;
  use Parsedown;


  /**
   * 
   * Main Conversion Class
   * 
   */

  class MarkdownToHtml extends Command
  {
    public function __contruct()
    {
      parent::__contruct();
    }

    /**
     * 
     * readFile Function
     * @params  String  $fileLocation   Location of original markdown file.
     * @returns String  $fileContents   Contents of markdown file.
     * 
     */

    private function readFile($fileLocation)
    {

      // Open markdown file, read contents, close file,
      // return $fileContents and pass to covertFile().
  
      $file = fopen(__DIR__.$fileLocation, 'r');
      $fileContents = fread($file, filesize(__DIR__.$fileLocation));
      fclose($file);

      return $this -> covertFile($fileContents);

    }

    /**
     * 
     * convertFile Function
     * @params   String   $fileContents            Contents of file passed from readFile().
     * @returns  String   $convertedMarkdownFile   Converted contents of file from markdown to html and returned for output or passed to saveFileAsHtml().
     * 
     */
    private function covertFile($fileContents)
    {

      // Initial new Parsedown, convert $fileContents through passdown,
      // return $convertedMarkdownFile and pass to saveFileAsHtml

      $Parsedown = new Parsedown();
      $convertedMarkdownFile = $Parsedown -> text($fileContents);

      if($this -> consoleOption){
        return $convertedMarkdownFile;
      }else{
        return $this -> saveFileAsHtml($convertedMarkdownFile);
      }

    }


    /**
     * 
     * saveFileAsHtml Function
     * @params   String  $convertedMarkdownFile  Converted HTML of original Markdown contents.
     * @returns  String                          Successful output on file save.
     *
     */
    private function saveFileAsHtml($convertedMarkdownFile)
    {

      // Save contents of $convertedMarkdownFile to html file of the same name in /html directory.

      file_put_contents(__DIR__.'/html/'.$this -> fileName.'.html', $convertedMarkdownFile);
      return 'File successfully saved at /html/'.$this -> fileName.'.html';

    }

    /**
     * 
     * outputConvertedFile Function
     * @params string $input      User input arguements and options.
     * @returns string $output    Output of converted markdown string or markdown file location.
     */

    protected function outputConvertedFile(InputInterface $input, OutputInterface $output)
    {

      // Obtain variables for file location, console options and file name,
      // Check if the file extension is that of a markdown file .md,
      // If consoleOption returns true log the markdown log the coverted file to console,
      // If consoleOption returns false save file within html directory and output location.

      $fileLocation = $input->getArgument('markdownFile');
      $fileLocationArray = explode("/", $fileLocation);
      $fileNameWithExtention = end($fileLocationArray);
      $fileName = explode(".", $fileNameWithExtention)[0];
      $fileExtension = explode(".", $fileNameWithExtention)[1];
      $this -> fileName = $fileName;
      $this -> consoleOption = $input->getOption('log');

      if($this -> consoleOption && $fileExtension == 'md'){

        $output -> writeln([
          'Converted file console log only:',
          '',
          $this -> readFile($fileLocation),
          '',
          'To save to file use default command ConvertMarkdownToHtml <markdownFile>'
        ]);

      }elseif ($fileExtension == 'md'){

        $output -> writeln([
          $this -> readFile($fileLocation),
          'To view output in console use command option --log. ConvertMarkdownToHtml [--log] <markdownFile>'
        ]);

      }else{

        $output -> writeln([
          'Please select a markdown file with the extension ".md".'
        ]);

      }

    } 
  }