<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SchedulingService\Store;
use App\Http\Requests\Admin\SchedulingService\Update;
use App\Services\Admin\SchedulingServiceService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class SchedulingServiceController extends Controller
{
    private SchedulingServiceService $schedulingServiceService;

    public function __construct(SchedulingServiceService $schedulingServiceService)
    {
        $this->schedulingServiceService = $schedulingServiceService;
    }

    public function index(): JsonResponse
    {
        $services =  $this->schedulingServiceService->all();
        return response()->json($services);
    }

    /**
     * @throws ValidatorException
     */
    public function store(Store $store): JsonResponse
    {
        $service = $this->schedulingServiceService->store($store->all());
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function show($id): JsonResponse
    {
        $service = $this->schedulingServiceService->show($id);
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function update(Update $update, $id): JsonResponse
    {
        $service = $this->schedulingServiceService->update($update->all(), $id);
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function destroy($id): JsonResponse
    {
        $this->schedulingServiceService->destroy($id);
        return response()->json([]);
    }
}
