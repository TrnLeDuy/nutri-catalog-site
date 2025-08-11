@php
    $address = setting('core::address') ? setting('core::address') : 'San Francisco City Hall, San Francisco, CA';
    $email = setting('core::email') ? setting('core::email') : 'contact123@gmail.com';
    $phone = setting('core::phone') ? setting('core::phone') : '(654) 321-7654';
@endphp
@extends('layouts.master')

@section('title')
{{ $page->title }} | @parent
@stop
{{-- @section('meta')
    <meta name="title" content="{{ $page->meta_title }}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop --}}

@section('content')
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        @if (!empty($dynamicfields['contact_background']))
            <div class="wt-bnr-inr overlay-wraper bg-center"
                style="background-image:url({{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['contact_background'])->path }});">
            @else
                <div class="wt-bnr-inr overlay-wraper bg-center">
        @endif
        <div class="overlay-main site-bg-secondry opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h2 class="site-text-primary">{{ $page->title }}</h2>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2">
                        <li><a href="{{ route('homepage') }}">{{ __('core.home') }}</a></li>
                        {{-- <li>{{ $page->title }}</li> --}}
                        <li>{{ $page->title }}</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->

    <!-- SECTION CONTENTG START -->

    <!-- CONTACT FORM -->
    @if (!empty($dynamicfields['contact_section_background']))
        <div class="section-full  p-t80 p-b50 bg-cover"
            style="background-image:url({{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['contact_section_background'])->path }});">
        @else
            <div class="section-full  p-t80 p-b50 bg-cover"
                style="background-image:url({{ Theme::url('images/default/background/bg-7.jpg') }})">
    @endif
    <div class="section-content">
        <div class="container">
            <div class="contact-one">
                <!-- CONTACT FORM-->
                <div class="row  d-flex justify-content-center flex-wrap">

                    <div class="col-lg-6 col-md-6 m-b30">
                        <form method="POST" action="{{ route('fe.contact.contact.store') }}">
                            <!-- TITLE START -->
                            @csrf
                            <div class="section-head left wt-small-separator-outer">
                                <div class="wt-small-separator site-text-primary">
                                    <div class="sep-leaf-left"></div>
                                    <div>{{ __('contact.contact_form') }}</div>
                                    <div class="sep-leaf-right"></div>
                                </div>
                                <h2>{{ __('contact.get_in_touch') }}</h2>
                            </div>
                            <!-- TITLE END -->

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input name="name" id="name" type="text" required
                                            class="form-control full-radius" placeholder="{{ __('contact.form.name') }}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input name="email" id="email" type="text" class="form-control full-radius"
                                            required placeholder="{{ __('contact.form.email') }}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input name="phone" id="phone" type="text" class="form-control full-radius"
                                            required placeholder="{{ __('contact.form.phone') }}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input name="subject" id="subject" type="text" class="form-control full-radius"
                                            required placeholder="{{ __('contact.form.subject') }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" class="form-control full-radius" rows="4" placeholder="{{ __('contact.form.message') }}"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="site-button site-btn-effect full-radius">{{ __('contact.form.submit') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-lg-6 col-md-6 m-b30">
                        <div class="contact-info">
                            <div class="contact-info-inner">

                                <!-- TITLE START-->
                                <div class="section-head left wt-small-separator-outer">
                                    <div class="wt-small-separator site-text-primary">
                                        <div class="sep-leaf-left"></div>
                                        <div>{{ __('contact.contact_info') }}</div>
                                        <div class="sep-leaf-right"></div>
                                    </div>
                                    <h2>{{ __('contact.our_full_info') }}</h2>
                                </div>
                                <!-- TITLE END-->

                                <div class="contact-info-section full-radius"
                                    style="background-image:url({{ Theme::url('images/default/background/bg-map2.png') }});">

                                    <div class="wt-icon-box-wraper left m-b30">

                                        <div class="icon-content">
                                            <h3 class="m-t0 site-text-primary">{{ __('contact.phone_number') }}</h3>
                                            <p>{{ $phone }}</p>
                                        </div>
                                    </div>

                                    <div class="wt-icon-box-wraper left m-b30">

                                        <div class="icon-content">
                                            <h3 class="m-t0 site-text-primary">{{ __('contact.email_address') }}</h3>
                                            <p>{{ $email }}</p>
                                        </div>
                                    </div>

                                    <div class="wt-icon-box-wraper left m-b30">

                                        <div class="icon-content">
                                            <h3 class="m-t0 site-text-primary">{{ __('contact.address_info') }}</h3>
                                            <p> {{ $address }} </p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@stop

@section('scripts')
<script>
    $(document).ready(function() {
        // Đảm bảo selector đúng với form trên trang này
        $('form[action="{{ route("fe.contact.contact.store") }}"]').on('submit', function(e) {
            e.preventDefault();
            console.log('Form submission intercepted');
            
            const form = $(this);
            const submitBtn = form.find('[type="submit"]');
            const formData = form.serialize();
            
            // Disable submit button to prevent multiple submissions
            submitBtn.prop('disabled', true);
            
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 1) {
                        // Show success message
                        toastr.success(response.msg);
                        // Reset form
                        form.trigger('reset');
                    } else {
                        // Show error message
                        toastr.error(response.msg);
                    }
                },
                error: function(xhr) {
                    // Handle validation errors
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        let errorMsg = 'Vui lòng kiểm tra lại thông tin!';
                        
                        // Display first validation error
                        if (errors) {
                            for (const field in errors) {
                                errorMsg = errors[field][0];
                                break;
                            }
                        }
                        
                        toastr.error(errorMsg);
                    } else {
                        toastr.error('Đã xảy ra lỗi. Vui lòng thử lại sau!');
                    }
                },
                complete: function() {
                    // Re-enable submit button
                    submitBtn.prop('disabled', false);
                }
            });
        });
    });
</script>
@stop
