<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'build:dev',
    description: 'Bulds the application for development.',
)]
class BuildDevCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('apiclient', InputArgument::OPTIONAL, 'Adds all the dependencies to build the Api Platform admin and scaffolding tools.')
            ->addOption('exclude-migration', null, InputOption::VALUE_NONE, 'Builds the application except the database migration.')
            ->addOption('existing-db', null, InputOption::VALUE_NONE, 'Reverse engineers an existing database and builds the models and generates all the getters and setters for the application.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
