<?php

namespace App\Http\Abstracts;

use App\Http\Abstracts\DBAbstract;
use Illuminate\Support\Facades\DB;

class DBFunction extends DBAbstract{
    /**
     * @param $table
     * @param $first
     * @param $operator
     * @param $second
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectWhere($table, $first, $operator, $second)
    {
        try {
            $select = DB::table($table)
                ->select('*')
                ->where($first, $operator, $second)
                ->get();
            return response()->json($select);
        }
        catch(\Exception $e){
            return response()->json(['status'=>'error','code' => $e->getMessage()]);
        }
    }

    /**
     * @param $table
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectAll($table)
    {
        try {
            $select = DB::table($table)
                ->select('*')
                ->get();
            return response()->json($select,status: 200,options: JSON_PRETTY_PRINT);
        }
        catch(\Exception $e){
            return response()->json(['status'=>'error','code' => $e->getMessage()]);
        }
    }

    /**
     * @param $table
     * @param $array
     * @return \Illuminate\Http\JsonResponse
     */
    public function insertTable($table,$array)
    {
        try {
            $add = DB::table($table)->insert($array);
            if($add)
                return response()->json(['status'=>'success','code' => '1']);
            else
                return response()->json(['status'=>'error','code' => '0']);
        }
        catch(InsertError)
        {
            return response()->json(['status'=>'error','code' => '0']);
        }
    }

    /**
     * @param $table : string
     * @param $id : int
     * @param $values : array
     * @return \Illuminate\Http\JsonResponse
     */
    public function editNote($table, $id, $values)
    {
        try {
            $update = DB::table($table)
                ->where('id', '=',$id)
                ->update($values);
            if($update)
                return response()->json(['status'=>'success','code' => '1']);
            else
                return response()->json(['status'=>'error','code' => '0']);
        }
        catch(UpdateNot)
        {
            return response()->json(['status'=>'error','code' => '0']);
        }
    }

    public function put($table,$id,$values)
    {
        try {
            $put = DB::table($table)->updateOrInsert(['id' => $id],$values);
            if($put)
                return response()->json(['status'=>'success','code' => '1']);
            else
                return response()->json(['status'=>'error','code' => '0']);
        }
        catch(PutNot)
        {
            return response()->json(['status'=>'error','code' => '0']);
        }
    }

    public function deleted($table,$id)
    {
        try {
            $put = DB::table($table)
                ->where('id','=',$id)
                ->delete($id);
            if($put)
                return response()->json(['status'=>'success','code' => '1']);
            else
                return response()->json(['status'=>'error','code' => '0']);
        }
        catch(DeleteNot)
        {
            return response()->json(['status'=>'error','code' => '0']);
        }
    }
}
