<?php

namespace App\Http\Filters\V1;

use Illuminate\Http\Request;
use App\Http\Filters\ApiFilter;

class CustomerFilter extends ApiFilter
{
    protected $allowedParams = [
        'name' => ['eq', 'like'],
        'type' => ['eq'],
        'email' => ['eq', 'like'],
        'city' => ['eq', 'like'],
        'state' => ['eq','like'],
        'postal_code' => ['eq', 'like'],
        'phone' => ['eq'],
        'address' => ['eq', 'like']
    ];

    protected $columnMap = [
        'postalCode' => 'postal_code'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'like' => 'like'
    ];

}