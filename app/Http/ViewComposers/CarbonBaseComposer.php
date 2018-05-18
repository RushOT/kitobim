<?php

namespace App\Http\ViewComposers;

use App\Feedback;
use Illuminate\View\View;

class CarbonBaseComposer{

    public function __construct(){
    }

    public function compose(View $view){

        $feedbacks = Feedback::where('is_seen', 0)->count()
        ;
        $view->with(['feedbacks' => $feedbacks]);
    }

}