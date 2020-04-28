<?php

namespace Alura\Courses\Controller;
class LoginForm extends ControllerWithHtml implements InterfaceRequestController
{
    public function processRequest(): void
    {
        echo $this->renderHtml('login/form.php', [
	   'title' => 'Login' 
	]);
    }
}
