<?php

namespace App\Controller;

use App\Form\MatchFilterType;
use App\Service\ArrayPaginator;
use App\Service\MatchMaker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class QuickMatchController extends AbstractController
{
    /**
     * @Route("/quick/match", name="quick_match")
     * @param Request $request
     * @param MatchMaker $matchMaker
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, MatchMaker $matchMaker, ArrayPaginator $paginator)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }
        if($this->get('session')->get('user')) {
            $user = $this->get('session')->get('user');
        } else {
            return new RedirectResponse($this->generateUrl('quick_search'));
        }
        $form = $this->createForm(MatchFilterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $matches = $matchMaker->findMatches(
                $user,
                $form->getData()['home_distance'],
                $form->getData()['work_distance']
            );
        } else {
            $matches= $matchMaker->findMatches($user, 100000, 100000);
        }

        $page = $request->query->get('page');
        $matches = $paginator->paginateArray($matches, $page);

        return $this->render('home/matches.html.twig', ['matches' => $matches,
            'title' => 'Matches',
            'filter_form' => $form->createView(),
            'page' => $page
        ]);
    }
}
