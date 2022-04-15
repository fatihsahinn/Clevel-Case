<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        /*
         *
        foreach($this->resource as $resource)
        {
            return [
                'id' => $resource->id,
                'name' => $resource->name,
                'content' => $resource->content,
                'created_at' => $resource->created_at,
                'updated_at' => $resource->updated_at,
                'tags' => $resource->tags,
            ];
        }
         */
    }
}
