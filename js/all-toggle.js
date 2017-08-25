
(function($){

    var methods = {
        status : function(){
            var root = $(this).parent().find('span');
            var statusUl = $(this).css('display');
            if(statusUl == 'block'){
                $(this).parent().find('.section-name').addClass('open');
                root.html('- ');
            }else{
                $(this).parent().find('.section-name').removeClass('open');
                root.html('+ ');
            }
        }
    }



    $.fn.allToggle = function(options) {


        var defaults = {
            open: false
        };

        var opts = $.extend(defaults, options);

            this.parent().find('ul').toggle(opts.open);
            if (opts.open) {
                this.parent().find('.section-name').addClass('open');
                this.find('span').html('- ');
            } else {
                this.parent().find('.section-name').removeClass('open');
                this.find('span').html('+ ');
            }


        this.click(function(){

            $(this).parent().find('ul').slideToggle("fast",methods.status);
            return false;

        });
    }


})(jQuery);