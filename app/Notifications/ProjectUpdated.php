<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProjectUpdated extends Notification implements ShouldBroadcast
{
    use Queueable;

    protected $project;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project)
    {
        $this->project=$project;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
      return ['database','broadcast'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
          'message'=>'Updated project '. $this->project->name,
          'notifier' =>auth()->user(),
          'link'=>$this->project->path()
        ];
    }

    public function toBroadcast($notifiable)
   {
    return new BroadcastMessage([
      'message'=>'Updated project '. $this->project->name,
      'notifier' =>auth()->user(),
      'link'=>$this->project->path()
    ]);
  }
}
