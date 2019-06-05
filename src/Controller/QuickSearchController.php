<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\QuickSearchRouteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }
        $routeForm = $this->createForm(QuickSearchRouteType::class);
        $routeForm->handleRequest($request);

        if ($routeForm->isSubmitted() && $routeForm->isValid()) {
            if($this->get('session')->get('user')) {
                $user = $this->get('session')->get('user');
                $user->setRoute($routeForm->getData()['route']);
                $this->get('session')->set('user', $user);
            } else {
                $user = new User();
                $user->setRoute($routeForm->getData()['route']);
                $user->setRole('client');
                $this->get('session')->set('user', $user);
            }
            return new RedirectResponse($this->generateUrl('quick_match'));
        }

        return $this->render('quick_search/index.html.twig', [
            'title' => 'Quick Search',
            'route_form' => $routeForm->createView()
        ]);
    }
}
