<?php

namespace App\Services\Customer;

use App\Repositories\RatingRepository;
use Exception;
use Prettus\Validator\Exceptions\ValidatorException;

class RatingService {
    /**
     * @var RatingRepository
     */
    private $ratingRepository;

    public function __construct(RatingRepository $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }

    public function all(?bool $paginate = false)
    {
        return $paginate
            ? $this->ratingRepository->paginate()
            : $this->ratingRepository->all();
    }

    /**
     * @throws Exception
     */
    public function show(int $id)
    {
        return $this->ratingRepository->find($id);
    }

    /**
     * @throws ValidatorException
     * @throws Exception
     */
    public function store(array $data)
    {
        try {
            return $this->ratingRepository->create($data);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function update(array $data, int $id)
    {
        $service = $this->ratingRepository->find($id);
        if (!$service) {
            throw new Exception('Agendamento não encontrado.');
        }
        try {
            return $this->ratingRepository->update($data, $id);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function destroy(int $id): void
    {
        $service = $this->ratingRepository->find($id);
        if (!$service) {
            throw new Exception('Agendamento não encontrado.');
        }
        try {
            $this->ratingRepository->delete($id);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
