{extends file='layouts/backend.tpl'}

{block name='content_top'}
    {capture name='back_button'}{cpf_button title=t('backend.common.back') url=$smarty.capture.back_url}{/capture}
    {include file='includes/backend.ui/backend.common_actions.tpl' actions=$smarty.capture.back_button}
{/block}

{block name='title'}
	{capture name='page_title'}{t}backend.photos.adding_photos{/t}{/capture}
	{$smarty.capture.page_title}
{/block}

{block name='extra_css'}
    <link type="text/css" href="static/css/backend/plugins/fileupload/jquery.fileupload-ui.css" rel="stylesheet" media="screen" />
{/block}

{block name='content_init'}
	{$cpf_breadcrumb=[
		[t('backend.galleries.galleries'), cpf_link(['controller' => 'backend_galleries', 'action' => 'view', 'id' => $gallery->id])],
		[$smarty.capture.page_title]
	]}
	{capture name='back_url'}{link controller='backend_galleries' action='view' id=$gallery->id}{/capture}
{/block}

{block name='content_top_bottom'}
    <fieldset>
        <legend>{$smarty.capture.page_title}</legend>
    </fieldset>
{/block}


{block name='content'}
    <div class="container">
        <br>
        <!-- The file upload form used as target for the file upload widget -->
        <form id="fileupload" action="{link controller=$cpf_controller action='upload_2_gallery' id=$gallery->id}" method="POST" enctype="multipart/form-data">
            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
            <div class="row fileupload-buttonbar">
                <div class="span7">
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class="btn btn-success fileinput-button">
                        <i class="icon-plus icon-white"></i>
                        <span>Add files...</span>
                        <input type="file" name="files[]" multiple>
                    </span>
                    <button type="submit" class="btn btn-primary start">
                        <i class="icon-upload icon-white"></i>
                        <span>Start upload</span>
                    </button>
                    <button type="reset" class="btn btn-warning cancel">
                        <i class="icon-ban-circle icon-white"></i>
                        <span>Cancel upload</span>
                    </button>
                    <button type="button" class="btn btn-danger delete">
                        <i class="icon-trash icon-white"></i>
                        <span>Delete</span>
                    </button>
                    <input type="checkbox" class="toggle">
                </div>
                <div class="span5">
                    <!-- The global progress bar -->
                    <div class="progress progress-success progress-striped active fade">
                        <div class="bar" style="width:0%;"></div>
                    </div>
                </div>
            </div>
            <!-- The loading indicator is shown during image processing -->
            <div class="fileupload-loading"></div>
            <br>
            <!-- The table listing the files available for upload/download -->
            <table class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
        </form>
        <br>
        <div class="well">
            <h3>Notes</h3>
            <ul>
                <li>The maximum file size for uploads is <strong>5 MB</strong>.</li>
                <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed.</li>
                <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage with Google Chrome, Mozilla Firefox and Apple Safari.</li>
            </ul>
        </div>
    </div>
    <!-- modal-gallery is the modal dialog used for the image gallery -->
    <div id="modal-gallery" class="modal modal-gallery hide fade">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body"><div class="modal-image"></div></div>
        <div class="modal-footer">
            <a class="btn modal-download" target="_blank">
                <i class="icon-download"></i>
                <span>Download</span>
            </a>
            <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
                <i class="icon-play icon-white"></i>
                <span>Slideshow</span>
            </a>
            <a class="btn btn-info modal-prev">
                <i class="icon-arrow-left icon-white"></i>
                <span>Previous</span>
            </a>
            <a class="btn btn-primary modal-next">
                <span>Next</span>
                <i class="icon-arrow-right icon-white"></i>
            </a>
        </div>
    </div>
    <script id="template-upload" type="text/x-tmpl">
        {literal}
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload fade">
                <td class="preview"><span class="fade"></span></td>
                <td class="name"><span>{%=file.name%}</span></td>
                <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                {% if (file.error) { %}
                <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
                {% } else if (o.files.valid && !i) { %}
                <td>
                    <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
                </td>
                <td class="start">{% if (!o.options.autoUpload) { %}
                    <button class="btn btn-primary">
                        <i class="icon-upload icon-white"></i>
                        <span>{%=locale.fileupload.start%}</span>
                    </button>
                    {% } %}</td>
                {% } else { %}
                <td colspan="2"></td>
                {% } %}
                <td class="cancel">{% if (!i) { %}
                    <button class="btn btn-warning">
                        <i class="icon-ban-circle icon-white"></i>
                        <span>{%=locale.fileupload.cancel%}</span>
                    </button>
                    {% } %}</td>
            </tr>
            {% } %}
        {/literal}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
        {literal}
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
                {% if (file.error) { %}
                <td></td>
                <td class="name"><span>{%=file.name%}</span></td>
                <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
                {% } else { %}
                <td class="preview">{% if (file.thumbnail_url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
                    {% } %}</td>
                <td class="name">
                    <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
                </td>
                <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                <td colspan="2"></td>
                {% } %}
                <td class="delete">
                    <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                        <i class="icon-trash icon-white"></i>
                        <span>{%=locale.fileupload.destroy%}</span>
                    </button>
                    <input type="checkbox" name="delete" value="1">
                </td>
            </tr>
            {% } %}
        {/literal}
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="static/javascript/backend/fileupload/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="static/javascript/backend/fileupload/blueimp/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="static/javascript/backend/fileupload/blueimp/load-image.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="static/javascript/backend/fileupload/blueimp/canvas-to-blob.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="static/javascript/backend/fileupload/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="static/javascript/backend/fileupload/jquery.fileupload.js"></script>
    <!-- The File Upload image processing plugin -->
    <script src="static/javascript/backend/fileupload/jquery.fileupload-ip.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="static/javascript/backend/fileupload/jquery.fileupload-ui.js"></script>
    <!-- The localization script -->
    <script src="static/javascript/backend/fileupload/locale.js"></script>
    <!-- The main application script -->
    <script src="static/javascript/backend/fileupload/main.js"></script>
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
    <!--[if gte IE 8]><script src="static/javsacript/backend/fileupload/cors/jquery.xdr-transport.js"></script><![endif]-->
{/block}

{block name='js_init'}{/block}
{block name='content_bottom'}{/block}
