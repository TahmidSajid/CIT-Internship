<!-- section header -->
<div class="section-header">
    <h3 class="section-title">Comments ({{ $comment_count }})</h3>
    <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
</div>
<!-- post comments -->
<div class="comments bordered padding-30 rounded">

    <ul class="comments">
        @if ($comment_count != 0)
            @include('components.comments.parent_comment', ['comments' => $comments])
        @else
        <li class="text-center">
            <h4>
                No one commented yet
            </h4>
        </li>
        @endif
    </ul>
</div>

<div class="spacer" data-height="50"></div>

<!-- section header -->
<div class="section-header">
    <h3 class="section-title">Leave Comment</h3>
    <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
</div>
<!-- comment form -->
<div class="comment-form rounded bordered padding-30">

    <form id="comment-form" class="comment-form" method="post" action="{{ route('comment.store') }}">
        @csrf
        <div class="messages"></div>

        <div class="row">

            <div class="column col-md-12">
                <!-- Comment textarea -->
                <div class="form-group">
                    <textarea id="InputComment" class="form-control" rows="4" placeholder="Your comment here..." required="required"
                        name="comment"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="d-none" name="blog_id" value="{{ $post->id }}">
                </div>
            </div>

        </div>

        <button type="submit" id="submit" value="Submit"
            class="btn btn-default">Submit</button><!-- Submit Button -->

    </form>
</div>
