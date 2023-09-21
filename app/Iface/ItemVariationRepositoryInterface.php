<?php
namespace App\Iface;

interface ItemVariationRepositoryInterface{
    public function getItemVariationByItemId($id);
}