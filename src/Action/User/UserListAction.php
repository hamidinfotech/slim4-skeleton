<?php

namespace App\Action\User;

use App\Action\Action;
use App\Domain\User\Service\UserList;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class UserListAction extends Action
{
    /** @var UserList */
    private $userList;

    /** @var PhpRenderer */
    private $view;

    /**
     * UserListAction constructor.
     * @param UserList $userList
     * @param PhpRenderer $view
     */
    public function __construct(UserList $userList, PhpRenderer $view)
    {
        $this->userList = $userList;
        $this->view = $view;
    }

    protected function action(): ResponseInterface
    {
        $users = $this->userList->all();

        return $this->view->render($this->response, 'user/list.php', compact('users'));
    }
}