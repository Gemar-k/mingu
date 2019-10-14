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
            ':id' => null,
            ':name' => 'testtest',
            ':description' => 'de beschrijving',
            ':owner' => 1,
            ':post' => 1,
            ':member' => 1]);

        echo 'new thread has been saved';
    }
}