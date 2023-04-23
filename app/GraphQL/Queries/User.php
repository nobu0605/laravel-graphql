<?php

namespace App\GraphQL\Queries;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
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

    public function getUnlikedUsers($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
        $user = DB::table('users')
        ->whereNotIn('id', function ($query) use ($args) {
            $query->select('to')
                  ->from('likes')
                  ->where('from', $args['userId']);
        })
        ->get();

        return $user;
    }
}


