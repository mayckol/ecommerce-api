<?php

namespace App\Services\Customer;

use App\Repositories\RatingRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
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
        $ratings = $this->ratingRepository->paginate()->where('client_id', '=', Auth::user()->id);
        if (!$paginate) {
            $ratings = $this->ratingRepository->findWhere(['client_id' => Auth::user()->id]);
        }
        return $ratings;
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
        $data['client_id'] = Auth::user()->id;
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
