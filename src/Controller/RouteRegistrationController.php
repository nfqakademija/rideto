<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 24/04/2019
 * Time: 12:00
 */

namespace App\Controller;


use App\Entity\Route;
use App\Form\RouteRegisterType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\WorkShift;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;

class RouteRegistrationController extends Controller
{
    public function index(Request $request, UserRepository $userRepository)
    {
        $route = new Route();
        $form = $this->createForm(RouteRegisterType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $userRepository->save($user);
        }

        return $this->render('registration/route-register.html.twig', ['route_form' => $form->createView()]);
    }

}