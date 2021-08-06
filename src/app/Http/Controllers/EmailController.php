<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use App\Http\Resources\EmailResource;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\UpdateEmailRequest;

class EmailController extends Controller
{
    protected $emails;

    public function __construct(EmailService $emails)
    {
        $this->emails = $emails;
    }

    public function index()
    {
        $emails = $this->emails->index();
        return EmailResource::collection($emails);
    }

    public function create()
    {
        //
    }

    public function store(StoreEmailRequest $request)
    {
        $dados_email = $request->all();
        $email = $this->emails->store($dados_email);
        return new EmailResource($email);
    }

    public function show(Int $id)
    {
        $email = $this->emails->show($id);
        return new EmailResource($email);
    }

    public function edit(Int $id)
    {
        $email = $this->emails->show($id);
        return new EmailResource($email);
    }

    public function update(UpdateEmailRequest $request, Int $id)
    {
        $dados_email = $request->all();
        $email = $this->emails->update($dados_email, $id);
        return new EmailResource($email);
    }

    public function destroy(Int $id)
    {
        $email = $this->emails->destroy($id);
        return new EmailResource($email);
    }
}
