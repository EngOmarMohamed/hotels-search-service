<?php

namespace Service\Common;

use Illuminate\Support\Collection;
use Service\Filters\ContainFilter;
use Service\Filters\DateRangeFilter;
use Service\Filters\EqualFilter;
use Service\Filters\PriceRangeFilter;
use Service\Interfaces\ILoader;
use Service\Interfaces\IMapper;
use Service\Interfaces\IRepository;

abstract class Repository implements IRepository
{

    private $data;

    private $loader;

    private $mapper;

    private $searchCols;

    /**
     * Repository constructor.
     * @param $data
     * @param $loader
     * @param $mapper
     */
    public function __construct(ILoader $loader, IMapper $mapper)
    {
        $this->loader = $loader;
        $this->mapper = $mapper;
        $this->searchCols = $this->getSearchFilters();
        $this->init();
    }

    /**
     * Intialize the Data Returned from Loader through the Mapper
     */
    private function init()
    {
        $this->data = $this->mapper->mapJsonToCollection($this->loader->load());
    }

    /**
     * Handle Conditions
     *
     * @param array $conditions
     * @return IRepository
     */
    public function where(array $conditions): IRepository
    {
        foreach ($conditions as $col => $value) {
            $this->data = $this->data->filter(function ($obj) use ($col, $value) {
                $getterFunc = "get" . ucfirst($col);
                $currentVal = $obj->$getterFunc();
                return $this->applyCondition($col, $currentVal, $value);
            });

        }
        return $this;
    }

    /**
     * Check the Condition through the Specified Filter
     *
     * @param $col
     * @param $currentVal
     * @param $searchedVal
     * @return bool
     */
    private function applyCondition($col, $currentVal, $searchedVal): bool
    {
        if (!empty($this->searchCols)) {
            $filter = $this->searchCols[$col];
            return $filter->filter($currentVal, $searchedVal);
        }

        return false;
    }

    abstract protected function getSearchFilters();

    /**
     * Sort the Returned Data
     *
     * @param string $orderBy
     * @param string $orderType
     * @return IRepository
     */
    public function order(string $orderBy, string $orderType): IRepository
    {
        $type = false;

        if ($orderType == 'DESC')
            $type = true;

        $this->data = $this->data->sortBy(function ($obj) use ($orderBy) {
            $getterFunc = "get" . ucfirst($orderBy);
            return $obj->$getterFunc();
        }, SORT_REGULAR, $type)->values();

        return $this;
    }

    /**
     * Return Data
     *
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->data;
    }
}