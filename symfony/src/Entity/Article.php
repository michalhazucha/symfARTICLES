<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
	/**
	 * @var int|null
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer" )
	 */
	private $id;
	/**
	 * @ORM\Column(type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank()
	 */
	private $title;

	/**
	 * @ORM\Column(type="text")
	 * @Assert\NotBlank()
	 */
	private $body;

	// ... getters and setters
	public function getId(): ?int
	{
		return $this->id;
	}

	public function getCreatedAt(): ?\DateTime
	{
		return $this->createdAt;
	}

	public function setCreatedAt(\DateTime $createdAt): self
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	public function getTitle(): ?string
	{
		return $this->title;
	}

	public function setTitle(string $title): self
	{
		$this->title = $title;

		return $this;
	}

	public function getBody(): ?string
	{
		return $this->body;
	}

	public function setBody(string $body): self
	{
		$this->body = $body;

		return $this;
	}
}
