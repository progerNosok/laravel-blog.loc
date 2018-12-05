@if(session('message'))
    <script>alert("{{session('message')}}");</script>
@endif