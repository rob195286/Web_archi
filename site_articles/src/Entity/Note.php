<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=Book::class, inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $book;

    /**
     * @ORM\ManyToOne(targetEntity=Film::class, inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;

    /**
     * @ORM\ManyToOne(targetEntity=Critic::class, inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $critic;

    /**
     * @ORM\ManyToOne(targetEntity=Critique::class, inversedBy="notes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $critique;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

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

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }

    public function getCritic(): ?Critic
    {
        return $this->critic;
    }

    public function setCritic(?Critic $critic): self
    {
        $this->critic = $critic;

        return $this;
    }

    public function getCritique(): ?Critique
    {
        return $this->critique;
    }

    public function setCritique(?Critique $critique): self
    {
        $this->critique = $critique;

        return $this;
    }
}
