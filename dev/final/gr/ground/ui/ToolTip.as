class gr.ground.ui.ToolTip
{
    static var intID, __get__offset, _instance, tt, textFieldProps, textFormatProps, __set__offset;
    function ToolTip(tl, txt, parent)
    {
        clearInterval(gr.ground.ui.ToolTip.intID);
        intID = setInterval(this, "draw", gr.ground.ui.ToolTip.delay, tl, txt, parent);
    } // End of the function
    static function set offset(ofs)
    {
        xOffset = ofs[0];
        yOffset = ofs[1];
        //return (gr.ground.ui.ToolTip.offset());
        null;
    } // End of the function
    static function create(tl, txt, parent)
    {
        if (gr.ground.ui.ToolTip._instance == undefined)
        {
            _instance = new gr.ground.ui.ToolTip(tl, txt, parent);
        } // end if
    } // End of the function
    static function remove()
    {
        var _loc1 = gr.ground.ui.ToolTip.getLowestAvailableDepth(gr.ground.ui.ToolTip.tt._parent);
        gr.ground.ui.ToolTip.tt.swapDepths(_loc1);
        removeMovieClip (gr.ground.ui.ToolTip.tt);
        delete gr.ground.ui.ToolTip.tt;
        clearInterval(gr.ground.ui.ToolTip.intID);
        gs.TweenLite.killTweensOf(gr.ground.ui.ToolTip.tt);
        delete gr.ground.ui.ToolTip._instance;
    } // End of the function
    function draw(tl, txt, parent)
    {
        if (parent)
        {
            tt = parent.createEmptyMovieClip("$_ToolTip", parent.getNextHighestDepth());
        }
        else
        {
            tt = tl.createEmptyMovieClip("$_ToolTip", tl.getNextHighestDepth());
        } // end else if
        gr.ground.ui.ToolTip.tt._visible = false;
        gr.ground.ui.ToolTip.tt.createTextField("tf", 3, gr.ground.ui.ToolTip.margins[3] + 2, gr.ground.ui.ToolTip.margins[0] + 1, 1, 1);
        gr.ground.ui.ToolTip.tt.tf.html = true;
        gr.ground.ui.ToolTip.tt.tf.multiline = true;
        gr.ground.ui.ToolTip.tt.tf.selectable = false;
        this.copyProps(gr.ground.ui.ToolTip.tt.tf, gr.ground.ui.ToolTip.textFieldProps);
        var _loc4 = new TextFormat();
        _loc4.align = "center";
        _loc4.font = "_sans";
        _loc4.size = 10;
        this.copyProps(_loc4, gr.ground.ui.ToolTip.textFormatProps);
        gr.ground.ui.ToolTip.tt.tf.htmlText = txt;
        gr.ground.ui.ToolTip.tt.tf.setTextFormat(_loc4);
        gr.ground.ui.ToolTip.tt.tf._width = gr.ground.ui.ToolTip.tt.tf.textWidth + 4;
        gr.ground.ui.ToolTip.tt.tf._height = gr.ground.ui.ToolTip.tt.tf.textHeight + 4;
        var _loc6 = gr.ground.ui.ToolTip.tt.tf._width + gr.ground.ui.ToolTip.margins[1] + 2;
        var _loc5 = gr.ground.ui.ToolTip.tt.tf._height + gr.ground.ui.ToolTip.margins[2] + 2;
        var _loc3 = gr.ground.ui.ToolTip.tt.createEmptyMovieClip("bg", 2);
        _loc3.beginFill(gr.ground.ui.ToolTip.bodyColor);
        _loc3.lineStyle(1, gr.ground.ui.ToolTip.borderColor, 100);
        _loc3.lineTo(_loc6, 0);
        _loc3.lineTo(_loc6, _loc5);
        _loc3.lineTo(0, _loc5);
        _loc3.lineTo(0, 0);
        _loc3.endFill();
        if (gr.ground.ui.ToolTip.shadowOffset != 0)
        {
            _loc6 = _loc6 + gr.ground.ui.ToolTip.shadowOffset;
            _loc5 = _loc5 + gr.ground.ui.ToolTip.shadowOffset;
            var _loc2 = gr.ground.ui.ToolTip.tt.createEmptyMovieClip("bg_shdw", 1);
            _loc2.beginFill(gr.ground.ui.ToolTip.shadowColor, gr.ground.ui.ToolTip.shadowAlpha);
            _loc2.moveTo(gr.ground.ui.ToolTip.shadowOffset, gr.ground.ui.ToolTip.shadowOffset);
            _loc2.lineTo(_loc6, gr.ground.ui.ToolTip.shadowOffset);
            _loc2.lineTo(_loc6, _loc5);
            _loc2.lineTo(gr.ground.ui.ToolTip.shadowOffset, _loc5);
            _loc2.lineTo(gr.ground.ui.ToolTip.shadowOffset, gr.ground.ui.ToolTip.shadowOffset);
            _loc2.endFill();
        } // end if
        this.setPosition(tl, parent);
        if (gr.ground.ui.ToolTip.fadeDuration != 0)
        {
            gs.TweenLite.from(gr.ground.ui.ToolTip.tt, gr.ground.ui.ToolTip.fadeDuration / 1000, {_alpha: 0});
        } // end if
        gr.ground.ui.ToolTip.tt._visible = true;
        clearInterval(gr.ground.ui.ToolTip.intID);
        intID = setInterval(gr.ground.ui.ToolTip.remove, gr.ground.ui.ToolTip.duration);
    } // End of the function
    function setPosition(tl, parent)
    {
        if (parent)
        {
            gr.ground.ui.ToolTip.tt._x = parent._xmouse + gr.ground.ui.ToolTip.xOffset;
            gr.ground.ui.ToolTip.tt._y = parent._ymouse + gr.ground.ui.ToolTip.yOffset;
        }
        else
        {
            gr.ground.ui.ToolTip.tt._x = tl._xmouse + gr.ground.ui.ToolTip.xOffset;
            gr.ground.ui.ToolTip.tt._y = tl._ymouse + gr.ground.ui.ToolTip.yOffset;
        } // end else if
        var _loc1 = gr.ground.ui.ToolTip.tt.getBounds(_level0);
        if (_loc1.xMax > Stage.width)
        {
            gr.ground.ui.ToolTip.tt._x = gr.ground.ui.ToolTip.tt._x - (_loc1.xMax - Stage.width);
        } // end if
        if (_loc1.xMin < 0)
        {
            gr.ground.ui.ToolTip.tt._x = 0;
        } // end if
        if (_loc1.yMax > Stage.height)
        {
            gr.ground.ui.ToolTip.tt._y = gr.ground.ui.ToolTip.tt._y - (_loc1.yMax - Stage.height);
        } // end if
        if (_loc1.yMin < 0)
        {
            gr.ground.ui.ToolTip.tt._y = 0;
        } // end if
    } // End of the function
    function copyProps(dstObj, srcObj)
    {
        for (var _loc3 in srcObj)
        {
            dstObj[_loc3] = srcObj[_loc3];
        } // end of for...in
    } // End of the function
    static function getLowestAvailableDepth(t)
    {
        var _loc2;
        var _loc3;
        var _loc4 = [];
        for (var _loc1 in t)
        {
            _loc2 = t[_loc1];
            if (typeof(_loc2) == "movieclip")
            {
                _loc3 = _loc2.getDepth();
                if (_loc3 > 0)
                {
                    _loc4.push(_loc3);
                } // end if
            } // end if
        } // end of for...in
        if (_loc4.length == 1)
        {
            return (_loc4[0]);
        } // end if
        _loc4.sort();
        for (var _loc1 = 1; _loc1 == _loc4[_loc1 - 1]; ++_loc1)
        {
        } // end of for
        return (_loc1);
    } // End of the function
    static var borderColor = 6710886;
    static var bodyColor = 16777164;
    static var delay = 500;
    static var duration = 2000;
    static var fadeDuration = 0;
    static var margins = [0, 0, 0, 0];
    static var shadowColor = 10066329;
    static var shadowAlpha = 70;
    static var shadowOffset = 2;
    static var xOffset = 0;
    static var yOffset = 20;
} // End of Class
