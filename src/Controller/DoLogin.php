<?php

namespace Alura\Courses\Controller;

use Alura\Courses\Entity\User;
use Alura\Courses\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DoLogin implements RequestHandlerInterface 
{
	use FlashMessageTrait;
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $usersRepository;

    public function __construct(EntityManagerInterface $entityManager){
	$this->usersRepository = $entityManager
	    ->getRepository(User::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_var(
	    $request->getParsedBody()['email'],
	    FILTER_VALIDATE_EMAIL
	);

        $redirectLogin = new Response(302, ['Location' => '/login']);
	if (is_null($email) || $email === false) {
            $this->defineMessage(
	        'danger',
		'Email entered is not a valid email'
	    );

	    return $redirectLogin; 
	}

	$password = filter_var(
	    $request->getParsedBody()['password'],
	    FILTER_SANITIZE_STRING
        );

        /** @var $user */
	$user = $this->usersRepository
	    	    ->findOneBy(['email' => $email]); 

        if (is_null($user) || !$user->isPasswordCorrect($password)) {
            $this->defineMessage('danger', 'Email or password entered are not valid');
	    return $redirectLogin;
        }

	$_SESSION['logged'] = true;
        
	return new Response(302, ['Location' => '/list-courses']);
    }
}
