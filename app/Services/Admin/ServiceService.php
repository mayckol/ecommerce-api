<?php

namespace App\Services\Admin;

use App\Repositories\ServiceRepository;
use Exception;
use Prettus\Validator\Exceptions\ValidatorException;

class ServiceService {
    /**
     * @var ServiceRepository
     */
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function all(?bool $paginate = false)
    {
        return $paginate
            ? $this->serviceRepository->paginate()
            : $this->serviceRepository->all();
    }

    /**
     * @throws Exception
     */
    public function show(int $id)
    {
        return $this->serviceRepository->find($id);
    }

    /**
     * @throws ValidatorException
     * @throws Exception
     */
    public function store(array $data)
    {
        try {
            return $this->serviceRepository->create($data);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function update(array $data, int $id)
    {
        $service = $this->serviceRepository->find($id);
        if (!$service) {
            throw new Exception('Serviço não encontrado.');
        }
        try {
            return $this->serviceRepository->update($data, $id);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function destroy(int $id): void
    {
        $service = $this->serviceRepository->find($id);
        if (!$service) {
            throw new Exception('Serviço não encontrado.');
        }
        try {
            $this->serviceRepository->delete($id);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
