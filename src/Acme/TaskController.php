<?php

namespace Acme;

class TaskController
{
    /**
     * @var Authtorizer
     */
    protected $auth;

    public function __construct(Authtorizer $authtorizer, TaskRepository $repository)
    {
        $this->auth = $authtorizer;
        $this->repository = $repository;
    }

    public function store()
    {
        if ($this->auth->guest()) return 'redirect';

        $this->repository->create('...');
    }

    public function show(){
        return 'a task';
    }
}
