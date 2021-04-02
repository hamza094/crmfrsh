<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Appointment;
use App\Http\Requests\AppointmentRequest;
use App\Services\AppointmentService;

class AppointmentController extends Controller
{
  private $appointmentService;
  
   /**
    * Service For Appointment 
    *
    * App\Service\Appointment Service
    */
  public function __construct(AppointmentService $appointmentService)
  {
    $this->appointmentService=$appointmentService;
  }

  /**
    * Show all project related appointments 
    *
    * App\Service\Appointment Service
    */
  public function index(Project $project,Request $request)
  {
    return  $project->appointments()->with('users')->get();
  }

  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
  public function store(Project $project,AppointmentRequest $request)
  {
    $appointment=$project->appointments()->create($request->validated());

    $this->appointmentService->performAppointmentRelatedTasks($project,$appointment);    
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $project, int $appointment
     * @return  \Illuminate\Http\Request  $request
     *
     */
    public function update(Project $project,Appointment $appointment,AppointmentRequest 
      $request)
    {
      $appointment->update($request->validated());

      $this->appointmentService->performRelatedOperation($project,$request,$appointment);
    }

    /**
     * Delete the specified resource from database.
     *
     * @param  int  $project, int $appointment
     */
     public function destroy(Project $project,Appointment $appointment)
     {
       $appointment->delete();

       $appointment->activity()->delete();
       
       $project->recordActivity('deleted_appointment',$appointment->title);
     }
}
