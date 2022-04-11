<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeCommand extends Command
{
    protected const SQL_DIR = '../migrations';

    protected function configure(): void
    {
        $this->setName('make')
             ->setDescription('Create a migration file')
             ->setHelp('Hello, it`s stell. <info>Helper for opencart migrations</info>');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $fileName = 'migration_' . (new DateTime)->getTimestamp();

        try {
            if (!file_exists(self::SQL_DIR) && !mkdir(self::SQL_DIR, 0777, true) && !is_dir(self::SQL_DIR)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', self::SQL_DIR));
            }

            file_put_contents(self::SQL_DIR . "/$fileName.sql", "", LOCK_EX);

            if (!file_exists(self::SQL_DIR . "/$fileName.sql")) {
                throw new \RuntimeException('File does not exist');
            }

            $output->writeln('Created file for migration: <info>' . $fileName . '</info>');

            return Command::SUCCESS;
        } catch (\RuntimeException $e) {
            $output->writeln('<error>File not created</error>');

            return Command::FAILURE;
        }
    }
}