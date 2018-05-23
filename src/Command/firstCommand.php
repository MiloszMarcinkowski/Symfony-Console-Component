<?php

    namespace App\Command;

    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;
    use Symfony\Component\Console\Input\InputArgument;


    class firstCommand extends Command {
        
        protected function configure() {
            $this
                // the name of the command (the part after "bin/console")
                ->setName('app:finder')
        
                // the short description shown while running "php bin/console list"
                ->setDescription('Getting result...')
        
                // the full command description shown when running the command with the "--help" option
                ->setHelp('Command must take a string parameter containing text and will check if “John” and “Mary” names are found the same number of times inside the provided text. Method is case insensitive. If the number of times is the same it return 1, if not it return 0. e.g. command $php bin/console app:finder "Mery has a cat and johnnny not"')

                // configure an argument
                ->addArgument('phrase', InputArgument::REQUIRED, 'String parameter for check' )
            ;
        }
        protected function execute(InputInterface $input, OutputInterface $output) {

            $output->writeln([ //outputs line to console adding "\n" at the end of line
                '=====Result=====',
            ]);

            $string = $input->getArgument('phrase'); // retrieve the argument value using getArgument()
            $lowerString = strtolower($string); // coverts a string to lowercase
            $findMary = 'mary'; 
            $findJohn = 'john';

            // substr_count() count the number of times "world" occurs in the string        
            if(substr_count($lowerString, $findMary) == substr_count($lowerString, $findJohn)) { 
                $output->write(1);
                // $output->writeln('In sentence "'.$string.'" "Mary" and "John" are found the same number of times');
            } else {
                $output->write(0);
                // $output->writeln('Not the same number of times');
            }
        }
    }
?>