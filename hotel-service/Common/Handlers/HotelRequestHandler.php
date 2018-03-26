<?php

namespace Service\Common\Handlers;


class HotelRequestHandler extends RequestHandler
{
    /**
     * map the input params to the format that will work with repo
     *
     * @param array $params
     * @return array
     */
    public function mapInputs(array $params)
    {

        $mappedParams = ['filters' => [], 'sort' => []];

        foreach ($params as $k => $v) {
            $v = trim($v);
            switch ($k) {
                case 'orderBy':
                    $mappedParams['sort']['orderBy'] = $v;
                    break;
                case 'orderType':
                    $mappedParams['sort']['orderType'] = $v;
                    break;
                case 'name':
                    $mappedParams['filters']['name'] = $v;
                    break;
                case 'city':
                    $mappedParams['filters']['city'] = $v;
                    break;
                case 'min':
                    $mappedParams['filters']['price'] = ['min' => $params['min'], 'max' => $params['max']];
                    break;
                case 'start':
                    $mappedParams['filters']['availability'] = ['start' => $params['start'], 'end' => $params['end']];
                    break;
            }
        }

        $mappedParams['filters'] = array_filter($mappedParams['filters']);

        $mappedParams['sort'] = array_filter($mappedParams['sort']);

        return array_filter($mappedParams);
    }
}