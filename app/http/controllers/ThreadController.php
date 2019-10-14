<?php


class ThreadController extends Controller
{
    public function index(){
        $threads = ThreadModel::all();

        require 'resources/views/thread/threads.php';
    }

    public function get(){
        $thread = ThreadModel::where('ID', '=', $_GET['id']);
        print_r($thread);
    }

    public function post(){
        $thread = new ThreadModel($_POST['name'], $_POST['description'], $_POST['user_id']);
    }
}