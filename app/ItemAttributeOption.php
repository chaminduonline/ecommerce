<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAttributeOption extends Model
{
    public function attribute()
    {
        return $this->belongsTo(ItemAttribute::class);
    }
}
