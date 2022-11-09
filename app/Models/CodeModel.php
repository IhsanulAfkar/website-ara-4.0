<?php

namespace App\Models;

use CodeIgniter\Model;

class CodeModel extends Model
{

    protected $table            = 'code';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
}
