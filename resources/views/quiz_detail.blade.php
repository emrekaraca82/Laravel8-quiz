<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>
    <div class="container">
    <div class="card" >
    <div class="card-body">
    <p class="card-text">
        <div class="row">
            <div class="col-md-4">
            <ul class="list-group list-group-flush">
                @if($quiz->finished_at)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Son Katılım Tarihi
                    <span title="$quiz->finished_at" style="color:drak;">{{$quiz->finished_at->diffForHumans()}} </span>
                </li>
                @endif
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Soru Sayısı 
                    <span style="color:drak;">{{$quiz->questions_count}} </span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Katılımcı Sayısı 
                    <span style="color:drak;"> </span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Ortalama Puan
                    <span style="color:drak;"> </span>
                </li>

            </ul>
            </div>
            <div class="col-md-8">
            {{$quiz->description}}
            <a href="#" class="btn btn-primary btn-block btn-sm">Quiz'e Katıl</a>
            </div>
        </div>
    </p>
   
  </div>
</div>
    </div>
   
</x-app-layout>
