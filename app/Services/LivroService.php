<?php

namespace App\Services;

use App\Repositories\LivroRepository;

class LivroService {
    protected $repository;

    public function __construct(LivroRepository $repository) {
        $this->repository = $repository;
    }

    public function get() {
        return $this->repository->get();
    }

    public function details(int $id) {
        return $this->repository->details($id);
    }

    public function store(array $data) {
        return $this->repository->store($data);
    }

    public function update(int $id, array $data) {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id) {
        return $this->repository->delete($id);
    }

    public function getWithAutorGeneroReviews() {
        return $this->repository->getWithAutorGeneroReviews();
    }

    public function getReviews(int $id) {
        return $this->repository->getReviews($id);
    }
}