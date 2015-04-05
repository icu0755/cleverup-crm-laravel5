<?php
namespace App\Http\ViewComposers;

use App\User;
use Illuminate\View\View;

class UsersComposer implements ComposerInterface
{
    public function compose(View $view)
    {
        $users = User::all();
        $view->withUsers($users);
    }
}