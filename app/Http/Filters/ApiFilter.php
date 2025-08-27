<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;

abstract class ApiFilter
{
    protected $allowedParams = [];

    protected $columnMap = [];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'like' => 'like'
    ];

    public function transform(Request $request)
    {
        $eloquentQuery = [];

        foreach ($this->allowedParams as $param => $operators) {
            $query = $request->query($param);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$param] ?? $param;

            if (is_array($query)) {
                foreach ($operators as $operator) {
                    if (isset($query[$operator])) {
                        $value = $query[$operator];
                        
                        if ($operator === 'like') {
                            $value = '%' . $value . '%';
                        }
                        
                        $eloquentQuery[] = [$column, $this->operatorMap[$operator], $value];
                    }
                }
            } else {
                // Simple equals query
                $eloquentQuery[] = [$column, '=', $query];
            }
        }

        return $eloquentQuery;
    }
}