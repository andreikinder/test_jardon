<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Acme\UserRepository;
use Acme\Mailer;

class RegisterUserSpec extends ObjectBehavior
{
    function let(UserRepository $repository, Mailer $mailer)
    {

        $this->beConstructedWith($repository, $mailer);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('\Acme\RegisterUser');
    }

    function it_create_a_new_user(UserRepository $repository)
    {
        $user = ['username' => 'John Doe', 'email' => "jonhdoe@gmail.com1"];
        $repository->create($user)->shouldBeCalled();
        $this->register($user);
    }

    function it_send_a_welcome_email(Mailer $mailer)
    {
        $user = ['username' => 'John Doe', 'email' => "jonhdoe@gmail.com1"];
        $mailer->sendWelcome("jonhdoe@gmail.com1")->shouldBeCalled();
        $this->register($user);
    }
}
