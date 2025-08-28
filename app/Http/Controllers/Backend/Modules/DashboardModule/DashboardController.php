<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Modules\DashboardModule;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(Request $request): View
    {
        return view('backend.modules.dashboard_module.index');
    }

}
