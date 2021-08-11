<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>
    <div class="container">
    <div class="card" >
    <div class="card-body">
    <p class="card-text">
        <div class="row">
            <div class="col-md-4">
            <ul class="list-group">
                @if($quiz->finished_at)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Son Katılım Tarihi
                        <span title="$quiz->finished_at" style="color:drak;">{{$quiz->finished_at->diffForHumans()}} </span>
                    </li>
                @endif

                @if($quiz->my_result)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Doğru/Yanlış Saysı
                        <div class="float-right">
                            <span class="badge bg-success">{{$quiz->my_result->correct}} Doğru </span>
                            <span class="badge bg-danger">{{$quiz->my_result->wrong}} Yanlış </span>
                        </div>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Puan<span class="badge bg-info">{{$quiz->my_result->point}}</span>                  
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Soru Sayısı <span class="badge bg-secondary">{{$quiz->questions_count}} </span>
                    </li>
                @endif

                @if($quiz->details)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Katılımcı Sayısı <span class="badge bg-secondary">{{$quiz->details['join_count']}}</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ortalama Puan <span class="badge bg-secondary">{{$quiz->details['average']}}</span>
                    </li>
                @endif
            </ul>
            </div>
            
            <div class="col-md-8">
            {{$quiz->description}}

            @if($quiz->my_result)
            <div class="col-mt-2">
                <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-warning btn-block btn-sm">Quiz'i Görüntüle</a>
            </div> 
            @else
            <div class="col-mt-2">
                <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-block btn-sm">Quiz'e Katıl</a>
            </div> 
            @endif
            
            </div>
        </div>
    </p>
   
  </div>
</div>
    </div>
   
</x-app-layout>
