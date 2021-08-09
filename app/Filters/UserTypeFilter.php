<?php

namespace App\Filters;

use App\Enums\UserType;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\BooleanFilter;

class UserTypeFilter extends BooleanFilter
{
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param Array $value Associative array with the boolean value for each of the options
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value, $request)
    {
        // if ($value[UserType::Administrator]) {
        //     $query->with('roles')->where('role_id', UserType::Administrator);
        // }
        // if ($value[UserType::Seller]) {
        //     $query->with('roles')->where('role_id', UserType::Seller);
        // }
        // if ($value[UserType::Buyer]) {
        //     $query->with('roles')->where('role_id', UserType::Buyer);
        // }
        return $query;
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): Array
    {
        return [
            'Administrator' => UserType::Administrator,
            'Seller' => UserType::Seller,
            'Buyer' => UserType::Buyer,
        ];
    }
}
