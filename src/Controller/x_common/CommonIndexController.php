<?php

// The prepending 'x' allows Symfony to load this controller after all the other ones. Hacky fix for the route 'dynamicPage' which is non-functional to prevent it gaining priority over JE and PE routes
namespace App\Controller\x_common;

use App\Entity\Page;
use App\Entity\Section;
use Swift_SmtpTransport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Enquiry;
use App\Entity\EnquiryType;
use Symfony\Component\HttpFoundation\Request;


class CommonIndexController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param \Swift_Mailer $mailer
     * @param \Swift_Mailer $mailerconfirmation
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function contact(Request $request, \Swift_Mailer $mailer, \Swift_Mailer $mailerconfirmation)
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(EnquiryType::class , $enquiry);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $enquiry = $form->getData();

                $message = (new \Swift_Message())
                    ->setSubject($enquiry->getOffice() ." ". $enquiry->getSubject())
                    ->setFrom($enquiry->getEmail())
                    ->setTo('campus.imt.atlantique@gmail.com')
                    ->setBody($enquiry->getMessage());

                $sent = $mailer->send($message,$errors);
                if (!$sent)
                {
                    print_r($errors);
                    $this->get('session')->getFlashBag()->add('error','Une erreur est survenue lors de l\'envoi');
                } else {
                    $this->get('session')->getFlashBag()->add('success','Le message a bien été envoyé');
                }
            }
        }
        return $this->render('common/contact.html.twig',  array(
            'form'   => $form->createView()
        ));
    }
    /**
     * @Route("{sectionName}/{id}", name="dynamicPage")
     */
    public function dynamicPage(string $sectionName, Page $page)
    {
        return $this->render('common/dynamic_page.html.twig',  array(
            'page'   => $page,
            'section' => $this->getDoctrine()->getRepository(Section::class)->findByName($sectionName),
        ));
    }
}
