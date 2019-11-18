<?php


namespace App\Controller\campus;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Sponsor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Content;
class CampusController extends AbstractController
{

    /**
     * @Route({"/campus/sponsors"}, name="sponsors")
     */
    public function sponsors(Request $request) {
// you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createSponsor(EntityManagerInterface $entityManager)

        $entityManager = $this->getDoctrine()->getManager();

        //$sponsor = new Sponsor();
        //$sponsor->setName('Subway');
        //$sponsor->setOffice("BDA");
        //$sponsor->setOffer('-20% sur les menus non étudiants');


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        //$entityManager->persist($sponsor);

        // actually executes the queries (i.e. the INSERT query)
        //$entityManager->flush();

        $sponsors = $this->getDoctrine()->getRepository(Sponsor::class)->findSponsors();
        return $this->render('campus/sponsors.html.twig', [
            'controller_name' => 'CampusController',
            "navigation_description" => $this->getDoctrine()->getRepository(Content::class)->findContentByKeyAndLang("navigation_description","BDE", $request->getLocale()),
            "lang" => $request->getLocale(),
            "sponsors" => $sponsors
        ]);
    }


}