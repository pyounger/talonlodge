class caurina.transitions.SpecialPropertiesDefault
{
    function SpecialPropertiesDefault()
    {
        trace ("SpecialProperties is an static class and should not be instantiated.");
    } // End of the function
    static function init()
    {
        caurina.transitions.Tweener.registerSpecialProperty("_frame", caurina.transitions.SpecialPropertiesDefault._frame_get, caurina.transitions.SpecialPropertiesDefault._frame_set);
        caurina.transitions.Tweener.registerSpecialProperty("_sound_volume", caurina.transitions.SpecialPropertiesDefault._sound_volume_get, caurina.transitions.SpecialPropertiesDefault._sound_volume_set);
        caurina.transitions.Tweener.registerSpecialProperty("_sound_pan", caurina.transitions.SpecialPropertiesDefault._sound_pan_get, caurina.transitions.SpecialPropertiesDefault._sound_pan_set);
        caurina.transitions.Tweener.registerSpecialProperty("_color_ra", caurina.transitions.SpecialPropertiesDefault._color_property_get, caurina.transitions.SpecialPropertiesDefault._color_property_set, ["ra"]);
        caurina.transitions.Tweener.registerSpecialProperty("_color_rb", caurina.transitions.SpecialPropertiesDefault._color_property_get, caurina.transitions.SpecialPropertiesDefault._color_property_set, ["rb"]);
        caurina.transitions.Tweener.registerSpecialProperty("_color_ga", caurina.transitions.SpecialPropertiesDefault._color_property_get, caurina.transitions.SpecialPropertiesDefault._color_property_set, ["ga"]);
        caurina.transitions.Tweener.registerSpecialProperty("_color_gb", caurina.transitions.SpecialPropertiesDefault._color_property_get, caurina.transitions.SpecialPropertiesDefault._color_property_set, ["gb"]);
        caurina.transitions.Tweener.registerSpecialProperty("_color_ba", caurina.transitions.SpecialPropertiesDefault._color_property_get, caurina.transitions.SpecialPropertiesDefault._color_property_set, ["ba"]);
        caurina.transitions.Tweener.registerSpecialProperty("_color_bb", caurina.transitions.SpecialPropertiesDefault._color_property_get, caurina.transitions.SpecialPropertiesDefault._color_property_set, ["bb"]);
        caurina.transitions.Tweener.registerSpecialProperty("_color_aa", caurina.transitions.SpecialPropertiesDefault._color_property_get, caurina.transitions.SpecialPropertiesDefault._color_property_set, ["aa"]);
        caurina.transitions.Tweener.registerSpecialProperty("_color_ab", caurina.transitions.SpecialPropertiesDefault._color_property_get, caurina.transitions.SpecialPropertiesDefault._color_property_set, ["ab"]);
        caurina.transitions.Tweener.registerSpecialProperty("_autoAlpha", caurina.transitions.SpecialPropertiesDefault._autoAlpha_get, caurina.transitions.SpecialPropertiesDefault._autoAlpha_set);
        caurina.transitions.Tweener.registerSpecialPropertySplitter("_color", caurina.transitions.SpecialPropertiesDefault._color_splitter);
        caurina.transitions.Tweener.registerSpecialPropertySplitter("_colorTransform", caurina.transitions.SpecialPropertiesDefault._colorTransform_splitter);
        caurina.transitions.Tweener.registerSpecialPropertySplitter("_scale", caurina.transitions.SpecialPropertiesDefault._scale_splitter);
        caurina.transitions.Tweener.registerSpecialProperty("_blur_blurX", caurina.transitions.SpecialPropertiesDefault._filter_property_get, caurina.transitions.SpecialPropertiesDefault._filter_property_set, [flash.filters.BlurFilter, "blurX"]);
        caurina.transitions.Tweener.registerSpecialProperty("_blur_blurY", caurina.transitions.SpecialPropertiesDefault._filter_property_get, caurina.transitions.SpecialPropertiesDefault._filter_property_set, [flash.filters.BlurFilter, "blurY"]);
        caurina.transitions.Tweener.registerSpecialProperty("_blur_quality", caurina.transitions.SpecialPropertiesDefault._filter_property_get, caurina.transitions.SpecialPropertiesDefault._filter_property_set, [flash.filters.BlurFilter, "quality"]);
        caurina.transitions.Tweener.registerSpecialPropertySplitter("_filter", caurina.transitions.SpecialPropertiesDefault._filter_splitter);
        caurina.transitions.Tweener.registerSpecialPropertyModifier("_bezier", caurina.transitions.SpecialPropertiesDefault._bezier_modifier, caurina.transitions.SpecialPropertiesDefault._bezier_get);
    } // End of the function
    static function _color_splitter(p_value)
    {
        var _loc1 = new Array();
        if (p_value == null)
        {
            _loc1.push({name: "_color_ra", value: 100});
            _loc1.push({name: "_color_rb", value: 0});
            _loc1.push({name: "_color_ga", value: 100});
            _loc1.push({name: "_color_gb", value: 0});
            _loc1.push({name: "_color_ba", value: 100});
            _loc1.push({name: "_color_bb", value: 0});
        }
        else
        {
            _loc1.push({name: "_color_ra", value: 0});
            _loc1.push({name: "_color_rb", value: caurina.transitions.AuxFunctions.numberToR(p_value)});
            _loc1.push({name: "_color_ga", value: 0});
            _loc1.push({name: "_color_gb", value: caurina.transitions.AuxFunctions.numberToG(p_value)});
            _loc1.push({name: "_color_ba", value: 0});
            _loc1.push({name: "_color_bb", value: caurina.transitions.AuxFunctions.numberToB(p_value)});
        } // end else if
        return (_loc1);
    } // End of the function
    static function _colorTransform_splitter(p_value)
    {
        var _loc2 = new Array();
        if (p_value == null)
        {
            _loc2.push({name: "_color_ra", value: 100});
            _loc2.push({name: "_color_rb", value: 0});
            _loc2.push({name: "_color_ga", value: 100});
            _loc2.push({name: "_color_gb", value: 0});
            _loc2.push({name: "_color_ba", value: 100});
            _loc2.push({name: "_color_bb", value: 0});
        }
        else
        {
            if (p_value.ra != undefined)
            {
                _loc2.push({name: "_color_ra", value: p_value.ra});
            } // end if
            if (p_value.rb != undefined)
            {
                _loc2.push({name: "_color_rb", value: p_value.rb});
            } // end if
            if (p_value.ga != undefined)
            {
                _loc2.push({name: "_color_ba", value: p_value.ba});
            } // end if
            if (p_value.gb != undefined)
            {
                _loc2.push({name: "_color_bb", value: p_value.bb});
            } // end if
            if (p_value.ba != undefined)
            {
                _loc2.push({name: "_color_ga", value: p_value.ga});
            } // end if
            if (p_value.bb != undefined)
            {
                _loc2.push({name: "_color_gb", value: p_value.gb});
            } // end if
            if (p_value.aa != undefined)
            {
                _loc2.push({name: "_color_aa", value: p_value.aa});
            } // end if
            if (p_value.ab != undefined)
            {
                _loc2.push({name: "_color_ab", value: p_value.ab});
            } // end if
        } // end else if
        return (_loc2);
    } // End of the function
    static function _scale_splitter(p_value)
    {
        var _loc1 = new Array();
        _loc1.push({name: "_xscale", value: p_value});
        _loc1.push({name: "_yscale", value: p_value});
        return (_loc1);
    } // End of the function
    static function _filter_splitter(p_value)
    {
        var _loc1 = new Array();
        if (p_value instanceof flash.filters.BlurFilter)
        {
            _loc1.push({name: "_blur_blurX", value: (flash.filters.BlurFilter)(p_value).blurX});
            _loc1.push({name: "_blur_blurY", value: (flash.filters.BlurFilter)(p_value).blurY});
            _loc1.push({name: "_blur_quality", value: (flash.filters.BlurFilter)(p_value).quality});
        }
        else
        {
            trace ("??");
        } // end else if
        return (_loc1);
    } // End of the function
    static function _frame_get(p_obj)
    {
        return (p_obj._currentFrame);
    } // End of the function
    static function _frame_set(p_obj, p_value)
    {
        p_obj.gotoAndStop(Math.round(p_value));
    } // End of the function
    static function _sound_volume_get(p_obj)
    {
        return (p_obj.getVolume());
    } // End of the function
    static function _sound_volume_set(p_obj, p_value)
    {
        p_obj.setVolume(p_value);
    } // End of the function
    static function _sound_pan_get(p_obj)
    {
        return (p_obj.getPan());
    } // End of the function
    static function _sound_pan_set(p_obj, p_value)
    {
        p_obj.setPan(p_value);
    } // End of the function
    static function _color_property_get(p_obj, p_parameters)
    {
        return (new Color(p_obj).getTransform()[p_parameters[0]]);
    } // End of the function
    static function _color_property_set(p_obj, p_value, p_parameters)
    {
        var _loc1 = new Object();
        _loc1[p_parameters[0]] = Math.round(p_value);
        new Color(p_obj).setTransform(_loc1);
    } // End of the function
    static function _autoAlpha_get(p_obj)
    {
        return (p_obj._alpha);
    } // End of the function
    static function _autoAlpha_set(p_obj, p_value)
    {
        p_obj._alpha = p_value;
        p_obj._visible = p_value > 0;
    } // End of the function
    static function _filter_property_get(p_obj, p_parameters)
    {
        var _loc2 = p_obj.filters;
        var _loc1;
        var _loc4 = p_parameters[0];
        var _loc3 = p_parameters[1];
        for (var _loc1 = 0; _loc1 < _loc2.length; ++_loc1)
        {
            if (_loc2[_loc1] instanceof _loc4)
            {
                return (_loc2[_loc1][_loc3]);
            } // end if
        } // end of for
        var _loc5;
        switch (_loc4)
        {
            case flash.filters.BlurFilter:
            {
                _loc5 = {blurX: 0, blurY: 0, quality: NaN};
                break;
            } 
        } // End of switch
        return (_loc5[_loc3]);
    } // End of the function
    static function _filter_property_set(p_obj, p_value, p_parameters)
    {
        var _loc2 = p_obj.filters;
        var _loc1;
        var _loc4 = p_parameters[0];
        var _loc3 = p_parameters[1];
        for (var _loc1 = 0; _loc1 < _loc2.length; ++_loc1)
        {
            if (_loc2[_loc1] instanceof _loc4)
            {
                _loc2[_loc1][_loc3] = p_value;
                p_obj.filters = _loc2;
                return;
            } // end if
        } // end of for
        if (_loc2 == undefined)
        {
            _loc2 = new Array();
        } // end if
        var _loc7;
        switch (_loc4)
        {
            case flash.filters.BlurFilter:
            {
                _loc7 = new flash.filters.BlurFilter(0, 0);
                break;
            } 
        } // End of switch
        _loc7[_loc3] = p_value;
        _loc2.push(_loc7);
        p_obj.filters = _loc2;
    } // End of the function
    static function _bezier_modifier(p_obj)
    {
        var _loc7 = [];
        var _loc4;
        if (p_obj instanceof Array)
        {
            _loc4 = p_obj.concat();
        }
        else
        {
            _loc4 = [p_obj];
        } // end else if
        var _loc3;
        var _loc1;
        var _loc2 = {};
        for (var _loc3 = 0; _loc3 < _loc4.length; ++_loc3)
        {
            for (var _loc1 in _loc4[_loc3])
            {
                if (_loc2[_loc1] == undefined)
                {
                    _loc2[_loc1] = [];
                } // end if
                _loc2[_loc1].push(_loc4[_loc3][_loc1]);
            } // end of for...in
        } // end of for
        for (var _loc1 in _loc2)
        {
            _loc7.push({name: _loc1, parameters: _loc2[_loc1]});
        } // end of for...in
        return (_loc7);
    } // End of the function
    static function _bezier_get(b, e, t, p)
    {
        if (p.length == 1)
        {
            return (b + t * (2 * (1 - t) * (p[0] - b) + t * (e - b)));
        }
        else
        {
            var _loc2 = Math.floor(t * p.length);
            var _loc5 = (t - _loc2 * (1 / p.length)) * p.length;
            var _loc3;
            var _loc6;
            if (_loc2 == 0)
            {
                _loc3 = b;
                _loc6 = (p[0] + p[1]) / 2;
            }
            else if (_loc2 == p.length - 1)
            {
                _loc3 = (p[_loc2 - 1] + p[_loc2]) / 2;
                _loc6 = e;
            }
            else
            {
                _loc3 = (p[_loc2 - 1] + p[_loc2]) / 2;
                _loc6 = (p[_loc2] + p[_loc2 + 1]) / 2;
            } // end else if
            return (_loc3 + _loc5 * (2 * (1 - _loc5) * (p[_loc2] - _loc3) + _loc5 * (_loc6 - _loc3)));
        } // end else if
    } // End of the function
} // End of Class
