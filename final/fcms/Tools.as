class fcms.Tools
{
    function Tools()
    {
    } // End of the function
    static function addTag(str, tagName, atrs)
    {
        var _loc2 = "<" + tagName + " ";
        for (var _loc3 in atrs)
        {
            _loc2 = _loc2 + (_loc3 + "=\"" + atrs[_loc3] + "\"");
        } // end of for...in
        _loc2 = _loc2 + (">" + str + "</" + tagName + ">");
        return (_loc2);
    } // End of the function
    static function trim(str, side, returnObj)
    {
        var _loc1;
        var _loc5;
        var _loc4;
        var _loc3 = str;
        _loc4 = "";
        _loc5 = "";
        if (side != "right")
        {
            for (var _loc2 = 0; _loc2 < str.length; ++_loc2)
            {
                _loc1 = str.charAt(_loc2);
                if (_loc1 == " " || _loc1 == "\n" || _loc1 == "\r")
                {
                    _loc3 = str.substr(_loc2 + 1);
                    _loc5 = _loc5 + _loc1;
                    continue;
                } // end if
                break;
            } // end of for
        } // end if
        str = _loc3;
        if (side != "left")
        {
            for (var _loc2 = str.length - 1; _loc2 >= 0; --_loc2)
            {
                _loc1 = str.charAt(_loc2);
                if (_loc1 == " " || _loc1 == "\n" || _loc1 == "\r")
                {
                    _loc3 = str.substring(0, _loc2);
                    _loc4 = _loc4 + _loc1;
                    continue;
                } // end if
                break;
            } // end of for
        } // end if
        if (returnObj)
        {
            return ({str: _loc3, left: _loc5, right: _loc4});
        }
        else
        {
            return (_loc3);
        } // end else if
    } // End of the function
    static function truncate(str, cNo, ending, link)
    {
        if (str == undefined)
        {
            return ("");
        } // end if
        if (cNo == undefined)
        {
            cNo = 80;
        } // end if
        if (ending == undefined)
        {
            ending = "";
        }
        else if (link != false)
        {
            var _loc9 = fcms.Tools.trim(ending, "left", true);
            var _loc7 = {};
            _loc7.HREF = link.href == undefined ? (fcms.satellites.Core.evObj.link) : (link.href);
            if (link.target != undefined)
            {
                _loc7.TARGET = link.target;
            } // end if
            ending = _loc9.left + fcms.Tools.addTag(_loc9.str, "A", _loc7);
            var _loc10 = link.color == undefined ? ("#0000FF") : (link.color);
            ending = fcms.Tools.addTag(ending, "FONT", {COLOR: _loc10});
        } // end else if
        if (str.length < cNo)
        {
            return (str + ending);
        } // end if
        var _loc3 = str.split(" ");
        var _loc2 = "";
        for (var _loc1 = 0; _loc1 < _loc3.length; ++_loc1)
        {
            if (_loc2.length + _loc3[_loc1].length + 1 < cNo)
            {
                if (_loc1 != 0)
                {
                    _loc2 = _loc2 + " ";
                } // end if
                _loc2 = _loc2 + _loc3[_loc1];
                continue;
            } // end if
            return (_loc2 + ending);
        } // end of for
    } // End of the function
    static function capitalize(str)
    {
        var _loc2 = str.split(" ");
        for (var _loc1 = 0; _loc1 < _loc2.length; ++_loc1)
        {
            _loc2[_loc1] = _loc2[_loc1].charAt(0).toUpperCase() + _loc2[_loc1].substr(1);
        } // end of for
        return (_loc2.join(" "));
    } // End of the function
    static function highlight(tf, word, tfor)
    {
        var _loc4 = tf.text;
        var _loc2;
        for (var _loc1 = _loc4.indexOf(word, 0); _loc1 != -1; _loc1 = _loc4.indexOf(word, _loc2))
        {
            _loc2 = _loc1 + word.length;
            tf.setTextFormat(_loc1, _loc2, tfor);
        } // end of for
    } // End of the function
    static function setHover(tf, style)
    {
        if (_global._fCMS.master.editMode)
        {
            return;
        } // end if
        var _loc2 = new TextField.StyleSheet();
        if (style == undefined)
        {
            style = {};
            style.textDecoration = "underline";
        } // end if
        _loc2.setStyle("a:hover", style);
        tf.styleSheet = _loc2;
    } // End of the function
    static function formatNumber(n, decimalDelimiter, delimiter1000)
    {
        if (n == undefined)
        {
            return ("");
        } // end if
        var _loc2 = "";
        if (decimalDelimiter == undefined)
        {
            decimalDelimiter = ".";
        } // end if
        if (delimiter1000 == undefined)
        {
            delimiter1000 = ",";
        } // end if
        var _loc4 = n < 0 ? ("-") : ("");
        var _loc1 = Math.abs(n);
        if (_loc1.toString().indexOf(".") != -1)
        {
            _loc2 = decimalDelimiter + _loc1.toString().split(".")[1];
        } // end if
        for (var _loc1 = Math.floor(_loc1); _loc1 != _loc1 % 1000; _loc1 = Math.floor(_loc1 / 1000))
        {
            _loc2 = delimiter1000 + _loc1.toString().substr(-3) + _loc2;
        } // end of for
        _loc2 = _loc1.toString().substr(-3) + _loc2;
        return (_loc4 + _loc2);
    } // End of the function
    static function formatDate(dte, f, addZero)
    {
        var _loc4 = "";
        var _loc1 = 0;
        var _loc2;
        var _loc5;
        while (_loc1 < f.length)
        {
            _loc2 = f.charAt(_loc1);
            if (_loc2 == "%")
            {
                _loc5 = f.charAt(_loc1 + 1);
                _loc4 = _loc4 + fcms.Tools.getDateValue(dte, _loc5, addZero, fcms.Tools.dayNames, fcms.Tools.monthNames);
                _loc1 = _loc1 + 2;
                continue;
            } // end if
            _loc4 = _loc4 + _loc2;
            ++_loc1;
        } // end while
        return (_loc4);
    } // End of the function
    static function getDateValue(dte, c, addZero, days, months)
    {
        var _loc1;
        switch (c)
        {
            case "A":
            {
                _loc1 = days[dte.getDay()];
                break;
            } 
            case "B":
            {
                _loc1 = months[dte.getMonth()];
                break;
            } 
            case "m":
            {
                _loc1 = dte.getMonth() + 1;
                break;
            } 
            case "d":
            {
                _loc1 = dte.getDate();
                break;
            } 
            case "Y":
            {
                _loc1 = dte.getFullYear();
                break;
            } 
            case "H":
            {
                _loc1 = dte.getHours();
                break;
            } 
            case "M":
            {
                _loc1 = dte.getMinutes();
                break;
            } 
            case "S":
            {
                _loc1 = dte.getSeconds();
                break;
            } 
            default:
            {
                return ("");
                break;
            } 
        } // End of switch
        _loc1 = _loc1.toString();
        if (addZero && _loc1.length == 1)
        {
            _loc1 = "0" + _loc1;
        } // end if
        return (_loc1);
    } // End of the function
    static function getDateFromString(s)
    {
        var _loc4 = s.split(" ");
        var _loc1 = _loc4[0].split("/");
        var _loc2 = _loc4[1].split(":");
        for (var _loc3 in _loc1)
        {
            _loc1[_loc3] = parseInt(_loc1[_loc3]);
        } // end of for...in
        for (var _loc3 in _loc2)
        {
            _loc2[_loc3] = parseInt(_loc2[_loc3]);
        } // end of for...in
        return (new Date(_loc1[0], _loc1[1] - 1, _loc1[2], _loc2[0], _loc2[1], _loc2[2]));
    } // End of the function
    static function tween(mc, tob, col)
    {
        var _loc3 = {};
        mc[tob.prop] = tob.init;
        if (col != undefined)
        {
            var _loc2 = mc.createEmptyMovieClip("col_mc", 8878);
            _loc2.beginFill(col);
            _loc2.lineTo(0, mc._height);
            _loc2.lineTo(mc._width, mc._height);
            _loc2.lineTo(mc._width, 0);
            _loc2.lineTo(0, 0);
            _loc2.endFill();
        } // end if
        if (tob.prop == "_y")
        {
            mc.endy = tob.end;
        } // end if
        _loc3.onTweenUpdate = function (v)
        {
            mc[tob.prop] = v;
        };
        _loc3.onTweenEnd = function (v)
        {
            mc[tob.prop] = tob.end;
            mc.col_mc.removeMovieClip();
            delete mc.endy;
            false;
        };
        var _loc4 = new mx.effects.Tween(_loc3, tob.init, tob.end, tob.duration);
        if (tob.easing != undefined)
        {
            _loc4.easingEquation = tob.easing;
        } // end if
        return (_loc3);
    } // End of the function
    static function pushLetters(tf, str, dur, easing)
    {
        var _loc2 = {};
        var _loc4 = str.length;
        _loc2.onTweenUpdate = function (v)
        {
            tf.text = str.substr(Math.floor(v));
        };
        _loc2.onTweenEnd = function (v)
        {
            tf.text = str;
            false;
        };
        var _loc3 = new mx.effects.Tween(_loc2, str.length - 1, 0, dur);
        if (easing != undefined)
        {
            _loc3.easingEquation = easing;
        } // end if
        return (_loc2);
    } // End of the function
    static function getThumb(url, thumbSize)
    {
        if (thumbSize == undefined)
        {
            thumbSize = 1;
        } // end if
        var _loc3 = url.split("/");
        var _loc2 = _loc3.pop().split(".");
        var _loc1 = _loc2.pop().toString();
        _loc1 = _loc2.join(".") + "_" + thumbSize + "." + _loc1;
        url = _loc3.join("/") + "/thumbs/" + _loc1;
        return (url);
    } // End of the function
    static function parsePath(s)
    {
        var _loc1 = {};
        _loc1.dirs = s.split("/");
        _loc1.root = false;
        _loc1.prev = 0;
        _loc1.dirpre = "";
        _loc1.file = _loc1.dirs.pop();
        switch (_loc1.dirs[0])
        {
            case "http:":
            {
                _loc1.domain = _loc1.dirs[2];
                _loc1.dirs.splice(0, 3);
                _loc1.dirpre = "http://" + _loc1.domain + "/";
                break;
            } 
            case "":
            {
                _loc1.dirs.splice(0, 1);
                _loc1.root = true;
                _loc1.dirpre = "/";
                break;
            } 
            case "..":
            {
                var _loc3 = fcms.Tools.parsePath(s.substr(3));
                _loc1.dirs = _loc3.dirs;
                _loc1.prev = _loc3.prev + 1;
                for (var _loc2 = 0; _loc2 < _loc1.prev; ++_loc2)
                {
                    _loc1.dirpre = _loc1.dirpre + "../";
                } // end of for
                break;
            } 
            case ".":
            {
                _loc1.dirs = fcms.Tools.parsePath(s.substr(2)).dirs;
                break;
            } 
            default:
            {
                break;
            } 
        } // End of switch
        return (_loc1);
    } // End of the function
    static function joinPaths(path1, path2)
    {
        var _loc3 = fcms.Tools.parsePath(path1);
        var _loc2 = fcms.Tools.parsePath(path2);
        var _loc1 = _loc3.dirpre;
        var _loc4 = _loc3.dirs.slice(0, _loc3.dirs.length - _loc2.prev);
        _loc1 = _loc1 + _loc4.join("/");
        if (_loc1 != "")
        {
            _loc1 = _loc1 + "/";
        } // end if
        if (_loc3.file != "")
        {
            _loc1 = _loc1 + _loc3.file;
        } // end if
        if (_loc2.prev == 0)
        {
            _loc1 = _loc1 + _loc2.dirpre;
        } // end if
        _loc1 = _loc1 + _loc2.dirs.join("/");
        if (_loc1 != "")
        {
            _loc1 = _loc1 + "/";
        } // end if
        if (_loc2.file != "")
        {
            _loc1 = _loc1 + _loc2.file;
        } // end if
        return (_loc1);
    } // End of the function
    static var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    static var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
} // End of Class
