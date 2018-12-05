@extends('layouts.app')

@section('content')
    @include('Smartmd::head')
    <div class="container" >
       @includeIf('posts.form')
    </div>
    <script>

        var smartmd = new Smartmd({
            element: document.getElementById("editor"),
            minHeight: "80vh",
            renderingConfig: {
                singleLineBreaks: false,
                codeSyntaxHighlighting: true,
            },
            initialValue:document.getElementById("editor").value.replace(/^\s+|\s+$/g, ''),
            autosave: {
                enabled: true,
                uniqueId: "write",
                delay: 1000,
            },
            autoCloseTags: true,
            matchTags: {bothTags: true},
            image:{
                uploadPath:'./upload',
                type:['jpeg','png','bmp','gif','jpg'],
                maxSize:4096,
            }
        });

        if (document.body.clientWidth > 1200) {
            smartmd.toggleSideBySide();
            // smartmd.alert("success","preview init success");
        }

        // console.log(smartmd.realValue());
        // var cm = smartmd.codemirror;
        // cm.display.lineDiv.ondrop = function(ev){
        //     if(ev.target.className.indexOf("CodeMirror-line") > -1){
        //         your drop down function
        //     }
        //     return false;
        // }
    </script>
@endsection