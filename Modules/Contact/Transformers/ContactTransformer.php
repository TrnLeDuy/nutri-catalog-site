<?php

namespace Modules\Contact\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactTransformer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $contactData = [
            'id' =>$this->resource->id,
            'code' => $this->resource->code,
            'name' => $this->resource->name,
            'subject' => $this->resource->subject,
            'message' => $this->resource->message,
            'reply' => $this->resource->reply,
            'phone' => $this->resource->phone,
            'email' => $this->resource->email,
            'status' => $this->resource->status,
            'created_at' => $this->resource->created_at->format('d-m-Y'),
            'urls' => [
                'delete_url' => route('api.contact.contact.destroy', $this->resource->id),
            ]
        ];
        return $contactData;
    }
}