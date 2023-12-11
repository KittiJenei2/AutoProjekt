<?php

interface CarsInterface
{
    public function create(array $data) : ?int;  //lehet 0 is
    public function get(int $id): array;
    public function getAll(): array;
    public function update(int $id, array $data);
    public function delete(int $id): bool;
}

?>