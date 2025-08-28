<?php

declare(strict_types=1);

namespace App\Repositories\Modules\UserModule\Module;

use App\Interfaces\Modules\UserModule\Module\ModuleInterface;
use App\Models\UserModule\Module;
use Illuminate\Database\Eloquent\Builder;

class ModuleRepository implements ModuleInterface
{

     public function getAllModule(): Builder
     {
          return Module::query()
               ->with("subModule")
               ->orderBy('position', 'asc');
     }
}