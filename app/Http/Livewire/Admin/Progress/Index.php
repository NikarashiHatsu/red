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
        $incomplete_progress = Progress::query()
            ->where('is_apk_created', null)
            ->orWhere('is_published_on_google_play', null)
            ->orWhere('google_play_url', null)
            ->orderByDesc('created_at')
            ->paginate(10);

        $completed_progress = Progress::query()
            ->with('user', 'user.form_order')
            ->whereHas('user.form_order')
            ->where('is_apk_created', true)
            ->where('is_published_on_google_play', true)
            ->where('google_play_url', '!=', null)
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('livewire.admin.progress.index', [
            'incomplete_progresses' => $incomplete_progress,
            'completed_progresses' => $completed_progress,
        ]);
    }
}
