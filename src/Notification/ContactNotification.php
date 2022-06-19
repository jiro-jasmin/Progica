<?php

namespace App\Notification;

use App\Entity\Contact;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactNotification {

    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function contactNotify(Contact $contact) 
    {
    
        $email = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to('admin@progica.com')
                ->priority(Email::PRIORITY_HIGH)
                ->subject('Nouvelle prise de contact sur Progica')
                ->text('Un nouveau message a été envoyé sur Progica.')
                ->htmlTemplate('notification/email.html.twig')
                ->context(["contact" => $contact]);

        $this->mailer->send($email);
    }
}