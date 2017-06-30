
(function($){

    var methods = {
        status : function(){
            var root = $(this).parent().find('span');
            var statusUl = $(this).css('display');
            if(statusUl == 'block'){
                root.html('- ');
            }else{
                root.html('+ ');
            }
        }
    }



    $.fn.allToggle = function(options) {


        var defaults = {
            open: false
        };

        var opts = $.extend(defaults, options);

            this.find('ul').toggle(opts.open);
            if (opts.open) {
                this.find('.section-name span').html('- ');
            } else {
                this.find('.section-name span').html('+ ');
            }


        this.click(function(){

            $(this).find('ul').slideToggle("fast",methods.status);
            return false;

        });
    }


})(jQuery);