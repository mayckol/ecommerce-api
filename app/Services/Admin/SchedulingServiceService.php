<?php

namespace App\Services\Admin;

use App\Repositories\SchedulingServiceRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Exceptions\ValidatorException;

class SchedulingServiceService {
    /**
     * @var SchedulingServiceRepository
     */
    private $schedulingServiceRepository;

    public function __construct(SchedulingServiceRepository $schedulingServiceRepository)
    {
        $this->schedulingServiceRepository = $schedulingServiceRepository;
    }

    public function all(?bool $paginate = false)
    {
        $schedulingService = $this->schedulingServiceRepository
            ->with(['client'])
            ->paginate()->where('worker_id', '=', Auth::user()->id);

        if (!$paginate) {
            $schedulingService = $this->schedulingServiceRepository
                ->with(['client'])
                ->findWhere(['worker_id' => Auth::user()->id]);
        }
        return $schedulingService;
    }

    /**
     * @throws Exception
     */
    public function show(int $id)
    {
        $schedulingService = $this->schedulingServiceRepository->find($id);
        if ($schedulingService?->worker_id === $id) {
            return [];
        }
        return $this->schedulingServiceRepository->find($id);
    }

    /**
     * @throws ValidatorException
     * @throws Exception
     */
    public function store(array $data)
    {
        $data['worker_id'] = Auth::user()->id;
        try {
            return $this->schedulingServiceRepository->create($data);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function update(array $data, int $id)
    {
        $service = $this->schedulingServiceRepository->find($id);
        if (!$service) {
            throw new Exception('Agendamento não encontrado.');
        }
        try {
            return $this->schedulingServiceRepository->update($data, $id);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function destroy(int $id): void
    {
        $service = $this->schedulingServiceRepository->find($id);
        if (!$service) {
            throw new Exception('Agendamento não encontrado.');
        }
        try {
            $this->schedulingServiceRepository->delete($id);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
