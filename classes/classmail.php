<?php

//https://php.developpez.com/faq/?page=mail#:~:text=Pour%20envoyer%20un%20mail%20en,bien%20activ%C3%A9e%20par%20l'h%C3%A9bergeur.
//https://fr.wikipedia.org/wiki/Multipurpose_Internet_Mail_Extensions
//https://audreytips.com/template-email-parfait/

class mail {
    private $destinataire;
    private $objet;
    private $message;
    private $headers;
    //Pour headers :
    private $expediteur;
    private $copie;
    private $copie_cachee;

    private $id;
    private static $compteur;

    public function __construct($destinataire, $objet, $message, $expediteur, $copie, $copie_cachee )
    {
        $this->setDestinataire($destinataire);
        $this->setObjet($objet);
        $this->setMessage($message);
        $this->setExpediteur($expediteur);
        $this->setCopie($copie);
        $this->setCopie_cachee($copie_cachee);

        $this->setHeaders();

        self::$compteur++;
        $this->setId(self::$compteur);
    }
    public function setDestinataire($destinataire){$this->destinataire = $destinataire ;}
    public function getDestinataire(){return $this->destinataire ;}

    public function setObjet($objet){$this->objet = $objet ;}
    public function getObjet(){return $this->objet ;}

    public function setMessage($message){$this->message = $message ;}
    public function getMessage(){return $this->message ;}

    private function setHeaders(){
        $this->headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
        $this->headers .= 'Reply-To: '.$this->getExpediteur()."\n"; // Mail de reponse
        $this->headers .= 'From: "Nom_de_expediteur"<'.$this->getExpediteur().'>'."\n";
        $this->headers .= 'Delivered-to: '.$this->getDestinataire()."\n"; 
        $this->headers .= 'Cc: '.$this->getCopie()."\n"; 
        $this->headers .= 'Bcc: '.$this->getCopie_cachee()."\n\n";         
    }
    public function getHeaders(){return $this->headers ;}

    public function setExpediteur($expediteur){$this->expediteur = $expediteur ;}
    public function getExpediteur(){return $this->expediteur ;}

    public function setCopie($copie){$this->copie = $copie ;}
    public function getCopie(){return $this->copie ;}

    public function setCopie_cachee($copie_cachee){$this->copie_cachee = $copie_cachee ;}
    public function getCopie_cachee(){return $this->copie_cachee ;}

    private function setId($id){$this->id = $id ;}
    public function getId(){return $this->id ;}
    public function getCompteur(){return self::$compteur ;}

    public function envoyerMail(){
        return mail($this->destinataire, $this->objet, $this->message, $this->headers);
    }
}