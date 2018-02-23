class fcms.model.XMLParsers
{
    function XMLParsers()
    {
    } // End of the function
    static function toObj(x)
    {
        var _loc1 = x.childNodes[0].childNodes[0].nodeValue;
        if (_loc1 == undefined)
        {
            _loc1 = "";
        } // end if
        var _loc2 = x.attributes.datatype;
        if (_loc2 == "number")
        {
            _loc1 = parseFloat(_loc1);
        } // end if
        return ({obj: _loc1, types: {datatype: _loc2}});
    } // End of the function
    static function toXML(data, types, fieldname)
    {
        var _loc1 = new XML();
        var _loc2 = _loc1.createElement("field");
        _loc2.attributes.datatype = types.datatype;
        _loc2.attributes.name = fieldname;
        var _loc3 = _loc1.createElement("page");
        _loc3.attributes.n = 0;
        var _loc4 = _loc1.createTextNode(data);
        _loc3.appendChild(_loc4);
        _loc2.appendChild(_loc3);
        _loc1.appendChild(_loc2);
        return (_loc1);
    } // End of the function
    static function richTextToObj(x)
    {
        var _loc11;
        var _loc3;
        var _loc5 = [];
        for (var _loc7 in x.childNodes)
        {
            _loc3 = parseInt(x.childNodes[_loc7].attributes.n);
            delete x.childNodes[_loc7].attributes.n;
            var _loc6 = x.childNodes[_loc7].childNodes[0].nodeValue;
            if (_loc6 == null)
            {
                _loc5[_loc3] = "";
                var _loc2 = x.childNodes[_loc7].childNodes;
                for (var _loc1 = 0; _loc1 < _loc2.length; ++_loc1)
                {
                    _loc5[_loc3] = _loc5[_loc3] + _loc2[_loc1].toString();
                } // end of for
                continue;
            } // end if
            _loc5[_loc3] = _loc6;
        } // end of for...in
        return ({obj: _loc5, types: {datatype: "rich_text"}});
    } // End of the function
    static function richTextToXML(data, types, fieldname)
    {
        var _loc2 = new XML();
        var _loc5 = _loc2.createElement("field");
        _loc5.attributes.datatype = "rich_text";
        _loc5.attributes.name = fieldname;
        var _loc1;
        var _loc3;
        for (var _loc6 in data)
        {
            _loc1 = _loc2.createElement("page");
            _loc1.attributes.n = _loc6;
            _loc3 = _loc2.createTextNode(data[_loc6]);
            _loc1.appendChild(_loc3);
            _loc5.appendChild(_loc1);
        } // end of for...in
        _loc2.appendChild(_loc5);
        return (_loc2);
    } // End of the function
    static function fileToObj(x)
    {
        var _loc4 = [];
        var _loc2;
        var _loc6 = x.childNodes;
        var _loc1;
        var _loc5;
        var _loc12;
        for (var _loc3 = 0; _loc3 < _loc6.length; ++_loc3)
        {
            _loc2 = parseInt(_loc6[_loc3].attributes.n);
            _loc4[_loc2] = {};
            _loc1 = new XML(_loc6[_loc3].childNodes[0].nodeValue).childNodes[0];
            _loc12 = _loc1.attributes.type;
            delete _loc1.attributes.type;
            _loc5 = _loc1.childNodes[0].nodeValue;
            if (_loc5 != undefined)
            {
                if (_loc12 == "image")
                {
                    _loc4[_loc2].caption = _loc5;
                }
                else
                {
                    _loc4[_loc2].description = _loc5;
                } // end if
            } // end else if
            for (var _loc7 in _loc1.attributes)
            {
                _loc4[_loc2][_loc7] = _loc1.attributes[_loc7];
            } // end of for...in
        } // end of for
        var _loc8 = _loc12 == "image" ? (_loc4[0]) : (_loc4);
        var _loc9 = _loc8.src.split("images/");
        if (_loc9.length == 2)
        {
            _loc8.src = _loc9[1];
        } // end if
        return ({obj: _loc8, types: {datatype: "file", ctype: _loc12}});
    } // End of the function
    static function fileToXML(data, types, fieldname, toDelete)
    {
        var _loc8 = new XML();
        var _loc10 = _loc8.createElement("field");
        _loc10.attributes.datatype = "file";
        _loc10.attributes.name = fieldname;
        if (types.ctype == "image")
        {
            data = [data];
        } // end if
        for (var _loc1 = 0; _loc1 < data.length; ++_loc1)
        {
            var _loc5 = _loc8.createElement("page");
            _loc5.attributes.n = _loc1;
            var _loc4 = "<file type=\"" + types.ctype + "\"";
            if (types.ctype == "image")
            {
                var _loc3 = ["src", "cprops", "iprops", "url", "target"];
                if (data[_loc1].url == "")
                {
                    data[_loc1].target = "";
                } // end if
                if (data[_loc1].caption == "")
                {
                    data[_loc1].cprops = "";
                } // end if
                if (data[_loc1].src == "")
                {
                    data[_loc1].iprops = "";
                } // end if
                for (var _loc11 in _loc3)
                {
                    if (data[_loc1][_loc3[_loc11]] == "undefined")
                    {
                        continue;
                    } // end if
                    if (data[_loc1][_loc3[_loc11]] == undefined || data[_loc1][_loc3[_loc11]] == "")
                    {
                        continue;
                    } // end if
                    _loc4 = _loc4 + (" " + _loc3[_loc11] + "=\"" + new XML(data[_loc1][_loc3[_loc11]]).toString() + "\"");
                } // end of for...in
                var _loc6 = new XML(data[_loc1].caption).toString();
            }
            else
            {
                _loc4 = _loc4 + (" src=\"" + new XML(data[_loc1].src).toString() + "\"");
                _loc6 = new XML(data[_loc1].description).toString();
            } // end else if
            _loc4 = _loc4 + ">";
            var _loc7 = _loc8.createTextNode(_loc4 + _loc6 + "</file>");
            _loc5.appendChild(_loc7);
            _loc10.appendChild(_loc5);
        } // end of for
        fcms.model.XMLParsers.appendDeleted(toDelete, _loc8, _loc10);
        _loc8.appendChild(_loc10);
        return (_loc8);
    } // End of the function
    static function appendDeleted(toDelete, x, xfield)
    {
        var _loc1;
        for (var _loc3 in toDelete)
        {
            _loc1 = x.createElement("page");
            _loc1.attributes.delete = "yes";
            _loc1.attributes.n = _loc3;
            xfield.appendChild(_loc1);
        } // end of for...in
    } // End of the function
    static var toObjFuncs = {string: [fcms.model.XMLParsers.toObj], rich_text: [fcms.model.XMLParsers.richTextToObj], number: [fcms.model.XMLParsers.toObj], date_time: [fcms.model.XMLParsers.toObj], file: [fcms.model.XMLParsers.fileToObj], html: [fcms.model.XMLParsers.toObj]};
    static var toXMLFuncs = {string: fcms.model.XMLParsers.toXML, rich_text: fcms.model.XMLParsers.richTextToXML, number: fcms.model.XMLParsers.toXML, date_time: fcms.model.XMLParsers.toXML, file: fcms.model.XMLParsers.fileToXML, html: fcms.model.XMLParsers.toXML};
} // End of Class
