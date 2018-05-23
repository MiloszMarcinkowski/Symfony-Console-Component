<?php

    namespace App\Tests\Command;

    // use Symfony\Component\Console\Command\Command;
    // use Symfony\Component\Console\Input\InputInterface;
    // use Symfony\Component\Console\Output\OutputInterface;
    // use Symfony\Component\Console\Input\InputArgument;

    use App\Command\CreateUserCommand;
    use Symfony\Bundle\FrameworkBundle\Console\Application;
    use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
    use Symfony\Component\Console\Tester\CommandTester;

    class firstCommandTest extends KernelTestCase {


        // public function testGreetings()
        // {
        //     $greetings = 'Hello World';
        //     $this->assertEquals('Hello World', $greetings);
        // }


        // protected function testconfigure() {
        //     $this
        //         // the name of the command (the part after "bin/console")
        //         ->setName('app:finder')
        
        //         // the short description shown while running "php bin/console list"
        //         ->setDescription('Getting result...')
        
        //         // the full command description shown when running the command with the "--help" option
        //         ->setHelp('Command must take a string parameter containing text and will check if “John” and “Mary” names are found the same number of times inside the provided text. Method is case insensitive. If the number of times is the same it return 1, if not it return 0. e.g. command $php bin/console app:finder "Mery has a cat and johnnny not"')

        //         // configure an argument
        //         ->addArgument('phrase', InputArgument::REQUIRED, 'String parameter for check' )
        //     ;
        // }

        public function testExecute() {

            $kernel = static::createKernel();
            $kernel->boot();
    
            $application = new Application($kernel);
    
            $command = $application->find('app:finder');
            $commandTester = new CommandTester($command);
            $commandTester->execute(array(
                'command'  => $command->getName(),
                'username' => 'Wouter',
            ));
    
            $output = $commandTester->getDisplay();
            $this->assertContains('Username: Wouter', $output);


            // $greetings = 'Hello World';
            // $this->assertEquals('Hello World', $greetings);

            // $output->writeln([ //outputs line to console adding "\n" at the end of line
            //     '=====Result=====',
            // ]);

            // $string = $input->getArgument('phrase'); // retrieve the argument value using getArgument()
            // $this->assertTrue(is_string($string),'Retrive argument is NOT string');

            // $lowerString = strtolower($string); // coverts a string to lowercase
            // $findMary = 'mary'; 
            // $findJohn = 'john';

            // // substr_count() count the number of times "world" occurs in the string        
            // if(substr_count($lowerString, $findMary) == substr_count($lowerString, $findJohn)) { 
            //     $output->write(1);
            //     // $output->writeln('In sentence "'.$string.'" "Mary" and "John" are found the same number of times');
            // } else {
            //     $output->write(0);
            //     // $output->writeln('Not the same number of times');
            // }
        }
    }
?>