<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 06/05/2019
 * Time: 17:05
 */

namespace App\Controller;



use App\Entity\User;
use App\Service\MatchMaker;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MatchController extends Controller
{

    public function index(Request $request, MatchMaker $matchMaker)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class )
            ->find($request->query->get('user'));

        $matches= $matchMaker->findMatches($user, 100000, 100000);
        $matchedUsers = $matchMaker->getMatchedUsers($matches);

        return $this->render('home/matches.html.twig', ['users' => $matchedUsers, 'matchDetails' => $matches, 'title' => 'Matches']);
    }

}