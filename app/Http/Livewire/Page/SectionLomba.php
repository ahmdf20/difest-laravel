<?php

namespace App\Http\Livewire\Page;

use App\Models\Competition;
use Livewire\Component;

class SectionLomba extends Component
{
    public $lomba;

    public function __construct()
    {
        $this->lomba = Competition::all();
    }

    public function render()
    {
        return view('livewire.page.section-lomba');
    }
}
