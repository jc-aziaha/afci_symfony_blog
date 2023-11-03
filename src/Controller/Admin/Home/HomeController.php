<?php

namespace App\Controller\Admin\Home;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/admin')]
class HomeController extends AbstractController
{
    #[Route('/home', name: 'admin.home.index', methods:['GET'])]
    public function index(): Response
    {
        return $this->render('pages/admin/home/index.html.twig');
    }
}
