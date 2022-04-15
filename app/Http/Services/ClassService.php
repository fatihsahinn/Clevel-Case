<?php

namespace App\Http\Services;

use App\Models\NoteModel;
use App\Http\Resources\NoteResource;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Response;

class ClassService
{
    protected NoteModel $model;

    /**
     * Main Model
     *
     * @return void
     */
    public function __construct(NoteModel $model){
        $this->model = $model;
    }

    /**
     * @param $id
     * @return json
     * public function getNote($id) : int
     */
    public function getNote($id)
    {
        return new NoteResource($this->model->note($id)->getData(),$id);
    }

    /**
     * For seeder
     * @return array
     */
    public function createRandomNote()
    {
        $arr = ([
            'name' => Str::random(12),
            'content' => Str::random(25),
            'created_at' => Carbon::now()->toDateTimeString(),
            'tags' => Str::random(4).','.Str::random(4).','.Str::random(4),
        ]);
        return $arr;
    }

    /**
     * @param $name
     * @param $content
     * @param $tags
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSpecialNote($name,$content,$tags)
    {
        return $this->model->insertnote(array(['name' => $name,'content' => $content, 'created_at' => Carbon::now()->toDateTimeString(), 'tags' => $tags]));
    }

    /**
     * @param $id
     * @param $values
     * @return \Illuminate\Http\JsonResponse
     */
    public function editNote($id,$values){
        return $this->model->editNote($id,$values);
    }

    public function put($id,$values){
        return $this->model->put($id,$values);
    }

    public function deleted($id)
    {
        return $this->model->deleteNote($id);
    }
}
