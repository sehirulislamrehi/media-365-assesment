<?php
declare(strict_types=1);

namespace App\Http\Controllers\Backend\Modules\UserModule\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserModule\Auth\LoginRequest;
use App\Services\Backend\Modules\UserModule\Auth\LoginServie;
use App\Traits\Modules\ApiResponseTrait;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use ApiResponseTrait;

    /**
     * LoginController constructor.
     *
     * @param LoginServie $loginServie
     */
    public function __construct(
        protected LoginServie $loginServie
    )
    {
        
    }

    /**
     * Show the login page.
     *
     * @return View|RedirectResponse
     */
    public function loginPage(): View|RedirectResponse
    {
        try{
            if (Auth::check()) {
                return redirect()->route('admin.dashboard.index');
            }
            return view('backend.modules.user_module.auth.login');
        }
        catch (\Exception $e) {
            return view('errors.500', ['message' => $e->getMessage()]);
        }
    }


    /**
     * Handle the login request.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function doLogin(LoginRequest $request): JsonResponse
    {
        try{

            $user = $this->loginServie->getUserByEmail($request->email);

            if (!$user) {
                return $this->response(
                    status: 'warning',
                    data: [],
                    message: 'User not found.',
                    code: 200
                );
            }
            if (!$user->is_active) {
                return $this->response(
                    status: 'warning',
                    data: [],
                    message: 'User is inactive.',
                    code: 200
                );
            }

            $isAuthenticate = $this->loginServie->doLogin($request);

            if ($isAuthenticate) {
                return $this->response(
                    status: 'success',
                    data: [],
                    message: "Login successful. Redirecting to dashboard.",
                    code: 200,
                    locationReload: true,
                    url: route('admin.dashboard.index')
                );
            }

            return $this->response(
                status: 'error',
                data: [],
                message: "Invalid credentials.",
                code: 200
            );
        }
        catch (Exception $e) {
            return $this->response(
                status: 'error',
                data: [],
                message: $e->getMessage(),
                code: 500
            );
        }
    }

    /**
     * Handle the logout request.
     *
     * @return View|RedirectResponse
     */
    public function doLogout(): View|RedirectResponse
    {
        try{
            Auth::logout();
            return redirect()->route('admin.login.page');
        }
        catch (Exception $e) {
            return view('errors.500', ['message' => $e->getMessage()]);

        }
    }
}
