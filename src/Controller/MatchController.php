<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 06/05/2019
 * Time: 17:05
 */

namespace App\Controller;

use App\Entity\User;
use App\Form\MatchFilterType;
use App\Service\MatchMaker;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MatchController extends Controller
{

    public function index(Request $request, MatchMaker $matchMaker)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($request->query->get('user'));


        $form = $this->createForm(MatchFilterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $matches= $matchMaker->findMatches($user, $form->getData()['home_distance'],
                                                     $form->getData()['work_distance']);
        } else {
            $matches= $matchMaker->findMatches($user, 100000, 100000);
        }

        $matchedUsers = $matchMaker->getMatchedUsers($matches);

        return $this->render('home/matches.html.twig', ['users' => $matchedUsers,
                                                              'matchDetails' => $matches,
                                                              'title' => 'Matches',
                                                              'filter_form' => $form->createView()
                                                              ]);
    }
}
