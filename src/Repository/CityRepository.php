<?php

namespace App\Repository;

use App\Models\Image;
use App\Service\HydratorService;
use App\Service\LaravelDatabase;
use ReflectionException;

class CityRepository
{
    private LaravelDatabase $DatabaseConnectionPDO;
    private string $table = 'cities';
    public const SELECT_LIMIT = 5;

    public function __construct(LaravelDatabase $DatabaseConnectionPDO)
    {
        $this->DatabaseConnectionPDO = $DatabaseConnectionPDO;
    }

    public function fetchAll(int $page = 1): array
    {
        $connection = $this->DatabaseConnectionPDO;
        $table = $this->table;
        $limit = self::SELECT_LIMIT;

        $offset = ($page - 1) * $limit;

        $sql = "SELECT * FROM $table LIMIT $limit OFFSET :offset";

        try {
            $pdo_statement = $connection->prepare($sql);
            $pdo_statement->bindValue(":offset", $offset, \PDO::PARAM_INT);
            $pdo_statement->execute();

            $result = $pdo_statement->fetchAll(\PDO::FETCH_ASSOC);

            $hydrator = new HydratorService();
            $modelsStorage = [];
            foreach ($result as $data) {
                $modelsStorage[] = $hydrator->hydrate(
                    Image::class,
                    $data,
                    [
                        'id' => 'id',
                        'name' => 'name',
                        'item_id' => 'itemId',
                    ]
                );
            }
            return $modelsStorage;
        } catch (\PDOException $exception) {
            throw new \PDOException($exception);
        }
    }

    /**
     * @param int $id
     * @return Image[]
     * @throws ReflectionException
     */
    public function findById(int $id): ?array
    {
        $connection = $this->DatabaseConnectionPDO;
        $table = $this->table;

        $sql = "SELECT * FROM $table WHERE id = :id";

        $pdo_statement = $connection->prepare($sql);

        try {
            $pdo_statement->bindValue("id", $id, \PDO::PARAM_INT);
            $pdo_statement->execute();

            if ($result = $pdo_statement->fetch(\PDO::FETCH_ASSOC)) {

                $hydrator = new HydratorService();

//                $model[] = $hydrator->hydrate(
//                    Image::class,
//                    $result,
//                    [
//                        'id' => 'id',
//                        'name' => 'name',
//                        'item_id' => 'itemId',
//                    ]
//                );
//                return $model;

                return $result;
            } else {
                return null;
            }
        } catch (\PDOException $exception) {
            die('Ошибка: ' . $exception->getMessage());
        }
    }
}
