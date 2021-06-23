<?php

namespace App\Controller;

use App\Entity\Shifts;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetSingleManningController extends AbstractController
{
    /**
     * @Route("/singlemanning", name="singlemanning")
     */
    public function index(): Response
    {

        return new Response(

        );
    }
}
