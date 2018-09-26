<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    private $pagination;
    private $items;

    public function __construct($resource)
    {
        $this->pagination = [
            'total' => $resource->total(),
            'per_page' => $resource->perPage(),
            'page' => $resource->currentPage(),
            'total_pages' => $resource->lastPage()
        ];

        $resource = $resource->getCollection();

        $this->items = $resource;

        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'data' => UserResource::collection($this->items),
            'pagination' => $this->pagination
        ];
    }

}
