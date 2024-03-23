<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends BaseController
{
    public function create(): View
    {
        return view('registration');
    }
    public function store(RegistrationRequest $request): View
    {
        $validated = $request->validated();
        return view('successfulRegistration');
    }
}
