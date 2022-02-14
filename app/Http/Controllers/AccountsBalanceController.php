<?php

namespace app\Http\Controllers;
//use Laravel\Lumen\Routing\Controller as BaseController;
use App\Accounts_Balance;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AccountBalanceService;

class AccountsBalanceController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var account_balanceService
     */
    public $account_balanceService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AccountBalanceService $account_balanceService)
    {
        $this->account_balanceService = $account_balanceService;
    }

        /**
     * Return the list of Accounts
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->account_balanceService->obtainAccounts());
    }

        /**
         * Create one new Account
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->account_balanceService->createAccount($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Account
     * @return Illuminate\Http\Response
     */
    public function show($Account)
    {
        return $this->successResponse($this->account_balanceService->obtainAccount($Account));
        
    }

    /**
     * Update an existing Account
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $Account)
    {
        return $this->successResponse($this->account_balanceService->editAccount($request->all(), $Account));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($Account)
    {
        return $this->successResponse($this->account_balanceService->deleteAccount($Account));
    }

    //
}
