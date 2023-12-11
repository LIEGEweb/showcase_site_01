<?php

namespace App\Controller\Public\Contact;

use App\Entity\Message;
use App\Form\MessageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(EntityManagerInterface $entityManager, MailerInterface $mailer, Request $request): Response
    {

        $form = $this->createForm(MessageType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $datas = $form->getData();
            $message = new Message();
            $message->setName($datas->getName());
            $message->setPhone($datas->getPhone());
            $message->setEmail($datas->getEmail());
            $message->setMessage($datas->getMessage());
            $entityManager->persist($message);
            $entityManager->flush();

            $email = (new Email())
                ->from($datas->getEmail())
                ->to('you@example.com')
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Nouveau message de ' . $datas->getName())
                ->text($datas->getMessage())
                ->html($datas->getMessage());

            $mailer->send($email);

            $this->addFlash('success', 'Votre message a été envoyé.');
            return $this->redirectToRoute('app_contact');

        }
        return $this->render('themes/' . $this->getParameter('app.theme') . '/contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
