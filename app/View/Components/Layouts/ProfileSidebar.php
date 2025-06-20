<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileSidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $auth = Auth::user();

        $user = (object) [
            'id' => $auth->id,
        ];

        return view('components.layouts.profile-sidebar', compact('user'));
    }
}
