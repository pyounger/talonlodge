(function ($) {

    $.fn.mainSlider = function (options)

    {

        var o = $.extend({}, {
            slides: '',
            menu: '',
            links: '',
            interval: 4000,
            restartInterval: 2000,
            subtitleInterval: 500,
            fadeDuration: 400,
            textfadeDuration: 400,
            restart: false,
            autoStart: true,
            startIndex: 0,
            title: '',
            fixedHeight: true,
            titleContent: '',
            subtitle: ''

        }, options);



        var slides = $(o.slides);

        var links = $(o.links);

        var current = o.startIndex;

        var sliderTimeout;

        var sliderTimeout2;

        var slidesK = [];

        var title = $(o.title);

        var titleContent = $(o.titleContent);

        var subtitle = $(o.subtitle);

        var resizeTimeout;



        // hide all slides and show only current

        updateSlides();

        resizeSlider();

        if (slides.length > 1)

        {

            $(window).load(function () {

                setTimeout(function () {

                    $(o.menu).fadeIn();

                    toggleLink(current);

                }, 1000);

                setTimeout(function () {

                    changeSlide(1, true);

                }, o.interval);

            });



            links.click(function (event) {

                event.preventDefault();

                //stop autoplay

                clearTimeout(sliderTimeout);

                index = jQuery.inArray(this, links);

                changeSlide(index, o.restart);

            });

        }



        var fixedHeightBackup = $(window).height() - $('.b-main-menu').height();

        $('.enlarge-link-inner a').click(function () {

            var h = $(window).height() - $('.b-main-menu').height();
            //alert(h);
            if($(window).width()<768){
                h = 512;
            }

            /*
             
             $('.b-gallery-container').animate({ height: h }, 1500, function(){  } );
             
             $('.b-gallery-container img').removeAttr('width');
             
             $('.b-gallery-container img').animate({ height: h, width: 'auto' }, 1500, function(){ 
             
             o.fixedHeight = fixedHeightBackup;
             
             resizeSlider();
             
             $('.b-gallery-container img').attr('height', h);
             
             });
             
             */

            $('.b-gallery-container').css('height', h);

            o.fixedHeight = fixedHeightBackup;

            resizeSlider();

            $(this).fadeOut(200);

            return false;

        });



        $('.enlarge-link-inner a').click(function () {

            setTimeout(function () {
            }, 1500);

            return false;

        });



        function change()

        {

            changeSlide(getNextIndex(), true);

        }



        function changeSlide(index, restart)

        {

            //console.log('index ', index);

            //console.log('current ', current);

            title.removeClass('shadow');

            title.fadeOut(o.fadeDuration, function () {

                toggleLink(index);





                // change title class

                var pv = ['top', 'middle', 'bottom', 'left', 'center', 'right'];

                $(pv).each(function () {

                    var v = this.toString();

                    title.removeClass(v);

                });

                var classes = $(slides[index]).find('img').attr('class');

                classes = classes.split('-');

                $(classes).each(function () {

                    title.addClass(this.toString());

                });

                $(slides[index]).show();

                $(slides[current]).fadeOut(o.fadeDuration, function () {

                    current = index;

                    $(slides[current]).addClass('active');

                    var text = $(slides[current]).find('img').attr('alt');

                    var tdata = text.split('-');

                    if (typeof tdata[1] == "undefined") {
                        tdata[1] = '';
                    }
                    if (typeof tdata[2] == "undefined") {
                        tdata[2] = '';
                    }

                    var newtext = '<span class="span-f">' + tdata[0] + '</span><span class="span-s">' + tdata[1] + '</span><span class="span-t">' + tdata[2] + '</span>';
                    console.log(text);
                    console.log(tdata);
                    /*$.each(tdata,function(ind,value){
                     newtext = '';
                     });*/

                    title.removeClass('even odd').addClass(current % 2 == 0 ? 'even' : 'odd');

                    //titleContent.html(text);

                    titleContent.html(newtext);

                    titlePosition();

                    title.fadeIn(o.fadeDuration, function () {

                        title.addClass('shadow');

                        if (restart)

                        {

                            sliderTimeout = setTimeout(function () {

                                change();

                            }, o.interval);

                        }

                    });

                });

            });

        }



        function updateSlides()

        {

            var zindex = 10;

            $(slides).each(function (index) {

                $(this).css('z-index', zindex);

                zindex--;

                // remember image proportions

                $(this).find('img').load(function () {

                    var imgH = this.height;

                    var imgW = this.width;

                    slidesK.push(imgW / imgH);

                });

            });

        }



        function toggleLink(index)

        {

            links.removeClass('active');

            $(links[index]).addClass('active');

        }



        function getNextIndex()

        {

            /*			if (slides.length == 0)
             
             {
             
             return false;
             
             }
             
             else
             
             {*/

            return current == slides.length - 1 ? 0 : current + 1;

            /*}*/

        }



        function resizeSlider()

        {

            // bh - вы�?ота поло�?ки бронировани�?

            var isPhone = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/);

            var lhH = 0;//$('.b-header-wrapper').outerHeight();

            var bH = $('.b-main-menu').outerHeight();

            var h = $(window).height() - lhH - bH;



            if (isPhone)
                h = screen.availHeight - lhH - bH;

            $('.b-gallery-container ul li').css('position', 'absolute');

            if (isPhone)

            {

                var maxH = 500;

                var minH = 300;

                h = h > maxH ? maxH : h;

                h = h < minH ? minH : h;

            }

            else

            {

                var maxH = 1000;

                h = h > maxH ? maxH : h;

            }



            var mw = 960;

            var p = 2.1;

            var mh = Math.round(mw / p);

            var ww = $(window).width();

            var k = ww / h;



            // resize container

            $('.b-gallery-container').css('height', h);

            var h = $('.b-gallery-container').height();



            if (o.fixedHeight)

            {

                $('.b-gallery-container ul li').css('width', $('.b-gallery-container').width());

                $('.b-gallery-container').css('height', o.fixedHeight);



                var pic_proportion = 0;

                var pic_real_width = 0;

                var pic_real_height = 0;



                $(o.slides).each(function (index) {

                    var pic = $(this).find('img');

                    pic.removeAttr("width");

                    pic.removeAttr("height");

                    var pic_real_width = pic.width();

                    var pic_real_height = pic.height();

                    pic_proportion = pic_real_width > 100 && pic_real_height > 100 ? pic_real_width / pic_real_height : pic_proportion;





                    var pic_current_height = Math.round(ww / pic_proportion);

                    var fixedHeight = parseInt(o.fixedHeight);



                    var pic_width_for_fixed = parseInt(fixedHeight) * pic_proportion;

                    var picHeight = 0;

                    //console.log(pic_width_for_fixed);

                    if (pic_current_height < fixedHeight)

                    {

                        if (pic_width_for_fixed < ww)

                        {

                            //console.log('x one');

                            pic.attr('width', ww);

                            pic.removeAttr('height');

                            //pic.attr('height', 'auto');



                            picHeight = pic_current_height;

                        }

                        else

                        {

                            //console.log('x two');

                            pic.attr('height', fixedHeight);

                            pic.attr('width', pic_width_for_fixed);



                            picHeight = fixedHeight;

                        }

                    }

                    else

                    {

                        if (pic_width_for_fixed > 0 && pic_width_for_fixed < ww)

                        {

                            //console.log('x three');

                            pic.attr('width', ww);

                            pic.removeAttr('height');

                            //pic.attr('height', 'auto');



                            picHeight = pic_current_height;

                        }

                        else

                        {

                            //console.log('x four');

                            pic.attr('height', fixedHeight);

                            pic.attr('width', pic_width_for_fixed);



                            picHeight = fixedHeight;

                        }

                    }



                    // image position

                    var containerH = $('.b-gallery-container').height();

                    var offset = Math.round((picHeight - containerH) / 2);

                    //console.log(offset);

                    if (offset > 0)
                        pic.css({'position': 'relative', 'top': -offset});

                    else
                        pic.css({'position': 'relative', 'top': 0});



                });



            }

            else

            {

                $(o.slides).each(function ()

                {

                    var img = $(this).find('img');

                    var imgWidth = img.width();

                    var nw = 0;

                    var hw = 0;

                    var needPos = false;

                    if (k < p)

                    {

                        if (ww < mw)

                        {

                            //console.log('one');

                            hw = Math.round(mw / p);

                            if (h < hw)

                            {

                                img.attr('width', mw);

                                img.attr('height', hw);

                            }

                            else

                            {

                                nw = Math.round(h * p);

                                img.attr('height', h);

                                img.attr('width', nw);

                            }

                        }

                        else

                        {

                            //console.log('two');

                            nw = Math.round(h * p);

                            img.attr('height', h);

                            img.attr('width', nw);

                            img.css({'left': 0});

                        }

                    }

                    else

                    {

                        if (ww < mw)

                        {



                            //console.log('three');

                            img.attr('width', mw);

                            hw = Math.round(mw / p);

                            img.attr('height', hw);

                            // left offset						

                            var leftOffset = (mw - ww) / 2;

                            if (leftOffset > 0)
                                img.css({'left': -leftOffset});

                            else
                                img.css({'left': 0});

                        }

                        else

                        {

                            //console.log('four');

                            img.attr('width', ww);

                            hw = Math.round(ww / p);

                            img.attr('height', hw);

                            needPos = true;

                            img.css({'left': 0});

                        }

                    }



                    // image position



                    var resultH = img.height();

                    var offset = Math.round((resultH - h) / 2);

                    if (offset > 0 && needPos)
                        img.css({'position': 'relative', 'top': -offset});

                    else
                        img.css({'position': 'relative', 'top': 0});



                    var iw = img.width();

                    //console.log('ih', resultH, 'iw', iw, 'mw', mw, 'ww', ww);

                    if (iw >= ww)

                    {

                        var leftOffset = (iw - ww) / 2;

                        img.css({'left': -leftOffset});

                    }

                    else
                        img.css({'left': 0});

                    /*
                     
                     var iw = img.width();
                     
                     if (iw >= mw && ww <= mw+5)
                     
                     {
                     
                     var leftOffset = (iw - mw)/2;
                     
                     img.css({ 'left': -leftOffset });
                     
                     }
                     
                     else
                     
                     img.css({ 'left': 0 });
                     
                     */



                    titlePosition();

                });

            }



        }



        function titlePosition()

        {

            // title auto position

            h = $('.b-gallery-container').height();



            var hh = $('.title').height();



            var titlePos = Math.round((h - hh) / 2);

            //console.log(titlePos);

            if (title.hasClass('top'))
                titlePos = Math.round(h - 200);

            else if (title.hasClass('bottom'))
                titlePos = Math.round(70);



            //console.log(titlePos);

            $(o.title).css('bottom', titlePos + 30);

            //$(o.title).css('bottom', h/2);

            $(o.subtitle).css('bottom', titlePos);

        }



        $(window).load(function (event) {
            resizeSlider();
        });

        $(window).resize(function (event) {
            resizeSlider();
        });





    }



    $.fn.menuSubmenu = function (options)

    {

        var o = $.extend({}, {
            menu: '',
            submenu: '',
            timeout: 100,
            activeClass: 'active',
            onShow: ''

        }, options);

        var onMenu = false;

        $(o.menu).bind('mouseenter', function () {

            onMenu = true;

            if (jQuery.isFunction(o.onShow))

            {

                //o.onShow.call(this); -- wtf???

                var el = this;

                var left = $(el).position().left + $('#b-gallery').position().left;

                var text = $(el).find('img').attr('alt');

                if (text.length > 0)

                {

                    $(o.submenu).find('p').html(text);

                    $(o.submenu).css({top: 73, left: left + 50}).show();

                }

            }

            else

            {

                showSubmenu($(this).attr('rel'));

            }

            $(this).addClass(o.activeClass);

        });

        $(o.submenu).bind('mouseenter', function () {
            onMenu = true;
        });

        $(o.menu + ', ' + o.submenu).bind('mouseleave', function () {

            onMenu = false;

            setTimeout(function () {

                if (!onMenu)
                    hideSubmenu();

            }, o.timeout);

        });

        function showSubmenu(className)

        {

            hideSubmenu();

            $('.' + className).show();

        }

        function hideSubmenu()

        {

            $(o.submenu).hide();

            $(o.menu).removeClass(o.activeClass);

        }

    };



})(jQuery);