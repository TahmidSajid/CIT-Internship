<!-- section header -->
<div class="section-header">
    <h3 class="section-title">Comments (3)</h3>
    <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
</div>
<!-- post comments -->
<div class="comments bordered padding-30 rounded">

    <ul class="comments">

        @forelse ($comments as $comment)
            <!-- comment item -->
            <li class="comment rounded">
                <div class="thumb">
                    <img src="{{ asset('uploads/profile_photos') }}/{{ $comment->getUser->photo }}"
                        class="rounded-circle" style="height: 50px; width: 50px;" alt="John Doe" />
                </div>
                <div class="details">
                    <h4 class="name"><a href="#">{{ $comment->getUser->name }}</a></h4>
                    <span class="date">{{ $comment->created_at }}</span>
                    <p>{{ $comment->comment }}</p>

                    <button type="button" class="btn btn-default btn-sm" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Reply
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="comment-form" class="comment-form" method="post"
                                        action="{{ route('comment.store') }}">
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
                                                    <input type="text" class="d-none" name="blog_id"
                                                        value="{{ $post->id }}">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="d-none" name="parent_id"
                                                        value="{{ $comment->id }}">
                                                </div>
                                            </div>

                                        </div>

                                        <button type="submit" id="submit" value="Submit"
                                            class="btn btn-default">Submit</button><!-- Submit Button -->

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </li>

            @foreach ( $comment->getComment as $reply)
            <!-- comment item -->
            <li class="comment child rounded">
                <div class="thumb">
                    <img src="{{ asset('uploads/profile_photos') }}/{{ $reply->getUser->photo }}" class="rounded-circle" style="height: 50px; width: 50px;" alt="John Doe" />
                </div>
                <div class="details">
                    <h4 class="name"><a href="#">{{ $reply->getUser->name }}</a></h4>
                    <span class="date">{{ $reply->created_at }}</span>
                    <p>{{ $reply->comment }}</p>
                    <button type="button" class="btn btn-default btn-sm" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Reply
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="comment-form" class="comment-form" method="post"
                                        action="{{ route('comment.store') }}">
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
                                                    <input type="text" class="d-none" name="blog_id"
                                                        value="{{ $post->id }}">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="d-none" name="parent_id"
                                                        value="{{ $reply->id }}">
                                                </div>
                                            </div>

                                        </div>

                                        <button type="submit" id="submit" value="Submit"
                                            class="btn btn-default">Submit</button><!-- Submit Button -->

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach

        @empty
        @endforelse
        <!-- comment item -->
        {{-- <li class="comment child rounded">
            <div class="thumb">
                <img src="{{ asset('frontend-assets') }}/images/other/comment-2.png" alt="John Doe" />
            </div>
            <div class="details">
                <h4 class="name"><a href="#">Helen Doe</a></h4>
                <span class="date">Jan 08, 2021 14:41 pm</span>
                <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                    adipiscing sem neque sed ipsum.</p>
                <a href="#" class="btn btn-default btn-sm">Reply</a>
            </div>
        </li>
        <!-- comment item -->
        <li class="comment rounded">
            <div class="thumb">
                <img src="{{ asset('frontend-assets') }}/images/other/comment-3.png" alt="John Doe" />
            </div>
            <div class="details">
                <h4 class="name"><a href="#">Anna Doe</a></h4>
                <span class="date">Jan 08, 2021 14:41 pm</span>
                <p>Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in
                    faucibus orci luctus et ultrices posuere cubilia.</p>
                <a href="#" class="btn btn-default btn-sm">Reply</a>
            </div>
        </li> --}}
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