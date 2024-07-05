<?php

namespace App\Exports;

use App\Models\Posts;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

// class PostExport implements FromArray,WithHeadings
// {
//     /**
//     * @return array
//     */

//     public function headings(): array{
//         return[
//             'ID',
//             'Post Title',
//             'Post Desc',
//             'Post Image',
//             'User Name',
//             'Created_at',
//         ];
//     }
//     public function array():array
//     {
//         $arr=[];
//         $posts = Posts::all();
//         foreach($posts as $post){
//             $arr[]=[

//                 $post->id,
//                 $post->title,
//                 $post->desc,
//                 $post->image,
//                 $post->user->name,
//                 $post->created_at,

//             ];
//         }
//         return $arr;
//     }
// }
