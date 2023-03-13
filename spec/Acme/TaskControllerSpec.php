<?php

namespace spec\Acme;

use Acme\TaskController;
use PhpSpec\ObjectBehavior;
use \Acme\Authtorizer;
use \Acme\TaskRepository;

class TaskControllerSpec extends ObjectBehavior
{

    function let (Authtorizer $authtorizer, TaskRepository $repository) {
        $this->beConstructedWith($authtorizer, $repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TaskController::class);
    }

    function it_disallows_guests_from_creating_tasks (Authtorizer $authtorizer) {
        $authtorizer->guest()->willReturn(true);
        $this->store()->shouldReturn('redirect');
    }

    function it_create_task(Authtorizer $authtorizer, TaskRepository $repository){
        $authtorizer->guest()->willReturn(false);

        $repository->create('...')->shouldBeCalled();
        $this->store();
    }
}
