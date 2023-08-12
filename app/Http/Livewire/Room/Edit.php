<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
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
    public $slug;
    public $name;
    public $description;
    public $capacity;
    public $room;

    //public $rules =[
    //   'firstName' => 'required',
    //   'middleName' => 'required',
    //   'lastName' => 'required',
    //   'email' => 'required|unique',
    //];

    //mount function only called once everytime for rendering components
    public function mount(Room $room){
        $this->room = $room; //select * from user where id= user
        $this->roomId = $room->id;
        $this->name = $room->name;
        $this->capacity = $room->capacity;
        $this->description = $room->description;
    }

    public function update($id){

        $validated = Validator::make(
            [
                'name' =>$this->name,
                'capacity' =>$this->capacity,
                'description' =>$this->description,

            ],
            [
                'name' => 'required',
                 'capacity' => 'required',
                 'roomId' => [
                    Rule::unique('rooms', 'id'),
                ]

            ],
        )->validate();

        try{
            DB::beginTransaction();

            $room =  Room::find($id);
            $room->slug = Str::slug($this->name, '-');
            $room->name = $this->name;
            $room->description = $this->description;
            $room->capacity = $this->capacity;

            if($room->save()){
                DB::commit();
                $this->dialog()->success(
                    $title = "Room Saved",
                    $description = 'Room was successfully saved'
                );
            }else{
                DB::rollback();
                $this->dialog()->error(
                    $title = 'Error !!!',
                    $description = 'Room was not saved'
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
        return view('livewire.room.edit');
    }
}
