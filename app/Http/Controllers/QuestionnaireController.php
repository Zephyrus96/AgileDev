<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Questionnaire;
use App\Question;
use App\Team;
use App\User;
use App\Answer;
use App\Message;
use Illuminate\Support\Facades\DB;

use App\Notifications\Notifications;
use App\Charts\AnswerChart;

class QuestionnaireController extends UserController
{
    public function create(){
        $teams = Team::all();
        return view("questionnaires.create")->with('teams',$teams);
    }

    //Create the questionnaire and send notifications to the targets.
    public function store(Request $request){
        $questionnaire = new Questionnaire;
        $questionnaire->title = $request->title;
        $questionnaire->save();
        
        $questions = $request->questions;
        foreach($questions as $question){
            $quest = new Question;
            $quest->question = $question;
            $quest->questionnaire_id = $questionnaire->id;
            $quest->save();
        }

        //If the target is everyone, then it is a team questionnaire.
        if($request->target == "Everyone"){
            $teams = $request->get('teams');

            foreach($teams as $team){
                $selected_team = Team::where('name',$team)->first();
                $selected_team->questionnaire()->questionnaire_id = $questionnaire->id;

                //Send a notification to every team member.
                $team_id = $selected_team->id;
                $users = User::where('team_id',$team_id)->get();

                $message = new Message;
                $message->body = "You have a new team questionnaire, please give your feedback.";
                $message->questionnaire_id = $questionnaire->id;
                $message->save();

                foreach($users as $user){
                    $user->questionnaire()->attach($questionnaire->id);
                    $user->questionnaire()->updateExistingPivot($questionnaire->id,['target' => 'Everyone']);
                    $user->message()->attach($message->id);
                    $user->notify(new Notifications($message,$user));
                    $user->save();
                }
            }
        }

        //It is a target questionnaire.
        else{

            //Send a notification to the specified targets.
            $users = User::where('position',$request->target)->get();

            $message = new Message;
            $message->body = "You have a new ".$request->target." questionnaire, please give your feedback.";
            $message->questionnaire_id = $questionnaire->id;
            $message->save();
            
            foreach($users as $user){
                $user->questionnaire()->attach($questionnaire->id);
                $user->questionnaire()->updateExistingPivot($questionnaire->id,['target' => $request->target]);
                $user->message()->attach($message->id);
                $user->notify(new Notifications($message,$user));
                $user->save();
            }
        }
        return back()->with('success','Questionnaire created successfully!');
    }


    //Display all the questionnaires for a specific user.
    public function show($username){
        $user = User::where('username',$username)->first(); 
        $questionnaires = DB::table('questionnaires')->get();
        $myq = DB::select('select * from user_questionnaire where user_id = ?', [$user->id]);
        if($myq){
            return view("questionnaires.index")->with('user',$user)->with('questionnaires',$questionnaires);
        }
        return view("questionnaires.none");
    }

    //Show a specific questionnaire.
    public function showQuestionnaire(Request $request){
        $questionnaire = Questionnaire::where('id',$request->id)->first();
        if($questionnaire){
            $questions = Question::where('questionnaire_id',$request->id)->get();
            return view("questionnaires.answer")->with('questionnaire',$questionnaire)->with('questions',$questions);
        }
        else{
            abort(404);
        }
    }

    public function submitQuestionnaire(Request $request){
        $questionnaire = Questionnaire::where('title',$request->title)->first();
        
        foreach(array_combine($request->questions,$request->answers) as $question=>$answer){
            $ans = new Answer;
            $quest = Question::where('question',$question)->first();
            $ans->answer = $answer;
            $ans->question_id = $quest->id;
            echo "<script>console.log(" . Auth::user(). ")</script>";
            $ans->user_id = Auth::id();
            $ans->questionnaire_id = $questionnaire->id;
            $ans->save();
        }
        DB::delete('DELETE FROM user_questionnaire WHERE user_id = ? AND questionnaire_id = ?',[Auth::id(), $questionnaire->id]);
        return Redirect::route('viewQuestionnaires',['username'=>Auth::user()->username])->with('success','Questionnaire submitted successfully!');
    }

    // Coach exclusive
    public function showAllQuestionnaires(){
        $questionnaires = Questionnaire::all();
        if($questionnaires){
            return view('questionnaires.coach.index')->with('questionnaires',$questionnaires);
        }
        return view('questionnaires.coach.none');
    }

    public function showQuestionnaireStats($id){
        // Variables
        $chart = new AnswerChart;
        $labels = [];
        $answersAvg = [];
        $total = 0;

        $questionnaire = Questionnaire::where('id',$id)->first();

        $questions = Question::where('questionnaire_id',$id)->get();

        foreach ($questions as $question) {
            array_push($labels, $question->question);
            $answers = Answer::where('question_id', $question->id)->get();
            if(count($answers) > 0){
                foreach ($answers as $answer) {
                    $total += $answer->answer;
                }
               
                array_push($answersAvg, $total/count($answers));
                $total = 0;
            }else{
          
                array_push($answersAvg, 0);
            }
        }
        
        $chart->labels($labels);
        $chart->dataset('Average Answer', 'bar', $answersAvg)->backgroundColor("#D75858");
        $chart->title($questionnaire->title,32,'#000',true,"'Poppins', sans-serif");
        $chart->barWidth(0.2);
        
        return view('questionnaires.coach.chart', ['chart' => $chart]);
    }

}
