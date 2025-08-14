<?php

namespace HR\Core;

use PDO;

/**
 * Abstract Repository
 * Open/Closed: Genişletmeye açık, değişikliğe kapalı
 */
abstract class AbstractRepository implements RepositoryInterface
{
    protected PDO $connection;
    protected string $tableName;
    protected string $primaryKey = 'id';
    
    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }
    
    public function find(int $id): ?array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE {$this->primaryKey} = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id' => $id]);
        
        $result = $stmt->fetch();
        return $result ?: null;
    }
    
    public function findAll(): array
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY {$this->primaryKey} DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    public function findBy(array $criteria): array
    {
        $whereClause = [];
        $params = [];
        
        foreach ($criteria as $field => $value) {
            $whereClause[] = "{$field} = :{$field}";
            $params[$field] = $value;
        }
        
        $sql = "SELECT * FROM {$this->tableName}";
        if (!empty($whereClause)) {
            $sql .= " WHERE " . implode(' AND ', $whereClause);
        }
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll();
    }
    
    public function findOneBy(array $criteria): ?array
    {
        $results = $this->findBy($criteria);
        return !empty($results) ? $results[0] : null;
    }
    
    public function save(array $data): bool
    {
        $fields = array_keys($data);
        $placeholders = ':' . implode(', :', $fields);
        
        $sql = "INSERT INTO {$this->tableName} (" . implode(', ', $fields) . ") VALUES ({$placeholders})";
        
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($data);
    }
    
    public function update(int $id, array $data): bool
    {
        $fields = array_keys($data);
        $setClause = implode(' = :', $fields) . ' = :' . end($fields);
        
        $sql = "UPDATE {$this->tableName} SET {$setClause} WHERE {$this->primaryKey} = :id";
        
        $data['id'] = $id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($data);
    }
    
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM {$this->tableName} WHERE {$this->primaryKey} = :id";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
    
    public function count(): int
    {
        $sql = "SELECT COUNT(*) FROM {$this->tableName}";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        return (int) $stmt->fetchColumn();
    }
    
    protected function executeQuery(string $sql, array $params = []): array
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
