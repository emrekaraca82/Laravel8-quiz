<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div class="container">
        <div class="card">
            <div class="card-body">
            <form method="POST" action="{{route('quizzes.store')}}">
                @csrf
               
                <div class="form-group">
                    <label>Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Quiz Açıklama</label>
                    <textarea name="description" class="form-control" rows=4></textarea>
                </div>

                <div class="form-group">
                    <input id="isFinished" type="checkbox">
                    <label>Bitiş Tarihi Olacak mı?</label> 
                </div>

                <div id="finishedInput"  style="display:none" class="form-group">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" class="form-control" required>
                </div>

                <div class="form-group">                  
                    <button type="submit" class="btn btn-success btn-sm btn-block">Quick Add </button>
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
