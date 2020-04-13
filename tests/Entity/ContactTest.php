<?php


namespace App\Tests\Entity;


use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{

    /*

     */public function testValidateNumeroTelephone(){
        $contact = new Contact();
        $contact -> setNumeroTelephone("0621773712");
        $this -> assertTrue($contact->validateNumeroTelephone());
    }

    public function testInvalidateNumeroTelephone(){
        $contact = new Contact();
        $contact -> setNumeroTelephone("7");
        $this -> assertFalse($contact->validateNumeroTelephone());
    }
}