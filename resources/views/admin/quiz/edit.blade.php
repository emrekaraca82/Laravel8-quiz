<x-app-layout>
    <x-slot name="header">Quizler Güncelle</x-slot>
   
    <div class="row">
        <div class="card">    
            <div class="card-body">
            <form method="POST" action="{{route('quizzes.update',$quiz->id)}}">
                @method('PUT') 
                @csrf             
                <div class="form-group" style="margin-top:10px;">
                    <label>Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{ $quiz->title }}">
                </div>

                <div class="form-group" style="margin-top:15px;">
                    <label>Quiz Açıklama</label>
                    <textarea name="description" class="form-control" rows=4>{{ $quiz->description }} </textarea>
                </div>

                <div class="form-group" style="margin-top:15px;">
                    <label>Quiz Durum</label>
                    <select name="status" class="form-control">
                         
                        <option @if($quiz->questions_count<4) disabled @endif @if($quiz->status==='publish') selected @endif value="publish">Aktif</option>   
                        <option @if($quiz->status==='passive') selected @endif value="passive">Pasif</option>   
                        <option @if($quiz->status==='draft') selected @endif value="draft">Taslak</option>   
                      
                    </select>  
                </div>

                <div class="form-group"  style="margin-top:15px;">
                    <input id="isFinished" @if( $quiz->finished_at) checked @endif type="checkbox" >
                    <label>Bitiş Tarihi Olacak mı?</label> 
                </div>

                <div id="finishedInput" @if(!$quiz->finished_at) style="display:none"  @endif class="form-group">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" @if($quiz->finished_at)  value="{{ date('Y-m-d\TH:i',strtotime($quiz->finished_at)) }}" @endif class="form-control">
                </div>

                <div class="form-group" style="margin-top:15px;">                  
                    <button type="submit" class="btn btn-success btn-sm btn-block">Quick Updated </button>
                </div>

            </form>
           
            </div>
        </div>
</div>
<x-slot name="js">Quizler</x-slot>
<script>
    $('#isFinished').change(function(){
        if($('#isFinished').is(':checked')){
            $('#finishedInput').show();
        }else{
            $('#finishedInput').hide();
        }      
    })
    </script>

</x-app-layout>
