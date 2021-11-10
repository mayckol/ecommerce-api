<?php

namespace App\Services\Admin;

use App\Repositories\WorkerServiceRepository;
use Exception;
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
        return $paginate
            ? $this->workerServiceRepository->paginate()
            : $this->workerServiceRepository->all();
    }

    /**
     * @throws Exception
     */
    public function show(int $id)
    {
        return $this->workerServiceRepository->find($id);
    }

    /**
     * @throws ValidatorException
     * @throws Exception
     */
    public function store(array $data)
    {
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
