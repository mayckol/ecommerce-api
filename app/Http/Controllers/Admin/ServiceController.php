<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\Store;
use App\Http\Requests\Admin\Service\Update;
use App\Services\Admin\ServiceService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ServiceController extends Controller
{
    private $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index(): JsonResponse
    {
        $services =  $this->serviceService->all();
        return response()->json($services);
    }

    /**
     * @throws ValidatorException
     */
    public function store(Store $store): JsonResponse
    {
        $service = $this->serviceService->store($store->all());
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function show($id): JsonResponse
    {
        $service = $this->serviceService->show($id);
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function update(Update $update, $id): JsonResponse
    {
        $service = $this->serviceService->update($update->all(), $id);
        return response()->json($service);
    }

    /**
     * @throws Exception
     */
    public function destroy($id): JsonResponse
    {
        $this->serviceService->destroy($id);
        return response()->json([]);
    }
}
