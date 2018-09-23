<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"            => $this->id,
            "category_id"   => $this->category_id,
            "code"          => $this->code,
            "title"         => $this->title,
            "slug"          => $this->slug,
            "description"   => $this->description,
            "images"        => $this->images,
            "thumbs"        => $this->thumbs,
            "media_path"    => $this->media_path,
            "url"           => $this->url,
            "views"         => $this->views,
            "likes"         => $this->likes,
            "status"        => $this->status,
            "created_at"    => (string)$this->created_at,
            "updated_at"    => (string)$this->updated_at,
            "deleted_at"    =>  $this->when(isset($this->deleted_at), (string)$this->deleted_at),
        ];
    }
}
