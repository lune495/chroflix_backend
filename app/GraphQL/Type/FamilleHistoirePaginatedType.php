<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class FamilleHistoirePaginatedType extends GraphQLType
{
    protected $attributes =
    [
        'name' => 'famille_histoirespaginated'
    ];
    public function fields(): array
    {  return
        [
            'metadata' =>
            [
                'type' => GraphQL::type('Metadata'),
                'resolve' => function ($root)
                {
                    return array_except($root->toArray(), ['data']);
                }
            ],
            'data' =>
            [
                'type' => Type::listOf(GraphQL::type('FamilleHistoire')),
                'resolve' => function ($root)
                {
                    return $root;
                }
            ]
        ];
    }
}
