<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $extraResponse = ["message" => "success"];
    public function __construct($resource)
    {
        parent::__construct($resource);
    }
    public function with(Request $request)
    {
        return self::$extraResponse;
    }
    public static function collection($resource)
    {
        return parent::collection($resource)->additional(self::$extraResponse);
    }
}
