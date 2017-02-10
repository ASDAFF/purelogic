BxmodAuth = {
    // ������� � ������� �������������� �������
    ToRestore: function (el)
    {
        var dialog = el.closest("div.bxmodAuthDialog");
        
        BxmodAuth.ClearHints(dialog);
        
        if ( dialog.find("input[name='bxmodAuthEmail']").val() != "" )
        {
            dialog.find("input[name='bxmodAuthRestoreEmail']").val( dialog.find("input[name='bxmodAuthEmail']").val() );
        }
        
        BxmodAuth.MoveTo( dialog.find("form.bxmodAuthRestore") );
        
        return false;
    },
    // ������� � ������� �����������/�����������
    ToLogin: function (el)
    {
        var dialog = el.closest("div.bxmodAuthDialog");
        
        BxmodAuth.ClearHints(dialog);
        
        BxmodAuth.MoveTo( dialog.find("form.bxmodAuthLogin") );

        return false;
    },
    // ������� �����������/�����������
    DoLogin: function (el)
    {
        var dialog = el.closest("div.bxmodAuthDialog");
        
        var sendButton = dialog.find("button.bxmodAuthLoginButton");
        if ( !BxmodAuth.SetLoading(sendButton) )
        {
            return false;
        }
        
        BxmodAuth.ClearHints(dialog);
        
        dialog.find("form.bxmodAuthConfirm input[name='bxmodAuthConfirmLogin']").val( dialog.find("form.bxmodAuthLogin input[name='bxmodAuthEmail']").val() );
        if ( dialog.find("form.bxmodAuthLogin input[name='bxmodAuthRemember']:checked").length > 0 )
        {
            dialog.find("form.bxmodAuthConfirm").append('<input type="hidden" name="bxmodAuthRemember" value="Y">');
        }
        else
        {
            dialog.find("form.bxmodAuthConfirm input[name='bxmodAuthRemember']").remove();
        }
        
        $.ajax({
            url: document.location.href,
            type: "post",
            data: dialog.find("form.bxmodAuthLogin").serialize(),
            success: function ( data ) {
                
                BxmodAuth.ReSetLoading(sendButton);
                
                if ( !BxmodAuth.CheckResp( dialog, data ) )
                {
                    if ( data.indexOf("RegisterEmailConfirm") > -1 || data.indexOf("RegisterPhoneConfirm") > -1 )
                    {
                        dialog.find("form.bxmodAuthConfirm .email, form.bxmodAuthConfirm .phone").hide();
                        
                        if ( data.indexOf("RegisterPhoneConfirm") > -1 )
                        {
                            dialog.find("form.bxmodAuthConfirm .phone").show();
                        }
                        else if ( data.indexOf("RegisterEmailConfirm") > -1 )
                        {
                            dialog.find("form.bxmodAuthConfirm .email").show();
                        }
                        
                        BxmodAuth.MoveTo( dialog.find("form.bxmodAuthConfirm") );
                    }
                    else
                    {
                        BxmodAuth.ToAllError( dialog );
                    }
                }
                else
                {
                    BxmodAuth.ReloadCaptcha(dialog.find("div.bxmodAuthCaptchaBlock.taCaptchaLogin"));
                }
            }
        });
        
        return false;
    },
    // ������� ������������ ������
    DoRestore: function (el)
    {
        var dialog = el.closest("div.bxmodAuthDialog");
        
        var sendButton = dialog.find("button.bxmodAuthRestoreButton");
        if ( !BxmodAuth.SetLoading(sendButton) ) return false;
        
        BxmodAuth.ClearHints(dialog);
        
        dialog.find("div.bxmodAuthSMSLimit").addClass("hidden").html("");
        
        BxmodAuth.MoveTo( dialog.find("form.bxmodAuthRestore") );
        
        $.ajax({
            url: document.location.href,
            type: "post",
            data: dialog.find("form.bxmodAuthRestore").serialize(),
            success: function ( data ) {
                
                BxmodAuth.ReSetLoading(sendButton);
                
                if ( !BxmodAuth.CheckResp( dialog, data ) )
                {
                    // �������� �������� ���� �������������� �������
                    if ( data.indexOf("RestoreSend") > -1 )
                    {
                        dialog.find("div.bxmodAuthRestoreSendEmail, div.bxmodAuthRestoreSendPhone").hide();
                        
                        dialog.find("form.bxmodAuthSetPass input[name='bxmodAuthRestoreLogin']").remove();
                        dialog.find("form.bxmodAuthSetPass").append('<input type="hidden" name="bxmodAuthRestoreLogin" value="'+ dialog.find("form.bxmodAuthRestore input[name='bxmodAuthRestoreEmail']").val() +'">');
                        
                        // ���������� �� email
                        if ( data.indexOf("Email") > -1 )
                        {
                            dialog.find("div.bxmodAuthRestoreSendEmail").show();
                        }
                        // ���������� �� SMS
                        else
                        {
                            dialog.find("div.bxmodAuthRestoreSendPhone").show();
                        }
                        
                        BxmodAuth.MoveTo( dialog.find("div.bxmodAuthRestoreSend") );
                    }
                }
                else
                {
                    BxmodAuth.ReloadCaptcha(dialog.find("div.bxmodAuthCaptchaBlock.taCaptchaRestore"));
                }
            }
        });
        
        return false;
    },
    // ������������� ����� ��� ������ ��������
    DoConfirm: function (el)
    {
        var dialog = el.closest("div.bxmodAuthDialog");
        
        var sendButton = dialog.find("button.bxmodAuthConfirmButton");
        if ( !BxmodAuth.SetLoading(sendButton) ) return false;
        
        BxmodAuth.ClearHints(dialog);
        
        $.ajax({
            url: document.location.href,
            type: "post",
            data: dialog.find("form.bxmodAuthConfirm").serialize(),
            success: function ( data ) {
                
                BxmodAuth.ReSetLoading(sendButton);
                
                if ( !BxmodAuth.CheckResp( dialog, data ) )
                {
                    BxmodAuth.ToAllError( dialog );
                }
            }
        });
        
        return false;
    },
    // ������� ��������� ������ ������
    DoSetPass: function (el)
    {
        var dialog = el.closest("div.bxmodAuthDialog");
        
        var sendButton = dialog.find("button.bxmodAuthSetPassButton");
        if ( !BxmodAuth.SetLoading(sendButton) ) return false;
        
        BxmodAuth.ClearHints(dialog);
        
        $.ajax({
            url: document.location.href,
            type: "post",
            data: dialog.find("form.bxmodAuthSetPass").serialize(),
            success: function ( data ) {
                
                BxmodAuth.ReSetLoading(sendButton);
                
                if ( !BxmodAuth.CheckResp( dialog, data ) )
                {
                    if ( data.indexOf("Restore") > -1 )
                    {
                        document.BxmodAuthRT = setInterval("BxmodAuth.ReloadTimer('#"+ dialog.find("div.bxmodAuthSuccessRestore p.bxmodAuthMess span").attr("id") +"')", 1000);
                        BxmodAuth.MoveTo( dialog.find("div.bxmodAuthSuccessRestore") );
                    }
                }
            }
        });
        
        return false;
    },
    // �������� ������ ������� �� ������� ������
    CheckResp: function ( dialog, data )
    {
        if ( data.indexOf("[Error]:") > -1 )
        {
            data = data.split("[Error]:");
            
            // ���� ������ � ����� ������ � ���� ������, �� ���������� ��� ��������
            if ( data[0] == "bxmodAuthCaptcha" && dialog.find("div.bxmodAuthCaptchaBlock").hasClass("hidden") )
            {
                dialog.find("div.bxmodAuthCaptchaBlock").removeClass("hidden");
                BxmodAuth.MoveTo( dialog.find("form.bxmodAuthLogin") );
            }
            // ���� � ������ ���������� � ������ SMS
            else if ( data[0] == "sms_limit" )
            {
                if ( !dialog.find("div.bxmodAuthSMSLimit").hasClass("taTimer") )
                {
                    dialog.find("div.bxmodAuthSMSLimit").addClass("taTimer");
                    setInterval("BxmodAuth.Timer( $('#"+ dialog.find("div.bxmodAuthSMSLimit").attr("id") +"') )", 1000);
                }
                dialog.find("div.bxmodAuthSMSLimit").html(data[1]).removeClass("hidden");
                
                BxmodAuth.MoveTo( dialog.find("form.bxmodAuthRestore") );
            }
            
            var el = dialog.find("input[name='" + data[0] + "']");
            
            el.addClass("bxmodAuthInputError").focus();
            
            // ���������� ���� � ���� � �������
            $('<div class="bxmodAuthHint"><div>'+ data[1] +'</div></div>').insertAfter(el).css({
                marginLeft: el.width() + 30,
                marginTop: el.height() * -1 - 14,
            }).animate({
                marginLeft: el.width() + 10,
                opacity: 1
            }, 200).click(function(){
                $(this).remove();
            });

            return true;
        }
        // �������� �����
        else if ( data == "Login" )
        {
            BxmodAuth.ToSuccessLogin( dialog );
            return true;
        }
        // �������� �����������
        else if ( data == "Register" )
        {
            BxmodAuth.ToSuccessRegister( dialog );
            return true;
        }
        
        return false;
    },
    // �������� ������ � ��������
    ClearHints: function ( dialog )
    {
        dialog.find("div.bxmodAuthHint").remove();
        dialog.find("input").removeClass("bxmodAuthInputError");
    },
    // ���������� CAPTCHA
    ReloadCaptcha: function ( captchaBlock )
    {
        if ( captchaBlock.find("a").hasClass("taCaptchaLoading") )
        {
            return false;
        }
        
        captchaBlock.find("a").addClass("taCaptchaLoading").stop().animate({
            opacity: 0.5
        }, 200);
        
        captchaBlock.find("img.captcha").stop().animate({
            width: 360,
            height: 80,
            marginLeft: -106,
            marginTop: -22,
            opacity: 0
        }, 500);
        
        $.get( document.location.pathname + '?reCaptcha=true', function( data ) {
            captchaBlock.find("input.captchaSid").val(data);
            captchaBlock.find("input.captchaWord").val("");
            captchaBlock.find("img.captcha").attr('src', '/bitrix/tools/captcha.php?captcha_sid=' + data).load(function(){
                captchaBlock.find("img.captcha").stop().animate({
                    width: 180,
                    height: 40,
                    marginLeft: -1,
                    marginTop: -1,
                    opacity: 1
                }, 300, function(){
                    captchaBlock.find("div.bxmodAuthCaptchaImg a").fadeIn();
                });
                captchaBlock.find("a").removeClass("taCaptchaLoading").stop().animate({
                    opacity: 1
                }, 200);
            });
        });
    },
    // ������ ������� ��������� �������
    Timer: function ( timer )
    {
        var hEl = timer.find("span.h");
        var mEl = timer.find("span.m");
        var sEl = timer.find("span.s");
        
        var allTime = (parseInt( hEl.html() ) * 3600 + parseInt( mEl.html() ) * 60 + parseInt( sEl.html() )) - 1;
        
        // ���� ������ ������ ����, �� �������� ��������� � ��������
        if ( allTime <= 0 )
        {
            timer.hide();
            BxmodAuth.MoveTo( timer.closest("div.bxmodAuthDialog").find("form.bxmodAuthRestore") );
        }
        
        var hNew = (Math.floor( allTime / 3600 )).toString();
        var mNew = (Math.floor( ( allTime - hNew * 3600 ) / 60 )).toString();
        var sNew = (allTime - (hNew * 3600) - (mNew * 60)).toString();
        
        if ( hNew.length < 2 ) hNew = "0" + hNew;
        if ( mNew.length < 2 ) mNew = "0" + mNew;
        if ( sNew.length < 2 ) sNew = "0" + sNew;
        
        hEl.html( hNew );
        mEl.html( mNew );
        sEl.html( sNew );
    },
    // �������� ������� �����������/�����������
    ShowDialog: function ( dialog )
    {
        var over = dialog.prev();
        
        dialog.css({
            marginLeft: ( dialog.width() / 2 + 15 ) * -1,
            marginTop: ( dialog.height() / 2 + 100 ) * -1
        });
        
        dialog.find("a.bxmodAuthDialogClose").css({ left: dialog.width() + 17 });
        
        over.show();
        dialog.show();
    },
    // �������� ��������� �� �������� �����������
    ToSuccessLogin: function ( dialog )
    {
        document.BxmodAuthRT = setInterval("BxmodAuth.ReloadTimer('#"+ dialog.find("div.bxmodAuthSuccessLogin p.bxmodAuthMess span").attr("id") +"')", 1000);
        BxmodAuth.MoveTo( dialog.find("div.bxmodAuthSuccessLogin") );
    },
    // �������� ��������� �� �������� �����������
    ToSuccessRegister: function ( dialog )
    {
        document.BxmodAuthRT = setInterval("BxmodAuth.ReloadTimer('#"+ dialog.find("div.bxmodAuthSuccessRegister p.bxmodAuthMess span").attr("id") +"')", 1000);
        BxmodAuth.MoveTo( dialog.find("div.bxmodAuthSuccessRegister") );
    },
    // �������� ��������� �� ����� ������
    ToAllError: function ( dialog )
    {
        BxmodAuth.MoveTo( dialog.find("div.bxmodAuthAllError") );
    },
    // �������� ������� � ������� � ����� ��������� ������ ������
    ToRestoreForm: function ( type )
    {
        var el = $(".bxmodAuthShowLink:first");
        var dialog = el.prev();
        
        BxmodAuth.ShowDialog( dialog );
        
        if( type == "email" )
        {
            dialog.find("div.bxmodAuthRestoreSendEmail").show();
        }
        else
        {
            dialog.find("div.bxmodAuthRestoreSendPhone").show();
        }
        
        BxmodAuth.MoveTo( dialog.find("div.bxmodAuthRestoreSend") );
    },
    // �������� ������� � ������� � ����� ������������� �����������
    ToConfirmForm: function ( success )
    {
        BxmodAuth.ShowDialog( $(".bxmodAuthDialog:first") );
        if ( success == "Y" )
        {
            BxmodAuth.ToSuccessRegister( $("div.bxmodAuthDialog:first") );
        }
        else
        {
            BxmodAuth.ToAllError( $("div.bxmodAuthDialog:first") );
        }
    },
    // ����������� � ������������ �����
    MoveTo: function ( el )
    {
        var dialog = el.closest("div.bxmodAuthDialog");
        var container = dialog.find("div.bxmodAuthForms");
        var allForms = dialog.find("div.bxmodAuthForms>div, div.bxmodAuthForms>form");
        
        dialog.find("div.bxmodAuthCaptchaImg a").hide();
        
        if ( el.hasClass("taActive") )
        {
            container.stop().animate({
                height: el.height()
            }, 500);
        }
        else
        {
            allForms.not(".taActive").hide();
            allForms.removeClass("taActive");
            
            el.show().addClass("taActive");
            
            container.stop().animate({
                marginLeft: (el.offset().left - container.offset().left) * -1,
                height: el.height()
            }, 500);
        }
    },
    // ������ � �������� ��������
    SetLoading: function ( el )
    {
        if ( !el.hasClass("taLoading") )
        {
            el.html( el.val() ).addClass("taLoading");
            return true;
        }
        return false;
    },
    // �������� ����� �������� ������
    ReSetLoading: function ( el )
    {
        el.html(el.attr("title")).removeClass("taLoading");
    },
    // ������ ������������ ��������
    ReloadTimer: function ( el )
    {
        var timer = $(el);
        var sec = parseInt( timer.html() );

        if ( sec > 0 )
        {
            sec = sec - 1;
            timer.html( sec );
        }
        else
        {
            BxmodAuth.SuccessClose( timer.closest("div.bxmodAuthDialog") );
            clearTimeout( document.BxmodAuthRT );
        }
    },
    // �������� ������� / ������������ ��������
    SuccessClose: function ( dialog )
    {
        document.location.href = $("div.bxmodAuthDialog input.bxmodAuthDocLocation").val();
    }
}

$(document).ready(function() {
    // ������� � ����� ��������������
    $("div.bxmodAuthDialog a.bxmodAuthToRestore").click(function(){
        return BxmodAuth.ToRestore($(this));
    });
    
    // ������� � ����� �����������/�����������
    $("div.bxmodAuthDialog a.bxmodAuthToLogin").click(function(){
        return BxmodAuth.ToLogin($(this));
    });
    
    // �����������/�����������
    $("div.bxmodAuthDialog button.bxmodAuthLoginButton").click(function(){
        return BxmodAuth.DoLogin($(this));
    });
    $("div.bxmodAuthDialog form.bxmodAuthLogin input").keypress(function(e){
        if ( e.keyCode==13 ) return BxmodAuth.DoLogin($(this));
    });
    
    // ��������������
    $("div.bxmodAuthDialog button.bxmodAuthRestoreButton").click(function(){
        return BxmodAuth.DoRestore($(this));
    });
    $("div.bxmodAuthDialog form.bxmodAuthRestore input").keypress(function(e){
        if ( e.keyCode==13 ) return BxmodAuth.DoRestore($(this));
    });
    
    // �������������
    $("div.bxmodAuthDialog button.bxmodAuthConfirmButton").click(function(){
        return BxmodAuth.DoConfirm($(this));
    });
    $("div.bxmodAuthDialog form.bxmodAuthConfirm input").keypress(function(e){
        if ( e.keyCode==13 ) return BxmodAuth.DoConfirm($(this));
    });
    
    // ������� ��������� ������
    $("div.bxmodAuthDialog button.bxmodAuthSetPassButton").click(function(){
        return BxmodAuth.DoSetPass($(this));
    });
    $("div.bxmodAuthDialog form.bxmodAuthSetPass input").keypress(function(e){
        if ( e.keyCode==13 ) return BxmodAuth.DoSetPass($(this));
    });
    
    // �������� ������� �����������
    $(".bxmodAuthShowLink").click(function(){
        BxmodAuth.ShowDialog( $(this).prev() );
    });
    
    // ������� ������ ���������� ������
    $("div.bxmodAuthCaptchaBlock a").click(function(){
        BxmodAuth.ReloadCaptcha( $(this).closest("div.bxmodAuthCaptchaBlock") );
    });
    
    // �������� ����� �������������� ������
    if ( $("#bxmodAuthShowRestore").length )
    {
        BxmodAuth.ToRestoreForm( $("#bxmodAuthShowRestore").val() );
    }
    
    // �������� ����� ������������� �����������
    if ( $("#bxmodAuthShowConfirm").length )
    {
        BxmodAuth.ToConfirmForm( $("#bxmodAuthShowConfirm").val() );
    }
    
    // �������� ������� ����� �������� �����������, �����������, ��������������
    $("div.bxmodAuthDialog p.bxmodAuthMess a.taSuccess").click(function(){
        BxmodAuth.SuccessClose( $(this).closest("div.bxmodAuthDialog") );
        return false;
    });
    
    // �������� ������� ����������� ��� ������ �� "�������"
    $("div.bxmodAuthDialog a.bxmodAuthDialogClose").click(function(){
        var dialog = $(this).closest("div.bxmodAuthDialog");
        dialog.hide();
        dialog.prev().hide();
        return false;
    });
    
    // �������� ������� ����������� ��� ������ �� ����������
    $("div.bxmodAuthDialogOver").click(function(){
        $(this).hide();
        $(this).next().hide();
        return false;
    });
});