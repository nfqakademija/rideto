<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 24/04/2019
 * Time: 12:00
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\WorkShift;
use Doctrine\ORM\EntityRepository;

class RouteRegistrationController extends Controller
{
    public function index() {
        $allShifts = $this->getDoctrine()->getRepository(WorkShift::class)->findAll();

        return $this->render('registration/route-register.html.twig', ['allShifts' => $allShifts]);
    }

}