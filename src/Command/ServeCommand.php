<?php

namespace App\Command;

/**
 * Citadel local sever
 * --------------------
 * An extremely minimal web server.
 * Made by Alex Melendez 2022.
 * We need more contributors.
 */

use Exception;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

#[AsCommand(
    name: 'serve',
    description: 'Starts a local dev server.',
)]
class ServeCommand extends Command
{
    private $host;
    private $port;
    private $directory;

    public function __construct()
    {
        $this->host = "localhost";
        $this->port = 8000;
        $this->directory = "public";

        // you *must* call the parent constructor
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('ip', InputArgument::OPTIONAL, 'Change the ip address on where the app will be served.')
            ->addOption('port', null, InputOption::VALUE_OPTIONAL, 'Port number, default is 8000.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $ipAddress = $input->getArgument('ip');

        if ($ipAddress) {
            $this->host = $ipAddress;
        }

        if ($input->getOption('port')) {
            $this->port = $input->getOption('port');
        }

        $localServerCommand = 'php -S '.$this->host.':'.$this->port.' -t '.$this->directory;

        $process = Process::fromShellCommandline($localServerCommand, null, null, null, null);
        $io->success('Server running on:'.$this->host.':'.$this->port);
        $io->note('We recommend using the symfony CLI tool to run this server, we are looking to imporve the I/O and logs of this local server in the future.');

        $process->run();

        if (!$process->isSuccessful()) {
            try {
                Process::fromShellCommandline('killall -9 php')->run();
            } catch(Exception $e) {
                $io->warning($e);
            } finally {
                throw new ProcessFailedException($process);
                $io->warning('Killed a previous process, please run again the server.');
            }
        }

        $io->success('Development server stopped!, you can use --help to see your options.');

        return Command::SUCCESS;
    }
}
