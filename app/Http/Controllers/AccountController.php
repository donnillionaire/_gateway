<?php

namespace app\Http\Controllers;
use App\Account;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AccountService;

class AccountController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var AccountService
     */
    public $accountService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AccountService $accountService)
    {
        $this->AccountService = $accountService;
    }

        /**
     * Return the list of Accounts
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->AccountService->obtainAccounts());
    }

        /**
         * Create one new Account
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->AccountService->createAccount($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Account
     * @return Illuminate\Http\Response
     */
    public function show($account)
    {
        return $this->successResponse($this->AccountService->obtainAccount($account));
        
    }

    /**
     * Update an existing Account
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $account)
    {
        return $this->successResponse($this->AccountService->editAccount($request->all(), $account));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($account)
    {
        return $this->successResponse($this->AccountService->deleteAccount($account));
    }

    //
}
