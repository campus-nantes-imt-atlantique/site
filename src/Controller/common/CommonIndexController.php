<?php

namespace App\Controller\common;

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

                $messageconfirmation = (new \Swift_Message())
                    ->setSubject('Confirmation de réception au sujet de ' ." ". $enquiry->getSubject())
                    ->setFrom($enquiry->getEmail())
                    ->setTo($enquiry->getEmail())
                    ->setBody('Votre demande a bien été envoyée, nous vous joindrons le plus vite possible. \n We received your question, we will respond you the sooner possible');

                $sent = $mailerconfirmation->send($messageconfirmation,$errors);
                if (!$sent)
                {
                    print_r($errors);
                    $this->get('session')->getFlashBag()->add('error','Une erreur est survenue lors de l\'envoi');
                }

            } else {

            }
        }
        return $this->render('common/contact.html.twig',  array(
            'form'   => $form->createView()
        ));
    }
}
