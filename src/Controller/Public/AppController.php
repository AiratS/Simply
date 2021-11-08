<?php

declare(strict_types=1);

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route(
     *     "/{publicPath}",
     *     requirements={"publicPath"="^(?!admin|api).+"},
     *     defaults={"publicPath": null},
     *     name="public_path"
     * )
     */
    public function index(): Response
    {
        return $this->render('public/index.html.twig');
    }
}
