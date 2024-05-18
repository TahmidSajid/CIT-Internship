<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                Social Edit
            </h5>
            <button type="button" class="btn-close"
                data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Social Links</h4>
                    <div class="p-2">
                        <form class="form" action="{{ route('update_social',$social->id) }}">
                            @csrf
                            <div class="mb-2 row">
                                <label class="col-md-4 col-form-label">Social Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="social_name" value="{{ $social->social_name }}">
                                    @error('social_name')
                                        <span class="text-danger">Social name required</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-md-4 col-form-label">Social Link</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="url" name="social_link" value="{{ $social->social_link }}">
                                    @error('social_link')
                                        <span class="text-danger">Social link required</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-md-4 col-form-label">Social Icon</label>
                                <div class="col-md-4">
                                    <input class="form-control" id="icon-input" type="text" name="social_icon" value="{{ $social->social_icon }}">
                                    @error('social_icon')
                                        <span class="text-danger">Social icon required</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <p class="text-center">
                                        <i class="{{ $social->social_icon }}" style="font-size: 35px" id="icon-show"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col-lg-6">
                                    <button class="btn btn-sm btn-primary">Update Links</button>
                                </div>
                            </div>
                        </form>
                        <div class="all-icons mt-4" style="overflow-y: scroll; height:300px">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
