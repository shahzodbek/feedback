<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;
use App\Services\FeedbackService;

/**
 * Class FeedbackController
 * @package App\Http\Controllers
 */
class FeedbackController extends Controller
{

    /**
     * @var
     */
    protected $service;

    /**
     * FeedbackController constructor.
     * @param FeedbackService $service
     */
    public function __construct(FeedbackService $service)
    {
        $this->service = $service;
    }

    /**
     * Load view file
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('feedback.index');
    }

    /**
     * Save data to file
     * @param FeedbackRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FeedbackRequest $request)
    {
        $this->service->store($request->all());
        return response()->json(['message'=>"Successfully!!!"],200);
    }
}
