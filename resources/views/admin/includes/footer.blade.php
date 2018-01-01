        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->  

<!-- MESSAGE BOX-->
       <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout'); !!}">
           <div class="mb-container'); !!}">
               <div class="mb-middle'); !!}">
                   <div class="mb-title'); !!}"><span class="fa fa-sign-out'); !!}"></span> Log <strong>Out</strong> ?</div>
                   <div class="mb-content'); !!}">
                       <p>Are you sure you want to log out?</p>
                       <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                   </div>
                   <div class="mb-footer'); !!}">
                       <div class="pull-right'); !!}">
                           <a href="pages-login.html" class="btn btn-success btn-lg'); !!}">Yes</a>
                           <button class="btn btn-default btn-lg mb-control-close'); !!}">No</button>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- END MESSAGE BOX-->

       <!-- START PRELOADS -->
       <audio id="audio-alert" src="{!! asset('admin/audio/alert.mp3" preload="auto'); !!}"></audio>
       <audio id="audio-fail" src="{!! asset('admin/audio/fail.mp3" preload="auto'); !!}"></audio>
       <!-- END PRELOADS -->

   <!-- START SCRIPTS -->
       <!-- START PLUGINS -->
       <script type="text/javascript" src="{!! asset('admin/js/plugins/jquery/jquery.min.js'); !!}"></script>
       <script type="text/javascript" src="{!! asset('admin/js/plugins/jquery/jquery-ui.min.js'); !!}"></script>
       <script type="text/javascript" src="{!! asset('admin/js/plugins/summernote/summernote.js'); !!}"></script>
       
       <script type="text/javascript" src="{!! asset('admin/js/plugins/bootstrap/bootstrap.min.js'); !!}"></script>
       <!-- END PLUGINS -->

       <script type='text/javascript' src="{!! asset('admin/js/plugins/icheck/icheck.min.js'); !!}"></script>
        <script type="text/javascript" src="{!! asset('admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'); !!}"></script>
        
        <script type="text/javascript" src="{!! asset('admin/js/plugins/bootstrap/bootstrap-datepicker.js'); !!}"></script>                
        <script type="text/javascript" src="{!! asset('admin/js/plugins/bootstrap/bootstrap-file-input.js'); !!}"></script>
        <script type="text/javascript" src="{!! asset('admin/js/plugins/bootstrap/bootstrap-select.js'); !!}"></script>
        <script type="text/javascript" src="{!! asset('admin/js/plugins/tagsinput/jquery.tagsinput.min.js'); !!}"></script>
        <script type="text/javascript" src="{!! asset('admin/js/plugins/fileinput/fileinput.min.js'); !!}"></script>  
        <script type="text/javascript" src="{!! asset('admin/js/plugins/datatables/jquery.dataTables.min.js'); !!}"></script>  
        <script type="text/javascript" src="{!! asset('admin/js/plugins/summernote/summernote.js'); !!}"></script>  



   <!-- START TEMPLATE -->
<script type="text/javascript" src="{!! asset('admin/js/demo_tables.js'); !!}"></script>     


       <script type="text/javascript" src="{!! asset('admin/js/plugins.js'); !!}"></script>
       <script type="text/javascript" src="{!! asset('admin/js/actions.js'); !!}"></script>

       <!-- END TEMPLATE -->
       <script>
                             $("#file-simple-1").fileinput({
                              //*initialPreview: [
    //"<img src='{!! asset('admin/assets/fileupload/upload-image.png'); !!}' class='file-preview-image' alt='Desert' title='Desert'>",
//],
                                uploadUrl: "/file-upload-batch/2",
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                maxImageWidth: 250,
                                maxImageHeight: 250,
                                showUpload: false,
                                showCaption: false,
                                browseClass: "btn btn-danger",
                                fileType: "any",
                                                                showPreview:true

                            });
                            $('#file-simple-1').on('fileclear', function(event) {
window.image1='';
console.log(window.image);
                            });

                               $("#file-simple-2").fileinput({
                                //uploadUrl: "/file-upload-batch/2",
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                maxImageWidth: 250,
                                maxImageHeight: 250,
                                showUpload: false,
                                showCaption: false,
                                browseClass: "btn btn-danger",
                                fileType: "any",
                                showPreview:true

                            });
                               $('#file-simple-2').on('fileclear', function(event) {
window.image2='';
console.log(window.image);
                            });
                            $("#file-simple-3").fileinput({
                               // uploadUrl: "/file-upload-batch/2",
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                maxImageWidth: 250,
                                maxImageHeight: 250,
                                showUpload: false,
                                showCaption: false,
                                browseClass: "btn btn-danger",
                                fileType: "any",
                                showPreview:true

                            });
                            $('#file-simple-3').on('fileclear', function(event) {
window.image3='';
                            });

                            $("#file-simple-4").fileinput({
                                uploadUrl: "/file-upload-batch/2",
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                maxImageWidth: 250,
                                maxImageHeight: 250,
                                showUpload: false,
                                showCaption: false,
                                browseClass: "btn btn-danger",
                                fileType: "any",
                                showPreview:true
                            });
                            $('#file-simple-4').on('fileclear', function(event) {
window.image4='';

                            });
                    </script>  



   <!-- END SCRIPTS -->
