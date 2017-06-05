 <html>
 <script src="{{ asset('assets/js/jquery-2.1.1.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#submit").click(function(){
        $.ajax({
            type: 'GET',
            url: "{{url('test')}}",
            success:function(data){
             alert(data);
            }
        });
    return false;
    });
});
</script>
</head>

<body>
<input type="button" id="submit" value="submit" />
</body>
 </html>