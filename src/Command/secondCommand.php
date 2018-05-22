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
            ->setDescription('Creates a new user.')
    
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to create a user...')

            // configure an argument
            // ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
            // ...
            ->addArgument(
                'json', 
                InputArgument::REQUIRED, 
                'JSON array'
            );
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
            $output->writeln('Whoa!!!');

            // retrieve the argument value using getArgument()
            // $output->writeln('Username: '.$input->getArgument('username'));

            // $text = ''; 
            $json = $input->getArgument('json'); //for REQUIRED string, for IS_ARRAY array
            $jsonTest = '[{"name":"milosz","age":23},{"name":"martyna","age":22}]';
            $obj = json_decode($json);
            $type = gettype($json);
            // $tmp = $obj->name;
            $output->writeln(var_dump($obj));

            uasort($obj, function($a, $b) {
                if ($a->price == $b->price) {
                    // return 0;
                    return strnatcmp($a->title,$b->title);
                    // uasort($obj, function($a, $b) {
                    //     return ($a->title < $b->title) ? -1 : 1; //not working
                    // });
                } else {
                    return ($a->price < $b->price) ? -1 : 1;
                }
            });

            $output->writeln(var_dump($obj));

            $backToJSON = json_encode($obj);
            $output->writeln(var_dump($backToJSON));

            // $output->writeln($obj);
            // if (count($json) > 0) {
            //     $text .= implode(', ', $json);
            //     $output->writeln(implode(', ', $json));
            // }
        }

}
