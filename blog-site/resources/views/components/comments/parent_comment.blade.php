@forelse ($comments as $comment)
    <!-- comment item -->
    <li class="comment rounded">
        <div class="thumb">
            @if ($comment->getUser->photo)
                <img src="{{ asset('uploads/profile_photos') }}/{{ $comment->getUser->photo }}" class="rounded-circle"
                    style="height: 50px; width: 50px;" alt="img" />
            @else
                <img src="{{ asset('dashboard-assets/images/default_profile.png') }}" class="rounded-circle"
                    style="height: 50px; width: 50px;" alt="img" />
            @endif
        </div>
        <div class="details">
            <h4 class="name"><a href="#">{{ $comment->getUser->name }}</a></h4>
            <span class="date">{{ $comment->created_at }}</span>
            <p>{{ $comment->comment }}</p>

            <button type="button" class="btn btn-default btn-sm" data-bs-toggle="modal"
                data-bs-target="#exampleModal{{ $comment->id }}">
                Reply
            </button>

            <!-- Comment reply component start
            ================================================== -->

            @include('components.comments.comments_reply', ['comment' => $comment])

            <!-- Comment reply component end
            ================================================== -->

            @if (Auth::check() && auth()->user()->id == $comment->user_id)
                <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                    @if (auth()->user()->id == $comment->user_id)
                        <li class="list-inline-item">
                            <!-- comment edit start
                            ================================================== -->

                                @include('components.comments.comment_edit',['comment' => $comment])

                                <!-- comment edit end
                            ================================================== -->
                        </li>
                    @endif
                    @if (auth()->user()->id == $comment->user_id || auth()->user()->role == 'admin')
                        <li class="list-inline-item">
                            <form action="{{ route('comment.destroy',$comment->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button data-bs-toggle="tooltip" type="submit" data-bs-placement="a" title="Delete Post"
                                    class="bg-transparent border-0">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </li>

    <!-- Child Comment Components Start
    ================================================== -->

    @include('components.comments.child_comment', ['comments' => $comment->getComment, 'padding' => '0px'])

    <!-- Child Comment Components End
    ================================================== -->

@empty
@endforelse
