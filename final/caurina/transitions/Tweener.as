class caurina.transitions.Tweener
{
    static var _specialPropertySplitterList, _specialPropertyModifierList, _transitionList, _currentTime, _tweenList, handleError, _specialPropertyList;
    function Tweener()
    {
        trace ("Tweener is an static class and should not be instantiated.");
    } // End of the function
    static function addTween()
    {
        if (arguments.length < 2 || arguments[0] == undefined)
        {
            return (false);
        } // end if
        var _loc11 = new Array();
        var _loc3;
        var _loc39;
        var _loc4;
        var _loc38;
        if (arguments[0] instanceof Array)
        {
            for (var _loc3 = 0; _loc3 < arguments[0].length; ++_loc3)
            {
                _loc11.push(arguments[0][_loc3]);
            } // end of for
        }
        else
        {
            for (var _loc3 = 0; _loc3 < arguments.length - 1; ++_loc3)
            {
                _loc11.push(arguments[_loc3]);
            } // end of for
        } // end else if
        var _loc5 = caurina.transitions.TweenListObj.makePropertiesChain(arguments[arguments.length - 1]);
        if (!caurina.transitions.Tweener._inited)
        {
            caurina.transitions.Tweener.init();
        } // end if
        if (!caurina.transitions.Tweener._engineExists || _root[caurina.transitions.Tweener.getControllerName()] == undefined)
        {
            caurina.transitions.Tweener.startEngine();
        } // end if
        var _loc17 = isNaN(_loc5.time) ? (0) : (_loc5.time);
        var _loc15 = isNaN(_loc5.delay) ? (0) : (_loc5.delay);
        var _loc7 = new Object();
        var _loc21 = {time: true, delay: true, useFrames: true, skipUpdates: true, transition: true, onStart: true, onUpdate: true, onComplete: true, onOverwrite: true, rounded: true, onStartParams: true, onUpdateParams: true, onCompleteParams: true, onOverwriteParams: true, quickAdd: true};
        var _loc10 = new Object();
        for (var _loc4 in _loc5)
        {
            if (!_loc21[_loc4])
            {
                if (caurina.transitions.Tweener._specialPropertySplitterList[_loc4] != undefined)
                {
                    var _loc9 = caurina.transitions.Tweener._specialPropertySplitterList[_loc4].splitValues(_loc5[_loc4], caurina.transitions.Tweener._specialPropertySplitterList[_loc4].parameters);
                    for (var _loc3 = 0; _loc3 < _loc9.length; ++_loc3)
                    {
                        _loc7[_loc9[_loc3].name] = {valueStart: undefined, valueComplete: _loc9[_loc3].value};
                    } // end of for
                    continue;
                } // end if
                if (caurina.transitions.Tweener._specialPropertyModifierList[_loc4] != undefined)
                {
                    var _loc8 = caurina.transitions.Tweener._specialPropertyModifierList[_loc4].modifyValues(_loc5[_loc4]);
                    for (var _loc3 = 0; _loc3 < _loc8.length; ++_loc3)
                    {
                        _loc10[_loc8[_loc3].name] = {modifierParameters: _loc8[_loc3].parameters, modifierFunction: caurina.transitions.Tweener._specialPropertyModifierList[_loc4].getValue};
                    } // end of for
                    continue;
                } // end if
                _loc7[_loc4] = {valueStart: undefined, valueComplete: _loc5[_loc4]};
            } // end if
        } // end of for...in
        for (var _loc4 in _loc10)
        {
            if (_loc7[_loc4] != undefined)
            {
                _loc7[_loc4].modifierParameters = _loc10[_loc4].modifierParameters;
                _loc7[_loc4].modifierFunction = _loc10[_loc4].modifierFunction;
            } // end if
        } // end of for...in
        var _loc20;
        if (typeof(_loc5.transition) == "string")
        {
            var _loc22 = _loc5.transition.toLowerCase();
            _loc20 = caurina.transitions.Tweener._transitionList[_loc22];
        }
        else
        {
            _loc20 = _loc5.transition;
        } // end else if
        if (_loc20 == undefined)
        {
            _loc20 = caurina.transitions.Tweener._transitionList.easeoutexpo;
        } // end if
        var _loc12;
        var _loc6;
        var _loc16;
        for (var _loc3 = 0; _loc3 < _loc11.length; ++_loc3)
        {
            _loc12 = new Object();
            for (var _loc4 in _loc7)
            {
                _loc12[_loc4] = new caurina.transitions.PropertyInfoObj(_loc7[_loc4].valueStart, _loc7[_loc4].valueComplete, _loc7[_loc4].modifierFunction, _loc7[_loc4].modifierParameters);
            } // end of for...in
            _loc6 = new caurina.transitions.TweenListObj(_loc11[_loc3], caurina.transitions.Tweener._currentTime + _loc15 * 1000 / caurina.transitions.Tweener._timeScale, caurina.transitions.Tweener._currentTime + (_loc15 * 1000 + _loc17 * 1000) / caurina.transitions.Tweener._timeScale, _loc5.useFrames == true, _loc20);
            _loc6.properties = _loc12;
            _loc6.onStart = _loc5.onStart;
            _loc6.onUpdate = _loc5.onUpdate;
            _loc6.onComplete = _loc5.onComplete;
            _loc6.onOverwrite = _loc5.onOverwrite;
            _loc6.onError = _loc5.onError;
            _loc6.onStartParams = _loc5.onStartParams;
            _loc6.onUpdateParams = _loc5.onUpdateParams;
            _loc6.onCompleteParams = _loc5.onCompleteParams;
            _loc6.onOverwriteParams = _loc5.onOverwriteParams;
            _loc6.rounded = _loc5.rounded;
            _loc6.skipUpdates = _loc5.skipUpdates;
            if (!_loc5.quickAdd)
            {
                caurina.transitions.Tweener.removeTweensByTime(_loc6.scope, _loc6.properties, _loc6.timeStart, _loc6.timeComplete);
            } // end if
            caurina.transitions.Tweener._tweenList.push(_loc6);
            if (_loc17 == 0 && _loc15 == 0)
            {
                _loc16 = caurina.transitions.Tweener._tweenList.length - 1;
                caurina.transitions.Tweener.updateTweenByIndex(_loc16);
                caurina.transitions.Tweener.removeTweenByIndex(_loc16);
            } // end if
        } // end of for
        return (true);
    } // End of the function
    static function addCaller()
    {
        if (arguments.length < 2 || arguments[0] == undefined)
        {
            return (false);
        } // end if
        var _loc6 = new Array();
        var _loc5;
        var _loc12;
        if (arguments[0] instanceof Array)
        {
            for (var _loc5 = 0; _loc5 < arguments[0].length; ++_loc5)
            {
                _loc6.push(arguments[0][_loc5]);
            } // end of for
        }
        else
        {
            for (var _loc5 = 0; _loc5 < arguments.length - 1; ++_loc5)
            {
                _loc6.push(arguments[_loc5]);
            } // end of for
        } // end else if
        var _loc4 = arguments[arguments.length - 1];
        if (!caurina.transitions.Tweener._inited)
        {
            caurina.transitions.Tweener.init();
        } // end if
        if (!caurina.transitions.Tweener._engineExists || _root[caurina.transitions.Tweener.getControllerName()] == undefined)
        {
            caurina.transitions.Tweener.startEngine();
        } // end if
        var _loc9 = isNaN(_loc4.time) ? (0) : (_loc4.time);
        var _loc7 = isNaN(_loc4.delay) ? (0) : (_loc4.delay);
        var _loc10;
        if (typeof(_loc4.transition) == "string")
        {
            var _loc11 = _loc4.transition.toLowerCase();
            _loc10 = caurina.transitions.Tweener._transitionList[_loc11];
        }
        else
        {
            _loc10 = _loc4.transition;
        } // end else if
        if (_loc10 == undefined)
        {
            _loc10 = caurina.transitions.Tweener._transitionList.easeoutexpo;
        } // end if
        var _loc3;
        var _loc8;
        for (var _loc5 = 0; _loc5 < _loc6.length; ++_loc5)
        {
            _loc3 = new caurina.transitions.TweenListObj(_loc6[_loc5], caurina.transitions.Tweener._currentTime + _loc7 * 1000 / caurina.transitions.Tweener._timeScale, caurina.transitions.Tweener._currentTime + (_loc7 * 1000 + _loc9 * 1000) / caurina.transitions.Tweener._timeScale, _loc4.useFrames == true, _loc10);
            _loc3.properties = undefined;
            _loc3.onStart = _loc4.onStart;
            _loc3.onUpdate = _loc4.onUpdate;
            _loc3.onComplete = _loc4.onComplete;
            _loc3.onOverwrite = _loc4.onOverwrite;
            _loc3.onStartParams = _loc4.onStartParams;
            _loc3.onUpdateParams = _loc4.onUpdateParams;
            _loc3.onCompleteParams = _loc4.onCompleteParams;
            _loc3.onOverwriteParams = _loc4.onOverwriteParams;
            _loc3.isCaller = true;
            _loc3.count = _loc4.count;
            _loc3.waitFrames = _loc4.waitFrames;
            caurina.transitions.Tweener._tweenList.push(_loc3);
            if (_loc9 == 0 && _loc7 == 0)
            {
                _loc8 = caurina.transitions.Tweener._tweenList.length - 1;
                caurina.transitions.Tweener.updateTweenByIndex(_loc8);
                caurina.transitions.Tweener.removeTweenByIndex(_loc8);
            } // end if
        } // end of for
        return (true);
    } // End of the function
    static function removeTweensByTime(p_scope, p_properties, p_timeStart, p_timeComplete)
    {
        var _loc4 = false;
        var _loc3;
        var _loc1;
        var _loc6 = caurina.transitions.Tweener._tweenList.length;
        var _loc2;
        _loc1 = 0;
        if (_loc1 < _loc6)
        {
            if (p_scope == caurina.transitions.Tweener._tweenList[_loc1].scope)
            {
                if (p_timeComplete > caurina.transitions.Tweener._tweenList[_loc1].timeStart && p_timeStart < caurina.transitions.Tweener._tweenList[_loc1].timeComplete)
                {
                    _loc3 = false;
                    _loc2 = caurina.transitions.Tweener._tweenList[_loc1].properties;
                    if (p_properties[_loc2] != undefined)
                    {
                        if (caurina.transitions.Tweener._tweenList[_loc1].onOverwrite != undefined)
                        {
                            try
                            {
                                caurina.transitions.Tweener._tweenList[_loc1].onOverwrite.apply(caurina.transitions.Tweener._tweenList[_loc1].scope, caurina.transitions.Tweener._tweenList[_loc1].onOverwriteParams);
                            } // End of try
                            catch ()
                            {
                            } // End of catch
                        } // end if
                        caurina.transitions.Tweener._tweenList[_loc1].properties[_loc2] = undefined;
                        delete caurina.transitions.Tweener._tweenList[_loc1].properties[_loc2];
                        _loc3 = true;
                        _loc4 = true;
                    } // end if
                    if (_loc3)
                    {
                        if (caurina.transitions.AuxFunctions.getObjectLength(caurina.transitions.Tweener._tweenList[_loc1].properties) == 0)
                        {
                            caurina.transitions.Tweener.removeTweenByIndex(_loc1);
                        } // end if
                    } // end if
                } // end if
            } // end if
            ++_loc1;
        } // end if
        return (_loc4);
    } // End of the function
    static function removeTweens(p_scope)
    {
        var _loc3 = new Array();
        var _loc2;
        for (var _loc2 = 1; _loc2 < arguments.length; ++_loc2)
        {
            if (typeof(arguments[_loc2]) == "string" && !caurina.transitions.AuxFunctions.isInArray(arguments[_loc2], _loc3))
            {
                _loc3.push(arguments[_loc2]);
            } // end if
        } // end of for
        return (caurina.transitions.Tweener.affectTweens(caurina.transitions.Tweener.removeTweenByIndex, p_scope, _loc3));
    } // End of the function
    static function removeAllTweens()
    {
        var _loc2 = false;
        var _loc1;
        for (var _loc1 = 0; _loc1 < caurina.transitions.Tweener._tweenList.length; ++_loc1)
        {
            caurina.transitions.Tweener.removeTweenByIndex(_loc1);
            _loc2 = true;
        } // end of for
        return (_loc2);
    } // End of the function
    static function pauseTweens(p_scope)
    {
        var _loc3 = new Array();
        var _loc2;
        for (var _loc2 = 1; _loc2 < arguments.length; ++_loc2)
        {
            if (typeof(arguments[_loc2]) == "string" && !caurina.transitions.AuxFunctions.isInArray(arguments[_loc2], _loc3))
            {
                _loc3.push(arguments[_loc2]);
            } // end if
        } // end of for
        return (caurina.transitions.Tweener.affectTweens(caurina.transitions.Tweener.pauseTweenByIndex, p_scope, _loc3));
    } // End of the function
    static function pauseAllTweens()
    {
        var _loc2 = false;
        var _loc1;
        for (var _loc1 = 0; _loc1 < caurina.transitions.Tweener._tweenList.length; ++_loc1)
        {
            caurina.transitions.Tweener.pauseTweenByIndex(_loc1);
            _loc2 = true;
        } // end of for
        return (_loc2);
    } // End of the function
    static function resumeTweens(p_scope)
    {
        var _loc3 = new Array();
        var _loc2;
        for (var _loc2 = 1; _loc2 < arguments.length; ++_loc2)
        {
            if (typeof(arguments[_loc2]) == "string" && !caurina.transitions.AuxFunctions.isInArray(arguments[_loc2], _loc3))
            {
                _loc3.push(arguments[_loc2]);
            } // end if
        } // end of for
        return (caurina.transitions.Tweener.affectTweens(caurina.transitions.Tweener.resumeTweenByIndex, p_scope, _loc3));
    } // End of the function
    static function resumeAllTweens()
    {
        var _loc2 = false;
        var _loc1;
        for (var _loc1 = 0; _loc1 < caurina.transitions.Tweener._tweenList.length; ++_loc1)
        {
            caurina.transitions.Tweener.resumeTweenByIndex(_loc1);
            _loc2 = true;
        } // end of for
        return (_loc2);
    } // End of the function
    static function affectTweens(p_affectFunction, p_scope, p_properties)
    {
        var _loc5 = false;
        var _loc2;
        if (!caurina.transitions.Tweener._tweenList)
        {
            return (false);
        } // end if
        for (var _loc2 = 0; _loc2 < caurina.transitions.Tweener._tweenList.length; ++_loc2)
        {
            if (caurina.transitions.Tweener._tweenList[_loc2].scope == p_scope)
            {
                if (p_properties.length == 0)
                {
                    p_affectFunction(_loc2);
                    _loc5 = true;
                    continue;
                } // end if
                var _loc4 = new Array();
                var _loc1;
                for (var _loc1 = 0; _loc1 < p_properties.length; ++_loc1)
                {
                    if (caurina.transitions.Tweener._tweenList[_loc2].properties[p_properties[_loc1]] != undefined)
                    {
                        _loc4.push(p_properties[_loc1]);
                    } // end if
                } // end of for
                if (_loc4.length > 0)
                {
                    var _loc7 = caurina.transitions.AuxFunctions.getObjectLength(caurina.transitions.Tweener._tweenList[_loc2].properties);
                    if (_loc7 == _loc4.length)
                    {
                        p_affectFunction(_loc2);
                        _loc5 = true;
                        continue;
                    } // end if
                    var _loc8 = caurina.transitions.Tweener.splitTweens(_loc2, _loc4);
                    p_affectFunction(_loc8);
                    _loc5 = true;
                } // end if
            } // end if
        } // end of for
        return (_loc5);
    } // End of the function
    static function splitTweens(p_tween, p_properties)
    {
        var _loc6 = caurina.transitions.Tweener._tweenList[p_tween];
        var _loc5 = _loc6.clone(false);
        var _loc1;
        var _loc2;
        for (var _loc1 = 0; _loc1 < p_properties.length; ++_loc1)
        {
            _loc2 = p_properties[_loc1];
            if (_loc6.properties[_loc2] != undefined)
            {
                _loc6.properties[_loc2] = undefined;
                delete _loc6.properties[_loc2];
            } // end if
        } // end of for
        var _loc4;
        for (var _loc2 in _loc5.properties)
        {
            _loc4 = false;
            for (var _loc1 = 0; _loc1 < p_properties.length; ++_loc1)
            {
                if (p_properties[_loc1] == _loc2)
                {
                    _loc4 = true;
                    break;
                } // end if
            } // end of for
            if (!_loc4)
            {
                _loc5.properties[_loc2] = undefined;
                delete _loc5.properties[_loc2];
            } // end if
        } // end of for...in
        caurina.transitions.Tweener._tweenList.push(_loc5);
        return (caurina.transitions.Tweener._tweenList.length - 1);
    } // End of the function
    static function updateTweens()
    {
        if (caurina.transitions.Tweener._tweenList.length == 0)
        {
            return (false);
        } // end if
        var _loc1;
        for (var _loc1 = 0; _loc1 < caurina.transitions.Tweener._tweenList.length; ++_loc1)
        {
            if (!caurina.transitions.Tweener._tweenList[_loc1].isPaused)
            {
                if (!caurina.transitions.Tweener.updateTweenByIndex(_loc1))
                {
                    caurina.transitions.Tweener.removeTweenByIndex(_loc1);
                } // end if
                if (caurina.transitions.Tweener._tweenList[_loc1] == null)
                {
                    caurina.transitions.Tweener.removeTweenByIndex(_loc1, true);
                    --_loc1;
                } // end if
            } // end if
        } // end of for
        return (true);
    } // End of the function
    static function removeTweenByIndex(p_tween, p_finalRemoval)
    {
        caurina.transitions.Tweener._tweenList[p_tween] = null;
        if (p_finalRemoval)
        {
            caurina.transitions.Tweener._tweenList.splice(p_tween, 1);
        } // end if
        return (true);
    } // End of the function
    static function pauseTweenByIndex(p_tween)
    {
        var _loc1 = caurina.transitions.Tweener._tweenList[p_tween];
        if (_loc1 == null || _loc1.isPaused)
        {
            return (false);
        } // end if
        _loc1.timePaused = caurina.transitions.Tweener._currentTime;
        _loc1.isPaused = true;
        return (true);
    } // End of the function
    static function resumeTweenByIndex(p_tween)
    {
        var _loc1 = caurina.transitions.Tweener._tweenList[p_tween];
        if (_loc1 == null || !_loc1.isPaused)
        {
            return (false);
        } // end if
        _loc1.timeStart = _loc1.timeStart + (caurina.transitions.Tweener._currentTime - _loc1.timePaused);
        _loc1.timeComplete = _loc1.timeComplete + (caurina.transitions.Tweener._currentTime - _loc1.timePaused);
        _loc1.timePaused = undefined;
        _loc1.isPaused = false;
        return (true);
    } // End of the function
    static function updateTweenByIndex(i)
    {
        var _loc1 = caurina.transitions.Tweener._tweenList[i];
        if (_loc1 == null || !_loc1.scope)
        {
            return (false);
        } // end if
        var _loc11 = false;
        var _loc12;
        var _loc2;
        var _loc6;
        var _loc8;
        var _loc7;
        var _loc5;
        var _loc4;
        var _loc10;
        var _loc3;
        if (caurina.transitions.Tweener._currentTime >= _loc1.timeStart)
        {
            _loc10 = _loc1.scope;
            if (_loc1.isCaller)
            {
                do
                {
                    _loc6 = (_loc1.timeComplete - _loc1.timeStart) / _loc1.count * (_loc1.timesCalled + 1);
                    _loc8 = _loc1.timeStart;
                    _loc7 = _loc1.timeComplete - _loc1.timeStart;
                    _loc5 = _loc1.timeComplete - _loc1.timeStart;
                    _loc2 = _loc1.transition(_loc6, _loc8, _loc7, _loc5);
                    if (caurina.transitions.Tweener._currentTime >= _loc2)
                    {
                        if (_loc1.onUpdate != undefined)
                        {
                            try
                            {
                                _loc1.onUpdate.apply(_loc10, _loc1.onUpdateParams);
                            } // End of try
                            catch ()
                            {
                            } // End of catch
                        } // end if
                        ++_loc1.timesCalled;
                        if (_loc1.timesCalled >= _loc1.count)
                        {
                            _loc11 = true;
                            break;
                        } // end if
                        if (_loc1.waitFrames)
                        {
                            break;
                        } // end if
                    } // end if
                } while (caurina.transitions.Tweener._currentTime >= _loc2)
            }
            else
            {
                _loc12 = _loc1.skipUpdates < 1 || _loc1.skipUpdates == undefined || _loc1.updatesSkipped >= _loc1.skipUpdates;
                if (caurina.transitions.Tweener._currentTime >= _loc1.timeComplete)
                {
                    _loc11 = true;
                    _loc12 = true;
                } // end if
                if (!_loc1.hasStarted)
                {
                    if (_loc1.onStart != undefined)
                    {
                        try
                        {
                            _loc1.onStart.apply(_loc10, _loc1.onStartParams);
                        } // End of try
                        catch ()
                        {
                        } // End of catch
                    } // end if
                    for (var _loc4 in _loc1.properties)
                    {
                        var _loc9 = caurina.transitions.Tweener.getPropertyValue(_loc10, _loc4);
                        _loc1.properties[_loc4].valueStart = isNaN(_loc9) ? (_loc1.properties[_loc4].valueComplete) : (_loc9);
                    } // end of for...in
                    _loc12 = true;
                    _loc1.hasStarted = true;
                } // end if
                if (_loc12)
                {
                    for (var _loc4 in _loc1.properties)
                    {
                        _loc3 = _loc1.properties[_loc4];
                        if (_loc11)
                        {
                            _loc2 = _loc3.valueComplete;
                        }
                        else if (_loc3.hasModifier)
                        {
                            _loc6 = caurina.transitions.Tweener._currentTime - _loc1.timeStart;
                            _loc5 = _loc1.timeComplete - _loc1.timeStart;
                            _loc2 = _loc1.transition(_loc6, 0, 1, _loc5);
                            _loc2 = _loc3.modifierFunction(_loc3.valueStart, _loc3.valueComplete, _loc2, _loc3.modifierParameters);
                        }
                        else
                        {
                            _loc6 = caurina.transitions.Tweener._currentTime - _loc1.timeStart;
                            _loc8 = _loc3.valueStart;
                            _loc7 = _loc3.valueComplete - _loc3.valueStart;
                            _loc5 = _loc1.timeComplete - _loc1.timeStart;
                            _loc2 = _loc1.transition(_loc6, _loc8, _loc7, _loc5);
                        } // end else if
                        if (_loc1.rounded)
                        {
                            _loc2 = Math.round(_loc2);
                        } // end if
                        caurina.transitions.Tweener.setPropertyValue(_loc10, _loc4, _loc2);
                    } // end of for...in
                    _loc1.updatesSkipped = 0;
                    if (_loc1.onUpdate != undefined)
                    {
                        try
                        {
                            _loc1.onUpdate.apply(_loc10, _loc1.onUpdateParams);
                        } // End of try
                        catch ()
                        {
                        } // End of catch
                    } // end if
                }
                else
                {
                    ++_loc1.updatesSkipped;
                } // end else if
            } // end else if
            if (_loc11 && _loc1.onComplete != undefined)
            {
                try
                {
                    _loc1.onComplete.apply(_loc10, _loc1.onCompleteParams);
                } // End of try
                catch ()
                {
                } // End of catch
            } // end if
            return (!_loc11);
        } // end if
        return (true);
    } // End of the function
    static function init()
    {
        _inited = true;
        _transitionList = new Object();
        caurina.transitions.Equations.init();
        _specialPropertyList = new Object();
        _specialPropertyModifierList = new Object();
        _specialPropertySplitterList = new Object();
        caurina.transitions.SpecialPropertiesDefault.init();
    } // End of the function
    static function registerTransition(p_name, p_function)
    {
        if (!caurina.transitions.Tweener._inited)
        {
            caurina.transitions.Tweener.init();
        } // end if
        caurina.transitions.Tweener._transitionList[p_name] = p_function;
    } // End of the function
    static function registerSpecialProperty(p_name, p_getFunction, p_setFunction, p_parameters)
    {
        if (!caurina.transitions.Tweener._inited)
        {
            caurina.transitions.Tweener.init();
        } // end if
        var _loc1 = new caurina.transitions.SpecialProperty(p_getFunction, p_setFunction, p_parameters);
        caurina.transitions.Tweener._specialPropertyList[p_name] = _loc1;
    } // End of the function
    static function registerSpecialPropertyModifier(p_name, p_modifyFunction, p_getFunction)
    {
        if (!caurina.transitions.Tweener._inited)
        {
            caurina.transitions.Tweener.init();
        } // end if
        var _loc1 = new caurina.transitions.SpecialPropertyModifier(p_modifyFunction, p_getFunction);
        caurina.transitions.Tweener._specialPropertyModifierList[p_name] = _loc1;
    } // End of the function
    static function registerSpecialPropertySplitter(p_name, p_splitFunction, p_parameters)
    {
        if (!caurina.transitions.Tweener._inited)
        {
            caurina.transitions.Tweener.init();
        } // end if
        var _loc1 = new caurina.transitions.SpecialPropertySplitter(p_splitFunction, p_parameters);
        caurina.transitions.Tweener._specialPropertySplitterList[p_name] = _loc1;
    } // End of the function
    static function startEngine()
    {
        _engineExists = true;
        _tweenList = new Array();
        var _loc2 = Math.floor(Math.random() * 999999);
        var _loc3 = _root.createEmptyMovieClip(caurina.transitions.Tweener.getControllerName(), 31338 + _loc2);
        _loc3.onEnterFrame = function ()
        {
            caurina.transitions.Tweener.onEnterFrame();
        };
        caurina.transitions.Tweener.updateTime();
    } // End of the function
    static function stopEngine()
    {
        _engineExists = false;
        _tweenList = null;
        _currentTime = 0;
        delete _root[caurina.transitions.Tweener.getControllerName()].onEnterFrame;
        _root[caurina.transitions.Tweener.getControllerName()].removeMovieClip();
    } // End of the function
    static function getPropertyValue(p_obj, p_prop)
    {
        if (caurina.transitions.Tweener._specialPropertyList[p_prop] != undefined)
        {
            return (caurina.transitions.Tweener._specialPropertyList[p_prop].getValue(p_obj, caurina.transitions.Tweener._specialPropertyList[p_prop].parameters));
        }
        else
        {
            return (p_obj[p_prop]);
        } // end else if
    } // End of the function
    static function setPropertyValue(p_obj, p_prop, p_value)
    {
        if (caurina.transitions.Tweener._specialPropertyList[p_prop] != undefined)
        {
            caurina.transitions.Tweener._specialPropertyList[p_prop].setValue(p_obj, p_value, caurina.transitions.Tweener._specialPropertyList[p_prop].parameters);
        }
        else
        {
            p_obj[p_prop] = p_value;
        } // end else if
    } // End of the function
    static function updateTime()
    {
        _currentTime = getTimer();
    } // End of the function
    static function onEnterFrame()
    {
        caurina.transitions.Tweener.updateTime();
        var _loc1 = false;
        _loc1 = caurina.transitions.Tweener.updateTweens();
        if (!_loc1)
        {
            caurina.transitions.Tweener.stopEngine();
        } // end if
    } // End of the function
    static function setTimeScale(p_time)
    {
        var _loc1;
        if (isNaN(p_time))
        {
            p_time = 1;
        } // end if
        if (p_time < 1.000000E-005)
        {
            p_time = 1.000000E-005;
        } // end if
        if (p_time != caurina.transitions.Tweener._timeScale)
        {
            for (var _loc1 = 0; _loc1 < caurina.transitions.Tweener._tweenList.length; ++_loc1)
            {
                caurina.transitions.Tweener._tweenList[_loc1].timeStart = caurina.transitions.Tweener._currentTime - (caurina.transitions.Tweener._currentTime - caurina.transitions.Tweener._tweenList[_loc1].timeStart) * caurina.transitions.Tweener._timeScale / p_time;
                caurina.transitions.Tweener._tweenList[_loc1].timeComplete = caurina.transitions.Tweener._currentTime - (caurina.transitions.Tweener._currentTime - caurina.transitions.Tweener._tweenList[_loc1].timeComplete) * caurina.transitions.Tweener._timeScale / p_time;
                if (caurina.transitions.Tweener._tweenList[_loc1].timePaused != undefined)
                {
                    caurina.transitions.Tweener._tweenList[_loc1].timePaused = caurina.transitions.Tweener._currentTime - (caurina.transitions.Tweener._currentTime - caurina.transitions.Tweener._tweenList[_loc1].timePaused) * caurina.transitions.Tweener._timeScale / p_time;
                } // end if
            } // end of for
            _timeScale = p_time;
        } // end if
    } // End of the function
    static function isTweening(p_scope)
    {
        var _loc1;
        for (var _loc1 = 0; _loc1 < caurina.transitions.Tweener._tweenList.length; ++_loc1)
        {
            if (caurina.transitions.Tweener._tweenList[_loc1].scope == p_scope)
            {
                return (true);
            } // end if
        } // end of for
        return (false);
    } // End of the function
    static function getTweens(p_scope)
    {
        var _loc1;
        var _loc2;
        var _loc3 = new Array();
        for (var _loc1 = 0; _loc1 < caurina.transitions.Tweener._tweenList.length; ++_loc1)
        {
            if (caurina.transitions.Tweener._tweenList[_loc1].scope == p_scope)
            {
                for (var _loc2 in caurina.transitions.Tweener._tweenList[_loc1].properties)
                {
                    _loc3.push(_loc2);
                } // end of for...in
            } // end if
        } // end of for
        return (_loc3);
    } // End of the function
    static function getTweenCount(p_scope)
    {
        var _loc1;
        var _loc2 = 0;
        for (var _loc1 = 0; _loc1 < caurina.transitions.Tweener._tweenList.length; ++_loc1)
        {
            if (caurina.transitions.Tweener._tweenList[_loc1].scope == p_scope)
            {
                _loc2 = _loc2 + caurina.transitions.AuxFunctions.getObjectLength(caurina.transitions.Tweener._tweenList[_loc1].properties);
            } // end if
        } // end of for
        return (_loc2);
    } // End of the function
    null[] = !(pTweening.onError != undefined && typeof(pTweening.onError == "function")) ? (// End of catc, if (pTweening.onError != undefined) goto 1572, trace ("## [Tweener] Error: " + pTweening.scope.toString() + " raised an error while executing the \'" + pCallBackName.toString() + "\'handler. \n" + pError), function (pTweening, pError, pCallBackName)
    {
        if (pTweening.onError == undefined)
        {
        } // end if
    }) : (tr, pTweening.onError.apply(pTweening.scope, [pTweening.scope, pError]), // Jump to 1563, // End of tr, catch (, "handleError");
    static function getVersion()
    {
        return ("AS2 1.26.62");
    } // End of the function
    static function getControllerName()
    {
        return ("__tweener_controller__" + caurina.transitions.Tweener.getVersion());
    } // End of the function
    static function debug_getList()
    {
        var _loc3 = "";
        var _loc1;
        var _loc2;
        for (var _loc1 = 0; _loc1 < caurina.transitions.Tweener._tweenList.length; ++_loc1)
        {
            _loc3 = _loc3 + ("[" + _loc1 + "] ::\n");
            for (var _loc2 in caurina.transitions.Tweener._tweenList[_loc1].properties)
            {
                _loc3 = _loc3 + ("  " + _loc2 + " -> " + caurina.transitions.Tweener._tweenList[_loc1].properties[_loc2].valueComplete + "\n");
            } // end of for...in
        } // end of for
        return (_loc3);
    } // End of the function
    static var _engineExists = false;
    static var _inited = false;
    static var _timeScale = 1;
} // End of Class
