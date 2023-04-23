<?php

namespace App\GraphQL\Queries;

use App\Models\User as UserModel;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

final class User
{
    public function getUserById($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = UserModel::where('id',$args["id"])->first();
        
        return $user;
    }

    public function getUsers($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = UserModel::all();
        
        return $user;
    }
}


