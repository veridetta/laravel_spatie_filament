<?php
namespace App\Filament\Resources\TaskResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
    public static function getApiTransformer()
    {
        return TaskTransformer::class;
    }
}
