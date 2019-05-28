<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 24/04/2019
 * Time: 12:00
 */

namespace App\Controller;

use App\Entity\Route;
use App\Entity\User;
use App\Form\RouteRegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RouteRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $form = $this->createForm(RouteRegisterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirect('matches?user=' . $user->getId());
        }

        return $this->render('registration/route-register.html.twig', ['route_form' => $form->createView()]);
    }
}
