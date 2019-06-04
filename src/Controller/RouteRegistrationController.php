<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 24/04/2019
 * Time: 12:00
 */

namespace App\Controller;

use App\Form\RouteRegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;

class RouteRegistrationController extends Controller
{
    public function index(Request $request, UserInterface $user)
    {
        $form = $this->createForm(RouteRegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirect('matches');
        }
        return $this->render('registration/route-register.html.twig', ['route_form' => $form->createView()]);
    }
}
