<?php
namespace App\Enum\Modules\UserModule;

enum ThumbnailStatusEnum: string
{
    case PENDING = "PENDING";
    case PROCESSED = "PROCESSED";
    case FAILED = "FAILED";
    
    //ENUM("PENDING","PROCESSED","FAILED")
    public static function all(): array
    {
        return [
            self::PENDING->value,
            self::PROCESSED->value,
            self::FAILED->value,
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::PROCESSED => 'Processed',
            self::FAILED => 'Failed',
        };
    }


}
