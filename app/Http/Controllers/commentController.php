<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuestionComment;
use App\Models\BlogComment;
use App\Models\User;

class commentController extends Controller
{
    
    public function storeQuestionComment(Request $request)
    {

        if(Auth::id() == null)                          // agar login nkrde redirect kn be login
        {
            return redirect()->route('login');
        }

        $validatedData = $request->validate([
            'comment' => 'required',
            'questionID' => 'required'
        ]);

        QuestionComment::create([
            'user_id' => User::find(Auth::id())->id,
            'question_id' => $validatedData['questionID'],
            'content' => $validatedData['comment'],
            'created_at' => now(),
            'updated_at' => null
        ]);

        return redirect()->back();
    }



    
        public function storeBlogComment(Request $request)
        {
            $validatedData = $request->validate([
                'blogID' => 'required',
                'comment' => 'required|max:500',
                'parentID' => 'required'
            ]);

            if($validatedData['parentID'] == 'null')
            {
                $validatedData['parentID'] = null;
            }

            BlogComment::create([
                'user_id' => auth()->id(),
                'blog_id' => $validatedData['blogID'],
                'parent_id' => $validatedData['parentID'],
                'content' => $validatedData['comment'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        
            return redirect()->back();

        }


        
        public function destroyBlogComment(string $id) {

            $isOwner = BlogComment::find($id)->isOwner; 

            if(User::isAdmin() || $isOwner )
            {
                BlogComment::destroy($id);
                
                return redirect()->back();
            }else{
                return 'you are not allowed to remove this comment.';
            }
        }



        public function destroyQuestionComment(string $id) {
            $isOwner = QuestionComment::find($id)->isOwner; 

            if(User::isAdmin() || $isOwner )
            {
                QuestionComment::destroy($id);
                
                return redirect()->back();
            }else{
                return 'you are not allowed to remove this comment.';
            }
        }



        public function blogCommentLike(Request $request) {
            
            $validatedData = $request->validate([
                'commentID' => 'required',
            ]);
            
            $isLiked = User::find(auth()->id())->blogCommentLike()->where('blog_comment_id', '=', $validatedData['commentID'])->first();
            
           if ($isLiked)
           {
                $isLiked->delete();

           }else{

                User::find(auth()->id())->blogCommentLike()->create([
                    'user_id' => auth()->id(),
                    'blog_comment_id' => $validatedData['commentID']
                ]);
           }

            return redirect()->back();
        }



        public function questionCommentLike(Request $request) {
            
            $validatedData = $request->validate([
                'commentID' => 'required',
            ]);
            
            $isLiked = User::find(auth()->id())
                ->questionCommentLike()
                ->where('question_comment_id', '=', $validatedData['commentID'])
                ->first();
            
           if ($isLiked)
           {
                $isLiked->delete();

           }else{

                User::find(auth()->id())->questionCommentLike()->create([
                    'user_id' => auth()->id(),
                    'question_comment_id' => $validatedData['commentID']
                ]);
           }

            return redirect()->back();
        }


}

