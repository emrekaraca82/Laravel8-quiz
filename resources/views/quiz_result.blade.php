<x-app-layout>
    <x-slot name="header">{{$quiz->title}} Sonucu</x-slot>
    <div class="container">
    <div class="card" >
    <div class="card-body">

        <div class="alert alert-dark">
            <i class="fa fa-square"></i> İşaretlediğin Şık <br>
            <i class="fa fa-square text-success"></i> Doğru Cevap <br>
           
        </div>


        @foreach($quiz->questions as $question)
            
            <strong>#{{$loop->iteration}}</strong> {{$question->question}}

            {{$question->question}}
            @if($question->image)
                <img src="{{asset($question->image)}}" style="width: 50%;" class="img-responsive">
            @endif

            <div class="form-check mt-2">
                @if('answer1' == $question->correct_answer)
                <i class="fa fa-square text-success" style="margin-left:-20px;"></i>
                @elseif('answer1'== $question->my_answer->answer)  
                    <i class="fa fa-square" style="margin-left:-20px;"></i>  
                @endif    
                <label class="form-check-label" for="quiz{{$question->id}}1">
                    A) {{$question->answer1}}
                </label>
            </div>

            <div class="form-check mt-2">
            @if('answer2' == $question->correct_answer)
                <i class="fa fa-square text-success" style="margin-left:-20px;"></i>
                @elseif('answer2'== $question->my_answer->answer)  
                    <i class="fa fa-square" style="margin-left:-20px;"></i>  
                @endif    
                <label class="form-check-label" for="quiz{{$question->id}}2">
                    B) {{$question->answer2}}
                </label>
            </div>

            <div class="form-check mt-2">
            @if('answer3' == $question->correct_answer)
                <i class="fa fa-square text-success" style="margin-left:-20px;"></i>
                @elseif('answer3'== $question->my_answer->answer)  
                    <i class="fa fa-square" style="margin-left:-20px;"></i>  
                @endif    
                <label class="form-check-label" for="quiz{{$question->id}}3">
                    C) {{$question->answer3}}
                </label>
            </div>

            <div class="form-check mt-2">
            @if('answer4' == $question->correct_answer)
                <i class="fa fa-square text-success" style="margin-left:-20px;"></i>
                @elseif('answer4'== $question->my_answer->answer)  
                    <i class="fa fa-square" style="margin-left:-20px;"></i>  
                @endif    
                <label class="form-check-label" for="quiz{{$question->id}}4">
                    D) {{$question->answer4}}
                </label>
            </div>  
            @if(!$loop->last)      
                <hr>
            @endif
            
        @endforeach
     
   
  </div>
</div>
</div>
   
</x-app-layout>
