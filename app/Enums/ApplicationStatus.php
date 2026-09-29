<?php

namespace App\Enums;

enum ApplicationStatus: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case FLIGHT = 'flight';

    /**
     * Get human-readable label for status
     */
    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Application Pending',
            self::PROCESSING => 'Processing',
            self::FLIGHT => 'Flight',
        };
    }

    /**
     * Short display label (e.g. for pills, selects, tables)
     */
    public function shortLabel(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::PROCESSING => 'Processing',
            self::FLIGHT => 'Flight',
        };
    }

    /**
     * Get CSS badge class for frontend/admin
     */
    public function badgeClass(): string
    {
        return match ($this) {
            self::PENDING => 'badge_pending',
            self::PROCESSING => 'badge_processing',
            self::FLIGHT => 'badge_flight',
        };
    }

    /**
     * Admin status pill class
     */
    public function pillClass(): string
    {
        return match ($this) {
            self::PENDING => 'status-pill pending',
            self::PROCESSING => 'status-pill processing',
            self::FLIGHT => 'status-pill flight',
        };
    }

    /**
     * Timeline stage index (1 to 3) or 0 if rejected
     */
    public function stageLevel(): int
    {
        return match ($this) {
            self::PENDING => 1,
            self::PROCESSING => 2,
            self::FLIGHT => 3,
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
