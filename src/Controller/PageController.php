<?php

namespace App\Controller;

use App\Repository\CertificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CertificationRepository $certification): Response
    {
        $certifications = $certification->findBy([], ['id'=>'DESC'],3);
        return $this->render('page/index.html.twig', [
            'websiteName' => 'Evolu',
            'certification' => $certifications,
        ]);
    }
}
