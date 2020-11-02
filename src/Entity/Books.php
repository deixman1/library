<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Поле название не должно быть пустым")
     * @Assert\Type(
     *     type="string",
     *     message="Поле название должно быть словом!"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Поле автор не должно быть пустым")
     * @Assert\Type(
     *     type="string",
     *     message="Поле автор должно быть словом!"
     * )
     */
    private $author;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Поле год  не должно быть пустым")
     * @Assert\Type(
     *     type="integer",
     *     message="Поле год должно быть числом!"
     * )
     * @Assert\Length(min=4)
     */
    private $year_published;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getYearPublished(): ?int
    {
        return $this->year_published;
    }

    public function setYearPublished(int $year_published): self
    {
        $this->year_published = $year_published;

        return $this;
    }
}
