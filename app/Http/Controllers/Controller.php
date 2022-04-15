<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Services\ClassService;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    /**
     * @var ClassService
     */
    protected ClassService $service;

    /**
     * @param ClassService $servis
     */
    public function __construct(ClassService $servis){
        $this->service = $servis;
    }

    /**
     * All Get Note
     * @return \App\Http\Resources\NoteResource|\App\Http\Services\json
     */
    public function note(){
        return $this->service->getNote(0);
    }

    /**
     * $id with get note.
     * @param $id
     * @return \App\Http\Resources\NoteResource|\App\Http\Services\json
     */
    public function getnote($id){
        return $this->service->getNote($id);
    }
    /**
     * Create a new note.
     * @param Request $request
     * @return \App\Http\Resources\NoteResource|\App\Http\Services\json
     */
    public function postnote(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required|max:255',
            'tags' => 'required'
        ]);
        return $this->service->createSpecialNote($request->input('name'),$request->input('content'),$request->input('tags'));
    }

    /**
     * Note edit
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editnote($id,Request $request)
    {
        $validated = $request->validate([
            'name' => 'max:255',
            'content' => 'max:255',
            'tags' => 'max:255'
        ]);

        // If even one of the 3 possible inputs is empty, reject it.
        if(empty($request->input('name')) && empty($request->input('content')) && empty($request->input('tags')))
            return response()->json(['status'=>'error','code' => '0']);

        return $this->service->editNote($id,$request->all());
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function putnote($id,Request $request)
    {
        if(empty($request->input('name')) || empty($request->input('content')) || empty($request->input('tags')))
            return response()->json(['status'=>'error','code' => '0']);

        return $this->service->put($id,$request->all());
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function delete($id)
    {
        return $this->service->deleted($id);
    }

}
