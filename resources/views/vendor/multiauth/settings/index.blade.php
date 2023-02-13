@extends('multiauth::layouts.app')

@section('content')

    <div class="row justify-content-center align-items-center">
        <div class="col-md-10">
            <div class="card">

                    <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
                        @csrf
                        <h3 class="tile-title">Homepage</h3>
                        <hr>

                            <div class="form-group">
                                <label class="control-label" for="google_analytics">Heading Title</label>
                                <textarea
                                    class="form-control py-3 my-3"
                                    rows="4"
                                    placeholder="Enter Headings"
                                    id="google_analytics"
                                    name="heading"
                                >{!! Config::get('settings.heading') !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="facebook_pixels">Heading Text</label>
                                <textarea
                                    class="form-control py-3 my-3"
                                    rows="4"
                                    placeholder="Enter Heading Text"
                                    id="heading_text"
                                    name="heading_text"
                                >{{ Config::get('settings.heading_text') }}</textarea>
                            </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">About Title</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter About Title"
                                id="about_title"
                                name="about_title"
                            >{{ Config::get('settings.about_title') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">About subTitle</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter About subTitle"
                                id="about_subtitle"
                                name="about_subtitle"
                            >{{ Config::get('settings.about_subtitle') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">About 1 Icon</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter About 1 Icon"
                                id="about_1_icon"
                                name="about_1_icon"
                            >{{ Config::get('settings.about_1_icon') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">About 1 Title</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter About 1 Title"
                                id="about_1_title"
                                name="about_1_title"
                            >{{ Config::get('settings.about_1_title') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">About 1 Text</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="3"
                                placeholder="Enter About 1 Text"
                                id="about_1_text"
                                name="about_1_text"
                            >{{ Config::get('settings.about_1_text') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">About 2 Icon</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter About 2 Icon"
                                id="about_2_icon"
                                name="about_2_icon"
                            >{{ Config::get('settings.about_2_icon') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">About 2 Title</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter About 2 Title"
                                id="about_2_title"
                                name="about_2_title"
                            >{{ Config::get('settings.about_2_title') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">About 2 Text</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="3"
                                placeholder="Enter About 2 Text"
                                id="about_2_text"
                                name="about_2_text"
                            >{{ Config::get('settings.about_2_text') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">About 3 Icon</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter About 3 Icon"
                                id="about_3_icon"
                                name="about_3_icon"
                            >{{ Config::get('settings.about_3_icon') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">About 3 Title</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter About 3 Title"
                                id="about_3_title"
                                name="about_3_title"
                            >{{ Config::get('settings.about_3_title') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">About 3 Text</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="3"
                                placeholder="Enter About 3 Text"
                                id="about_3_text"
                                name="about_3_text"
                            >{{ Config::get('settings.about_3_text') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Why Text</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="3"
                                placeholder="Enter Why Text"
                                id="why_text"
                                name="why_text"
                            >{{ Config::get('settings.why_text') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Banner Heading</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter Banner Heading"
                                id="banner_heading"
                                name="banner_heading"
                            >{{ Config::get('settings.banner_heading') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Banner Text</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="3"
                                placeholder="Enter Banner Text"
                                id="banner_text"
                                name="banner_text"
                            >{{ Config::get('settings.banner_text') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Sell Heading</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter Sell Heading"
                                id="sell_heading"
                                name="sell_heading"
                            >{{ Config::get('settings.sell_heading') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Sell Text</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="3"
                                placeholder="Enter sell Text"
                                id="sell_text"
                                name="sell_text"
                            >{{ Config::get('settings.sell_text') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Work 1 Title</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter Work 1 Title"
                                id="work_1_title"
                                name="work_1_title"
                            >{{ Config::get('settings.work_1_title') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Work 1 Text</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="3"
                                placeholder="Enter work 1 Text"
                                id="work_1_text"
                                name="work_1_text"
                            >{{ Config::get('settings.work_1_text') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Work 2 Title</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter Work 2 Title"
                                id="work_2_title"
                                name="work_2_title"
                            >{{ Config::get('settings.work_2_title') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Work 2 Text</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="3"
                                placeholder="Enter work 2 Text"
                                id="work_2_text"
                                name="work_2_text"
                            >{{ Config::get('settings.work_2_text') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Work 3 Title</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="1"
                                placeholder="Enter Work 3 Title"
                                id="work_3_title"
                                name="work_3_title"
                            >{{ Config::get('settings.work_3_title') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="facebook_pixels">Work 3 Text</label>
                            <textarea
                                class="form-control py-3 my-3"
                                rows="3"
                                placeholder="Enter work 3 Text"
                                id="work_3_text"
                                name="work_3_text"
                            >{{ Config::get('settings.work_3_text') }}</textarea>
                        </div>





                        <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Settings</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
                    </div>

                </div>




    <script src="{{ asset('backend/js/core/jquery.min.js') }}" type="text/javascript"></script>




@endsection
