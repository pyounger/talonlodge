class gr.ground.utils.ObjectTools
{
    function ObjectTools()
    {
    } // End of the function
    static function compare(o1, o2)
    {
        return (gr.ground.utils.ObjectTools.isEmpty(gr.ground.utils.ObjectTools.getDif(o1, o2)));
    } // End of the function
    static function differ(o1, o2)
    {
        if (gr.ground.utils.ObjectTools.isEmpty(o1))
        {
            if (gr.ground.utils.ObjectTools.isEmpty(o2))
            {
                return (false);
            } // end if
            return (true);
        }
        else if (gr.ground.utils.ObjectTools.isEmpty(o2))
        {
            return (true);
        } // end else if
        for (var _loc3 in o1)
        {
            if (typeof(o1[_loc3]) == "object")
            {
                if (o1[_loc3] instanceof XMLNode && o1[_loc3].toString() == o2[_loc3].toString())
                {
                    continue;
                } // end if
                if (gr.ground.utils.ObjectTools.differ(o1[_loc3], o2[_loc3]))
                {
                    return (true);
                } // end if
                continue;
                continue;
            } // end if
            if (o1[_loc3] === o2[_loc3])
            {
                continue;
                continue;
            } // end if
            return (true);
        } // end of for...in
    } // End of the function
    static function getDif(o1, o2)
    {
        if (gr.ground.utils.ObjectTools.isEmpty(o1))
        {
            if (gr.ground.utils.ObjectTools.isEmpty(o2))
            {
                return (null);
            } // end if
            return (o2);
        }
        else if (gr.ground.utils.ObjectTools.isEmpty(o2))
        {
            return (o1);
        } // end else if
        var _loc4 = new Function(o1.__proto__.constructor)();
        if (_loc4 == undefined)
        {
            _loc4 = {};
        } // end if
        var _loc5 = false;
        var _loc6 = gr.ground.utils.ObjectTools.copy(o2);
        for (var _loc7 in o1)
        {
            delete _loc6[_loc7];
            if (typeof(o1[_loc7]) == "object")
            {
                if (o1[_loc7] instanceof XMLNode && o1[_loc7].toString() == o2[_loc7].toString())
                {
                    continue;
                } // end if
                var _loc2 = gr.ground.utils.ObjectTools.getDif(o1[_loc7], o2[_loc7]);
                if (!gr.ground.utils.ObjectTools.isEmpty(_loc2))
                {
                    _loc4[_loc7] = _loc2;
                    _loc5 = true;
                    continue;
                } // end if
                continue;
            } // end if
            if (o1[_loc7] === o2[_loc7])
            {
                continue;
                continue;
            } // end if
            _loc4[_loc7] = o1[_loc7];
            _loc5 = true;
        } // end of for...in
        if (!gr.ground.utils.ObjectTools.isEmpty(_loc6))
        {
            gr.ground.utils.ObjectTools.copyProperties(_loc4, _loc6);
            _loc5 = true;
        } // end if
        if (_loc5)
        {
            return (_loc4);
        }
        else
        {
            return (null);
        } // end else if
    } // End of the function
    static function copy(refObj)
    {
        var _loc2 = typeof(refObj);
        if (_loc2 == "string" || _loc2 == "number" || _loc2 == "boolean")
        {
            return (refObj);
        } // end if
        var _loc1 = new Function(refObj.__proto__.constructor)();
        if (_loc1 == undefined)
        {
            _loc1 = {};
        } // end if
        gr.ground.utils.ObjectTools.copyProperties(_loc1, refObj);
        return (_loc1);
    } // End of the function
    static function copyProperties(dstObj, srcObj)
    {
        var _loc6;
        for (var _loc7 in srcObj)
        {
            _loc6 = typeof(srcObj[_loc7]);
            if (_loc6 != "function")
            {
                if (_loc6 == "object")
                {
                    if (srcObj[_loc7] instanceof Array)
                    {
                        var _loc5 = new Array();
                        var _loc4 = srcObj[_loc7];
                        for (var _loc2 = 0; _loc2 < _loc4.length; ++_loc2)
                        {
                            _loc5[_loc2] = gr.ground.utils.ObjectTools.copy(_loc4[_loc2]);
                        } // end of for
                        dstObj[_loc7] = _loc5;
                    }
                    else if (srcObj[_loc7] instanceof String)
                    {
                        dstObj[_loc7] = new String(srcObj[_loc7]);
                    }
                    else if (srcObj[_loc7] instanceof Number)
                    {
                        dstObj[_loc7] = new Number(srcObj[_loc7]);
                    }
                    else if (srcObj[_loc7] instanceof Boolean)
                    {
                        dstObj[_loc7] = new Boolean(srcObj[_loc7]);
                    }
                    else if (srcObj[_loc7] instanceof XMLNode)
                    {
                        dstObj[_loc7] = srcObj[_loc7].cloneNode(true);
                        srcObj[_loc7] = srcObj[_loc7].cloneNode(true);
                    }
                    else if (srcObj[_loc7] instanceof XML)
                    {
                        dstObj[_loc7] = new XML(srcObj[_loc7].toString());
                    }
                    else
                    {
                        dstObj[_loc7] = gr.ground.utils.ObjectTools.copy(srcObj[_loc7]);
                    } // end else if
                    continue;
                } // end if
                dstObj[_loc7] = srcObj[_loc7];
            } // end if
        } // end of for...in
    } // End of the function
    static function isEmpty(o)
    {
        for (var _loc2 in o)
        {
            return (false);
        } // end of for...in
        return (true);
    } // End of the function
} // End of Class
