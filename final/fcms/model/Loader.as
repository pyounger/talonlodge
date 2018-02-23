class fcms.model.Loader extends fcms.model.Fetcher
{
    var init, doSendAndLoad, dispatchEvent;
    function Loader()
    {
        super();
        this.init();
    } // End of the function
    function load(x, passVal)
    {
        this.doSendAndLoad("load", x, passVal);
    } // End of the function
    function loadResponse(x, passVal)
    {
        var _loc7 = x.childNodes[0].childNodes;
        var _loc13 = [];
        var _loc20;
        var _loc9;
        var _loc11;
        var _loc10;
        var _loc3;
        var _loc2;
        for (var _loc5 = 0; _loc5 < _loc7.length; ++_loc5)
        {
            _loc20 = _loc7[_loc5].attributes.type;
            _loc9 = parseInt(_loc7[_loc5].attributes.id);
            _loc11 = fcms.Tools.getDateFromString(_loc7[_loc5].attributes.ctime);
            _loc10 = fcms.Tools.getDateFromString(_loc7[_loc5].attributes.mtime);
            _loc3 = {};
            _loc3.id = _loc9;
            _loc3.docType = _loc20;
            _loc3.ctime = _loc11;
            _loc3.mtime = _loc10;
            _loc3.fields = [];
            _loc3.relations = [];
            _loc2 = _loc7[_loc5].childNodes;
            var _loc4;
            for (var _loc12 in _loc2)
            {
                if (_loc2[_loc12].nodeName == "relation")
                {
                    _loc3.relations.push({name: _loc2[_loc12].attributes.name, id: parseInt(_loc2[_loc12].attributes.docid)});
                    continue;
                } // end if
                if (_loc2[_loc12].nodeName == "relation_count")
                {
                    var _loc6 = parseInt(_loc2[_loc12].attributes.count);
                    if (_loc6)
                    {
                        _loc3.tagCount = _loc6;
                    } // end if
                    continue;
                } // end if
                _loc4 = {};
                _loc4.name = _loc2[_loc12].attributes.name;
                _loc4.dataType = _loc2[_loc12].attributes.datatype;
                _loc4.value = _loc2[_loc12];
                _loc3.fields.push(_loc4);
            } // end of for...in
            _loc13.push(this.parseDoc(_loc3));
        } // end of for
        this.dispatchEvent({type: "loadComplete", requester: passVal, data: _loc13, total: parseInt(x.childNodes[0].attributes.totaldocs), docprev: parseInt(x.childNodes[0].attributes.docprev), docnext: parseInt(x.childNodes[0].attributes.docnext)});
        false;
    } // End of the function
    function parseDoc(doc)
    {
        var _loc4 = {};
        var _loc6 = {};
        var _loc3;
        var _loc2;
        for (var _loc7 in doc.fields)
        {
            _loc2 = {};
            _loc3 = fcms.model.XMLParsers.toObjFuncs[doc.fields[_loc7].dataType];
            for (var _loc5 in _loc3)
            {
                _loc2 = _loc3[_loc5](doc.fields[_loc7].value);
                if (_loc2 != null)
                {
                    _loc4[doc.fields[_loc7].name] = _loc2.obj;
                    break;
                } // end if
            } // end of for...in
            _loc6[doc.fields[_loc7].name] = _loc2.types;
        } // end of for...in
        var _loc9 = {creation: doc.ctime, modification: doc.mtime};
        var _loc8 = {id: doc.id, content: _loc4, docType: doc.docType, fieldTypes: _loc6, dates: _loc9};
        if (doc.relations.length > 0)
        {
            _loc8.relations = doc.relations;
        } // end if
        if (doc.tagCount != undefined)
        {
            _loc8.tagCount = doc.tagCount;
        } // end if
        return (_loc8);
    } // End of the function
    function loadDocTypes()
    {
        this.doSendAndLoad("docTypes", new XML("http://talonlodge.com/final/data.xml"));
    } // End of the function
    function docTypesResponse(x)
    {
        var _loc3 = x.firstChild.childNodes;
        var _loc7 = [];
        var _loc4 = 0;
        for (var _loc2 = 0; _loc2 < _loc3.length; ++_loc2)
        {
            if (_loc3[_loc2].firstChild.nodeValue.substr(0, 1) != "_")
            {
                _loc7[_loc4] = {label: _loc3[_loc2].firstChild.nodeValue, id: _loc4};
                ++_loc4;
            } // end if
        } // end of for
        this.dispatchEvent({type: "docTypesLoad", data: _loc7});
        false;
    } // End of the function
} // End of Class
