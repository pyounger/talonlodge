class caurina.transitions.PropertyInfoObj
{
    var valueStart, valueComplete, hasModifier, modifierFunction, modifierParameters;
    function PropertyInfoObj(p_valueStart, p_valueComplete, p_modifierFunction, p_modifierParameters)
    {
        valueStart = p_valueStart;
        valueComplete = p_valueComplete;
        hasModifier = p_modifierFunction != undefined;
        modifierFunction = p_modifierFunction;
        modifierParameters = p_modifierParameters;
    } // End of the function
    function clone()
    {
        var _loc2 = new caurina.transitions.PropertyInfoObj(valueStart, valueComplete, modifierFunction, modifierParameters);
        return (_loc2);
    } // End of the function
    function toString()
    {
        var _loc2 = "\n[PropertyInfoObj ";
        _loc2 = _loc2 + ("valueStart:" + String(valueStart));
        _loc2 = _loc2 + ", ";
        _loc2 = _loc2 + ("valueComplete:" + String(valueComplete));
        _loc2 = _loc2 + ", ";
        _loc2 = _loc2 + ("modifierFunction:" + String(modifierFunction));
        _loc2 = _loc2 + ", ";
        _loc2 = _loc2 + ("modifierParameters:" + String(modifierParameters));
        _loc2 = _loc2 + "]\n";
        return (_loc2);
    } // End of the function
} // End of Class
