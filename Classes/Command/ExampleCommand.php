<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension: news_mirror.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Slavlee\CustomPackage\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Registered inside Services.yaml
 */
#[AsCommand(
    name: 'examples:dosomething',
    description: 'A command that does nothing and always succeeds.',
    aliases: ['examples:dosomethingalias'],
)]
class ExampleCommand extends Command
{
    /**
     * Configure the command by defining the name, options and arguments
     */
    protected function configure()
    {
        $this
            ->setDescription('Lorem Ipsum description.')
            ->addArgument(
                'pid',
                InputArgument::REQUIRED,
                'Storage folder of the records'
            );
    }

    /**
     * Executes the command for showing sys_log entries
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        return Command::SUCCESS;
    }
}
