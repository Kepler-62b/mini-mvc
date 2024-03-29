<?php

namespace Framework\Services;

class HydratorService
{
    /**
     * @param class-string               $className
     * @param array<string, mixed>       $data
     * @param array<string, string>|null $map
     *
     * @throws \ReflectionException
     */
    public function hydrate(string $className, array $data, array $map = null): object
    {
        // @TODO может быть использовать какое-то подобие DTO для передачи map - чтобы было понятна структура массива map
        // @TODO создавать stdClass, если $className не передано

        $reflection = new \ReflectionClass($className);

        $model = $reflection->newInstanceWithoutConstructor();

        foreach ($data as $key => $value) {
            // @TODO тестировать условие без маппинга
            if (!$map) {
                if (array_key_exists(key: $reflection->getProperty($key)->getName(), array: $data)) {
                    $reflection->getProperty($key)->setValue($model, $value);
                }
            } else {
                if (array_key_exists($key, $map)) {
                    $property = $reflection->getProperty($map[$key]);

                    $propertyType = $property->getType() ?? throw new \Exception('variable $propertyType is NULL value');

                    /** @var \ReflectionNamedType $propertyType */
                    if (!$propertyType instanceof \ReflectionNamedType) {
                        throw new \Exception();
                    }

                    if ($propertyType->isBuiltin()) {
                        $property->setValue($model, $value);
                    } else {
                        $propertyName = $propertyType->getName();

                        // @TODO подумать как еще можно проверять $propertyName для инстанса класса с конструктором
                        /** @var \DateTimeImmutable $propertyName */
                        $propertyObject = new $propertyName($value);
                        $property->setValue($model, $propertyObject);
                    }
                }
            }
        }

        return $model;
    }

}
