<?php
namespace App\Iface;


interface ItemRepositoryInterface{
    public function findById($id);
    public function findAll();
}