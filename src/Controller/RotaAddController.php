<?php

namespace App\Controller;

use App\Entity\Rotas;
use App\Entity\Shifts;
use App\Entity\Shops;
use App\Entity\staff;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RotaAddController extends AbstractController
{
    /**
     * @Route("/addRota", name="rota")
     */
    public function index(): Response
    {
        $shop = new shops();
        $shop->setName('FunHouse');

        $staff = new staff();
        $staff->setFirstName('Black');
        $staff->setSurname('widow');

        // relates this staff to the shop
        $staff->setShopId($shop);

        $rota = new Rotas();
        $rota->setShopId($shop);
        $rota->setWeekCommenceDate('2021-06-22');

        $shift = new Shifts();
        $shift->setRotaId($rota);
        $shift->setStaffId($staff);
        $shift->setStartTime('09:00');
        $shift->setEndTime('05:00');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($shop);
        $entityManager->persist($staff);
        $entityManager->persist($rota);
        $entityManager->persist($shift);
        $entityManager->flush();

        return new Response(
            'Saved new Shop with id: '.$shop->getId()
            .' new Staff with id: '.$staff->getId()
            .' new rota with id: '.$rota->getId()
            .' new shift with id: '.$shift->getId()
        );
    }
}
