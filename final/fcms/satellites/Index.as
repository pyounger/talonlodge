class fcms.satellites.Index extends fcms.satellites.Core
{
    var ctype, idOrder, sPageNo, recordMC, _yscale, _xscale, addEventListener, query, master, docTypes, fields, current, iSort, attachMovie, search_str, linkedFields, triggerEvent, __get__isLoading;
    function Index()
    {
        super();
    } // End of the function
    function init()
    {
        ctype = "index";
        idOrder = [];
        sPageNo = 0;
        if (recordMC == "")
        {
            recordMC = "fcmsIndexDef";
        } // end if
        super.init();
        _xscale = _yscale = 100;
        this.addEventListener("fetch", mx.utils.Delegate.create(this, onFetch));
        this.setRequired();
        query = this.getQuery();
        if (autoLoad)
        {
            master.doLater(master, "sendQuery", [this]);
        } // end if
        if (useSort)
        {
            master.addEventListener("adminMode", this);
        } // end if
    } // End of the function
    function getQuery()
    {
        var _loc2 = master.getQuery();
        if (docTypes != undefined)
        {
            _loc2.addFilter("$DOCTYPE", "=", docTypes);
        }
        else
        {
            _loc2.addFilter("$DOCTYPE", "!=", "_STATIC");
        } // end else if
        if (fields.length != 0)
        {
            _loc2.fields = fields;
        } // end if
        _loc2.limit = numRec;
        return (_loc2);
    } // End of the function
    function setRequired()
    {
        if (fields == undefined || fields.length == 0)
        {
            fields = ["title"];
        }
        else
        {
            var _loc2 = false;
            for (var _loc3 in fields)
            {
                if (fields[_loc3] == "title")
                {
                    _loc2 = true;
                    break;
                } // end if
            } // end of for...in
            if (!_loc2)
            {
                fields.push("title");
            } // end if
        } // end else if
    } // End of the function
    function onModelInsert(id, num)
    {
        var _loc2 = query.__get__limit() * query.__get__page() + num;
        idOrder[_loc2] = id;
        if (master.caching)
        {
            query.idOrder[_loc2] = id;
        } // end if
    } // End of the function
    function gotoPage(n)
    {
        if (disablePaging)
        {
            return (false);
        } // end if
        if (n == undefined)
        {
            n = current;
        } // end if
        super.gotoPage(n);
    } // End of the function
    function pageExists(no)
    {
        //return (no * numRec < query.totaldocs());
    } // End of the function
    function showPage(n)
    {
        if (idOrder.length == 0)
        {
            master.doLater(this, "displayEmpty", []);
            return;
        } // end if
        var _loc4 = current * numRec;
        var _loc3 = _loc4 + numRec - 1;
        if (_loc3 >= query.__get__totaldocs())
        {
            _loc3 = query.__get__totaldocs() - 1;
        } // end if
        for (var _loc2 = _loc4; _loc2 <= _loc3; ++_loc2)
        {
            if (idOrder[_loc2] == undefined)
            {
                query.__set__page(Math.floor(_loc2 / query.__get__limit()));
                master.sendQuery(this);
                return;
            } // end if
        } // end of for
        this.displayRecords();
        return;
    } // End of the function
    function displayRecords()
    {
        this.removeRecords();
        if (useSort && query.__get__isSortable())
        {
            iSort = new fcms.satellites.IndexSort(query.docprev, query.docnext, query.__get__sort().order, sortTime, {pos: marker, col: markerColor, size: markerSize});
            iSort.addEventListener("sort", this);
            if (master.editMode)
            {
                iSort.enabled = true;
            } // end if
        } // end if
        var _loc3 = query.__get__totaldocs() < numRec * (current + 1) ? (query.__get__totaldocs() % numRec) : (numRec);
        for (var _loc2 = 0; _loc2 < _loc3; ++_loc2)
        {
            if (frameDelay == 0)
            {
                this.showRecord(_loc2);
                continue;
            } // end if
            master.doLater(this, "showRecord", [_loc2], _loc2 * frameDelay);
        } // end of for
    } // End of the function
    function showRecord(i)
    {
        var _loc2;
        var _loc4;
        var _loc16;
        var _loc3;
        var _loc7;
        var _loc6;
        var _loc5;
        _loc6 = current * numRec + i;
        _loc16 = master.model.docs.getDataByID(idOrder[_loc6]);
        if (_loc16 == undefined)
        {
            this["rec" + i].removeMovieClip();
        } // end if
        _loc4 = master.model.docs.getTypeByID(idOrder[_loc6]);
        _loc2 = this.attachMovie(recordMC, "rec" + i, i);
        for (var _loc8 in fields)
        {
            _loc3 = master.model.docs.getTypesByFieldName(_loc4, fields[_loc8]).datatype;
            _loc5 = _loc16[fields[_loc8]] == undefined ? ("") : (_loc16[fields[_loc8]]);
            this.setFieldValue(_loc2[fields[_loc8]], _loc3, _loc5);
        } // end of for...in
        if (i != 0)
        {
            _loc7 = this["rec" + (i - 1)];
            _loc2._y = (_loc7.endy != undefined ? (_loc7.endy) : (_loc7._y)) + _loc7._height;
        } // end if
        var _loc11 = "asfunction:_fCMS.invoke," + _loc4 + "," + idOrder[_loc6];
        if (search_str != undefined)
        {
            _loc11 = _loc11 + ("," + search_str);
        } // end if
        fcms.satellites.Core.evObj = {type: "recordInit", target: this, mc: _loc2, prev: _loc7, data: _loc16, id: idOrder[_loc6], num: _loc6, documentType: _loc4, dates: master.model.docs.getDatesByID(idOrder[_loc6]), linkedFields: linkedFields, link: _loc11};
        this.triggerEvent(fcms.satellites.Core.evObj);
        for (var _loc8 in fcms.satellites.Core.evObj.linkedFields)
        {
            _loc2[fcms.satellites.Core.evObj.linkedFields[_loc8]].setNewTextFormat(_loc2[fcms.satellites.Core.evObj.linkedFields[_loc8]].getTextFormat());
            _loc3 = master.model.docs.getTypesByFieldName(_loc4, fcms.satellites.Core.evObj.linkedFields[_loc8]).datatype;
            this.setFieldValue(_loc2[fcms.satellites.Core.evObj.linkedFields[_loc8]], _loc3, "<a href=\"" + fcms.satellites.Core.evObj.link + "\">" + _loc2[fcms.satellites.Core.evObj.linkedFields[_loc8]].htmlText + "</a>");
        } // end of for...in
        if (useSort && query.__get__isSortable())
        {
            iSort.addMC(_loc2, idOrder[_loc6]);
        } // end if
    } // End of the function
    function setFieldValue(field, datatype, value)
    {
        switch (datatype)
        {
            case "number":
            {
                field.text = fcms.Tools.formatNumber(value);
                break;
            } 
            case "date_time":
            {
                field.text = fcms.Tools.formatDate(fcms.Tools.getDateFromString(value), "%Y/%m/%d", true);
                break;
            } 
            case "file":
            {
                field.htmlText = "<a href=\"" + value.src + "\">download</a>";
                break;
            } 
            default:
            {
                field.htmlText = value;
                break;
            } 
        } // End of switch
    } // End of the function
    function removeRecords()
    {
        for (var _loc2 = 0; _loc2 < numRec; ++_loc2)
        {
            this["rec" + _loc2].removeMovieClip();
        } // end of for
    } // End of the function
    function displayEmpty()
    {
        if (!this.__get__isLoading())
        {
            this.removeRecords();
            var _loc2 = this.attachMovie(recordMC, "rec0", 0);
            fcms.satellites.Core.evObj = {type: "recordInit", target: this, mc: _loc2, num: 0, empty: true};
            if (search_str != undefined || docTypes.length == 0)
            {
                fcms.satellites.Core.evObj.data = gr.ground.lang.Translate.getWord("noRecords");
            }
            else
            {
                fcms.satellites.Core.evObj.data = gr.ground.lang.Translate.getWord("addNew");
                fcms.satellites.Core.evObj.link = "asfunction:" + this + ".addNewCallback";
            } // end else if
            this.setFieldValue(_loc2.title, "text", fcms.satellites.Core.evObj.data);
            this.triggerEvent(fcms.satellites.Core.evObj);
            _loc2.title.setNewTextFormat(_loc2.title.getTextFormat());
            this.setFieldValue(_loc2.title, "text", fcms.satellites.Core.evObj.link ? ("<a href=\"" + fcms.satellites.Core.evObj.link + "\">" + _loc2.title.htmlText + "</a>") : (_loc2.title.htmlText));
        } // end if
    } // End of the function
    function addNewCallback()
    {
        master.invoke(docTypes[0]);
        master.start();
    } // End of the function
    function onFetch(eo)
    {
        if (eo.init)
        {
            if (master.caching)
            {
                master.cache.add(this);
            } // end if
            for (var _loc2 in query.__get__filters())
            {
                if (query.__get__filters()[_loc2].operator == "FULL_TEXT")
                {
                    search_str = query.__get__filters()[_loc2].values[0];
                    return;
                } // end if
            } // end of for...in
            search_str = undefined;
        } // end if
    } // End of the function
    function refresh(defaultQuery, pageNo)
    {
        if (pageNo == undefined)
        {
            pageNo = 0;
        } // end if
        if (defaultQuery)
        {
            query = this.getQuery();
        } // end if
        idOrder = [];
        current = 0;
        query.__set__page(pageNo);
        master.cache.remove(this);
        master.doLater(master, "sendQuery", [this]);
        this.gotoPage(pageNo);
    } // End of the function
    function sort(eo)
    {
        master.model.addEventListener("error", this);
        if (query.__get__sort().docid != undefined)
        {
            eo.docid = query.__get__sort().docid;
            eo.relation = query.__get__sort().relation;
        } // end if
        master.model.resort(eo, this);
    } // End of the function
    function error(eo)
    {
        if (eo.action == "resort")
        {
            iSort.moveBack();
            master.model.removeEventListener("error", this);
        } // end if
    } // End of the function
    function adminMode(eo)
    {
        if (eo.login)
        {
            iSort.enabled = true;
        }
        else
        {
            iSort.enabled = false;
        } // end else if
    } // End of the function
    var disablePaging = false;
    var autoLoad = true;
    var numRec = 5;
    var frameDelay = 0;
    var useSort = true;
    var sortTime = 150;
    var marker = "vertical";
    var markerColor = 0;
    var markerSize = 6;
    var cn = 0;
} // End of Class
