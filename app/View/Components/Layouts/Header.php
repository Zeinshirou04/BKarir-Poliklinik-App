<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Header extends Component
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
            'nama' => $auth->nama,
            'role' => $auth->role
        ];

        return view('components.layouts.header', compact('user'));
    }
}
