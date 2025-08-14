<?php

namespace HR\Models;

class Employee
{
    private ?int $id;
    private string $employee_number;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $phone;
    private string $birth_date;
    private string $hire_date;
    private ?int $position_id;
    private ?int $department_id;
    private float $salary;
    private bool $is_active;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;

    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'employee_number' => $this->employee_number,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'birth_date' => $this->birth_date,
            'hire_date' => $this->hire_date,
            'position_id' => $this->position_id,
            'department_id' => $this->department_id,
            'salary' => $this->salary,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getEmployeeNumber(): string { return $this->employee_number; }
    public function getFirstName(): string { return $this->first_name; }
    public function getLastName(): string { return $this->last_name; }
    public function getEmail(): string { return $this->email; }
    public function getPhone(): string { return $this->phone; }
    public function getBirthDate(): string { return $this->birth_date; }
    public function getHireDate(): string { return $this->hire_date; }
    public function getPositionId(): ?int { return $this->position_id; }
    public function getDepartmentId(): ?int { return $this->department_id; }
    public function getSalary(): float { return $this->salary; }
    public function isActive(): bool { return $this->is_active; }
    public function getCreatedAt(): ?string { return $this->created_at; }
    public function getUpdatedAt(): ?string { return $this->updated_at; }
    public function getDeletedAt(): ?string { return $this->deleted_at; }

    // Setters
    public function setId(?int $id): void { $this->id = $id; }
    public function setEmployeeNumber(string $employee_number): void { $this->employee_number = $employee_number; }
    public function setFirstName(string $first_name): void { $this->first_name = $first_name; }
    public function setLastName(string $last_name): void { $this->last_name = $last_name; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function setPhone(string $phone): void { $this->phone = $phone; }
    public function setBirthDate(string $birth_date): void { $this->birth_date = $birth_date; }
    public function setHireDate(string $hire_date): void { $this->hire_date = $hire_date; }
    public function setPositionId(?int $position_id): void { $this->position_id = $position_id; }
    public function setDepartmentId(?int $department_id): void { $this->department_id = $department_id; }
    public function setSalary(float $salary): void { $this->salary = $salary; }
    public function setIsActive(bool $is_active): void { $this->is_active = $is_active; }
    public function setCreatedAt(?string $created_at): void { $this->created_at = $created_at; }
    public function setUpdatedAt(?string $updated_at): void { $this->updated_at = $updated_at; }
    public function setDeletedAt(?string $deleted_at): void { $this->deleted_at = $deleted_at; }

    // Helper methods
    public function getFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function isCurrentlyActive(): bool
    {
        return $this->is_active && $this->deleted_at === null;
    }

    public function getAge(): int
    {
        $birthDate = new \DateTime($this->birth_date);
        $today = new \DateTime();
        return $today->diff($birthDate)->y;
    }

    public function getYearsOfService(): int
    {
        $hireDate = new \DateTime($this->hire_date);
        $today = new \DateTime();
        return $today->diff($hireDate)->y;
    }
}
