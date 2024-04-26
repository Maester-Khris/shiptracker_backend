<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/signup')}}" method="post">
        @csrf
        <button type="submit">Click me to test User registration </button>
    </form>
    
    <script src="/js/axios.min.js"></script>
    {{-- <script>
        document.addEventListener("DOMContentLoaded",function(){
            var bt = document.querySelector("#welcome");
            bt.addEventListener("click",function(){
                data = {};
                axios.post('/signup', data).then(function(response){
                    console.log(response.data);
                })
            });
            console.log("loading finished");
        });
    </script> --}}
</body>
</html>

    