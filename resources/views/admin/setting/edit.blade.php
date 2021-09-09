@extends('admin.layouts.master')
@section('page_title','Site settings')
@section('page_specific_css')
<link href="{{ asset('/admin-assets/formvalidation/dist/css/formValidation.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="pcoded-content vehicle">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <!-- end card for Breadcrumb -->
                	<div class="card card-white">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-7">
                                    <h2>Settings</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-block">
                            @if(request()->session()->has('zen_setting_msg'))
                            <div class="row success_message_div">
                                <div class="col-md-12">
                                    <div class="alert alert-success" role="alert">
                                        {{request()->session()->get('zen_setting_msg')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <form action="{{route('admin.settings.update')}}" method="POST" id="__devi_settings_form" name="__devi_settings_form">
                            <div class="card-block">
                                <h6 class="sub-title">Social Links</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social_facebook_link">Facebook link</label>
                                            <input type="text" name="social_facebook_link" id="social_facebook_link" value="{{$social_facebook_link}}" class="form-control" placeholder="https://www.facebook.com/"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social_linkedin_link">LinkedIn link</label>
                                            <input type="text" name="social_linkedin_link" id="social_linkedin_link" value="{{$social_linkedin_link}}" class="form-control" placeholder="https://linkedin.com/"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social_instagram_link">Instagram link</label>
                                            <input type="text" name="social_instagram_link" id="social_instagram_link" value="{{$social_instagram_link}}" class="form-control" placeholder="https://www.instagram.com/"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social_instagram_link">Twitter link</label>
                                            <input type="text" name="social_twitter_link" id="social_twitter_link" value="{{$social_twitter_link}}" class="form-control" placeholder="https://www.instagram.com/"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social_instagram_link">Research gate link</label>
                                            <input type="text" name="social_gate_link" id="social_gate_link" value="{{$social_gate_link}}" class="form-control" placeholder="https://www.instagram.com/"/>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="sub-title">Contact Details</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_email">Contact email</label>
                                            <input type="text" name="admin_contact_email" class="form-control" placeholder="Contact email" value="{{$admin_contact_email}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_phone">Contact phone</label>
                                            <input type="text" name="admin_contact_phone" class="form-control" placeholder="Contact phone" value="{{$admin_contact_phone}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="admin_address" class="form-control" placeholder="Address" value="{{$admin_address}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tages">Tags(Each tag seperated by comma)</label>
                                            <input type="text" name="tags" class="form-control" placeholder="I am a Social worker" value="{{$tags}}"/>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="sub-title">SEO details</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seo_keyword">Seo keyword(each keyword seperated by comma)</label>
                                            <input type="text" name="seo_keywords" id="seo_keyword" value="{{$seo_keywords}}" class="form-control" placeholder="Social worker, friendly"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="seo_description">Seo Description</label>
                                            <textarea name="seo_description" id="seo_description" class="form-control" plceholder="Get connected on viber">{{$seo_description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn-green border-radius-30 update-setting">Update setting</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
					</div>
                </div>
                <!-- end page -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_specific_js')
<script src="https://cdn.tiny.cloud/1/htwjojrmzrtocohmg23pftvkzb8dn907vrzqzfeju23jhzf6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
$('document').ready(function(){
    initTinyMce()
})
// function re reinitialize the tinymce while destoryed when the modal close
function initTinyMce(){
    tinymce.init({
            selector: 'textarea#seo_description',
            plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'insert undo redo formatselect bold italic backcolor  alignleft aligncenter alignright alignjustify bullist numlist outdent indent removeformat help',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
    });

}
</script>
@endsection