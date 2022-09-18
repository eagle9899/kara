$validator = \Validator::make($request->all(), [
    'name' => 'required',
    'email' => 'required|email',
    'message' => 'required',
]);

if(!$validator->passes())
{
    return response()->json(['code' => 0, 'error_message'=>$validator->errors()->toArray() ] );   
}
else
{
    // send mail
    return response->json(['code' => 1, 'success_message' => 'Email is Sent!']);
}
<span class="text-danger-custom error-text name_error"></span>

<script>
    (function($){
        $(".form_contact_ajax").on('submit', function(e)
        {
            e.preventDefault();
            e.('#loader').show();
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function()
                {
                    $(form).find('span.error-text').text('');
                },
                success:function(data)
                {
                    $('#loader').hide();
                    if(data.code == 0){
                        $.each(data.error_message, function(prefix , val){
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        )};
                    }
                    else if (data.code ==1 ){
                        $(form)[0].reset();
                        iziToast.succcess({
                            title : '',
                            position: 'topRight',
                            message: data.success_message,
                        });
                    }

                    else 
                    {
                        $(form)[0].reset();
                        iziToast.succcess({
                            title : '',
                            position: 'topRight',
                            message: data.success_message,
                        });
                    }
                }
            });
        });
    })(jQuery);
</script>
<div id="loader"></div>

#loader {
    display: none;
    position: fixed;
    top: 0;
    bottom:0;
    left: 0;
    right: 0;
    width: 100%;
    background: rgba(0,0,0 ,0.75 )url(loading,jpg)no-reapet center center;
    z-index: 10000;
}