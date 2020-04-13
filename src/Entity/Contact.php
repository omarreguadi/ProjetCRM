<?php

namespace App\Entity;

use App\Exception\InvalidMailException;
use App\Exception\InvalidNameException;
use App\Exception\InvalidPhoneNumberException;
use App\Exception\TooLongNameException;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @Assert\NotBlank
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @Assert\NotBlank
     * @Assert\NotNull()
     * @Assert\Email(
     *     message = "l'email '{{ value }}' n'est pas valide !! .")
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @Assert\Type(type={"digit"})
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "votre numero de telephone doit etre au moins {{ limit }} caracteres"
     * )
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $numero_telephone;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumeroTelephone(): ?string
    {
        return $this->numero_telephone;
    }

    public function setNumeroTelephone(?string $numero_telephone): self
    {
        $this->numero_telephone = $numero_telephone;

        return $this;
    }

    public function validateNumeroTelephone(): bool
    {

        if (!empty($this->numero_telephone) && (substr($this->numero_telephone, 0, 1) !== '0')) {
            return false;
        }
        return true;
    }

}
