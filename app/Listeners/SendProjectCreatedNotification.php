<?php

namespace AuthTestApp\Listeners;

use AuthTestApp\Mail\ProjectCreated as ProjectCreatedMail;
use AuthTestApp\Events\ProjectCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendProjectCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        \Mail::to($event->project->owner->email)->send(
          new ProjectCreatedMail($event->project)
        );
    }
}
