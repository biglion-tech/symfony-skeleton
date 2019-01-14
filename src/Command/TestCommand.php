<?php

namespace App\Command;

use App\Infrastructure\Tmp\ImportReceiptData;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ImportHistoryReceiptData
 * @package App\Command
 */
class TestCommand extends Command
{
    /**
     * Конфигурация вызова команды импорта
     */
    protected function configure()
    {
        $this
            ->setName('app:test:test-command')
            ->setDescription('some test command')
            ->setHelp('for test')
            ->addArgument('id', InputArgument::OPTIONAL, 'some id');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
    */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('In process ...');
        $output->writeln('Get arguments:');
        $output->writeln($input->getArguments());
        $output->writeln('Finished');
    }
}
