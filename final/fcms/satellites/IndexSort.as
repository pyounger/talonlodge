class fcms.satellites.IndexSort
{
    var sortOrder, prevID, nextID, sortTime, markerPos, markerColor, markerSize, _maxDepth, _mcs, enabled, c, _$intID, ghost_mc, marker, _$intID2, hangProps, dispatchEvent, curOver;
    function IndexSort(pid, nid, srtOrder, srtTime, mps)
    {
        sortOrder = srtOrder;
        prevID = pid;
        nextID = nid;
        sortTime = srtTime;
        if (mps.pos != "off")
        {
            markerPos = mps.pos;
            markerColor = mps.col;
            markerSize = mps.size;
        } // end if
        this.init();
    } // End of the function
    function init()
    {
        mx.events.EventDispatcher.initialize(this);
        _maxDepth = 0;
        _mcs = [];
        enabled = false;
    } // End of the function
    function addMC(mc, id)
    {
        if (mc.getDepth() > _maxDepth)
        {
            _maxDepth = mc.getDepth();
        } // end if
        mc._sortProps = {mc: mc, id: id, sortN: _mcs.push(mc) - 1};
        var tl = this;
        mc.onMouseDown = function ()
        {
            tl.onMouseDown(this);
        };
        mc.onMouseUp = function ()
        {
            clearInterval(tl._$intID);
        };
    } // End of the function
    function onMouseDown(mc)
    {
        if (!enabled)
        {
            return;
        } // end if
        if (mc.hitTest(_root._xmouse, _root._ymouse))
        {
            c = mc._sortProps;
            _$intID = setInterval(this, "enableDrag", sortTime);
        } // end if
    } // End of the function
    function enableDrag()
    {
        clearInterval(_$intID);
        if (!c.mc.hitTest(_root._xmouse, _root._ymouse))
        {
            return;
        } // end if
        c.iniPos = [c.mc._x, c.mc._y];
        var _loc4 = new flash.display.BitmapData(c.mc._width + 8, c.mc._height + 8, true, 0);
        _loc4.draw(c.mc);
        ghost_mc = c.mc._parent.createEmptyMovieClip("ghost_mc", _maxDepth + 2);
        ghost_mc._x = c.mc._x;
        ghost_mc._y = c.mc._y;
        ghost_mc.attachBitmap(_loc4, 1);
        ghost_mc._alpha = 50;
        c.mc._visible = false;
        ghost_mc.startDrag(false);
        var tl = this;
        ghost_mc.onMouseUp = function ()
        {
            stopDrag ();
            tl._$intID2 = setInterval(tl, "removeBBox", 50);
        };
        if (markerSize != undefined)
        {
            if (markerPos == "vertical")
            {
                this.drawMarker(markerSize, c.mc._height);
            }
            else
            {
                this.drawMarker(c.mc._width, markerSize);
            } // end else if
            marker._visible = false;
            ghost_mc.onMouseMove = function ()
            {
                for (var _loc2 in tl._mcs)
                {
                    if (tl._mcs[_loc2] == tl.c.mc)
                    {
                        continue;
                    } // end if
                    if (tl._mcs[_loc2].hitTest(_root._xmouse, _root._ymouse))
                    {
                        if (tl._mcs[_loc2] != tl.curOver)
                        {
                            tl.setMarker(tl._mcs[_loc2]);
                        } // end if
                        return;
                    } // end if
                } // end of for...in
                tl.marker._visible = false;
                tl.curOver = undefined;
            };
        } // end if
    } // End of the function
    function removeBBox()
    {
        clearInterval(this._$intID2);
        var dt = this.ghost_mc._droptarget;
        this.c.mc._x = this.ghost_mc._x;
        this.c.mc._y = this.ghost_mc._y;
        this.c.mc._visible = true;
        this.ghost_mc.onMouseUp = undefined;
        this.ghost_mc.removeMovieClip();
        var tmc = eval(dt);
        var eo = {target: this.c.mc, type: "sort", id: this.c.id, pageChange: false};
        if (tmc._name == "first" || tmc._name == "last")
        {
            eo.position = this.getRightOrder(tmc._name);
            eo.pageChange = true;
        }
        else if (tmc._name == "prev")
        {
            if (isNaN(this.prevID))
            {
                this.moveBack();
                return;
            } // end if
            eo.targetID = this.prevID;
            eo.position = this.getRightOrder("prev");
            eo.pageChange = true;
        }
        else if (tmc._name == "next")
        {
            if (isNaN(this.nextID))
            {
                this.moveBack();
                return;
            } // end if
            eo.targetID = this.nextID;
            eo.position = this.getRightOrder("next");
            eo.pageChange = true;
        }
        else
        {
            var ftarget;
            do
            {
                if (tmc._sortProps != undefined)
                {
                    ftarget = tmc;
                    break;
                } // end if
                tmc = tmc._parent;
            } while (tmc != undefined)
            if (!ftarget)
            {
                this.moveBack();
                return;
            }
            else
            {
                var sign = this.c.sortN > ftarget._sortProps.sortN ? (1) : (-1);
                eo.targetID = ftarget._sortProps.id;
                eo.position = this.getRightOrder(sign == 1 ? ("prev") : ("next"));
                this.hangProps = [this.c.sortN, ftarget._sortProps.sortN, sign];
            } // end else if
        } // end else if
        this.marker.removeMovieClip();
        this.dispatchEvent(eo);
    } // End of the function
    function getRightOrder(s)
    {
        if (sortOrder == "DESC")
        {
            switch (s)
            {
                case "next":
                {
                    s = "prev";
                    break;
                } 
                case "prev":
                {
                    s = "next";
                    break;
                } 
                case "first":
                {
                    s = "last";
                    break;
                } 
                case "last":
                {
                    s = "first";
                    break;
                } 
                default:
                {
                    break;
                } 
            } // End of switch
        } // end if
        return (s);
    } // End of the function
    function execute()
    {
        resort.apply(this, hangProps);
        delete this.hangProps;
    } // End of the function
    function moveBack()
    {
        c.mc._x = c.iniPos[0];
        c.mc._y = c.iniPos[1];
    } // End of the function
    function resort(dragNum, targetNum, sign)
    {
        var _loc6 = _mcs[dragNum];
        var _loc3 = [];
        var _loc14;
        var _loc4;
        var _loc5;
        for (var _loc2 = targetNum; dragNum != _loc2; _loc2 = _loc2 + sign)
        {
            _loc14 = _mcs[_loc2];
            _loc4 = _mcs[_loc2 + sign];
            _loc5 = {mc: _loc14, x: _loc4._x, y: _loc4._y, new_sortNum: _loc4._sortProps.sortN, d: 2.000000E-001};
            if (_loc4 == _loc6)
            {
                _loc5.x = _loc6._sortProps.iniPos[0];
                _loc5.y = _loc6._sortProps.iniPos[1];
            } // end if
            _loc3.push(_loc5);
        } // end of for
        _loc3.push({mc: _loc6, x: _mcs[targetNum]._x, y: _mcs[targetNum]._y, new_sortNum: _mcs[targetNum]._sortProps.sortN, d: 2.000000E-001});
        for (var _loc2 = 0; _loc2 < _loc3.length; ++_loc2)
        {
            gs.TweenLite.to(_loc3[_loc2].mc, _loc3[_loc2].d, {_x: _loc3[_loc2].x, delay: _loc2 / 100});
            gs.TweenLite.to(_loc3[_loc2].mc, _loc3[_loc2].d, {_y: _loc3[_loc2].y, delay: _loc2 / 100, overwrite: false});
            _loc3[_loc2].mc._sortProps.sortN = _loc3[_loc2].new_sortNum;
            _mcs[_loc3[_loc2].new_sortNum] = _loc3[_loc2].mc;
        } // end of for
    } // End of the function
    function setMarker(mc)
    {
        if (markerPos == "vertical")
        {
            if (mc._sortProps.sortN > c.mc._sortProps.sortN)
            {
                marker._x = mc._x + mc._width;
            }
            else
            {
                marker._x = mc._x - marker._width;
            } // end else if
            marker._y = mc._y;
        }
        else
        {
            if (mc._sortProps.sortN > c.mc._sortProps.sortN)
            {
                marker._y = mc._y + mc._height;
            }
            else
            {
                marker._y = mc._y - marker._height;
            } // end else if
            marker._x = mc._x;
        } // end else if
        marker._visible = true;
        curOver = mc;
    } // End of the function
    function drawMarker(wi, he)
    {
        marker = c.mc._parent.createEmptyMovieClip("marker", _maxDepth + 1);
        marker.beginFill(markerColor, 100);
        marker.lineTo(0, he);
        marker.lineTo(wi, he);
        marker.lineTo(wi, 0);
        marker.lineTo(0, 0);
        marker.endFill();
    } // End of the function
} // End of Class
