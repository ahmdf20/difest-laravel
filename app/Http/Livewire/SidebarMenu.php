<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SidebarMenu extends Component
{
    public $sidebarMenu = [
        0 => [
            'name' => 'Dashboard',
            'path' => 'user.dashboard',
            'access' => ['admin', 'admin seminar', 'commite', 'judge', 'participant'],
        ],
        1 => [
            'name' => 'Commite',
            'path' => 'user.commite',
            'access' => ['admin'],
        ],
        2 => [
            'name' => 'Judge',
            'path' => 'user.judge',
            'access' => ['admin', 'commite'],
        ],
        3 => [
            'name' => 'Participant',
            'path' => 'user.participant',
            'access' => ['admin', 'commite'],
        ],
        4 => [
            'name' => 'Submissions',
            'path' => 'submission',
            'access' => ['admin', 'commite'],
        ],
        5 => [
            'name' => 'Grading Criterias',
            'path' => 'grading-criteria',
            'access' => ['admin', 'commite'],
        ],
        6 => [
            'name' => 'Submission Gradings',
            'path' => 'submission-grading',
            'access' => ['admin', 'commite', 'judge'],
        ],
        7 => [
            'name' => 'Top Five',
            'path' => 'top-five',
            'access' => ['admin', 'commite'],
        ],
        8 => [
            'name' => 'Seminar',
            'path' => 'seminar',
            'access' => ['admin', 'admin seminar'],
        ],
        9 => [
            'name' => 'Profile',
            'path' => 'user.profile',
            'access' => ['admin', 'admin seminar', 'commite', 'judge', 'participant'],
        ],
    ];

    public function render()
    {
        return view('livewire.sidebar-menu');
    }
}
