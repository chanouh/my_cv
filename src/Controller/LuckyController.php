<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Formation;
use App\Entity\Skills;

class LuckyController extends Controller
{
      public function number()
    {
        $number = random_int(0, 100);
        
        $forma = $this->getDoctrine()
        ->getRepository(Formation::class)
        ->findAll();
        
         $skills = $this->getDoctrine()
        ->getRepository(Skills::class)
        ->findAll();

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
            'formations' => $forma,
            'skills' => $skills,
        ));
    }
}