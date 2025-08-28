<?php
declare(strict_types=1);

namespace App\Services\Backend\Modules\UserModule\Module;

use App\Interfaces\Modules\UserModule\Module\ModuleInterface;
use App\Models\UserModule\Module;
use Illuminate\Database\Eloquent\Collection;

class ModuleService
{

     public function __construct(
          protected ModuleInterface $moduleRepository,
     )
     {
          // Constructor can be used for dependency injection if needed
     }

     public function getAllModuleForLeftSideBar(): Collection
     {
          return $this->moduleRepository->getAllModule()->where("left_menu_visibility", true)->get();
     }

     public function getAllModule(): Collection
     {
          return $this->moduleRepository->getAllModule()->get();
     }
}
