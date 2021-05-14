<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    public function model(array $row)
    {
        return new User([
            'name' => $row[1],
            'username' => $row[2],
            'password' => '$2y$10$VGqnnkkRbmuToD85uhnsKOS9dM70eU.mxI1W1yUVoGEdtkFannZqG',
            'role' => $row[3],
            'status' => 1,
        ]);
    }
}
