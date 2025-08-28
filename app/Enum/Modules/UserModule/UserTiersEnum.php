<?php
namespace App\Enum\Modules\UserModule;

enum UserTiersEnum: string
{
    case FREE = "FREE";
    case PRO = "PRO";
    case ENTERPRISE = "ENTERPRISE";
    
    //ENUM("FREE","PRO","ENTERPRISE")
    public static function all(): array
    {
        return [
            self::FREE->value,
            self::PRO->value,
            self::ENTERPRISE->value,
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::FREE => 'Free',
            self::PRO => 'Pro',
            self::ENTERPRISE => 'Enterprise',
        };
    }

    public function imageUpload(): int
    {
        return match ($this) {
            self::FREE => 50,
            self::PRO => 100,
            self::ENTERPRISE => 200,
        };
    }

}
