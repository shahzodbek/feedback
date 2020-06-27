<?php


namespace App\Services;

use App\Factory\FeedbackFile;

/**
 * Class FeedbackService
 * @package App\Services
 */
class FeedbackService
{
    /**
     * Feedback factory
     *
     * @var
     */
    private $factory;

    /**
     * FeedbackService constructor.
     * @param FeedbackFile $factory
     */
    public function __construct(FeedbackFile $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Store
     *
     * @param array $params
     */
    public function store(array $params)
    {
        $this->factory->save($params);
    }
}
