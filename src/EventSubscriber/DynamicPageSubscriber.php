<?php
namespace App\EventSubscriber;

use App\Entity\Section;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class DynamicPageSubscriber implements EventSubscriberInterface
{
    /**
     * @var \Twig\Environment
     */
    private $twig;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    public function __construct( Environment $twig, EntityManagerInterface $em)
    {
        $this->twig     = $twig;
        $this->em = $em;
    }

    public function onKernelController(ControllerEvent $event)
    {
        $this->twig->addGlobal( 'sectionBde', $this->em->getRepository(Section::class)->findByName("BDE") );
        $this->twig->addGlobal( 'sectionBds', $this->em->getRepository(Section::class)->findByName("BDS") );
        $this->twig->addGlobal( 'sectionBda', $this->em->getRepository(Section::class)->findByName("BDA") );
        $this->twig->addGlobal( 'sectionPe', $this->em->getRepository(Section::class)->findByName("PE") );
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}