<?php

namespace App\Services\Admin;

use App\Criteria\JoinWorkerServiceCriteriaCriteria;
use App\Repositories\FeedstockRepository;
use Exception;
use Prettus\Validator\Exceptions\ValidatorException;

class FeedstockService {
    /**
     * @var FeedstockRepository
     */
    private FeedstockRepository $feedStockRepository;

    public function __construct(FeedstockRepository $feedStockRepository)
    {
        $this->feedStockRepository = $feedStockRepository;
    }

    /**
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function all(?bool $paginate = false)
    {
        $this->feedStockRepository->pushCriteria(new JoinWorkerServiceCriteriaCriteria());
        return $paginate
            ? $this->feedStockRepository->paginate()
            : $this->feedStockRepository->all();
    }

    /**
     * @throws Exception
     */
    public function show(int $id)
    {
        $this->feedStockRepository->pushCriteria(new JoinWorkerServiceCriteriaCriteria());
        return $this->feedStockRepository->find($id);
    }

    /**
     * @throws ValidatorException
     * @throws Exception
     */
    public function store(array $data)
    {
        try {
            return $this->feedStockRepository->create($data);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function update(array $data, int $id)
    {
        $service = $this->feedStockRepository->find($id);
        if (!$service) {
            throw new Exception('Insumo não encontrado.');
        }
        try {
            return $this->feedStockRepository->update($data, $id);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function destroy(int $id): void
    {
        $service = $this->feedStockRepository->find($id);
        if (!$service) {
            throw new Exception('Insumo não encontrado.');
        }
        try {
            $this->feedStockRepository->delete($id);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
