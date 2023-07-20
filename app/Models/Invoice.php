<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Invoice extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'invoices';

    public function createFromJson($json) {
        $this->json_data = $json;
        $this->save();
    }
}
