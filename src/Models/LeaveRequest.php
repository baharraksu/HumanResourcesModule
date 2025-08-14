<?php

namespace HR\Models;

/**
 * Leave Request Model
 * Single Responsibility: Sadece izin talebi verilerini temsil eder
 */
class LeaveRequest
{
    private ?int $id;
    private int $employee_id;
    private int $leave_type_id;
    private string $start_date;
    private string $end_date;
    private string $reason;
    private string $status;
    private ?string $approved_by;
    private ?string $approved_at;
    private ?string $created_at;
    private ?string $updated_at;

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
            'employee_id' => $this->employee_id,
            'leave_type_id' => $this->leave_type_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'reason' => $this->reason,
            'status' => $this->status,
            'approved_by' => $this->approved_by,
            'approved_at' => $this->approved_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getEmployeeId(): int { return $this->employee_id; }
    public function getLeaveTypeId(): int { return $this->leave_type_id; }
    public function getStartDate(): string { return $this->start_date; }
    public function getEndDate(): string { return $this->end_date; }
    public function getReason(): string { return $this->reason; }
    public function getStatus(): string { return $this->status; }
    public function getApprovedBy(): ?string { return $this->approved_by; }
    public function getApprovedAt(): ?string { return $this->approved_at; }
    public function getCreatedAt(): ?string { return $this->created_at; }
    public function getUpdatedAt(): ?string { return $this->updated_at; }

    // Setters
    public function setId(?int $id): void { $this->id = $id; }
    public function setEmployeeId(int $employee_id): void { $this->employee_id = $employee_id; }
    public function setLeaveTypeId(int $leave_type_id): void { $this->leave_type_id = $leave_type_id; }
    public function setStartDate(string $start_date): void { $this->start_date = $start_date; }
    public function setEndDate(string $end_date): void { $this->end_date = $end_date; }
    public function setReason(string $reason): void { $this->reason = $reason; }
    public function setStatus(string $status): void { $this->status = $status; }
    public function setApprovedBy(?string $approved_by): void { $this->approved_by = $approved_by; }
    public function setApprovedAt(?string $approved_at): void { $this->approved_at = $approved_at; }
    public function setCreatedAt(?string $created_at): void { $this->created_at = $created_at; }
    public function setUpdatedAt(?string $updated_at): void { $this->updated_at = $updated_at; }

    // Helper methods
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    public function getDaysRequested(): int
    {
        $start = new \DateTime($this->start_date);
        $end = new \DateTime($this->end_date);
        $interval = $start->diff($end);
        return $interval->days + 1; // +1 because both start and end dates are inclusive
    }

    public function isCurrentlyActive(): bool
    {
        $today = new \DateTime();
        $start = new \DateTime($this->start_date);
        $end = new \DateTime($this->end_date);
        
        return $today >= $start && $today <= $end && $this->status === 'approved';
    }
}
