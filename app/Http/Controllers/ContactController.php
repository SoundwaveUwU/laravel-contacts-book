<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     *
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $contacts = Contact::where('user_id', $request->user()->id)
            ->paginate();

        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     *
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize('create', Contact::class);

        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreContactRequest  $request
     *
     * @return RedirectResponse
     *
     * @throws AuthorizationException
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {
        $this->authorize('create', Contact::class);

        $contact = new Contact();
        $contact->fill($request->validated());
        $contact->user()->associate($request->user());
        $contact->save();

        return redirect()->route('contact.show', $contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  Contact  $contact
     *
     * @return Application|Factory|View
     *
     * @throws AuthorizationException
     */
    public function show(Contact $contact): View|Factory|Application
    {
        $this->authorize('view', $contact);

        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Contact  $contact
     *
     * @return Application|Factory|View
     *
     * @throws AuthorizationException
     */
    public function edit(Contact $contact): View|Factory|Application
    {
        $this->authorize('update', $contact);

        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateContactRequest  $request
     * @param  Contact  $contact
     *
     * @return RedirectResponse
     *
     * @throws AuthorizationException
     */
    public function update(UpdateContactRequest $request, Contact $contact): RedirectResponse
    {
        $this->authorize('update', $contact);

        $contact->fill($request->validated());
        $contact->save();

        return redirect()->route('contact.show', $contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Contact  $contact
     *
     * @return RedirectResponse
     *
     * @throws AuthorizationException
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $this->authorize('destroy', $contact);

        $contact->delete();

        return redirect()->route('contact.index');
    }
}
