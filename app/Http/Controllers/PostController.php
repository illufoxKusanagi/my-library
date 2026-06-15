<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $blog_post = [
            [
                "title" => "Grand blue",
                "author" => "Gatau",
                "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, optio aliquam qui perspiciatis aliasdoloribus ab, accusantium id harum delectus iusto ea consequuntur magnam accusamus rerum. Praesentium dolor nesciunt consequatur assumenda libero illum reiciendis, sunt est eligendi commodi architecto temporibus ea non quos natus molestiae consectetur. Dolores sit ipsam reiciendis harum excepturi expedita eum corrupti ducimus pariatur, cum assumenda blanditiis consectetur debitis delectus doloribus nostrum laboriosam iure. Beatae consectetur vitae dignissimos soluta praesentium delectus animi nulla. Dolorum blanditiis iure dicta pariatur officia qui, vero, nulla sint molestias nihil temporibus hic."
            ]
        ];
        return view('blog', [
            "title" => "blog",
            "posts" => $blog_post,
        ]);
    }
}
