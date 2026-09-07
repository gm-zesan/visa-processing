<?php

namespace App\Enums;

enum ApplicationStatus: string
{
    case PENDING = 'pending';
    case VERIFIED = 'verified';
    case IN_PROGRESS = 'in_progress';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';

    /**
     * Get human-readable label for status
     */
    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Application Pending Review',
            self::VERIFIED => 'Documents & Medical Verified',
            self::IN_PROGRESS => 'Visa Processing & Embassy Clearance',
            self::APPROVED => 'Visa Approved & Ready for Flight',
            self::REJECTED => 'Application Rejected / Incomplete',
        };
    }

    /**
     * Short display label (e.g. for pills, selects, tables)
     */
    public function shortLabel(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::VERIFIED => 'Verified',
            self::IN_PROGRESS => 'In Progress',
            self::APPROVED => 'Approved',
            self::REJECTED => 'Rejected',
        };
    }

    /**
     * Get CSS badge class for frontend/admin
     */
    public function badgeClass(): string
    {
        return match ($this) {
            self::PENDING => 'badge_pending',
            self::VERIFIED => 'badge_verified',
            self::IN_PROGRESS => 'badge_in_progress',
            self::APPROVED => 'badge_approved',
            self::REJECTED => 'badge_rejected',
        };
    }

    /**
     * Admin status pill class
     */
    public function pillClass(): string
    {
        return match ($this) {
            self::PENDING => 'status-pill pending',
            self::VERIFIED => 'status-pill verified',
            self::IN_PROGRESS => 'status-pill in_progress',
            self::APPROVED => 'status-pill approved',
            self::REJECTED => 'status-pill rejected',
        };
    }

    /**
     * Timeline stage index (1 to 4) or 0 if rejected
     */
    public function stageLevel(): int
    {
        return match ($this) {
            self::PENDING => 1,
            self::VERIFIED => 2,
            self::IN_PROGRESS => 3,
            self::APPROVED => 4,
            self::REJECTED => 0,
        };
    }

    /**
     * Array of all string values
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Key-value array of [value => label]
     */
    public static function options(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }
        return $options;
    }

    /**
     * Key-value array of [value => shortLabel]
     */
    public static function shortOptions(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->shortLabel();
        }
        return $options;
    }
}
