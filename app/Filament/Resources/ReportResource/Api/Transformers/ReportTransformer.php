<?php
namespace App\Filament\Resources\ReportResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportTransformer extends JsonResource
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
        return ReportTransformer::class;
    }
}
