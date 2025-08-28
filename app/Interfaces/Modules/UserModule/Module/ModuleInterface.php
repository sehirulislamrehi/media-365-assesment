<?php

declare(strict_types=1);

namespace App\Interfaces\Modules\UserModule\Module;

use Illuminate\Database\Eloquent\Builder;

interface ModuleInterface{
     public function getAllModule(): Builder;
}