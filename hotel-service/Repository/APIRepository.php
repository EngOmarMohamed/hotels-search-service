<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 24/03/18
 * Time: 07:07 م
 */

namespace Service\Repository;


use Illuminate\Support\Collection;
use Service\Interfaces\IMapper;
use Service\Interfaces\IRepository;
use Service\Loader\APILoader;

abstract class APIRepository implements IRepository
{
    protected $data;

    protected $loader;

    protected $mapper;

    /**
     * APIRepository constructor.
     *
     * @param IMapper $mapper
     */
    public function __construct(IMapper $mapper)
    {
        $this->loader = new APILoader();
        $this->mapper = $mapper;
        $this->init();
    }

    /**
     * init the APIRepositoryand set set the Data
     */
    private function init()
    {
        $this->data = $this->mapper->mapJsonToCollection($this->loader->load());

    }

    /**
     * @param array $conditions
     * @return IRepository
     */
    public function where(array $conditions): IRepository
    {
        // TODO: Implement where() method.
    }

    /**
     * @param string $orderBy
     * @param string $orderType
     * @return IRepository
     */
    public function order(string $orderBy, string $orderType): IRepository
    {
        // TODO: Implement order() method.
    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->data;
    }
}