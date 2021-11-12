<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Feedstock\Store;
use App\Http\Requests\Admin\Feedstock\Update;
use App\Services\Admin\FeedstockService;
use Exception;
use Illuminate\Http\JsonResponse;
use Prettus\Validator\Exceptions\ValidatorException;

class FeedstockController extends Controller
{
    private FeedstockService $feedstockService;

    public function __construct(FeedstockService $feedstockService)
    {
        $this->feedstockService = $feedstockService;
    }

    public function index(): JsonResponse
    {
        $services =  $this->feedstockService->all();
        return response()->json($services);
    }

    /**
     * @throws ValidatorException
     */
    public function store(Store $store): JsonResponse
    {
        $service = $this->feedstockService->store($store->all());
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function show($id): JsonResponse
    {
        $service = $this->feedstockService->show($id);
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function update(Update $update, $id): JsonResponse
    {
        $service = $this->feedstockService->update($update->all(), $id);
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function destroy($id): JsonResponse
    {
        $this->feedstockService->destroy($id);
        return response()->json([]);
    }
}
