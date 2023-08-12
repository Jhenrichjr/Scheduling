<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class Edit extends Component
{
    use Actions;
    public $roomId;
    public $eventId;
    public $slug;
    public $name;
    public $description;
    public $eventStart;
    public $eventEnd;
    public $event;

    public function mount(Event $event){
        $this->event = $event; //select * from user where id= user
        $this->roomId = $event->id;
        $this->name = $event->name;
        $this->description = $event->description;
        $this->eventStart = $event->event_start;
        $this->eventEnd = $event->event_end;
    }

    public function update($id){

        $validated = Validator::make(
            [
                'name' =>$this->name,
                'description' =>$this->description,
                'eventStart' => $this->eventStart,
                'eventStart' => $this->eventStart,

            ],
            [
                'name' => 'required',
                 'roomId' => [
                    Rule::unique('rooms', 'id'),
                ]

            ],
        )->validate();

        try{
            DB::beginTransaction();

            $event =  Event::find($id);
            $event->slug = Str::slug($this->name, '-');
            $event->name = $this->name;
            $event->description = $this->description;
            $event->event_start = Carbon::parse($this->eventStart)->toDateTimeString();
            $event->event_end = Carbon::parse($this->eventEnd)->toDateTimeString();
            $event->room_id = $this->roomId;

            if($event->save()){
                DB::commit();
                $this->dialog()->success(
                    $title = "Event Saved",
                    $description = 'Event was successfully saved'
                );
            }else{
                DB::rollback();
                $this->dialog()->error(
                    $title = 'Error !!!',
                    $description = 'Event was not saved'
                );
            }

        }catch(\Throwable $th){
            DB::rollBack();
            dd($th->getMessage());
        }
    }


    //render is called everytime it's refreshed
    public function render()
    {
        return view('livewire.event.edit');
    }
}
