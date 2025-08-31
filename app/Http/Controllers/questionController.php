<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\QuestionCommentLike;
use App\Models\QuestionComment;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Topic;
use App\Models\User;


class questionController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('/topic', '301');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::all();
        
        return view('questions.questionCreate', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:80',
            'body' => 'required|max:900',
            'topic' => 'required'
        ]);

        $topic =Topic::where('title' , '=' ,$validatedData['topic'])->first()->id;

        $question = Question::create([
            
            'title' => $validatedData['title'],
            'content' => $validatedData['body'],
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => User::find(Auth::id())->id,
            'topic_id' => $topic,
        ]);

        return view('questions.questionStoreSuccess', compact('question'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::find($id);

        $bestComment = QuestionComment::where('question_id', '=', $id )
            ->where('approved', '=', 1)
            ->first();

        if($bestComment?->id != null)
        {
            $bestCommentlikes = QuestionCommentLike::find($bestComment->id)?->count();
        }
        else
        {
            $bestCommentlikes = 0;
        }



        $comments = QuestionComment::where('question_id', '=', $id)
            ->whereNot('approved', '=', 1)
            ->get();

        // TODO: bayad ravesh peyda knm bara  tedade like e har comment. 
            // vali tu variable e jdid nbshe o tu view byd anjamesh bdm.

            return view('questions.questionShow', compact(
            'question',
            'bestCommentlikes',
            'bestComment',
            'comments'
            ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topics = Topic::all();
        $question = Question::find($id);

        return view('questions.questionEdit', compact('question', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           
        $validatedData = $request->validate([
            'title' => 'required',
            'topic' => 'required',
            'body' => 'required'
        ]);
        
        $isOwner = Question::find($id)->user_id == auth()->id();
        $topicId = Topic::where('title', '=', $validatedData['topic'])->first()->id; 

        if(User::isAdmin() || $isOwner )
        {
            $question = Question::find($id);
            
            $question->update([
                'title' => $validatedData['title'],
                'topic_id' => $topicId,
                'content' => $validatedData['body']
            ]);
            
            return view('questions.questionUpdateSuccess', compact('question'));
        }else{
            return 'you are not allowed to edit this Question.';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $isOwner = Question::find($id)->user_id == auth()->id(); 

        if(User::isAdmin() || $isOwner )
        {
            Question::destroy($id);
            
            return redirect()->back();
        }else{
            return 'you are not allowed to remove this Question.';
        }
    }
}
