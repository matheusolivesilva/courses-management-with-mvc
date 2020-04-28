<?php
namespace Alura\Courses\Controller;
use Alura\Courses\Entity\User;
use Alura\Courses\Infra\EntityManagerCreator;
class DoLogin implements InterfaceRequestController
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $usersRepository;

    public function __construct(){
        $entityManager = (new EntityManagerCreator())->getEntitymanager();
	$this->usersRepository = $entityManager->getRepository(User::class);
    }

    public function processRequest(): void
    {
        $email = filter_input(INPUT_POST,
	    'email',
	    FILTER_VALIDATE_EMAIL
	);

	if (is_null($email) || $email === false) {
            echo 'Invalid email';
	    exit();
	}

	$password = filter_input(INPUT_POST,
	    'password',
	    FILTER_SANITIZE_STRING);
        /** @var $user */
	$user = $this->usersRepository
	    ->findOneBy(['email' => $email]); 

	if (is_null($user) || $user->isPasswordCorrect($password)) {
            echo 'Invalid e-mail or password';
	    return;
	}
        header('Location: /list-courses');
    }
}
