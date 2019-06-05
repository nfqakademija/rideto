<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\QuickSearchRouteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;


class QuickSearchController extends AbstractController
{
    /**
     * @Route("/quick/search", name="quick_search")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $routeForm = $this->createForm(QuickSearchRouteType::class);
        $routeForm->handleRequest($request);

        if ($routeForm->isSubmitted() && $routeForm->isValid()) {
            if(session_status() == PHP_SESSION_NONE) {
                $session = new Session();
                $session->start();
                $user = new User();
                $user->setRoute($routeForm->getData()['route']);
                $user->setRole('client');
                $session->set('user', $user);
            } else {
                $user = $session->get('user');
                $user->setRoute($routeForm->getData()['route']);
            }
        }

        return $this->render('quick_search/index.html.twig', [
            'title' => 'Quick Search',
            'route_form' => $routeForm->createView()
        ]);
    }
}
