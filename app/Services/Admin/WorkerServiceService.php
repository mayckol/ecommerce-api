<?php

namespace App\Services\Admin;

use App\Repositories\WorkerServiceRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Exceptions\ValidatorException;

class WorkerServiceService {
    /**
     * @var WorkerServiceRepository
     */
    private $workerServiceRepository;

    public function __construct(WorkerServiceRepository $workerServiceRepository)
    {
        $this->workerServiceRepository = $workerServiceRepository;
    }

    public function all(?bool $paginate = false)
    {
        $workerService = $this->workerServiceRepository
            ->with(['worker', 'service'])
            ->paginate()->where('worker_id', '=', Auth::user()->id);

        if (!$paginate) {
            $workerService = $this->workerServiceRepository
                ->with(['worker', 'service'])
                ->findWhere(['worker_id' => Auth::user()->id]);
        }
        return $workerService;
    }

    /**
     * @throws Exception
     */
    public function show(int $id)
    {
        $workerService = $this->workerServiceRepository->find($id);
        if ($workerService?->worker_id === $id) {
            return [];
        }
        return $workerService;
    }

    /**
     * @throws ValidatorException
     * @throws Exception
     */
    public function store(array $data)
    {
        $data['worker_id'] = Auth::user()->id;
        try {
            return $this->workerServiceRepository->create($data);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function update(array $data, int $id)
    {
        $service = $this->workerServiceRepository->find($id);
        if (!$service) {
            throw new Exception('Agendamento não encontrado.');
        }
        $data['worker_id'] = Auth::user()->id;
        try {
            return $this->workerServiceRepository->update($data, $id);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function destroy(int $id): void
    {
        $service = $this->workerServiceRepository->find($id);
        if (!$service) {
            throw new Exception('Agendamento não encontrado.');
        }
        try {
            $this->workerServiceRepository->delete($id);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
