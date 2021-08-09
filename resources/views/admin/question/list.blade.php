<x-app-layout>
    <x-slot name="header"> {{$quiz->title}} Quizine ait soru</x-slot>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="float:left">
                    <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Quiz Dön</a>
                </h5>

                <h5 class="card-title" style="float:right">
                    <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Soru Ekle</a>
                </h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Soru</th>
                            <th scope="col">Fotograf</th>
                            <th scope="col">1.Cevap</th>
                            <th scope="col">2.Cevap</th>
                            <th scope="col">3.Cevap</th>
                            <th scope="col">4.Cevap</th>
                            <th scope="col">Dogru Cevap</th>
                            <th scope="col" style="width:100px;">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($quiz->questions as $question)
                        <tr>
                            <th>{{$question->question}}</th>
                            <td>@if($question->image)
                                <a href="{{asset($question->image)}}" target="_blank" class="btn btn-sm btn-light">Görüntüle</a>
                                @endif
                            </td>                      
                            <td>{{$question->answer1}}</td>
                            <th>{{$question->answer2}}</th>
                            <td>{{$question->answer3}}</td>
                            <td>{{$question->answer4}}</td>
                            <td>{{substr($question->correct_answer,-1)}}.Cevap</td>
                            <td>
                                <a href="{{route('questions.edit',[$quiz->id,$question->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="{{route('questions.destroy',[$quiz->id,$question->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
                
            </div>
        </div>
</div>
</x-app-layout>
