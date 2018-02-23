class gs.TweenLite
{
    var __get__act, _dl, _ti, _tg, _v, _twa, _snd, _d, _color, _colorParts, _ts, _dead, _oc, _oca, _act, _os, _osa, __get__volumeProxy, __get__colorProxy, __set__colorProxy, __set__volumeProxy;
    static var _e, __get__all;
    function TweenLite(t, d, v, dl, oc, oca, ao)
    {
        var _loc3 = this;
        var _loc5 = false;
        if (v.overwrite != false && ao != false && t != undefined)
        {
            var _loc4 = gs.TweenLite._all.slice();
            for (var _loc2 = _loc4.length - 1; _loc2 >= 0; --_loc2)
            {
                if (_loc4[_loc2]._etg == t && !_loc4[_loc2]._dead)
                {
                    if (!_loc5)
                    {
                        this = _loc4[_loc2];
                        _loc3 = _loc4[_loc2];
                        _loc5 = true;
                        continue;
                    } // end if
                    gs.TweenLite.removeTween(_loc4[_loc2]);
                } // end if
            } // end of for
        } // end if
        _loc3._v = v;
        _loc3._d = d;
        _loc3._dl = v.delay || dl || 0;
        if (d == 0)
        {
            _loc3._d = 1.000000E-003;
            if (_loc3._dl == 0)
            {
                _loc3._v.runBackwards = true;
            } // end if
        } // end if
        _loc3._dead = false;
        _loc3._tg = _loc3._etg = t;
        _loc3._oc = v.onComplete || oc;
        _loc3._oca = v.onCompleteParams || oca;
        _loc3._os = v.onStart;
        _loc3._osa = v.onStartParams;
        if (_loc3._v.ease == undefined)
        {
            _loc3._v.ease = gs.TweenLite.easeOut;
        }
        else if (typeof(_loc3._v.ease) != "function")
        {
            trace ("ERROR: You cannot use \'" + _loc3._v.ease + "\' for the TweenLite ease property. Only functions are accepted.");
        } // end else if
        if (!isNaN(_loc3._v.autoAlpha) && _loc3._v.autoAlpha != undefined)
        {
            _loc3._v._alpha = _loc3._v.autoAlpha;
        }
        else if (!isNaN(_loc3._v._autoAlpha) && _loc3._v._autoAlpha != undefined)
        {
            _loc3._v._alpha = _loc3._v.autoAlpha = _loc3._v._autoAlpha;
        } // end else if
        _loc3._twa = [];
        _loc3._ti = getTimer();
        if (_loc3._v.runBackwards == true)
        {
            _loc3.initTweenVals();
        } // end if
        _loc3._act = false;
        var _loc9 = this.__get__act();
        if (d == 0 && _loc3._dl == 0)
        {
            _loc3._dead = true;
            if (!isNaN(v.autoAlpha) && _loc3._tg._alpha == 0)
            {
                _loc3._tg._visible = false;
            } // end if
            if (_loc3._oc)
            {
                _loc3._oc.apply(null, _loc3._oca);
            } // end if
            gs.TweenLite.removeTween(_loc3);
        }
        else if (!_loc5)
        {
            gs.TweenLite._all.push(_loc3);
            if (gs.TweenLite._e._visible != false)
            {
                gs.TweenLite.initEmptyMC();
            } // end if
            gs.TweenLite._e.onEnterFrame = gs.TweenLite.executeAll;
        } // end else if
    } // End of the function
    function initTweenVals()
    {
        var _loc5 = _dl - (getTimer() - _ti) / 1000;
        if (_tg instanceof Array)
        {
            var _loc7 = [];
            for (var _loc28 in _v)
            {
                if (_v[_loc28] instanceof Array)
                {
                    _loc7 = _v[_loc28];
                    break;
                } // end if
            } // end of for...in
            var _loc27 = _loc7.length;
            for (var _loc3 = 0; _loc3 < _loc27; ++_loc3)
            {
                if (_tg[_loc3] != _loc7[_loc3] && _tg[_loc3] != undefined)
                {
                    _twa.push({o: _tg, p: _loc3.toString(), s: _tg[_loc3], c: _loc7[_loc3] - _tg[_loc3], e: _v.ease});
                } // end if
            } // end of for
        }
        else
        {
            for (var _loc28 in _v)
            {
                if (_loc28 == "volume" && typeof(_tg) == "movieclip")
                {
                    _snd = new Sound(_tg);
                    var _loc8 = new gs.TweenLite(this, _d, {volumeProxy: _v[_loc28], ease: gs.TweenLite.easeNone, delay: _loc5, overwrite: false, runBackwards: _v.runBackwards});
                    _loc8._etg = _tg;
                    continue;
                } // end if
                if (_loc28.toLowerCase() == "mccolor" && typeof(_tg) == "movieclip")
                {
                    _color = new Color(_tg);
                    _colorParts = _color.getTransform();
                    var _loc13 = _colorParts;
                    var _loc6;
                    var _loc4;
                    if (_v[_loc28] == null || _v[_loc28] == "")
                    {
                        _loc4 = _v._alpha || _tg._alpha;
                        _loc6 = {rb: 0, gb: 0, bb: 0, ra: _loc4, ga: _loc4, ba: _loc4, ease: _v.ease, delay: _loc5, overwrite: false, runBackwards: _v.runBackwards};
                    }
                    else
                    {
                        _loc6 = {rb: _v[_loc28] >> 16, gb: _v[_loc28] >> 8 & 255, bb: _v[_loc28] & 255, ra: 0, ga: 0, ba: 0, ease: _v.ease, delay: _loc5, overwrite: false, runBackwards: _v.runBackwards};
                    } // end else if
                    var _loc9 = new gs.TweenLite(_loc13, _d, _loc6);
                    var _loc10 = new gs.TweenLite(this, _d, {colorProxy: 1, delay: _loc5, overwrite: false, runBackwards: _v.runBackwards});
                    _loc9._etg = _loc10._etg = _tg;
                    continue;
                } // end if
                if (!isNaN(_v[_loc28]) && _loc28 != "delay" && _loc28 != "overwrite" && _loc28 != "runBackwards" && _loc28 != "autoAlpha" && _loc28 != "_autoAlpha")
                {
                    _twa.push({o: _tg, p: _loc28, s: _tg[_loc28], c: _v[_loc28] - _tg[_loc28], e: _v.ease});
                } // end if
            } // end of for...in
        } // end else if
        if (_v.runBackwards == true)
        {
            var _loc2;
            for (var _loc3 = 0; _loc3 < _twa.length; ++_loc3)
            {
                _loc2 = _twa[_loc3];
                _loc2.s = _loc2.s + _loc2.c;
                _loc2.c = _loc2.c * -1;
                _loc2.o[_loc2.p] = _loc2.e(0, _loc2.s, _loc2.c, _d);
            } // end of for
        } // end if
        if (!isNaN(_v.autoAlpha) && _v.autoAlpha != undefined)
        {
            if (_v.runBackwards == true && _tg._alpha == 0)
            {
                _tg._visible = false;
            }
            else
            {
                _tg._visible = true;
            } // end if
        } // end else if
    } // End of the function
    static function to(t, d, v, dl, oc, oca, ao)
    {
        return (new gs.TweenLite(t, d, v, dl, oc, oca, ao));
    } // End of the function
    static function from(t, d, v, dl, oc, oca, ao)
    {
        v.runBackwards = true;
        return (new gs.TweenLite(t, d, v, dl, oc, oca, ao));
    } // End of the function
    static function delayedCall(dl, oc, oca)
    {
        return (new gs.TweenLite(null, null, null, dl, oc, oca));
    } // End of the function
    function render()
    {
        var _loc4 = (getTimer() - _ts) / 1000;
        if (_loc4 > _d)
        {
            _loc4 = _d;
        } // end if
        var _loc2;
        var _loc3;
        for (var _loc3 = 0; _loc3 < _twa.length; ++_loc3)
        {
            _loc2 = _twa[_loc3];
            _loc2.o[_loc2.p] = _loc2.e(_loc4, _loc2.s, _loc2.c, _d);
        } // end of for
        if (_loc4 >= _d)
        {
            _dead = true;
            if (!isNaN(_v.autoAlpha) && _tg._alpha == 0)
            {
                _tg._visible = false;
            } // end if
            if (_oc)
            {
                _oc.apply(null, _oca);
            } // end if
            gs.TweenLite.removeTween(this);
        } // end if
    } // End of the function
    static function removeTween(t)
    {
        for (var _loc1 = gs.TweenLite._all.length - 1; _loc1 >= 0; --_loc1)
        {
            if (gs.TweenLite._all[_loc1] == t)
            {
                gs.TweenLite.killTweenAt(_loc1);
                break;
            } // end if
        } // end of for
    } // End of the function
    static function killDelayedCallsTo(f)
    {
        for (var _loc1 = gs.TweenLite._all.length - 1; _loc1 >= 0; --_loc1)
        {
            if (gs.TweenLite._all[_loc1]._oc == f && gs.TweenLite._all[_loc1]._tg == null || gs.TweenLite._all[_loc1]._tg == f)
            {
                gs.TweenLite.killTweenAt(_loc1);
            } // end if
        } // end of for
    } // End of the function
    static function killTweensOf(tg)
    {
        if (typeof(tg) == "function")
        {
            gs.TweenLite.killDelayedCallsTo(tg);
        }
        else
        {
            for (var _loc1 = gs.TweenLite._all.length - 1; _loc1 >= 0; --_loc1)
            {
                if (gs.TweenLite._all[_loc1]._etg == tg)
                {
                    gs.TweenLite.killTweenAt(_loc1);
                } // end if
            } // end of for
        } // end else if
    } // End of the function
    static function killTweenAt(i)
    {
        delete gs.TweenLite._all[i];
        gs.TweenLite._all.splice(i, 1);
        if (gs.TweenLite._all.length == 0)
        {
            gs.TweenLite._e.onEnterFrame = null;
        } // end if
    } // End of the function
    static function executeAll()
    {
        var _loc2 = gs.TweenLite._all.slice();
        var _loc3 = _loc2.length;
        for (var _loc1 = 0; _loc1 < _loc3; ++_loc1)
        {
            if (_loc2[_loc1].act)
            {
                _loc2[_loc1].render();
            } // end if
        } // end of for
    } // End of the function
    static function initEmptyMC()
    {
        if (!_root.tweenLite_mc)
        {
            var _loc2 = _root.getNextHighestDepth();
            if (!_loc2)
            {
                _loc2 = 9999;
            } // end if
            _e = _root.createEmptyMovieClip("tweenLite_mc", _loc2);
            gs.TweenLite._e.swapDepths(-1);
        }
        else
        {
            _e = _root.tweenLite_mc;
        } // end else if
        gs.TweenLite._e._visible = false;
        return (gs.TweenLite._e);
    } // End of the function
    static function easeOut(t, b, c, d)
    {
        t = t / d;
        return (-c * (t) * (t - 2) + b);
    } // End of the function
    static function easeNone(t, b, c, d)
    {
        return (c * t / d + b);
    } // End of the function
    function get act()
    {
        if (_act)
        {
            return (true);
        }
        else if ((getTimer() - _ti) / 1000 > _dl)
        {
            _act = true;
            _ts = getTimer();
            if (_v.runBackwards != true)
            {
                this.initTweenVals();
            }
            else if (!isNaN(_v.autoAlpha) && _v.autoAlpha != undefined)
            {
                _tg._visible = true;
            } // end else if
            if (_d == 1.000000E-003)
            {
                _ts = _ts - 1;
            } // end if
            if (_os != undefined)
            {
                _os.apply(null, _osa);
            } // end if
            return (true);
        }
        else
        {
            return (false);
        } // end else if
    } // End of the function
    function set volumeProxy(n)
    {
        _snd.setVolume(n);
        //return (this.volumeProxy());
        null;
    } // End of the function
    function get volumeProxy()
    {
        return (_snd.getVolume());
    } // End of the function
    function set colorProxy(n)
    {
        _color.setTransform(_colorParts);
        //return (this.colorProxy());
        null;
    } // End of the function
    static function get all()
    {
        return (gs.TweenLite._all);
    } // End of the function
    static var _all = new Array();
    static var deleteFor = gs.TweenLite.killTweensOf;
} // End of Class
