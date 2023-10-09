<?php

namespace App\Service\Attributes;

#[\Attribute]
class RelationAttribute
{
    private string $relationModel;

    public function __construct(string $relationModel)
    {
        $this->relationModel = $relationModel;
    }

}