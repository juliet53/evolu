<?php

namespace App\Controller;

use App\Entity\Certification;
use App\Repository\CertificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CertificationController extends AbstractController
{
    #[Route('/certification', name: 'app_certification')]
    public function index(CertificationRepository $certificationRepository): Response
    {
        $certifications = $certificationRepository->findBy([], ['id' => 'DESC']);
        
        return $this->render('certification/index.html.twig', [
            'certifications' => $certifications,
        ]);
    }
    
    #[Route('/certification/{id}', name: 'app_certification_show')]
    public function show(Certification $certification): Response
    {
       
        return $this->render('certification/show.html.twig', [
            'certification' => $certification,
        ]);
    }
}
