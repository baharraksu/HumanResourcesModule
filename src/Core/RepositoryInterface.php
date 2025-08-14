<?php

namespace HR\Core;

/**
 * Repository Interface
 * Interface Segregation: Sadece gerekli metodları tanımlar
 */
interface RepositoryInterface
{
    public function find(int $id): ?array;
    public function findAll(): array;
    public function findBy(array $criteria): array;
    public function findOneBy(array $criteria): ?array;
    public function save(array $data): bool;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
    public function count(): int;
}
