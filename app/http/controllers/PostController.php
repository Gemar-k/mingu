<?php


class PostController extends Controller
{
    public function index(){
        print_r(PostModel::all());
    }
}