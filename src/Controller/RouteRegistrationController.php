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
            $user = new User();
            $user->setName($form->getData()['name']);
            $user->setAge($form->getData()['age']);
            $user->setDescription($form->getData()['description']);
            $user->setRouteDescription($form->getData()['route_description']);
            $user->setRole($form->getData()['role']);

            $route = new Route();
            $route->setHomeLocation($form->getData()['home_location']);
            $route->setWorkLocation($form->getData()['work_location']);

            $user->setRoute($route);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->persist($route);
            $entityManager->flush();

            return new Response(
                'Saved new user with id: '.$user->getId()
                .' and new route with id: '.$route->getId()
            );
        }

        return $this->render('registration/route-register.html.twig', ['route_form' => $form->createView()]);
    }
}
