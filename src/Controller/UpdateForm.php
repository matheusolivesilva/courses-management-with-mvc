<?php 

namespace Alura\Courses\Controller;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ResponseInterface;
use Nyholm\Psr7\Response;
use Alura\Courses\Entity\Course;
use Alura\Courses\Infra\EntityManagerCreator;
use Alura\Courses\Helper\{HtmlRendererTrait, FlashMessageTrait};

class UpdateForm  implements RequestHandlerInterface
{
    use HtmlRendererTrait, FlashMessageTrait;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $coursesRepository;

    public function __construct(EntityManagerInterface $entityManager) 
    {
        $this->coursesRepository = $entityManager->getRepository(Course::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
	    $request->getQueryParams()['id'],
	    FILTER_VALIDATE_INT);
        $response = new Response(302, ['Location' => '/list-courses']);

	    
	if (is_null($id) || $id === false) {
	    $this->defineMessage('danger', 'Invalid course id!');
            return $response;	
	}

	$course = $this->coursesRepository->find($id);
	$html = $this->renderHtml(
            'courses/form.php',
	    [
	        'course' => $course,
		'title' => 'Update Course: ' . $course->getDescription()
	    ]);
	return new Response(200, [], $html);
    }

    
}
