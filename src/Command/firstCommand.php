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
                ->setName('finder')
        
                // the short description shown while running "php bin/console list"
                ->setDescription('Creates a new user.')
        
                // the full command description shown when running the command with
                // the "--help" option
                ->setHelp('This command allows you to create a user...')

                // configure an argument
                // ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
                // ...
                ->addArgument('sentence', InputArgument::REQUIRED, 'String parameter for check' )
                
            ;
        }
        protected function execute(InputInterface $input, OutputInterface $output)
        {
            // outputs multiple lines to the console (adding "\n" at the end of each line)
            $output->writeln([
                'User Creator',
                '============',
                '',
            ]);

            // outputs a message followed by a "\n"
            $output->writeln('Whoa!');

            // retrieve the argument value using getArgument()
            // $output->writeln('Username: '.$input->getArgument('username'));

            $string = $input->getArgument('sentence');
            $lowerString = strtolower($string);
            $findMary = 'mary';
            $findJohn = 'john';
            $result = 0;

            if(substr_count($lowerString, $findMary) == substr_count($lowerString, $findJohn)) {
                $result = 1;
                $output->writeln('In sentence "'.$string.'" Mary and John found the same number of times');
            } else {
                $output->writeln('Not the same number of times');
            }
        }
    }