<?php

namespace DigipolisGent\SymfonyCommon\Command;

use DigipolisGent\SymfonyCommon\Entity\UserInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateUserCommand extends ContainerAwareCommand
{
    /**
     * @var SymfonyStyle
     */
    private $io;

    /**
     * @var string
     */
    private $userClass;

    protected function configure()
    {
        $this
            ->setName('sf-common:user:create')
            ->setDescription('Create a new user')
            ->addOption('admin', 'a', InputOption::VALUE_NONE, 'To create an admin user')
        ;
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->io = new SymfonyStyle($input, $output);
        $this->userClass = $this->getContainer()->getParameter('symfony_common.user_class');

        if(null === $this->userClass || !class_exists($this->userClass)) {
            throw new \InvalidArgumentException(
                'If you want to create a user define the symfony_common.user_class in the config.yml file'
            );
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = (string)$this->io->ask('username');
        $plainPassword = (string)$this->io->askHidden('password');
        $class = $this->userClass;

        $user = new $class();

        if(!$user instanceof UserInterface) {
            throw new  \RuntimeException(sprintf('The user class %s does not extends BaseUser', get_class($user)));
        }

        $user->setPlainPassword($plainPassword);
        $user->setUsername($username);

        if ($input->getOption('admin')) {
            $user->setRoles(['ROLE_ADMIN']);
        }

        $this->getContainer()->get('doctrine.orm.default_entity_manager')->persist($user);
        $this->getContainer()->get('doctrine.orm.default_entity_manager')->flush($user);
        $this->io->success(sprintf('A new user with username "%s" was created', $user->getUsername()));
    }
}
