<?php

    class SmtpPreLoader
    {
    }

    class SmtpLoader
    {
        private SmtpPreLoader $smtpPreLoader;

        public function __construct(SmtpPreLoader $smtpPreLoader)
        {
            $this->smtpPreLoader = $smtpPreLoader;
        }
    }

    class Mailer
    {

        private SmtpLoader $smtpLoader;

        public function __construct(SmtpLoader $smtpLoader)
        {
            $this->smtpLoader = $smtpLoader;
        }

        public function send(string $recipient, string $content) : string 
        {
            // Traitement d'envoi d'email

            return "Email bien envoyé à $recipient";
        }
    }

    class UserManager
    {

        private Mailer $mailer;

        public function __construct(Mailer $mailer)
        {
            $this->mailer = $mailer;
        }

        public function register(string $recipient, string $content) : string
        {
            return $this->mailer->send($recipient, $content);
        }

        public function login()
        {
            // return $this->mailer->send($recipient, $content);
        }
    }


    $container = [];

    $container[SmtpPreLoader::class] = new SmtpPreLoader();
    $container[SmtpLoader::class]    = new SmtpLoader($container[SmtpPreLoader::class]);
    $container[Mailer::class]        = new Mailer($container[SmtpLoader::class]);





    $userManager = new UserManager($container[Mailer::class]);
    echo $userManager->register("jc@gmail.com", "Hello World");