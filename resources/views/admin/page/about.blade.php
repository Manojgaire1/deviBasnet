@extends('admin.layouts.master')
@section('page_title','About me')
@section('page_specific_css')
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
                                    <h2>About me</h2>
                                </div>

                            </div>

                        </div>
                        <div class="card-block">
                            <form id="aboutForm" name="aboutForm">
                                @csrf
                                <div class="modal-body about_add_body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Title (don't change title)</label>
                                                <input type="text" class="form-control" name="title" id="title"
                                                    placeholder="" @if(isset($about)) value="{{$about->title}}" @endif>
                                            </div>

                                            <div class="form-group">
                                                <label>Upload Image</label>
                                                <div class="file-upload" style="max-width: 100%!important">
                                                    <div class="image-upload-wrap" @if(isset($about->featured_image))
                                                        style="background:
                                                        url({{asset('storage/uploads/pages/small' . '/' . $about->featured_image)}});background-size:
                                                        contain;" @else style="background:
                                                        url({{asset('/admin-assets/images/user-profile/2012_Councelling_Roka_2.png')}});background-size:
                                                        contain;" @endif>
                                                        <img @if(isset($about->featured_image))
                                                        src="{{asset('storage/uploads/pages/small' . '/' . $about->featured_image)}}"
                                                        @else
                                                        src="{{asset('/admin-assets/images/user-profile/2012_Councelling_Roka_2.png')}}"
                                                        @endif
                                                        class="img-fluid image-preview-single">
                                                        <input class="file-upload-input" type="file"
                                                            name="page_image_path" onchange="previewFile(this);"
                                                            accept="image/*">
                                                        <div class="drag-text">
                                                            <div class="icon">+</div>
                                                        </div>
                                                    </div>
                                                    <div class="file-upload-content">
                                                        <img class="file-upload-image img-fluid" src="#"
                                                            alt="your image">
                                                        <div class="image-title-wrap">
                                                            <button type="button" onclick="removeUpload()"
                                                                class="remove-image btn-blue">Remove
                                                                Image<span class="image-title">Uploaded
                                                                    Image</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button style="max-width: 100%!important"
                                                    class="file-upload-btn btn-blue" type="button"
                                                    onclick="$('.file-upload-input').trigger( 'click' )">Select Image
                                                </button>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="content">About me</label>
                                                <textarea class="form-control" name="content"
                                                    id="content">@if(isset($about)){!! $about->content !!}@endif</textarea>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <input type="hidden" name="about_id" id="about_id" @if(isset($about))
                                    value="{{$about->id}}" @endif />
                                <div class="modal-footer">
                                    <button type="submit" name="btnSubmit" class="btn btn-green">Update</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
<script src="{{asset('admin-assets/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('admin-assets/formvalidation/dist/js/plugins/Bootstrap.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.tiny.cloud/1/htwjojrmzrtocohmg23pftvkzb8dn907vrzqzfeju23jhzf6/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    $(document).ready(function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //intialize the variables
            var save_method = "add";
            var make_url;
            var makeTable;
            var categoryId;
            var form = document.getElementById('aboutForm');
            //intialize the tinymce editor
            initTinyMce();
           
            //end of the datatable data rendering
            const fv = FormValidation.formValidation(
            form,
            {
                fields: {
                    title: {
                        validators: {
                            notEmpty: {
                                message: 'The about title is required'
                            },
                        }
                    },
                    content: {
                        validateField: {}
                    },
                    about_image_path: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png',
                                type: 'image/jpeg,image/png',
                                maxSize: 2097152,   // 2048 * 1024
                                message: 'You cannot upload the image that is greater than 2MB size'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                    // Support the form made in Bootstrap 4
                    bootstrap: new FormValidation.plugins.Bootstrap(),
                    // Show the feedback icons taken from FontAwesome
                    icon: new FormValidation.plugins.Icon({
                        valid: 'fa fa-check',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh',
                    }),
                },

            }).on('core.form.valid', function () {
                makeId = $("#about_id").val();
                if (makeId) {
                    make_url = "{{route('admin.cms.page.update',':make')}}";
                    make_url = make_url.replace(":make",makeId);
                } else {
                    make_url = "{{route('admin.cms.page.store')}}";
                }
                // get the input values
                result = new FormData($("#aboutForm")[0]);
                $.ajax({
                    url: make_url,
                    data:result,
                    dataType: "Json",
                    contentType: false,
                    processData: false,
                    cache:false,
                    type: "POST",
                    success: function (data) {
                        // console.log(data)
                        $('#about_id').val(data.page_id)
                        if(data.status == "success"){
                            swal({
                                title: data.title,
                                text: data.message,
                                icon: "success",
                                button: "OK",
                            })
                        }else{
                            swal({
                                title: data.title,
                                text: data.message,
                                icon: "error",
                                button: "OK"
                            })
                        }

                    },
                    error: function (jqXHR,textStatus,errorThrown) {
                        if(jqXHR.status == 500){
                            console.log('There is server error adding the new menu, please try again');
                        }
                    }

                });
            });
           
            //reset the validation when the image was removed
            $('body').on('click','.remove-image',function(e){
                e.preventDefault();
                //reset the form validation field
                fv.resetField('make_image_path');
            });
            
           
            $.fn.dataTable.ext.errMode = 'none';
        });


        // function re reinitialize the tinymce while destoryed when the modal close
        function initTinyMce(){
            tinymce.init({
                    selector: 'textarea',
                    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                    toolbar: 'insert undo redo formatselect bold italic backcolor  alignleft aligncenter alignright alignjustify bullist numlist outdent indent removeformat help',
                    toolbar_mode: 'floating',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
            });

        }


        //function to populate the modal data while the modal open in case of the edit menu option
        function populateModalData(response,has_set_menu_image){
            //change the modal heading
            // $("h5.modal-title").html('Update ' + response.activity.title + ' activity')
            // //populate the individual field
            // $("#title").val(response.page.title);
            // //set the content in the tinymce
            // if(response.page.content != null)
            //     tinymce.get('content').setContent(response.page.content);
            // //set the if provided
            // if(response.page.featured_image != null){
            //     var image_directory = "{{asset('storage/uploads/pages/large')}}";
            //     $(".image-preview-single").attr('src',image_directory + "/" + response.page.featured_image);
            // }
        }


        function showDefaultImage(){
            var default_image_path = "{{asset('/admin-assets/images/user-profile/2012_Councelling_Roka_2.png')}}";
            $('.image-preview-single').attr('src',default_image_path);
        }

</script>
@endsection