<?php 

namespace Alura\Courses\Controller;
use Alura\Courses\Entity\Course;
use Alura\Courses\Infra\EntityManagerCreator;

class UpdateForm  extends ControllerWithHtml implements InterfaceRequestController
{

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $coursesRepository;

    public function __construct() 
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
	$this->coursesRepository = $entityManager->getRepository(Course::class);
    }

    public function processRequest(): void
    {
        $id = filter_input(
	    INPUT_GET,
	    'id',
	    FILTER_VALIDATE_INT);
	if (is_null($id) || $id === false) {
	    header('Location: /list-courses');
	}

	$course = $this->coursesRepository->find($id);
	echo $this->renderHtml(
            'courses/form.php',
	    [
	        'course' => $course,
		'title' => 'Update Course: ' . $course->getDescription()
	    ]);
    }

    
}
