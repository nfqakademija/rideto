<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 03/06/2019
 * Time: 21:31
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class RedirectController extends AbstractController
{
    public function redirectAfterLogin(TokenStorageInterface $tokenStorage)
    {
        $user = $tokenStorage->getToken()->getUser();
        if ($user->getRoute() !== null) {
            return new RedirectResponse($this->generateUrl('matches'));
        } else {
            return new RedirectResponse($this->generateUrl('register_route'));
        }
    }
}
