<?php

namespace App\Http\DTO;

use App\Http\Rules\DtoRule;
use Illuminate\Contracts\Support\Arrayable;

class OfferDto implements Arrayable
{
    #[DtoRule(max: 255)]
    public string $title;
    #[DtoRule(min: 1000, max: 999999999)]
    public int $price;
    #[DtoRule(max: 4096)]
    public ?string $description;
    public bool $isActive;
    #[DtoRule(date_format: 'Y-m-d H:i:s')]
    public string $publishAt;

    public function toArray()
    {
        return [
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'isActive' => $this->isActive,
            'publishAt' => $this->publishAt,
        ];
    }


    /**
     * Set the value of title
     *
     * @return void
     */ 
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Set the value of price
     *
     * @return void
     */ 
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * Set the value of description
     *
     * @return void
     */ 
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Set the value of isActive
     *
     * @return void
     */ 
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    

    /**
     * Set the value of publishAt
     *
     * @return void
     */ 
    public function setPublishAt(string $publishAt): void
    {
        $this->publishAt = $publishAt;
    }
}
