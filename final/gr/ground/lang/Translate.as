class gr.ground.lang.Translate
{
    static var def;
    function Translate()
    {
    } // End of the function
    static function getWord(s)
    {
        if (gr.ground.lang.Translate.def[s] == undefined)
        {
            return (s);
        }
        else
        {
            return (gr.ground.lang.Translate.def[s]);
        } // end else if
    } // End of the function
    static function addDef(o)
    {
        if (gr.ground.lang.Translate.def == undefined)
        {
            def = {};
        } // end if
        for (var _loc2 in o)
        {
            gr.ground.lang.Translate.def[_loc2] = o[_loc2];
        } // end of for...in
    } // End of the function
} // End of Class
