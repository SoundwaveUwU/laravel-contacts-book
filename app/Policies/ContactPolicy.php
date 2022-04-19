<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Contact  $contact
     * @return Response|bool
     */
    public function view(User $user, Contact $contact): Response|bool
    {
        return $contact->user_id == $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Contact  $contact
     * @return Response|bool
     */
    public function update(User $user, Contact $contact): Response|bool
    {
        return $contact->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Contact  $contact
     * @return Response|bool
     */
    public function delete(User $user, Contact $contact): Response|bool
    {
        return $contact->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Contact  $contact
     * @return Response|bool
     */
    public function restore(User $user, Contact $contact): Response|bool
    {
        return $contact->user_id == $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Contact  $contact
     * @return Response|bool
     */
    public function forceDelete(User $user, Contact $contact): Response|bool
    {
        return $contact->user_id == $user->id;
    }
}
