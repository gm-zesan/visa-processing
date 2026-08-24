<div class="row g-4">
    <div class="col-md-8 col-12 order-last order-md-first">
        <div class="card table-card pb-5">
            <div class="card-body custom-form">
                <div class="row">

                    <input type="hidden" name="link_key" value="{{$settings->link_key}}">

                    @if((Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer')))
                        <div class="col-12">
                            <label for="" class="form-label custom-label custom-label">Hints</label>
                            <input type="text" class="form-control custom-input" name="hints" value="{{$settings->hints}}">
                            @if($errors->has('hints'))
                                <div class="error_msg">
                                    {{ $errors->first('hints') }}
                                </div>
                            @endif
                        </div>
                    @endif


                    {{-- @if() --}}


                    @if(isset($settings->title))
                        <div class="col-12">
                            <label for="" class="form-label custom-label custom-label">{{$settings->title_label ? $settings->title_label : 'Title'}}</label>
                            <input type="text" class="form-control custom-input" name="title" value="{{$settings->title}}">
                            @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                <div class="clipboard mb-3">
                                    <p>&#123;&#123; getSettingsData('{{$settings->id}}', 'title') &#125;&#125;</p>
                                    <div class="tooltips">
                                        <span class="tooltiptext">Copy</span>
                                        <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                    </div>
                                </div>
                                
                            @endif
                            @if($errors->has('title'))
                                <div class="error_msg">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>
                    @endif

                    @if(isset($settings->subtitle))
                        <div class="col-12">
                            <label for="" class="form-label custom-label custom-label">{{$settings->subtitle_label ? $settings->subtitle_label : 'Subtitle'}}</label>
                            <input type="text" class="form-control custom-input" name="subtitle" value="{{$settings->subtitle}}">
                            @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                <div class="clipboard mb-3">
                                    <p>&#123;&#123; getSettingsData('{{$settings->id}}', 'subtitle') &#125;&#125;</p>
                                    <div class="tooltips">
                                        <span class="tooltiptext">Copy</span>
                                        <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                    </div>
                                </div>
                            @endif
                            @if($errors->has('subtitle'))
                                <div class="error_msg">
                                    {{ $errors->first('subtitle') }}
                                </div>
                            @endif
                        </div>
                    @endif


                    @if(isset($settings->button_text))
                        <div class="col-md-6">
                            
                            <label for="" class="form-label custom-label custom-label">{{$settings->button_text_label ? $settings->button_text_label : 'Button Text'}}</label>
                            <input type="text" class="form-control custom-input" name="button_text" value="{{$settings->button_text}}">
                            @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                <div class="clipboard mb-3">
                                    <p>&#123;&#123; getSettingsData('{{$settings->id}}', 'button_text') &#125;&#125;</p>
                                    <div class="tooltips">
                                        <span class="tooltiptext">Copy</span>
                                        <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                    </div>
                                </div>
                            @endif
                            @if($errors->has('button_text'))
                                <div class="error_msg">
                                    {{ $errors->first('button_text') }}
                                </div>
                            @endif
                        </div>
                    @endif

                    @if(isset($settings->button_link))
                        <div class="col-md-6">
                            <label for="" class="form-label custom-label custom-label">{{$settings->button_link_label ? $settings->button_link_label : 'Button Link'}}</label>
                            <input type="text" class="form-control custom-input" name="button_link" value="{{$settings->button_link}}">
                            @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                <div class="clipboard mb-3">
                                    <p>&#123;&#123; getSettingsData('{{$settings->id}}', 'button_link') &#125;&#125;</p>
                                    <div class="tooltips">
                                        <span class="tooltiptext">Copy</span>
                                        <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                    </div>
                                </div>
                            @endif
                            @if($errors->has('button_link'))
                                <div class="error_msg">
                                    {{ $errors->first('button_link') }}
                                </div>
                            @endif
                        </div>
                    @endif


                    @if(isset($settings->description))
                        <div class="col-12">
                            <label for="" class="form-label custom-label custom-label">{{$settings->description_label ? $settings->description_label : 'Description'}}</label>
                            <textarea name="description" class="form-control custom-input" id="description" cols="30" rows="10">{{$settings->description}}</textarea>
                            @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                <div class="clipboard mt-3">
                                    <p>&#123;!! getSettingsData('{{$settings->id}}', 'description') !!&#125;</p>
                                    <div class="tooltips">
                                        <span class="tooltiptext">Copy</span>
                                        <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                    </div>
                                </div>
                            @endif
                            @if($errors->has('description'))
                                <div class="error_msg">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>
                    @endif


                </div>
            </div>

        </div>
    </div>


    <div class="col-md-4 col-12 order-first">
        <div class="row g-4">
            <div class="col-12">
                <div class="card table-card">
                    <div class="table-header">
                        <div class="table-title">Action</div>
                    </div>
                    <div class="custom-form card-body">
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn submit-button">Update
                                    <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(isset($settings->image))
                <div class="col-12">
                    <div class="card table-card">
                        <div class="table-header">
                            <div class="table-title">{{$settings->image_label ? $settings->image_label : 'Image'}}</div>
                        </div>
                        <div class="custom-form card-body">
                            <div class="image-select-file">
                                <label class="form-label custom-label" for="cover_image">
                                    <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                                    <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                    <div class="user-image">
                                        @if($settings->image)
                                            <img id="cover_imagePreview" src="{{asset($settings->image)}}" alt="" class="image-preview">
                                        @else
                                            <i id="cover_imagePreviewNo" class="ri-user-3-line no-image-preview"></i>
                                        @endif
                                        <span class="formate-error cover_imageerror"></span>
                                    </div>
                                    <span class="upload-btn">Upload {{$settings->image_label ? $settings->image_label : 'Image'}}</span>
                                </label>
                                @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                    <div class="clipboard mb-3">
                                        <p>&#123;&#123; asset(getSettingsData('{{$settings->id}}', 'image')) &#125;&#125;</p>
                                        <div class="tooltips">
                                            <span class="tooltiptext">Copy</span>
                                            <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="delete-btn mt-2 d-none remove-image" id="cover_imageDelete" onclick="removeImage('cover_image')">Remove image</div>

                            @if($errors->has('image'))
                                <div class="error_msg">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>