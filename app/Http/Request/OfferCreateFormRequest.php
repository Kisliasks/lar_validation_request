<?php

declare(strict_types=1);

namespace App\Http\Request;

use App\Http\DTO\OfferDto;
use Illuminate\Foundation\Http\FormRequest;

class OfferCreateFormRequest extends FormRequest
{
    private const PROPERTY_ALLOWS_NULL_VALUE = 'nullable';
    private const PROPERTY_REQUIRED_VALUE = 'required';

    /**
     * @return array
     */
    public function rules(): array
    {
        $reflection = new \ReflectionClass(OfferDto::class);
        $properties = $reflection->getProperties();
        
        foreach ($properties as $property) {
            /** @var \ReflectionAttribute<mixed>[] $attributes */
            $attributes = $property->getAttributes();
            $arguments = [];

            if (isset($attributes)) {
                foreach ($attributes as $attribute) {
                    $atrArguments = $attribute->getArguments();
                    
                    foreach ($atrArguments as $key => $value) {
                         array_push($arguments, $key . ":" . $value);
                    }
                }
                $entryRules = match ($property->getType()->allowsNull()) {
                    true => self::PROPERTY_ALLOWS_NULL_VALUE,
                    false => self::PROPERTY_REQUIRED_VALUE,
                };
                $propertyDescription = [
                    $entryRules,
                    $property->getType()->getName(),
                ];
                foreach ($arguments as $argument) {
                    array_push($propertyDescription, $argument);
                }
            }
            $result[$property->getName()] = $propertyDescription;
        }
        
        return $result;
    }

    public function toDto(): OfferDto
    {
        $offerDto = new OfferDto();

        $requestBody = $this->request->all();
        $offerDto->setDescription($requestBody['description'] ?? null);
        $offerDto->setIsActive($requestBody['isActive']);
        $offerDto->setPrice($requestBody['price']);
        $offerDto->setPublishAt($requestBody['publishAt']);
        $offerDto->setTitle($requestBody['title']);

        return $offerDto;
    }
}
