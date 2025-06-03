<?php

namespace App\Services;

use App\Repositories\GeneroRepository;

class GeneroService {
    protected $repository;

    public function __construct(GeneroRepository $repository) {
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

    public function getGenerosComLivros() {
        return $this->repository->getGenerosComLivros();
    }

    public function getLivrosPorGenero(int $id) {
        return $this->repository->getLivrosPorGenero($id);
    }
}