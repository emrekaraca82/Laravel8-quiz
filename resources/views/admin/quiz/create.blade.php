<x-app-layout>
    <x-slot name="header">Quizler Oluştur</x-slot>
   
    <div class="row">
        <div class="card">
            <div class="card-body">
            <form method="POST" action="{{route('quizzes.store')}}">
                @csrf             
                <div class="form-group" style="margin-top:10px;">
                    <label>Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                </div>

                <div class="form-group" style="margin-top:15px;">
                    <label>Quiz Açıklama</label>
                    <textarea name="description" class="form-control" rows=4>{{old('description')}} </textarea>
                </div>

                <div class="form-group"  style="margin-top:15px;">
                    <input id="isFinished" @if(old('finished_at')) checked @endif type="checkbox" >
                    <label>Bitiş Tarihi Olacak mı?</label> 
                </div>

                <div id="finishedInput" @if(!old('finished_at')) style="display:none"  @endif class="form-group">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at"  value="{{old('finished_at')}}" class="form-control">
                </div>

                <div class="form-group" style="margin-top:15px;">                  
                    <button type="submit" class="btn btn-success btn-sm btn-block">Quick Add </button>
                </div>

            </form>
           
            </div>
        </div>
</div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function(){
                if($('#isFinished').is(':checked')){
                    $('#finishedInput').show();
                }else{
                    $('#finishedInput').hide();
                }      
            })
            </script>
    </x-slot>
</x-app-layout>
