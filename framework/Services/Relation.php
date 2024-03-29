<?php

namespace Framework\Services;

// @TODO подумать над названием класса

class Relation
{
    private object $model;

    public function __construct(object $model)
    {
        $this->model = $model;
    }

    /**
     * @throws \Exception
     */
    public function getRelation(string $relationColumn): object
    {
        $reflection = new \ReflectionClass($this->model);
        $properties = $reflection->getProperties();
        foreach ($properties as $property) {

            if ($property->getName() === $relationColumn) {
                // @TODO $propertyHasRelationKey должно быть int - можно прописать проверку типа
                /** @var int $propertyHasRelationKeyValue */
                $propertyHasRelationKeyValue = $property->getValue($this->model);
            }
            // @TODO с этим условием код не продолжит работу - подумать, как решить
//            else {
//                throw new \Exception("argument $relationColumn is not found/exist in current model");
//            }

            $propertyType = $property->getType() ?? throw new \Exception();

            if (!$propertyType instanceof \ReflectionNamedType) {
                throw new \Exception();
            }

            if (!$propertyType->isBuiltin()) {
                $propertyName = $propertyType->getName();
                // @TODO подумать над условием проверки
                if (str_contains($propertyName, "Relation")) {
                    // @TODO подумать, как получать значение атрибута
                    // @TODO нужно проверять instanseOf от какого-то родителя
                    [$attributes] = $property->getAttributes();
                    $attribute = $attributes->getArguments();
                    // @TODO разобраться с условием проверки на инициализацию переменной $propertyHasRelationKey
                    if (isset($propertyHasRelationKey)) {
                        throw new \Exception('Variable $propertyHasRelationKey is undefined');
                    } else {
                        /** @var ManyToOneRelation|OneToManyRelation $propertyName */
                        $property->setValue($this->model, new $propertyName($propertyHasRelationKeyValue, $attribute['relationModel']));
                    }
                }
            }
        }
        return $this->model;
    }
}