<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Entity\Loisir;
use App\Entity\Formation;
use App\Entity\Domaine;

class LuckyController extends Controller
{
      public function number()
    {
        $number = random_int(0, 100);

        
         $loisirs = $this->getDoctrine()
        ->getRepository(Loisir::class)
        ->findAll();
        
        $formations = $this->getDoctrine()
        ->getRepository(Formation::class)
        ->findAll();
        
        $domaines = $this->getDoctrine()
        ->getRepository(Domaine::class)
        ->findAll();

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
            'loisirs' => $loisirs,
            'formations' => $formations,
            'domaines' => $domaines,
        ));
    }
}