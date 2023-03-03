<?php

namespace Acme;

class RegisterUser
{
    /**
     * @var UserRepository
     */
    private $repository;
    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(UserRepository $repository, Mailer $mailer)
    {
        $this->repository = $repository;
        $this->mailer = $mailer;
    }

    public function register($user)
    {
        $this->repository->create($user);
        $this->mailer->sendWelcome($user['email']);
    }
}
