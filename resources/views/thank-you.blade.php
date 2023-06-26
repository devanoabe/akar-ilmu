<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="{{ asset('css/ty.css') }}">
    </head>

    <body>
        <div class='box'>
            <h1 style="font-size: 60px;" class='heading'>Terimakasih telah<br> 
                    menyelesaikan<br> 
                    Ujian, {{ Auth::user()->name }}!</h1>
        </div>  
        <div>
        <button>
        <a href="/dashboard" >Kembali</a>
        </button>
        </div>
        
    </body>
</html>
   
