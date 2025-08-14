<?php

namespace HR\Repositories;

use HR\Core\AbstractRepository;
use HR\Models\Employee;

/**
 * Employee Repository
 * Single Responsibility: Sadece çalışan veri işlemlerinden sorumlu
 */
class EmployeeRepository extends AbstractRepository
{
    protected string $tableName = 'employees';
    
    public function findByDepartment(int $departmentId): array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE department_id = :department_id AND status = 'active'";
        return $this->executeQuery($sql, ['department_id' => $departmentId]);
    }
    
    public function findByPosition(int $positionId): array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE position_id = :position_id AND status = 'active'";
        return $this->executeQuery($sql, ['position_id' => $positionId]);
    }
    
    public function findByStatus(string $status): array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE status = :status";
        return $this->executeQuery($sql, ['status' => $status]);
    }
    
    public function searchByName(string $searchTerm): array
    {
        $sql = "SELECT * FROM {$this->tableName} 
                WHERE (first_name LIKE :search OR last_name LIKE :search OR email LIKE :search)
                AND status = 'active'";
        
        $searchPattern = "%{$searchTerm}%";
        return $this->executeQuery($sql, ['search' => $searchPattern]);
    }
    
    public function getActiveEmployees(): array
    {
        return $this->findByStatus('active');
    }
    
    public function getEmployeesWithDetails(): array
    {
        $sql = "SELECT e.*, p.title as position_title, d.name as department_name
                FROM {$this->tableName} e
                LEFT JOIN positions p ON e.position_id = p.id
                LEFT JOIN departments d ON e.department_id = d.id
                WHERE e.status = 'active'
                ORDER BY e.last_name, e.first_name";
        
        return $this->executeQuery($sql);
    }
    
    public function getEmployeeWithDetails(int $id): ?array
    {
        $sql = "SELECT e.*, p.title as position_title, d.name as department_name
                FROM {$this->tableName} e
                LEFT JOIN positions p ON e.position_id = p.id
                LEFT JOIN departments d ON e.department_id = d.id
                WHERE e.id = :id";
        
        $results = $this->executeQuery($sql, ['id' => $id]);
        return !empty($results) ? $results[0] : null;
    }
    
    public function getEmployeesBySalaryRange(float $minSalary, float $maxSalary): array
    {
        $sql = "SELECT * FROM {$this->tableName} 
                WHERE salary BETWEEN :min_salary AND :max_salary 
                AND status = 'active'
                ORDER BY salary DESC";
        
        return $this->executeQuery($sql, [
            'min_salary' => $minSalary,
            'max_salary' => $maxSalary
        ]);
    }
    
    public function getDepartmentEmployeeCount(int $departmentId): int
    {
        $sql = "SELECT COUNT(*) FROM {$this->tableName} 
                WHERE department_id = :department_id AND status = 'active'";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['department_id' => $departmentId]);
        
        return (int) $stmt->fetchColumn();
    }
    
    public function getAverageSalaryByDepartment(int $departmentId): float
    {
        $sql = "SELECT AVG(salary) FROM {$this->tableName} 
                WHERE department_id = :department_id AND status = 'active'";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['department_id' => $departmentId]);
        
        return (float) $stmt->fetchColumn();
    }
    
    public function getHiredEmployeesInPeriod(string $startDate, string $endDate): array
    {
        $sql = "SELECT * FROM {$this->tableName} 
                WHERE hire_date BETWEEN :start_date AND :end_date
                ORDER BY hire_date DESC";
        
        return $this->executeQuery($sql, [
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
    }
}
