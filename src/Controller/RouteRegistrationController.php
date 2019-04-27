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
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\WorkShift;
use Doctrine\ORM\EntityRepository;

class RouteRegistrationController extends Controller
{
    public function index() {
        $route = new Route();
        $form = $this->createForm(RouteRegisterType::class);
        return $this->render('registration/route-register.html.twig', ['route_form' => $form->createView()]);
    }

}