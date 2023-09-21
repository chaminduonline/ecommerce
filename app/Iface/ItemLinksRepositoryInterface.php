<?php
namespace App\Iface;

interface ItemLinksRepositoryInterface{
   public function findImagesByItemId($id);
}