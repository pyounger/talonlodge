class caurina.transitions.SpecialProperty
{
    var parameters;
    function SpecialProperty(p_getFunction, p_setFunction, p_parameters)
    {
        getValue = p_getFunction;
        setValue = p_setFunction;
        parameters = p_parameters;
    } // End of the function
    function getValue(p_obj, p_parameters)
    {
        return (null);
    } // End of the function
    function setValue(p_obj, p_value, p_parameters)
    {
    } // End of the function
    function toString()
    {
        var _loc2 = "";
        _loc2 = _loc2 + "[SpecialProperty ";
        _loc2 = _loc2 + ("getValue:" + getValue.toString());
        _loc2 = _loc2 + ", ";
        _loc2 = _loc2 + ("setValue:" + setValue.toString());
        _loc2 = _loc2 + ", ";
        _loc2 = _loc2 + ("parameters:" + parameters.toString());
        _loc2 = _loc2 + "]";
        return (_loc2);
    } // End of the function
} // End of Class
