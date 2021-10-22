<?php

namespace App\Http\Livewire\Admin\Progress;

use App\Models\Progress;
use Livewire\Component;

class ProgressDetail extends Component
{
    public Progress $progress;

    public function mount(Progress $progress)
    {
        $this->progress = $progress;
    }

    public function completeApk()
    {
        $this->progress->update([
            'is_apk_created' => true,
        ]);
    }

    public function completePublish()
    {
        $this->progress->update([
            'is_published_on_google_play' => true,
            'google_play_url' => 'none',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.progress.progress-detail');
    }
}
