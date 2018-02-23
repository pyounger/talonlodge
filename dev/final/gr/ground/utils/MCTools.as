class gr.ground.utils.MCTools
{
    static var stageCover;
    function MCTools()
    {
    } // End of the function
    static function createStageCover(level)
    {
        if (gr.ground.utils.MCTools.stageCover)
        {
            return;
        } // end if
        stageCover = level.createEmptyMovieClip("$stageCover", level.getNextHighestDepth());
        var w = Stage.width;
        var h = Stage.height;
        with (gr.ground.utils.MCTools.stageCover)
        {
            beginFill(0, 0);
            lineTo(w, 0);
            lineTo(w, h);
            lineTo(0, h);
            lineTo(0, 0);
            endFill();
        } // End of with
        gr.ground.utils.MCTools.stageCover.onRelease = function ()
        {
        };
        gr.ground.utils.MCTools.stageCover.useHandCursor = false;
    } // End of the function
    static function removeStageCover()
    {
        gr.ground.utils.MCTools.remove(gr.ground.utils.MCTools.stageCover);
    } // End of the function
    static function attachHigh(level, mc_id, mc_name)
    {
        var _loc1 = level.getNextHighestDepth();
        return (level.attachMovie(mc_id, mc_name, _loc1));
    } // End of the function
    static function remove(mc)
    {
        var _loc2 = gr.ground.utils.MCTools.getLowestAvailableDepth(mc._root);
        mc.swapDepths(_loc2);
        mc.removeMovieClip();
    } // End of the function
    static function getLowestAvailableDepth(t)
    {
        var _loc2;
        var _loc4 = [];
        for (var _loc5 in t)
        {
            if (typeof(t[_loc5]) == "movieclip")
            {
                _loc2 = t[_loc5].getDepth();
                if (_loc2 > 0)
                {
                    _loc4.push(_loc2);
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
    static function getRootCoordinates(t)
    {
        var _loc1 = {x: t._x, y: t._y};
        t._parent.localToGlobal(_loc1);
        return (_loc1);
    } // End of the function
} // End of Class
