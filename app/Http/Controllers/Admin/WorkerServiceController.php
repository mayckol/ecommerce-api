<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WorkerService\Store;
use App\Http\Requests\Admin\WorkerService\Update;
use App\Services\Admin\WorkerServiceService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class WorkerServiceController extends Controller
{
    private WorkerServiceService $workerServiceService;

    public function __construct(WorkerServiceService $workerServiceService)
    {
        $this->workerServiceService = $workerServiceService;
    }

    public function index(): JsonResponse
    {
        $services =  $this->workerServiceService->all();
        return response()->json($services);
    }

    /**
     * @throws ValidatorException
     */
    public function store(Store $store): JsonResponse
    {
        $service = $this->workerServiceService->store($store->all());
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function show($id): JsonResponse
    {
        $service = $this->workerServiceService->show($id);
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function update(Update $update, $id): JsonResponse
    {
        $service = $this->workerServiceService->update($update->all(), $id);
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function destroy($id): JsonResponse
    {
        $this->workerServiceService->destroy($id);
        return response()->json([]);
    }
}
