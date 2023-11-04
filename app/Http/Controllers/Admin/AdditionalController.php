<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\ContactLink;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class AdditionalController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

    /**
	 * Display a listing of the resource.
	 */
    public function contact() : Response
    {
        $data = [
			'title' => 'kontak',
            'form'	=> ['action' => route('contact.update'), 'class' => 'to-update'],
            'contact'   => [
                'phone' => Contact::whereType('phone')->get(),
                'whatsapp' => Contact::whereType('whatsapp')->get(),
                'email' => Contact::whereType('email')->get(),
                'location' => Contact::whereIn('type', ['address', 'map'])->get()
            ]
		];

        return response()->view('admin.additional.contact', compact('data'));
    }

    /**
	 * Update the specified resource in storage.
	 */
	public function contact_update(Request $request) : JsonResponse
	{
    }

    /**
     * Display a listing of the resource.
     */
    public function social(): Response
    {
        $link = ContactLink::whereType('social')->get();
        $data = [
			'title' => 'media sosial',
            'form'	=> ['action' => route('link.update', 'social'), 'class' => 'to-update']
		];

        return response()->view('admin.additional.link', compact('data', 'link'));
    }

    /**
     * Display a listing of the resource.
     */
    public function ecommerce(): Response
    {
        $link = ContactLink::whereType('ecommerce')->get();
        $data = [
			'title' => 'toko online',
            'form'	=> ['action' => route('link.update', 'ecommerce'), 'class' => 'to-update']
		];

        return response()->view('admin.additional.link', compact('data', 'link'));
    }

    /**
	 * Update the specified resource in storage.
	 */
	public function link_update(Request $request) : JsonResponse
	{
    }
}
