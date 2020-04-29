<?php
namespace Alura\Courses\Controller;
use Alura\Courses\Entity\User;
use Alura\Courses\Infra\EntityManagerCreator;
use Alura\Courses\Helper\FlashMessageTrait;

class DoLogin implements InterfaceRequestController
{
	use FlashMessageTrait;
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
			$this->defineMessage('danger','Email entered is not a valid email' );
			header('Location: /login');
			exit();
		}

		$password = filter_input(INPUT_POST,
			'password',
			FILTER_SANITIZE_STRING);
			/** @var $user */
		$user = $this->usersRepository
			->findOneBy(['email' => $email]); 

		if (is_null($user) || !$user->isPasswordCorrect($password)) {
			$this->defineMessage('danger', 'Email or password entered are not valid');
			header('Location: /login');
			return;
		}

		$_SESSION['logged'] = true;
			header('Location: /list-courses');
    }
}
