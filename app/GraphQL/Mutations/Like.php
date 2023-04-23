<?php

namespace App\GraphQL\Mutations;

use App\Models\User as UserModel;
use App\Models\Like as LikeModel;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class Like
{
    public function like($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        LikeModel::create([
            'from' => $args['from'],
            'to' => $args['to'],
            'is_like' => $args['isLike'],
            'is_super' => false,
        ]);

        return true;
    }

}


