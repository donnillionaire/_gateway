<?php

namespace App\Http\Controllers;
use App\Contact;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ContactService;
use App\Services\ClientService;


class ContactController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the contact microservice
     * @var ContactController
     */
    public $contactService;

    /**
     * The service to consume the clients microservice
     * @var ClientService
     */
    public $clientService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContactService $contactService, ClientService $clientService)
    {
        $this->contactService = $contactService;
        $this->clientService = $clientService;
    }

        /**
     * Return the list of category
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->successResponse($this->contactService->obtainContacts());
    }

        /**
         * Create one new contact
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        //check if client exist
        $this->clientService->obtainClient($request->client_id);

        return $this->successResponse($this->contactService->createContacts($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one contact
     * @return Illuminate\Http\Response
     */
    public function show($contact)
    {
        return $this->successResponse($this->contactService->obtainContact($contact));
    }

    /**
     * Update an existing contact
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $contact)
    {
        return $this->successResponse($this->contactService->editContact($request->all(), $contact));
    }

    /**
     * Remove an existing contact
     * @return Illuminate\Http\Response
     */
    public function destroy($contact)
    {
        return $this->successResponse($this->contactService->deleteContact($contact));
    }

    //
}
