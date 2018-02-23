class gr.ground.ui.ImageTip
{
    var mc, pic, __get__bgvisible, position, mcl, borderSize, duration, tprops, __set__bgvisible;
    function ImageTip(props)
    {
        this.init(props);
    } // End of the function
    function set bgvisible(b)
    {
        if (b)
        {
            mc.bg_mc._visible = true;
            pic._visible = true;
        }
        else
        {
            mc.bg_mc._visible = false;
            pic._visible = false;
        } // end else if
        //return (this.bgvisible());
        null;
    } // End of the function
    function init(p)
    {
        mc = p.parent.attachMovie(p.id, "mc", p.depth);
        pic = mc.createEmptyMovieClip("pic", 5);
        position = p.position;
        var _loc3 = new Color(mc.bg_mc);
        _loc3.setRGB(p.color);
        _loc3 = new Color(mc.arrow_mc);
        _loc3.setRGB(p.color);
        mc.bg_mc._alpha = p.alpha;
        mc.arrow_mc._alpha = p.alpha;
        mc._visible = false;
        mcl = new MovieClipLoader();
        mcl.addListener(this);
        borderSize = p.borderSize;
        duration = p.duration;
        mc.onEnterFrame = mx.utils.Delegate.create(this, onEveryFrame);
    } // End of the function
    function load(url, target)
    {
        target.w = target.t._width;
        target.h = target.t._height;
        tprops = target;
        pic._alpha = 0;
        gs.TweenLite.killTweensOf(pic);
        this.positionMC();
        this.__set__bgvisible(false);
        mc._visible = true;
        gs.TweenLite.killTweensOf(mc.arrow_mc);
        mc.arrow_mc._alpha = 100;
        var _loc2 = {_alpha: 0};
        switch (position)
        {
            case "left":
            {
                _loc2._x = mc.arrow_mc._x - 4;
                break;
            } 
            case "right":
            {
                _loc2._x = mc.arrow_mc._x + 4;
                break;
            } 
            case "top":
            {
                _loc2._y = mc.arrow_mc._y - 4;
                break;
            } 
            case "bottom":
            {
                _loc2._y = mc.arrow_mc._y + 4;
                break;
            } 
            default:
            {
                break;
            } 
        } // End of switch
        gs.TweenLite.from(mc.arrow_mc, 2.000000E-001, _loc2);
        if (cacheURL != "")
        {
            cacheURL = url;
            return;
        } // end if
        cacheURL = url;
        mcl.loadClip(url, pic);
    } // End of the function
    function unload()
    {
        mc._visible = false;
    } // End of the function
    function positionMC()
    {
        mc.arrow_mc._rotation = 180;
        switch (position)
        {
            case "left":
            {
                mc.arrow_mc._rotation = 90;
                mc._x = tprops.x;
                mc._y = tprops.y + tprops.h / 2;
                break;
            } 
            case "right":
            {
                mc.arrow_mc._rotation = 270;
                mc._x = tprops.x + tprops.w;
                mc._y = tprops.y + tprops.h / 2;
                break;
            } 
            case "top":
            {
                mc.arrow_mc._rotation = 180;
                mc._x = tprops.x + tprops.w / 2;
                mc._y = tprops.y;
                break;
            } 
            case "bottom":
            {
                mc.arrow_mc._rotation = 0;
                mc._x = tprops.x + tprops.w / 2;
                mc._y = tprops.y + tprops.h;
                break;
            } 
            case "center":
            {
                mc.arrow_mc._rotation = 0;
                mc._x = tprops.x + tprops.w / 2;
                mc._y = tprops.y + tprops.h / 2;
                break;
            } 
            case "custom":
            {
                var _loc2 = {_x: mc._x, y: mc._y};
                mc._x = _loc2._x;
                mc._y = _loc2._y;
                break;
            } 
            default:
            {
                break;
            } 
        } // End of switch
        mc.arrow_mc._x = mc.arrow_mc._y = mc.bg_mc._x = mc.bg_mc._y = 0;
        mc._x = Math.round(mc._x);
        mc._y = Math.round(mc._y);
    } // End of the function
    function onLoadError(targ_mc)
    {
        if (cacheURL != "")
        {
            cacheURL = "";
        } // end if
    } // End of the function
    function onLoadInit(targ_mc)
    {
        if (targ_mc._url.indexOf(cacheURL, 0) != -1)
        {
            cacheURL = "";
        } // end if
        if (cacheURL != "")
        {
            this.unload();
            mcl.loadClip(cacheURL, pic);
            return;
        } // end if
        mc.bg_mc._rotation = 0;
        mc.bg_mc._xscale = mc.bg_mc._yscale = 100;
        mc.bg_mc._y = mc.bg_mc._x = 0;
        switch (position)
        {
            case "left":
            {
                mc.bg_mc._height = pic._width + 2 * borderSize;
                mc.bg_mc._width = pic._height + 2 * borderSize;
                mc.bg_mc._rotation = 270;
                pic._x = -pic._width - borderSize;
                pic._y = -pic._height / 2;
                break;
            } 
            case "right":
            {
                mc.bg_mc._height = pic._width + 2 * borderSize;
                mc.bg_mc._width = pic._height + 2 * borderSize;
                mc.bg_mc._rotation = 90;
                pic._x = borderSize;
                pic._y = -pic._height / 2;
                break;
            } 
            case "top":
            {
                mc.bg_mc._width = pic._width + 2 * borderSize;
                mc.bg_mc._height = pic._height + 2 * borderSize;
                pic._x = -pic._width / 2;
                pic._y = -pic._height - borderSize;
                break;
            } 
            case "bottom":
            {
                mc.bg_mc._width = pic._width + 2 * borderSize;
                mc.bg_mc._height = pic._height + 2 * borderSize;
                mc.bg_mc._rotation = 180;
                pic._x = -pic._width / 2;
                pic._y = borderSize;
                break;
            } 
            case "center":
            {
                mc.bg_mc._width = pic._width + 2 * borderSize;
                mc.bg_mc._height = pic._height + 2 * borderSize;
                mc.bg_mc._rotation = 180;
                mc.bg_mc._y = mc.bg_mc._y - mc.bg_mc._height / 2;
                pic._x = -pic._width / 2;
                pic._y = -pic._height / 2;
                break;
            } 
            case "custom":
            {
                var _loc3 = {_x: mc._x, y: mc._y};
                mc._x = _loc3._x;
                mc._y = _loc3._y;
                break;
            } 
            default:
            {
                break;
            } 
        } // End of switch
        gs.TweenLite.killTweensOf(mc.bg_mc);
        var _loc2 = {_xscale: 1, _yscale: 1, onComplete: popOpenComplete, onCompleteParams: [this], overwrite: false};
        if (position == "center")
        {
            _loc2._y = 0;
        } // end if
        gs.TweenLite.from(mc.bg_mc, duration / 1000, _loc2);
        this.__set__bgvisible(true);
        mc._visible = true;
        pic._alpha = 0;
    } // End of the function
    function popOpenComplete(tl)
    {
        gs.TweenLite.killTweensOf(tl.pic);
        gs.TweenLite.to(tl.pic, 3.000000E-001, {_alpha: 100, onComplete: tl.thumbFadeComplete, onCompleteParams: [tl]});
    } // End of the function
    function onEveryFrame()
    {
        if (!tprops.t.hitTest(_xmouse, _ymouse))
        {
            this.unload();
        } // end if
    } // End of the function
    var cacheURL = "";
} // End of Class
