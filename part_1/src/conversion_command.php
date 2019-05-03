<?php
  // Namespace
  namespace Console;

  // Module Imports
  use Symfony\Component\Console\Input\InputInterface;
  use Symfony\Component\Console\Input\InputArgument;
  use Symfony\Component\Console\Input\InputOption;
  use Symfony\Component\Console\Output\OutputInterface;
  use Console\MarkdownToHtml;

  /**
   * 
   * Command configuration & execution class.
   * 
   */
  class ConvertMarkdownCommand extends MarkdownToHtml
  {

    protected function configure()
    {
      $this -> setName('ConvertMarkdownToHtml')
            -> setDescription('Convert Markdown File to HTML')
            -> setHelp('This command allows the user to input an existing markdown file and have it converted and saved to local storage as a html file.')
            -> addArgument(
              'markdownFile', 
              InputArgument::REQUIRED, 
              'Input location of markdown file.'
            )
            -> addOption(
              'log',
              null,
              InputOption::VALUE_NONE,
              'If set save to file will be skipped in favour of a console log of the conversion.'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {   
        $this -> outputConvertedFile($input, $output);
    }
  }

?>