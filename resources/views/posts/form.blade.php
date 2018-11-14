@if(Route::is('post.create'))
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        @else
    <form action="{{ route('post.update',$post->id) }}" method="post">
        <input name="_method" type="hidden" value="PUT">
      @csrf
    @endif
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">标题:</label>
        <input type="text" name="title" class="form-control" value="{{ old('title',optional($post)->title ?? '' ) }}" required id="recipient-name">
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">内容:</label>
        <div id="editormd_id">
            <textarea name="content" style="display:none;">{{ old('title',optional($post)->content ?? '' ) }}</textarea>
        </div>
    </div>
    <div class="form-group" >
     <button type="submit" class="btn btn-primary btn-block">添加文章</button>
    </div>
</form>


