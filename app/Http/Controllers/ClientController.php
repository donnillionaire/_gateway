<?php

namespace App\Http\Controllers;
use App\Client;
use App\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ClientService;
use App\Services\ClientCategoryService;

class ClientController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients/dept/category/user microservice
     * @var ClientService
     */
    public $clientService;
    public $departmentService;
    public $clientCategoryService;
    public $contactService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClientService $clientService, ClientCategoryService $clientCategoryService, ContactService $contactService, DepartmentService $departmentService)
    {
        $this->clientService = $clientService;
        $this->clientCategoryService = $clientCategoryService;
        $this->departmentService = $departmentService;
        $this->contactService = $contactService;
    }

        /**
     * Return the list of clients
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->clientService->obtainClients());
    }

    /**
     * Create one new client
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check if category exist
        $this->clientCategoryService->obtainCategory($request->category_id);
        
        //store client
        $client = $this->clientService->createClients($request->all());

        //create overview department
        $request->merge(['dept_name' => '[overview ' . $request->organization . ']']);
        $request->merge(['client_id' => $client->client_id]);
        $dept = $this->departmentService->createDepartment($request->all());

        //create default user
        $request->merge(['dept_id' => $dept->dept_id]);
        // $user = array(
        //     'username' => $request->organization,
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'role' => $request->role
        // );
        $user = (new User)->store($request->all());

        //add account balance amount
        $request->merge(['balance' => 0]);
        // $account_balance = array(
        //     'dept_id' => $dept->dept_id,
        //     'balance' => 0
        // );
        $this->account_balanceService->createAccount($request->all());
        
        //store contact info
        $request->merge(['default_user' => 1]);
        // $contact = array(
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'phone' => $request->phone,
        //     'title' => $request->title,
        //     'client_id' => $request->email,
        //     'user_id' => $request->user_id,
        //     'modules' => $request->modules,
        //     'can_update' => $request->can_update,
        //     'default_user' => 1
        // );

        return $this->successResponse($this->contactService->createContacts($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one client
     * @return Illuminate\Http\Response
     */
    public function show($client)
    {
        return $this->successResponse($this->clientService->obtainClient($client));
        
    }

    /**
     * Update an existing client
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $client)
    {
        return $this->successResponse($this->clientService->editClient($request->all(), $client));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($client)
    {
        return $this->successResponse($this->clientService->deleteClient($client));
    }

    //
}
