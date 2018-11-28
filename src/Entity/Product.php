<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Product
{
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $productId;
	
	/**
	 * @ORM\Column(type="string", length=20)
	 */
	private $productName;
	
	/**
	 * @ORM\Column(type="string", length=10, nullable=true)
	 */
	private $productCode;
	
	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $releaseDate;
	
	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	private $description;
	
	/**
	 * @ORM\Column(type="float")
	 */
	private $price;
	
	/**
	 * @ORM\Column(type="float", nullable=true)
	 */
	private $starRating;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $imageUrl;
	
	public function getId(): ?int
	{
		return $this->id;
	}
	
	
	public function getProductId(): ?int
	{
		return $this->productId;
	}
	
	
	public function setProductId($productId): ?int
	{
		return $this->productId = $productId;
	}
	
	public function getProductName(): ?string
	{
		return $this->productName;
	}
	
	public function setProductName(string $productName): self
	{
		$this->productName = $productName;
		
		return $this;
	}
	
	public function getProductCode(): ?string
	{
		return $this->productCode;
	}
	
	public function setProductCode(?string $productCode): self
	{
		$this->productCode = $productCode;
		
		return $this;
	}
	
	public function getReleaseDate(): ?\DateTimeInterface
	{
		return $this->releaseDate;
	}
	
	public function setReleaseDate(?\DateTimeInterface $releaseDate): self
	{
		$this->releaseDate = $releaseDate;
		
		return $this;
	}
	
	public function getDescription(): ?string
	{
		return $this->description;
	}
	
	public function setDescription(?string $description): self
	{
		$this->description = $description;
		
		return $this;
	}
	
	public function getPrice(): ?float
	{
		return $this->price;
	}
	
	public function setPrice(float $price): self
	{
		$this->price = $price;
		
		return $this;
	}
	
	public function getStarRating(): ?float
	{
		return $this->starRating;
	}
	
	public function setStarRating(?float $starRating): self
	{
		$this->starRating = $starRating;
		
		return $this;
	}
	
	public function getImageUrl(): ?string
	{
		return $this->imageUrl;
	}
	
	public function setImageUrl(string $imageUrl): self
	{
		$this->imageUrl = $imageUrl;
		
		return $this;
	}
}
