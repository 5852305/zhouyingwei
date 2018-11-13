<form action="{{ route('post.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">标题:</label>
        <input type="text" name="title" class="form-control" required id="recipient-name">
    </div>
    <div class="form-group" id="app">
        <label for="message-text" class="col-form-label">内容:</label>
        <editor></editor>
    </div>
    <div class="form-group" id="app">
     <button type="submit" class="btn btn-primary btn-block">添加文章</button>
    </div>
</form>