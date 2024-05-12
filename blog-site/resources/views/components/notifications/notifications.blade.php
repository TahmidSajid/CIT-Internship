<div class="modal fade" id="notificationModalLabel" tabindex="-1" aria-labelledby="notificationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Notifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (Auth::check())
                    @forelse (auth()->user()->notifications()->get() as $notification)
                        @if ($notification->data['type'] == 'comment')
                            <a href="{{ route('notifi_view', $notification->id) }}">
                                <div class="card border-0 mb-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                    <div class="row g-0 justify-content-between align-items-center">
                                        <div class="col-md-2 text-center">
                                            <i style="font-size: 50px" class="fa-solid fa-comment"></i>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Comment</h5>
                                                <p class="card-text">
                                                    {{ $notification->data['title'] }}
                                                </p>
                                                <p class="card-text"><small
                                                        class="text-muted">{{ $notification->created_at }}</small>
                                                </p>
                                            </div>
                                        </div>
                                        @if (!$notification->read_at)
                                            <div class="col-md-2 text-center">
                                                <i style="font-size: 20px" class="fa-solid fa-circle"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endif
                        @if ($notification->data['type'] == 'post')
                            <a href="{{ route('notifi_view', $notification->id) }}">
                                <div class="card border-0 mb-3" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                    <div class="row g-0 justify-content-between align-items-center">
                                        <div class="col-md-2 text-center">
                                            <i style="font-size: 50px" class="fa-solid fa-square"></i>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Post</h5>
                                                <p class="card-text">
                                                    {{ $notification->data['blog_title'] }}
                                                    {{ $notification->data['title'] }}
                                                </p>
                                                <p class="card-text">
                                                    <small class="text-muted">
                                                        {{ $notification->created_at }}
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                        @if (!$notification->read_at)
                                            <div class="col-md-2 text-center">
                                                <i style="font-size: 20px" class="fa-solid fa-circle"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endif
                    @empty
                    @endforelse
                @else
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
