<?php

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostExport implements FromCollection
{
    public function collection()
    {
        return Post::all();
    }
}
