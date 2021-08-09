<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div class="container">
        <div class="card">
            <div class="card-body">
           
                <h5 class="card-title" style="float:right">
                    <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Quiz Ekle</a>
                </h5>
                
                <form post="GET" action="">
                    <div class="row">

                        <div class="col-lg-3">
                            <input type="text" name="title" value="{{request()->get('title')}}" placeholder="Quiz Adı" class="form-control">
                        </div>

                        <div class="col-lg-3">
                            <select class="form-control" onchange="this.form.submit()" name="status">
                                <option value="">Durum seçiniz</option>
                                <option @if(request()->get('status')=='publish') selected @endif value="publish">Aktif</option>   
                                <option @if(request()->get('status')=='passive') selected @endif value="passive">Pasif</option>   
                                <option @if(request()->get('status')=='draft') selected @endif value="draft">Taslak</option>   
                            </select> 
                        </div>
                        @if(request()->get('title') || request()->get('status'))
                        <div class="col-lg-2">
                            <a href="{{route('quizzes.index')}}" class="btn btn-secondary">Sıfırla</a>
                        </div>
                        @endif
                    
                    </div>
                </form>
                <table class="table table-bordered" style="margin-top:10px;">
                    <thead>
                        <tr>
                            <th scope="col">Quiz</th>
                            <th scope="col">Soru Sayısı</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Bitiş Tarih</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quizzes as $quiz)
                        <tr>
                            <th>{{$quiz->title}}</th>
                            <th>{{$quiz->questions_count}}</th>
                            <td>
                                @switch($quiz->status)
                                    @case('publish')
                                    <span style="background-color:#33a771;color:white;">Aktif</span>
                                    @break
                                    @case('passive')
                                    <span style="background-color:#dc3545;color:white;">Pasif</span>
                                    @break
                                    @case('draft')
                                    <span style="background-color:#e6e60f;color:black;">taslak</span>
                                    @break
                                @endswitch
                            </td>
                            <td>{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-'}}</td>
                            <td>
                            <a href="{{route('questions.index',$quiz->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-question"></i></a>
                                <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="{{route('quizzes.destroy',$quiz->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$quizzes->links()}}
            </div>
        </div>
</div>
</x-app-layout>
