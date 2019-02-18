<?php
// src/Controller/skillController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Skills;
use App\Form\SkillsType;

class SkillsController extends Controller
{
      public function toito()                    
    {
        $skills =new Skills();
        
        $form = $this->createForm(SkillsType::class, $skills);

        return $this->render('skills/create.html.twig', [
        
            'entity' => $skills,
            'form' => $form->createView(),
            ]
        );
    }
    public function valid(Request $request)
    {
        $skills = new Skills();
        $form = $this->createForm(SkillsType::class, $skills);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $loisir = $form->getData();
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager ->persist($loisir);
            $entityManager ->flush();
            
            return $this->redirectToRoute('index');
        }
        
        return $this->render('skills/create.html.twig', [
            'entity' => $loisir, 
            'form' => $form->createView(),
            ]
            );
            
        }
    
    
public function edit($id)
{
    $entityManager = $this->getDoctrine()->getManager();
    $skills = $entityManager->getRepository(Skills::class)->findOneby(['id' => $id]);
    $form = $this->createForm(SkillsType::class, $skills);
    
    return $this->render('skills/create.html.twig', [
        'entity' => $skills,
        'form' => $form->createView(),
        ]);
}
}