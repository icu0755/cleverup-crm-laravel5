<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;

interface ComposerInterface
{
    public function compose(View $view);
}