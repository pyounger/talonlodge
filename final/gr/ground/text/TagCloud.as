class gr.ground.text.TagCloud
{
    var target, style, cbObj, cloudBG, __tags, qdif, __get__tags, __set__tags;
    function TagCloud(tfield, cbo, sty, bgC, bgA)
    {
        target = tfield;
        target.html = true;
        target.wordWrap = true;
        style = sty;
        cbObj = cbo;
        this.createBackground(bgC, bgA);
    } // End of the function
    function createBackground(bgCol, bgAlpha)
    {
        cloudBG = target._parent.createEmptyMovieClip("cloudBG", -300);
        cloudBG._x = target._x;
        cloudBG._y = target._y;
        cloudBG.beginFill(bgCol, bgAlpha);
        cloudBG.lineTo(100, 0);
        cloudBG.lineTo(100, 100);
        cloudBG.lineTo(0, 100);
        cloudBG.lineTo(0, 0);
        cloudBG.endFill();
        cloudBG.swapDepths(target);
    } // End of the function
    function resizeBG()
    {
        target._width = target.textWidth + 2;
        target._height = target.textHeight + 6;
        cloudBG._width = target._width;
        cloudBG._height = target._height;
    } // End of the function
    function set tags(ta)
    {
        if (ta)
        {
            __tags = ta;
        } // end if
        __tags.sortOn("label");
        var _loc5 = 0;
        var _loc4 = 0;
        for (var _loc2 = 0; _loc2 < __tags.length; ++_loc2)
        {
            if (__tags[_loc2].count == undefined)
            {
                __tags[_loc2].count = 0;
            } // end if
            if (!__tags[_loc2])
            {
                continue;
            } // end if
            _loc5 = Math.min(_loc5, __tags[_loc2].count);
            _loc4 = Math.max(_loc4, __tags[_loc2].count);
        } // end of for
        qdif = (_loc4 - _loc5) / sizes.length;
        var _loc6;
        target.text = "";
        var _loc3 = "";
        for (var _loc2 = 0; _loc2 < __tags.length; ++_loc2)
        {
            if (!__tags[_loc2])
            {
                continue;
            } // end if
            _loc6 = sizes[Math.floor((__tags[_loc2].count - 1) / qdif)];
            _loc3 = _loc3 + ("<FONT SIZE=\"" + _loc6 + "\"><A HREF=\"asfunction:" + cbObj + ".onTag," + __tags[_loc2].id + "\">");
            _loc3 = _loc3 + (__tags[_loc2].label + "</A> </FONT>");
        } // end of for
        target.htmlText = _loc3;
        var _loc7 = new TextField.StyleSheet();
        _loc7.setStyle("a:hover", style);
        target.styleSheet = _loc7;
        this.resizeBG();
        //return (this.tags());
        null;
    } // End of the function
    var sizes = [12, 16, 20];
} // End of Class
