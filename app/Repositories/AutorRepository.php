<?php

namespace App\Repositories;

use App\Models\Autor;

class AutorRepository
{
    public function get()
    {
        return Autor::all();
    }

    public function details(int $id)
    {
        return Autor::find($id);
    }

    public function store(array $data)
    {
        return Autor::create($data);
    }

    public function update(int $id, array $data)
    {
        $autor = $this->details($id);
        $autor->update($data);
        return $autor;
    }

    public function delete(int $id)
    {
        $autor = $this->details($id);
        $autor->delete();
        return $autor;
    }

    public function getLivrosPorAutor(int $id)
    {
        $autor = $this->details($id);
        return $autor ? $autor->livros : null;
    }

    public function getAutoresComLivros()
    {
        $autor = Autor::with('livros')->get();
        return $autor;
    }
}