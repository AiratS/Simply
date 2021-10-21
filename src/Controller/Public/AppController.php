<?php

declare(strict_types=1);

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/{publicPath}", name="public_path", defaults={"publicPath": null})
     */
    public function index()
    {
        return $this->render('public/index.html.twig');
    }
}
