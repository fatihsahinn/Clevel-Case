<?php

namespace App\Models;

use App\Http\Abstracts\DBAbstract;
use App\Http\Abstracts\DBFunction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class NoteModel extends Model
{
    protected DBAbstract $abstract;
    protected Array $array;

    /**
     * @param DBAbstract $abstracts
     */
    public function __construct()
    {
        $this->abstract = new DBFunction();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function note($id)
    {
        $id == 0 ? $array= $this->abstract->selectAll('note') : $array= $this->abstract->selectWhere('note','id','=',$id);
        return $array;
    }

    /**
     * @param $note
     * @return \Illuminate\Http\JsonResponse
     */
    public function insertnote($note)
    {
        return $this->abstract->insertTable('note',$note);
    }

    /**
     * @param $id
     * @param $values
     * @return \Illuminate\Http\JsonResponse
     */
    public function editNote($id,$values)
    {
        return $this->abstract->editNote('note',$id,$values);
    }

    /**
     * @param $id
     * @param $values
     * @return \Illuminate\Http\JsonResponse
     */
    public function put($id,$values)
    {
        return $this->abstract->put('note',$id,$values);
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function deleteNote($id_parameter)
    {
        return $this->abstract->deleted('note',$id_parameter);
    }
}
