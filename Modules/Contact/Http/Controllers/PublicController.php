<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Contact\Http\Requests\CreateContactRequest;
use Modules\Contact\Repositories\ContactRepository;
use Modules\Core\Http\Controllers\Api\BaseApiController;

class PublicController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    public function storeContact(CreateContactRequest $request)
    {
        try {
            $rand = strtoupper(substr(uniqid(sha1(time())), 0, 10));

            $contact = [
                'code' => $rand,
                'name' => $request->name,
                'subject' => $request->subject,
                'message' => $request->message,
                'reply' => null,
                'phone' => $request->phone,
                'email' => $request->email,
            ];

            $this->contactRepository->create($contact);

            // Redirect về route "page" với URI "contact"
            return response()->json([
                'status' => 1,
                'msg' => trans('contact::contacts.messages.message sent successfully')
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());

            // Redirect về route "page" với URI "contact"
            return response()->json([
                'status' => 0,
                'msg' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ]);
        }
    }
}