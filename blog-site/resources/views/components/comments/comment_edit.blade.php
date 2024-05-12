<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $comment->id }}"
    data-bs-toggle="tooltip" data-bs-placement="a" title="Edit Post">
    <i class="fa-solid fa-pen-to-square"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="editModal{{ $comment->id }}" tabindex="-1" aria-labelledby="#editModal{{ $comment->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="comment-form" action="{{ route('comment.update', $comment->id) }}" class="comment-form"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="messages"></div>

                    <div class="row">
                        <div class="column col-md-12">
                            <!-- Comment textarea -->
                            <div class="form-group">
                                <textarea id="InputComment" class="form-control" rows="4" name="comment">{{ $comment->comment }}</textarea>
                                @error('comment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="d-none" name="blog_id" value="{{ $post->id }}">
                            </div>

                            <div class="form-group">
                                <input type="text" class="d-none" name="parent_id" value="{{ $comment->id }}">
                            </div>
                        </div>

                    </div>

                    <button type="submit" id="submit" value="Submit" class="btn btn-default">
                        Submit
                    </button><!-- Submit Button -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
