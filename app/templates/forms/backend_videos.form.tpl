{extends file='layouts/backend.form.tpl'}

{block name='title'}
    {if $cpf_is_edit}
        {capture name='page_title'}{t}backend.videos.editing_video{/t}{/capture}
        {else}
        {capture name='page_title'}{t}backend.videos.adding_video{/t}{/capture}
    {/if}
    {$smarty.capture.page_title}
{/block}

{block name='content_init'}

    {$cpf_breadcrumb=[
        [$smarty.capture.page_title]
    ]}
{/block}

{block name='content'}

    {cpf_input_helper type="text" field="title"}
    {cpf_input_helper type="text" field="service_id"}
    <div class="control-group">
        <label></label>
        <div class="controls">
            <a href="#" class="b-how-to-get-video-id">{t('How to get a YouTube video ID?')}</a>
        </div>
    <div class="control-group">
        <label></label>
        <div class="controls">
            <img src="static/images/backend/project/youtube_video_id.jpg" width="492" height="121" alt="{t('How to get a YouTube video ID?')}" class="b-youtube-video-id" style="display: none;"/>
        </div>
    </div>
    <div class="control-group">
        <label></label>
        <div class="controls">
            <div class="b-video-wrap" {if !$cpf_is_edit}style="display: none;"{/if}>
                {cpf_youtube_video_iframe youtube_id=$cpf_current_entity->youtube_id}
            </div>
            <div class="buttons">
                {cpf_button href="#" class="positive b-refresh" title="Refresh"}
            </div>
        </div>
    </div>

    {cpf_input_helper type="text" field="width"}
    {cpf_input_helper type="text" field="height"}
    {cpf_input_helper type="ck_editor" field="description" loadJS=true}
    {cpf_input_helper type="hidden" field="page_id"}

{/block}

{block name='content_bottom'}
{*
    "Submit" and "Cancel" button
*}
<div class="form-actions">
    {if $cpf_is_edit}
        {cpf_submit title=t('backend.common.save') icon='plus-sign'}
        {cpf_submit title=t('backend.common.save_and_continue') icon='check' id="form-apply"}
        {else}
        {cpf_submit title=t('backend.common.save') icon='plus-sign'}
        {cpf_submit title=t('backend.common.save_and_continue') icon='check' id="form-apply"}
    {/if}
    {cpf_button title=t('backend.common.cancel') icon='ban-circle' url=$smarty.capture.back_url}
</div>
{/block}

{block name='js_init'}

$('.b-how-to-get-video-id').click(function(){
    $('.b-youtube-video-id').toggle();
    return false;
});

var template = '{cpf_youtube_video_iframe youtube_id="***"}';

$('.b-refresh').click(function(){
    $('.b-video-wrap').show();
    $('.b-video-wrap').html(template.replace('***', $('input#service_id').val()));
    return false;
});
{/block}