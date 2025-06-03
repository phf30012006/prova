<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService {
    protected $repository;

    public function __construct(ReviewRepository $repository) {
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
}