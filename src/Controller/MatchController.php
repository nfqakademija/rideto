<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 06/05/2019
 * Time: 17:05
 */

namespace App\Controller;

use App\Form\MatchFilterType;
use App\Service\ArrayPaginator;
use App\Service\MatchMaker;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class MatchController extends Controller
{

    /**
     * @param Request $request
     * @param MatchMaker $matchMaker
     * @param TokenStorageInterface $tokenStorage
     * @param ArrayPaginator $paginator
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, MatchMaker $matchMaker, TokenStorageInterface $tokenStorage, ArrayPaginator $paginator)
    {

        $user = $tokenStorage->getToken()->getUser();
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
