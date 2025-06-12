<?php

namespace App\Http\Controllers;

use App\Core\DocStatus;
use App\Filters\DataServiceFilter;
use App\Filters\NotificationFilter;
use App\Models\User;
use App\Services\DataServicesService;
use App\Services\NotificationService;
use App\Services\ServicesService;
use DB;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct(
        private ServicesService $service,
        private DataServicesService $dataService,
        private NotificationService $notificationService,
        private DataServiceFilter $dataServiceFilter,
        private NotificationFilter $notificationFilter
    ) {
    }


    public function indexMessages()
    {
        try {
            $data = $this->notificationService
                ->filters($this->notificationFilter)
                ->where('doc_type', 'MS')
                ->get();
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }
    public function index()
    {
        try {
            $data = $this->service
                ->where(DocStatus::COLUMN_NAME, DocStatus::ACTIVE)
                ->get();
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    public function setImg(Request $request, $id)
    {
        try {
            if (!$request->hasFile('picture')) {
                throw new \ErrorException('No has enviado la img para guardar');
            }
            $file = $request->file('picture');
            $folder = "admin/services/$id/picture";
            $path = storeFile($file, $folder);
            $extra = ['picture' => $path];
            $data = $this->service
                ->update($id, $extra, false);
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = $this->service->findOrFail($id);
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function indexData()
    {
        try {
            $data = $this->dataService
                ->filters($this->dataServiceFilter)
                ->get();
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    public function storeData(Request $request)
    {

        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required',
                'contact_number' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'type_contact' => 'required',
                'description_area' => 'required',
                'services_id' => 'required',
            ]);
            $dataInsertUser = $request->only(['name', 'email', 'address', 'contact_number']);
            $dataInsertUser['email'] = sanitize_inputs($dataInsertUser['email'], true);
            $dataInsertServices = $request->only(['description_area', 'type_contact', 'services_id', 'bathrooms', 'rooms']);
            $user = User::updateOrCreate([
                'email' => $dataInsertUser['email'],
            ], $dataInsertUser);

            $dataInsertServices['user_id'] = $user->id;
            $data = $this->dataService->save($dataInsertServices, false);
            sendEmail($request->email, 'New service request', 'emails.messages', [
                'payload' => 'You have received a new request, check your dashboard',
                'email' => $request->get('email'),
                'phone' => $request->get('contact_number'),
            ]);
            DB::commit();
            return response_create($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response_error($th->getMessage());
        }
    }

    public function showUserByTaxId(Request $request, $tax_id)
    {
        try {
            $user = User::where('email', sanitize_inputs($tax_id, true))->first();
            return response_success($user);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    public function sendConfirmation(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'payload' => 'required',
                'type' => 'required',
                'sender' => 'required',
                'receiver' => 'required',
                'data_service_id' => 'required',
            ]);
            $data = $this->notificationService->save();
            $receiver = User::findOrFail($request->get('receiver'));
            $payload = $request->get('payload');

            sendEmail($receiver->email, 'Confirmation Service', 'emails.confirmation', [
                'payload' => $payload
            ]);

            DB::commit();
            return response_success($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response_error($th->getMessage());
        }
    }


    public function sendMessage(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'payload' => 'required',
                'type' => 'required',
                'receiver' => 'required',
                'email' => 'required',
                'doc_type' => 'required',
                'phone_number' => 'required'
            ]);
            $data = $this->notificationService->save();
            $receiver = User::findOrFail($request->get('receiver'));
            $payload = $request->get('payload');

            sendEmail($receiver->email, 'New Message Contact', 'emails.messages', [
                'payload' => $payload,
                'email' => $request->get('email'),
                'phone' => $request->get('phone_number'),
            ]);

            DB::commit();
            return response_success($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response_error($th->getMessage());
        }
    }

    public function upload(Request $request)
    {
        try {
            if (!$request->hasFile('upload')) {
                throw new \ErrorException('No has enviado el archivo para guardar');
            }
            $file = $request->file('upload');
            $folder = "admin/services/upload";
            $path = storeFile($file, $folder);
            return response_success($path);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    public function updateNotification(Request $request, $id)
    {
        try {
            $data = $this->notificationService->update($id);
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    public function updateServiceData(Request $request, $id)
    {
        try {
            $data = $this->dataService->update($id);
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }
}
