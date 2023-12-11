<?php
namespace Cars;

require_once 'carsInterface.php';
require_once 'DB.php';

class DBMaker extends DB implements carsInterface
{
    public function create(array $data) : ?int
    {
        $sql = "INSERT INTO makers $data";
        $this->mysqli->query($sql);

        $lastInserted = $this
            ->mysqlu
            ->query("SELECT LAST_INSERT_ID() id;")
            ->fetch_assoc();

        return $lastInserted['id'];
    }

    public function get(int $id): array
    {
        $query = "SELECT * FROM makers WHERE id = $id";

        return $this->mysqli->query($query)->fetch_assoc();
    }

    public function GetByName(string $name): array
    {
        $query = "SELECT * FROM makers WHERE name = $name";

        return $this->mysqli->query($query)->fetch_assoc();
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM makers ORDER BY name";

        return $this->mysqli->query($query)->fetch_all($MYSQLI_ASSOC);
    }

    public function update(int $id, array $data)
    {
        $query = "UPDATE makers SET $data WHERE id = $id";
        $this->mysqli->query($query);

        return $this->get($id);
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM makers WHERE id = $id";

        return $this->mysqli->query($query);
    }

    public function getABC(): array
    {
        $query = "SELECT DISTINCT SUBSTRING(name, 1, 1) ch FROM makers";

        return $this->mysqli->query($query)->fetch_all($MYSQLI_ASSOC);
    }
}
