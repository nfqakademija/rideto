<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Route as UserRoute;
use App\Form\MatchFilterType;
use App\Service\MatchMaker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function index(Request $request, MatchMaker $matchMaker)
    {
        $user = new User();
        $route = new UserRoute();
        $route->setHomeLocation('EihQaWzEl27FsyBnYXR2xJcgMTUsIFJpbmdhdWRhaSwgTGl0aHVhbmlhIjASLgoUChIJK5sfjKQh50YRdGMir1MkEgMQDyoUChIJD16-vqMh50YRt7rzJ9j7cr8');
        $route->setWorkLocation('EiRCcmFzdG9zIGdhdHbElyAxNCwgS2F1bmFzLCBMaXRodWFuaWEiMBIuChQKEglR0T6lBiLnRhF7DAxS4r2SaBAOKhQKEgn52adUACLnRhEhTzFKDJUW6w');
        $user->setRoute($route);
        $user->setRole('client');
        $form = $this->createForm(MatchFilterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $matches= $matchMaker->findMatches(
                $user,
                $form->getData()['home_distance'],
                $form->getData()['work_distance']
            );
        } else {
            $matches= $matchMaker->findMatches($user, 100000, 100000);
        }

        return $this->render('home/matches.html.twig', ['matches' => $matches,
            'title' => 'Matches',
            'filter_form' => $form->createView()
        ]);
    }
}
