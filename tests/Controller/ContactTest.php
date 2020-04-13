<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class ContactTest extends WebTestCase
{
    public function testShowList()
    {
        $client = static:: createClient();
        $client->followRedirects(true);
        $crawler = $client -> request('GET','/contact');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Contact index');
    }

    public function  testNewOk()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET','/contact/new');
        $this->assertResponseIsSuccessful();
        $client->submitForm('Save',[
            'contact[prenom]' => 'omar',
            'contact[nom]' => 'rgd',
            'contact[email]' => 'omar@mail.com',
            'contact[numero_telephone]' => '0621773712'
        ]);
        $this->assertSelectorTextContains('h1','Contact index');
    }

        public function  testNewKo()
        {
            $client = static::createClient();
            $client->followRedirects(true);
            $crawler = $client->request('GET','/contact/new');
            $this->assertResponseIsSuccessful();
            $client->submitForm('Save',[
                'contact[prenom]' => 'omar',
                'contact[nom]' => 'rgd',
                'contact[email]' => 'omar@mail.com',
                'contact[numero_telephone]' => '06217737122'
            ]);
            $this->assertSelectorTextContains('ul li','cette valeur doit etre de type digit.');
        }
    public function  testEditOk()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET','/contact/5/edit');
        $this->assertResponseIsSuccessful();
        $client->submitForm('Update',[
            'contact[numero_telephone]' => '0621773712'
        ]);
        $this->assertSelectorTextContains('h1','Contact index');
    }
        public function  testEditKo()
        {
            $client = static::createClient();
            $client->followRedirects(true);
            $crawler = $client->request('GET','/contact/5/edit');
            $this->assertResponseIsSuccessful();
            $client->submitForm('Update',[
                'contact[numero_telephone]' => '06217737om'
            ]);
            $this->assertSelectorTextContains('ul li','cette valeur doit etre de type digit.');
        }


}