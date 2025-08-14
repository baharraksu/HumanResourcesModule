<?php

namespace HR\Services;

use HR\Repositories\EmployeeRepository;
use HR\Models\Employee;

/**
 * Employee Service
 * Single Responsibility: Sadece çalışan iş mantığından sorumlu
 */
class EmployeeService
{
    private EmployeeRepository $employeeRepository;
    
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }
    
    public function getAllEmployees(): array
    {
        return $this->employeeRepository->getEmployeesWithDetails();
    }
    
    public function getEmployeeById(int $id): ?array
    {
        return $this->employeeRepository->getEmployeeWithDetails($id);
    }
    
    public function createEmployee(array $employeeData): bool
    {
        // Validasyon
        if (!$this->validateEmployeeData($employeeData)) {
            throw new \InvalidArgumentException('Geçersiz çalışan verileri');
        }
        
        // Email benzersizlik kontrolü
        if ($this->emailExists($employeeData['email'])) {
            throw new \InvalidArgumentException('Bu email adresi zaten kullanılıyor');
        }
        
        // Çalışan numarası benzersizlik kontrolü
        if ($this->employeeNumberExists($employeeData['employee_number'])) {
            throw new \InvalidArgumentException('Bu çalışan numarası zaten kullanılıyor');
        }
        
        // Varsayılan değerler
        $employeeData['status'] = 'active';
        $employeeData['created_at'] = date('Y-m-d H:i:s');
        $employeeData['updated_at'] = date('Y-m-d H:i:s');
        
        return $this->employeeRepository->save($employeeData);
    }
    
    public function updateEmployee(int $id, array $employeeData): bool
    {
        // Mevcut çalışan kontrolü
        $existingEmployee = $this->employeeRepository->find($id);
        if (!$existingEmployee) {
            throw new \InvalidArgumentException('Çalışan bulunamadı');
        }
        
        // Validasyon
        if (!$this->validateEmployeeData($employeeData, false)) {
            throw new \InvalidArgumentException('Geçersiz çalışan verileri');
        }
        
        // Email benzersizlik kontrolü (kendi email'i hariç)
        if (isset($employeeData['email']) && 
            $employeeData['email'] !== $existingEmployee['email'] && 
            $this->emailExists($employeeData['email'])) {
            throw new \InvalidArgumentException('Bu email adresi zaten kullanılıyor');
        }
        
        $employeeData['updated_at'] = date('Y-m-d H:i:s');
        
        return $this->employeeRepository->update($id, $employeeData);
    }
    
    public function deleteEmployee(int $id): bool
    {
        // Mevcut çalışan kontrolü
        $existingEmployee = $this->employeeRepository->find($id);
        if (!$existingEmployee) {
            throw new \InvalidArgumentException('Çalışan bulunamadı');
        }
        
        // Soft delete - sadece status'u değiştir
        return $this->employeeRepository->update($id, [
            'status' => 'terminated',
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
    
    public function searchEmployees(string $searchTerm): array
    {
        if (empty(trim($searchTerm))) {
            return [];
        }
        
        return $this->employeeRepository->searchByName($searchTerm);
    }
    
    public function getEmployeesByDepartment(int $departmentId): array
    {
        return $this->employeeRepository->findByDepartment($departmentId);
    }
    
    public function getEmployeesByPosition(int $positionId): array
    {
        return $this->employeeRepository->findByPosition($positionId);
    }
    
    public function getActiveEmployees(): array
    {
        return $this->employeeRepository->getActiveEmployees();
    }
    
    public function getDepartmentStatistics(int $departmentId): array
    {
        $employeeCount = $this->employeeRepository->getDepartmentEmployeeCount($departmentId);
        $averageSalary = $this->employeeRepository->getAverageSalaryByDepartment($departmentId);
        
        return [
            'employee_count' => $employeeCount,
            'average_salary' => round($averageSalary, 2)
        ];
    }
    
    public function getSalaryRangeEmployees(float $minSalary, float $maxSalary): array
    {
        if ($minSalary > $maxSalary) {
            throw new \InvalidArgumentException('Minimum maaş, maksimum maaştan büyük olamaz');
        }
        
        return $this->employeeRepository->getEmployeesBySalaryRange($minSalary, $maxSalary);
    }
    
    private function validateEmployeeData(array $data, bool $isCreate = true): bool
    {
        $requiredFields = ['first_name', 'last_name', 'email', 'hire_date', 'position_id', 'department_id', 'salary'];
        
        if ($isCreate) {
            $requiredFields[] = 'employee_number';
        }
        
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty(trim($data[$field]))) {
                return false;
            }
        }
        
        // Email format kontrolü
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        
        // Maaş pozitif olmalı
        if (isset($data['salary']) && $data['salary'] <= 0) {
            return false;
        }
        
        return true;
    }
    
    private function emailExists(string $email): bool
    {
        $existingEmployee = $this->employeeRepository->findOneBy(['email' => $email]);
        return $existingEmployee !== null;
    }
    
    private function employeeNumberExists(string $employeeNumber): bool
    {
        $existingEmployee = $this->employeeRepository->findOneBy(['employee_number' => $employeeNumber]);
        return $existingEmployee !== null;
    }
}
