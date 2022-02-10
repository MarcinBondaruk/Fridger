<?php
declare(strict_types=1);

namespace App\Presentation\UI\CLI;

use App\Core\Component\UserManagement\Application\Write\Command\CreateAdminCommand as AppCreateAdminCommand;
use App\Core\Port\Transport\CommandBus\ISyncCommandBus;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:create-user:admin',
    description: 'Creates an admin user.',
    aliases: ['app:add-admin'],
    hidden: false
)]
class CreateAdminCommand extends Command
{
    public function __construct(
        private ISyncCommandBus $commandBus
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $username = 'admin2';
            $email = 'admin2@fridger.com';
            $output->writeln("Creating admin with username: {$username} and email {$email}");
            $this->commandBus->dispatch(new AppCreateAdminCommand(
                $username,
                $email,
                'bardzotrudnehaslo'
            ));

            $output->writeln("Done.");
            return Command::SUCCESS;
        } catch(\Exception $e) {
            $output->writeln('An error occurred');
            $output->writeln($e->getMessage());
            return Command::FAILURE;
        }
    }

}
