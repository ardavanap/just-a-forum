<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\QuestionComment;
use App\Models\Question;
use App\Models\User;

class adminController extends Controller
{

    public function index(){
        return view('admin.dashboard');
    }

    public function userPage(){
        
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        
        return view('admin.userManagement', compact('users'));
    }

    public function blogsPage(){

        $blogs = Blog::orderBy('updated_at', 'desc')->paginate(15);

        return view('admin.blogManagement', compact('blogs'));
    }

    public function blogCommentsPage(){

        $comments = BlogComment::orderBy('created_at', 'desc')->paginate(15);


        return view('admin.blogCommentManagement', compact('comments'));
    }

    public function questionsPage(){
        
        $questions = Question::orderBy('updated_at', 'desc')->paginate(15);
        
        return view('admin.questionManagement', compact('questions'));
    }

    public function questionCommentPage(){

        $comments = QuestionComment::orderBy('updated_at', 'desc')->paginate(15);

        return view('admin.questionCommentManagement', compact('comments'));
    }

    public function suspendedPage(){
        return view('admin.suspendedContent');
    }

    public function tagsPage(){
        return view('admin.tagManagement');
    }

    public function reportsPage(){
        return view('admin.reportManagement');
    }

}
