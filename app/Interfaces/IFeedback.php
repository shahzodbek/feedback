<?php


namespace App\Interfaces;

/**
 * Interface IFeedback
 * @package App\Interfaces
 */
interface IFeedback
{
    /**
     * @param array $params
     * @return mixed
     */
    public function save(array $params);
}
