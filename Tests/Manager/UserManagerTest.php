<?php

namespace Hackzilla\Bundle\TicketBundle\Tests\User;

use Doctrine\ORM\EntityRepository;
use Hackzilla\Bundle\TicketBundle\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class UserManagerTest extends WebTestCase
{
    private $object;
    private $tokenStorage;

    public function setUp()
    {
        $this->tokenStorage = new TokenStorage();

        $this->object = new UserManager(
            $this->tokenStorage,
            $this->getMockUserRepository()
        );
    }

    private function getMockUserRepository()
    {
        $userRepository = $this
            ->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        return $userRepository;
    }

    public function tearDown()
    {
        unset($this->object);
    }

    public function testObjectCreated()
    {
        $this->assertInstanceOf(UserManager::class, $this->object);
    }
}
