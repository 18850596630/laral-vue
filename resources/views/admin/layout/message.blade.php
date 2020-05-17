
@if (count($errors) > 0)
<div class="modal fade show" id="modal_message" style="display: block">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">友情提示</h5>
                <button type="button" class="close message_close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                    @endforeach

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary message_close" >关闭</button>
{{--                <button type="button" class="btn btn-primary">保存</button>--}}
            </div>
        </div>
    </div>
</div>
<script>
    $.noConflict();
    jQuery(document).ready(function($) {
        $("body").addClass('modal-open');

        $(".message_close").click(function () {
            $("#modal_message").fadeOut(200);
        })

        setTimeout(function () {
            $("#modal_message").fadeOut(200);
        },2000)
    })

</script>
@endif