<?php

namespace App\Http\Livewire\Admin\Progress;

use App\Models\Progress;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.progress.index', [
            'incomplete_progresses' => Progress::query()
                ->where('is_apk_created', null)
                ->orWhere('is_published_on_google_play', null)
                ->orWhere('google_play_url', null)
                ->paginate(10),
            'completed_progresses' => Progress::query()
                ->where('is_apk_created', true)
                ->where('is_published_on_google_play', true)
                ->where('google_play_url', '!=', null)
                ->paginate(),
        ]);
    }
}
