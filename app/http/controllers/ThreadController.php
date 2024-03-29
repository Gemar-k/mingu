<?php


class ThreadController extends Controller
{
    public function index(){
        $threads = ThreadModel::all();

        require 'resources/views/thread/threads.php';
    }

    public function get(){
        $thread = ThreadModel::get($_GET['id']);

        print_r($thread);
    }

    public function post(){
        $thread = new ThreadModel([
            ':ID' => null,
            ':Name' => $_POST['name'],
            ':Description' => $_POST['description'],
            ':Owner' => 1,
            ':Post' => $_POST['post'],
            ':Member' => 1]);

        echo 'new thread has been saved';
    }
}