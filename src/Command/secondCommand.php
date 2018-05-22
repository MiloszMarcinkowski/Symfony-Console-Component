<?php

    namespace App\Command;

    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;
    use Symfony\Component\Console\Input\InputArgument;

    class secondCommand extends Command {

        protected function configure() {
            $this 
                // the name of the command (the part after "bin/console")
                ->setName('app:json')

                // the short description shown while running "php bin/console list"
                ->setDescription('Getting result...')
        
                // the full command description shown when running the command with the "--help" option
                ->setHelp('Command must take a string parameter containing array of products in JSON. It return PHP object and JSON string with products sorted by price ascending, and if price is the same sorted alphabetically ascending.
                e.g. command php bin/console app:json "[{"title": "H&M T-Shirt White","price": 10.99,"inventory": 10},{"title": "Magento Enterprise License","price": 1999.99,"inventory": 9999},{"title": "iPad 4 Mini","price": 500.01,"inventory": 2},{"title": "iPad Pro","price": 990.20,"inventory": 2},{"title": "Garmin Fenix 5","price": 789.67,"inventory": 34},{"title": "Garmin Fenix 3 HR Sapphire Performer Bundle","price": 789.67,"inventory": 12}]"')

                // configure an argument
                ->addArgument(
                    'json_string', 
                    InputArgument::REQUIRED, //for REQUIRED return string, for IS_ARRAY return array
                    'string parameter containing JSON array'
                );
        }
        protected function execute(InputInterface $input, OutputInterface $output) 
        {

                $output->writeln([ //outputs line to console adding "\n" at the end of line
                    '',
                    '=====Result in PHP object=======',
                    ''
                ]);
            
                $json = $input->getArgument('json_string'); // retrieve the argument value using getArgument()
                $obj = json_decode($json); // convert JSON string into PHP object
                // $output->writeln(var_dump($obj));

                uasort($obj, function($a, $b) { // array sort at a price ascending
                    if ($a->price == $b->price) { // if price is equal, sorted alphabetically ascending
                        // return 0;
                        return strnatcmp($a->title,$b->title);
                    } else {
                        return ($a->price < $b->price) ? -1 : 1; 
                    }
                });

                $output->writeln(var_dump($obj)); // output PHP object

                $output->writeln([ //outputs line to console adding "\n" at the end of line
                    '',
                    '=====Result in JSON string=======',
                    ''
                ]);

                $backToJSON = json_encode($obj); // return JSON string representation of PHP value
                $output->writeln(var_dump($backToJSON)); // output JSON string (in one line)
            }
    }
?>
