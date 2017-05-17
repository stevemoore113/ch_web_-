 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
(function($){
    $.fn.gb_auto_li_data = function() {
       // var _obj = this;
        var _this = this;
        
        var left_button = '<button data-type="left"><i class="fa fa-caret-left" aria-hidden="true"></i></button>';
        var right_button = '<button data-type="right"><i class="fa fa-caret-right" aria-hidden="true"></i></button>';

        var _obj = $(_this).find("ul");
        var auto_obj;
        var li_data = _obj.find("li");
        var total = parseInt(li_data.length);
        var effect_time = 5000;
        var scroll_last_time = 1500;
        var scroll_right_time = 3000;
        if (li_data.length > 0)
        {
            li_data.eq(0).addClass("active");
            
            var ad = $('<span class="auto_button">'+left_button+right_button+'</span>');
            
            $(_this).find(".box-header").append(ad);
        }

        _this.set_interval_info = function() 
        {
            auto_obj = setInterval(function(){
                _this.set_ad_data(); 
            }, effect_time);
        }
        _this.set_ad_data = function() 
        {
            var index = _obj.find("li.active").index();
            
            _this.go_right_animate(index);
        }
        _this.go_left_animate = function(index) 
        {
            index--;
            var width = index * 320;
            var time = scroll_right_time;
            if (index < 0)
            {
                width = (total - 1) * 320;
                time = scroll_last_time;
            }
            _this.animate_effect(index, width, time);
        }
        _this.animate_effect = function(index, width, time)
        {
            _this.clear_active(index);
            _obj.stop().animate({left: "-"+width}, time);
        }
        _this.go_right_animate = function(index)
        {
            index++; 

            var width = index * 320;
            var time = scroll_right_time;
            if (index >= total)
            {
                width = 0;
                index = 0;
                time = scroll_last_time;
            }
            _this.animate_effect(index, width, time);
        }
        _this.clear_active = function(index)
        {
            li_data.removeClass("active");
            li_data.eq(index).addClass("active");
        }
        //啟動自動播放
        _this.set_interval_info();
        
        li_data.on( "mouseover", function() {
            clearInterval(auto_obj);
        }).on( "mouseleave", function() {
            _this.set_interval_info();
        });
        ad.find("button").on( "click", function() {
            var type = $(this).data("type");
            var index = _obj.find("li.active").index();
            clearInterval(auto_obj);
            if (type == 'left')
            {
                _this.go_left_animate(index);
            }
            else
            {
                _this.go_right_animate(index);
            }
            _this.set_interval_info();
        });
    };




  
})( jQuery );
</script>
