<?php


namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractFOSRestController
{
    /**
	 * Gets all users
	 *
     * @param Request $request
     * @return array|string[]|Response
     */
    public function indexAction(Request $request)
	{
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->handleview($this->view($users));
    }

    /**
	 * Creates a new user
	 *
     * @param Request $request
     * @return Response
     */
    public function createAction (Request $request): Response
    {
        $data['userName'] = $request->get('username');
        $data['fullName'] = $request->get('fullname');
        $data['email'] = $request->get('email');

        $user = new User();
        $form = $this->createForm(UserType::class,$user);

        $form->submit($data);
        if(!$form->isSubmitted() || !$form->isValid()) {
			// throw exception
			$return = $this->handleview($this->view($form, Response::HTTP_BAD_REQUEST));
		}
        else
        {
            $conn =$this->getDoctrine()->getManager();
			$conn->persist($user);
			$conn->flush();
			$return = $this->handleview($this->view($user, Response::HTTP_CREATED));
        }

        return $return;
    }
}