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
use Symfony\Component\Security\Core\User\UserInterface;

class RedirectController extends AbstractController
{
    public function redirectAfterLogin(UserInterface $user)
    {
        if ($user->getRoute() !== Null) {
            return new RedirectResponse($this->generateUrl('matches'));
        } else {
            return new RedirectResponse($this->generateUrl('register_route'));
        }
    }
}