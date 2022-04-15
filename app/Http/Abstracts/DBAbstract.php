<?php

namespace App\Http\Abstracts;

use App\Models\NoteModel;
use Illuminate\Support\Facades\DB;

abstract class DBAbstract
{
    abstract public function selectWhere($table, $first, $operator, $second);
    abstract public function selectAll($table);
    abstract public function insertTable($table,$array);
    abstract public function editNote($table,$id,$values);
    abstract public function put($table,$id,$values);
    abstract public function deleted($table,$id);
}
