<?php

namespace App\Services\Admin;

use App\Repositories\SchedulingServiceRepository;
use Exception;
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
        return $paginate
            ? $this->schedulingServiceRepository->paginate()
            : $this->schedulingServiceRepository->all();
    }

    /**
     * @throws Exception
     */
    public function show(int $id)
    {
        return $this->schedulingServiceRepository->find($id);
    }

    /**
     * @throws ValidatorException
     * @throws Exception
     */
    public function store(array $data)
    {
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
