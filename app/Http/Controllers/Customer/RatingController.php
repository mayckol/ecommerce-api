<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Rating\Store;
use App\Http\Requests\Customer\Rating\Update;
use App\Services\Customer\RatingService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class RatingController extends Controller
{
    private RatingService $ratingService;

    public function __construct(RatingService $ratingService)
    {
        $this->ratingService = $ratingService;
    }

    public function index(): JsonResponse
    {
        $services =  $this->ratingService->all();
        return response()->json($services);
    }

    /**
     * @throws ValidatorException
     */
    public function store(Store $store): JsonResponse
    {
        $service = $this->ratingService->store($store->all());
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function show($id): JsonResponse
    {
        $service = $this->ratingService->show($id);
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function update(Update $update, $id): JsonResponse
    {
        $service = $this->ratingService->update($update->all(), $id);
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function destroy($id): JsonResponse
    {
        $this->ratingService->destroy($id);
        return response()->json([]);
    }
}
