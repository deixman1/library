<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * @ORM\Entity(repositoryClass=BooksRepository::class)
 */
class Books
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $author;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $year;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author = null): self
    {
        $this->author = $author;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year = null): self
    {
        $this->year = $year;

        return $this;
    }
    /**
     * @param ClassMetadata $metadata
     * @return ClassMetadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata): ClassMetadata
    {
        $metadata->addGetterConstraint((string)'Name', new Assert\NotBlank([
            'message' => 'Поле Название не должно быть пустым',
        ]));
        $metadata->addGetterConstraint((string)'Author', new Assert\NotBlank([
            'message' => 'Поле Автор не должно быть пустым',
        ]));
        $metadata->addGetterConstraint((string)'Year', new Assert\Length([
            "min" => 4,
            "max" => 4,
            "minMessage" => "Длина Года должна быть 4 символа",
            "maxMessage" => "Длина Года должна быть 4 символа",
            "allowEmptyString" => false
        ]));
        return $metadata;
    }
}
