<?php

namespace App\Services;

use App\Repositories\AutorRepository;

class AutorService {
    protected $repository;

    public function __construct(AutorRepository $repository) {
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

    public function getLivrosPorAutor(int $id) {
        return $this->repository->getLivrosPorAutor($id);
    }

    public function getAutoresComLivros() {
        return $this->repository->getAutoresComLivros();
    }
}